<?php
/** @var msDiscount $msDiscount */
/** @var pdoTools $pdoTools */
$pdoTools = $modx->getService('pdoTools');
$msDiscount = $modx->getService('msDiscount');

if (!empty($row) && is_array($row)) {
    $mode = 'prepare';
    if (!empty($row['id'])) {
        $id = $row['id'];
    }
}
else {
    $mode = 'standalone';
    if (!empty($frontend_css)) {
        $frontend_css = str_replace('[[+assetsUrl]]', $msDiscount->config['assetsUrl'], $frontend_css);
        $modx->regClientCSS($frontend_css);
    }
    if (!empty($frontend_js)) {
        $frontend_js = str_replace('[[+assetsUrl]]', $msDiscount->config['assetsUrl'], $frontend_js);
        $modx->regClientScript($frontend_js);
    }
    if (empty($id)) {
        $id = $modx->resource->id;
    }
}

if (!$product = $modx->getObject('msProductData', $id)) return;
$users = $msDiscount->getUserGroups($modx->user->id);
$products = $msDiscount->getProductGroups($id);
$date = date('Y-m-d H:i:s');
$sales = $msDiscount->getSales($date);
if (empty($sale)) {
	$sale = $pdoTools->getStore('msd_sale');
}
$sale_filter = array_diff(explode(',', $sale), array(''));;
$discounts = array(
    'percent' => '0%',    // Discount in percent
    'absolute' => 0,    // Discount in absolute value
    'remains' => 0,     // Remains for bye now
);

// Get discount by sales
if (!empty($sales)) {
    foreach ($sales as $sale) {
        if (!empty($sale_filter) && !in_array($sale['id'], $sale_filter)) {
            continue;
        }
        $exclude = false;
        // Exclude groups if they are specified in sale
        // And convert relation to discount
        foreach (array('users','products') as $type) {
            foreach ($sale[$type] as $group_id => $relation) {
                if ($relation != 'in') {
                    unset($sale[$type][$group_id]);
                    if (array_key_exists($group_id, ${$type})) {
                        $exclude = true;
                        break(2);
                    }
                }
                elseif (array_key_exists($group_id, ${$type})) {
                    $sale[$type][$group_id] = ${$type}[$group_id];
                }
                else {
                    $sale[$type][$group_id] = null;
                }
            }
        }
        if ($exclude) {continue;}
        $users_in = array_intersect(array_keys($sale['users']), array_keys($users));
        $products_in = array_intersect(array_keys($sale['products']), array_keys($products));

        if (empty($sale['users']) && empty($sale['products'])) {
            $discount = $sale['discount'];
            $ends = isset($sale['ends']) ? $sale['ends'] : '0000-00-00 00:00:00';
            $discounts = $msDiscount->compareDiscount($discount, $discounts, $ends);
            // Check group discount
            foreach (array('users', 'products') as $type) {
                foreach (${$type} as $group_id => $discount) {
                    $discounts = $msDiscount->compareDiscount($discount, $discounts, $ends);
                }
            }
        }
        else {
            if (!empty($sale['users']) && !empty($sale['products'])) {
                if (!empty($users_in) && !empty($products_in)) {
                    $discount = $sale['discount'];
                    $ends = isset($sale['ends']) ? $sale['ends'] : '0000-00-00 00:00:00';
                    $discounts = $msDiscount->compareDiscount($discount, $discounts, $ends);
                }
                else {
                    continue;
                }
            }
            if (!empty($sale['users']) && !empty($users_in)) {
                $discount = $sale['discount'];
                $ends = isset($sale['ends']) ? $sale['ends'] : '0000-00-00 00:00:00';
                $discounts = $msDiscount->compareDiscount($discount, $discounts, $ends);
                // Check group discounts
                foreach ($sale['users'] as $group_id => $discount) {
                    $discounts = $msDiscount->compareDiscount($discount, $discounts, $ends);
                }
            }
            elseif (!empty($sale['products']) && !empty($products_in)) {
                $discount = $sale['discount'];
                $ends = isset($sale['ends']) ? $sale['ends'] : '0000-00-00 00:00:00';
                $discounts = $msDiscount->compareDiscount($discount, $discounts, $ends);
                // Check group discounts
                foreach ($sale['products'] as $group_id => $discount) {
                    $discounts = $msDiscount->compareDiscount($discount, $discounts, $ends);
                }
            }
            if (empty($sale['users']) || empty($sale['products'])) {
                // Check group discounts
                foreach (array('users', 'products') as $type) {
                    foreach (${$type} as $group_id => $discount) {
                        $discounts = $msDiscount->compareDiscount($discount, $discounts, $ends);
                    }
                }
            }
        }
    }
}
else {
    // Check group discounts
    foreach (array('users', 'products') as $type) {
        foreach (${$type} as $group_id => $discount) {
            $ends = '0000-00-00 00:00:00';
            $discounts = $msDiscount->compareDiscount($discount, $discounts, $ends);
        }
    }
}

if ($discounts['percent'] == '0%' && $discounts['absolute'] == 0) {
    return;
}
else {
    if ($discounts['percent'] != '0%') {
        $tmp = ($price / 100) * intval($discounts['percent']);
        $discounts['percent_abs'] = $tmp;
    }
    else {
        $discounts['percent_abs'] = 0;
    }

    $discount = $discounts['absolute'] > $discounts['percent_abs']
        ? $discounts['absolute']
        : $discounts['percent'];
}

$arr = array(
    'sale_discount' => $discount,
    'remains' => $discounts['remains'] > 0 ? $discounts['remains'] : 0,
);
if ($mode == 'standalone') {
    $pdoTools->config['nestedChunkPrefix'] = 'minishop2_';

    return !empty($tpl)
        ? $pdoTools->getChunk($tpl, $arr)
        : print_r($arr, true);
}
elseif (!empty($row)) {
    $row = array_merge($row, $arr);

    return $modx->toJSON($row);
}
