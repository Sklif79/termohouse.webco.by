<?php return array (
  '02522348228064a04530e6c015d87074' => 
  array (
    'criteria' => 
    array (
      'name' => 'msearch2',
    ),
    'object' => 
    array (
      'name' => 'msearch2',
      'path' => '{core_path}components/msearch2/',
      'assets_path' => '',
    ),
  ),
  'acf259ad989848fecf78bc8c705313cb' => 
  array (
    'criteria' => 
    array (
      'category' => 'mSearch2',
    ),
    'object' => 
    array (
      'id' => 11,
      'parent' => 0,
      'category' => 'mSearch2',
      'rank' => 0,
    ),
  ),
  '7ae540d27ef85bf5c4ad114407f4d085' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.mSearch2.row',
    ),
    'object' => 
    array (
      'id' => 27,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.mSearch2.row',
      'description' => '',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'snippet' => '<div class="mse2-row">
	[[+idx]]. <a href="[[+uri]]" class="search-link">[[+pagetitle]]</a>[[+weight]]
	[[+intro]]
</div>
<!--msearch2_weight  ([[%mse2_weight]]: [[+weight]])-->
<!--msearch2_intro <p>[[+intro]]</p>-->',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/msearch2/elements/chunks/chunk.msearch2.row.tpl',
      'content' => '<div class="mse2-row">
	[[+idx]]. <a href="[[+uri]]" class="search-link">[[+pagetitle]]</a>[[+weight]]
	[[+intro]]
</div>
<!--msearch2_weight  ([[%mse2_weight]]: [[+weight]])-->
<!--msearch2_intro <p>[[+intro]]</p>-->',
    ),
  ),
  '51a2fb8424c37003ed61be5083189085' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.mSearch2.form',
    ),
    'object' => 
    array (
      'id' => 28,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.mSearch2.form',
      'description' => '',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'snippet' => '

<form action="[[~[[+pageId]]]]" method="get" role="search" class="search" id="mse2_form">
							<input type="text" placeholder="Поиск" class="search__field" name="[[+queryVar]]" value="[[+mse2_query]]"/>
							<i class="search__icon fa fa-search"></i>
						</form>',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'static' => 0,
      'static_file' => 'core/components/msearch2/elements/chunks/chunk.msearch2.form.tpl',
      'content' => '

<form action="[[~[[+pageId]]]]" method="get" role="search" class="search" id="mse2_form">
							<input type="text" placeholder="Поиск" class="search__field" name="[[+queryVar]]" value="[[+mse2_query]]"/>
							<i class="search__icon fa fa-search"></i>
						</form>',
    ),
  ),
  '2486be4f64eecf279a990b20b8bee98b' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.mSearch2.ac',
    ),
    'object' => 
    array (
      'id' => 29,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.mSearch2.ac',
      'description' => '',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'snippet' => '<div class="mse2-ac-item">
	[[+idx]]. [[+pagetitle]] [[+weight]]
	[[+intro]]
</div>
<!--msearch2_weight <span class="mse2-ac-weight"><small>[[%mse2_weight]]: [[+weight]]</small></span>-->
<!--msearch2_intro <br/><small>[[+intro]]</small>-->',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/msearch2/elements/chunks/chunk.msearch2.ac.tpl',
      'content' => '<div class="mse2-ac-item">
	[[+idx]]. [[+pagetitle]] [[+weight]]
	[[+intro]]
</div>
<!--msearch2_weight <span class="mse2-ac-weight"><small>[[%mse2_weight]]: [[+weight]]</small></span>-->
<!--msearch2_intro <br/><small>[[+intro]]</small>-->',
    ),
  ),
  '01b6c1eb85eeff06db8ad1a16807059d' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.mFilter2.outer',
    ),
    'object' => 
    array (
      'id' => 30,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.mFilter2.outer',
      'description' => '',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'snippet' => '<div class="row msearch2" id="mse2_mfilter">
	<div class="span3 col-md-3">
		<form action="[[~[[*id]]]]" method="post" id="mse2_filters">
			[[+filters]]
			<br/>
			[[+filters:isnot=``:then=`
				<button type="reset" class="btn btn-default hidden">[[%mse2_reset]]</button>
				<button type="submit" class="btn btn-success pull-right hidden">[[%mse2_submit]]</button>
				<div class="clearfix"></div>
			`]]
		</form>

		<br/><br/>
		<div>[[%mse2_limit]]
			<select name="mse_limit" id="mse2_limit">
				<option value="10" [[+limit:is=`10`:then=`selected`]]>10</option>
				<option value="25" [[+limit:is=`25`:then=`selected`]]>25</option>
				<option value="50" [[+limit:is=`50`:then=`selected`]]>50</option>
				<option value="100" [[+limit:is=`100`:then=`selected`]]>100</option>
			</select>
		</div>
	</div>

	<div class="span9 col-md-9">
		<h3>[[%mse2_filter_total]] <span id="mse2_total">[[+total:default=`0`]]</span></h3>

		<div class="row">
			<div id="mse2_sort" class="span5 col-md-5">
				[[%mse2_sort]]
				<a href="#" data-sort="resource|publishedon" data-dir="[[+mse2_sort:is=`resource|publishedon:desc`:then=`desc`]]" data-default="desc" class="sort">[[%mse2_sort_publishedon]] <span></span></a>
			</div>

			[[+tpls:notempty=`
			<div id="mse2_tpl" class="span4 col-md-4">
				<a href="#" data-tpl="0" class="[[+tpl0]]">[[%mse2_chunk_default]]</a> /
				<a href="#" data-tpl="1" class="[[+tpl1]]">[[%mse2_chunk_alternate]]</a>
			</div>
			`]]
		</div>

		<div id="mse2_selected_wrapper">
			<div id="mse2_selected">[[%mse2_selected]]:
				<span></span>
			</div>
		</div>

		<div id="mse2_results">
			[[+results]]
		</div>

		<div class="mse2_pagination">
			[[!+page.nav]]
		</div>

	</div>
</div>',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/msearch2/elements/chunks/chunk.mfilter2.outer.tpl',
      'content' => '<div class="row msearch2" id="mse2_mfilter">
	<div class="span3 col-md-3">
		<form action="[[~[[*id]]]]" method="post" id="mse2_filters">
			[[+filters]]
			<br/>
			[[+filters:isnot=``:then=`
				<button type="reset" class="btn btn-default hidden">[[%mse2_reset]]</button>
				<button type="submit" class="btn btn-success pull-right hidden">[[%mse2_submit]]</button>
				<div class="clearfix"></div>
			`]]
		</form>

		<br/><br/>
		<div>[[%mse2_limit]]
			<select name="mse_limit" id="mse2_limit">
				<option value="10" [[+limit:is=`10`:then=`selected`]]>10</option>
				<option value="25" [[+limit:is=`25`:then=`selected`]]>25</option>
				<option value="50" [[+limit:is=`50`:then=`selected`]]>50</option>
				<option value="100" [[+limit:is=`100`:then=`selected`]]>100</option>
			</select>
		</div>
	</div>

	<div class="span9 col-md-9">
		<h3>[[%mse2_filter_total]] <span id="mse2_total">[[+total:default=`0`]]</span></h3>

		<div class="row">
			<div id="mse2_sort" class="span5 col-md-5">
				[[%mse2_sort]]
				<a href="#" data-sort="resource|publishedon" data-dir="[[+mse2_sort:is=`resource|publishedon:desc`:then=`desc`]]" data-default="desc" class="sort">[[%mse2_sort_publishedon]] <span></span></a>
			</div>

			[[+tpls:notempty=`
			<div id="mse2_tpl" class="span4 col-md-4">
				<a href="#" data-tpl="0" class="[[+tpl0]]">[[%mse2_chunk_default]]</a> /
				<a href="#" data-tpl="1" class="[[+tpl1]]">[[%mse2_chunk_alternate]]</a>
			</div>
			`]]
		</div>

		<div id="mse2_selected_wrapper">
			<div id="mse2_selected">[[%mse2_selected]]:
				<span></span>
			</div>
		</div>

		<div id="mse2_results">
			[[+results]]
		</div>

		<div class="mse2_pagination">
			[[!+page.nav]]
		</div>

	</div>
</div>',
    ),
  ),
  'fc41439e46cfb365113ac8ddb5e66d6a' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.mFilter2.filter.outer',
    ),
    'object' => 
    array (
      'id' => 31,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.mFilter2.filter.outer',
      'description' => '',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'snippet' => '<fieldset id="mse2_[[+table]][[+delimeter]][[+filter]]">
	<h4 class="filter_title">[[%mse2_filter_[[+table]]_[[+filter]]]]</h4>
	[[+rows]]
</fieldset>',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/msearch2/elements/chunks/chunk.mfilter2.filter.outer.tpl',
      'content' => '<fieldset id="mse2_[[+table]][[+delimeter]][[+filter]]">
	<h4 class="filter_title">[[%mse2_filter_[[+table]]_[[+filter]]]]</h4>
	[[+rows]]
</fieldset>',
    ),
  ),
  'af30d294754d095d4dabb1ec1386c224' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.mFilter2.filter.slider',
    ),
    'object' => 
    array (
      'id' => 32,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.mFilter2.filter.slider',
      'description' => '',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'snippet' => '<fieldset id="mse2_[[+table]][[+delimeter]][[+filter]]">
	<h4 class="filter_title">[[%mse2_filter_[[+table]]_[[+filter]]]]</h4>
	<div class="mse2_number_slider"></div>
	<div class="mse2_number_inputs">
		[[+rows]]
	</div>
</fieldset>',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/msearch2/elements/chunks/chunk.mfilter2.filter.slider.tpl',
      'content' => '<fieldset id="mse2_[[+table]][[+delimeter]][[+filter]]">
	<h4 class="filter_title">[[%mse2_filter_[[+table]]_[[+filter]]]]</h4>
	<div class="mse2_number_slider"></div>
	<div class="mse2_number_inputs">
		[[+rows]]
	</div>
</fieldset>',
    ),
  ),
  '891a9be5a8e026d052f402bc013438af' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.mFilter2.filter.select',
    ),
    'object' => 
    array (
      'id' => 33,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.mFilter2.filter.select',
      'description' => '',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'snippet' => '<fieldset id="mse2_[[+table]][[+delimeter]][[+filter]]">
	<h4 class="filter_title">[[%mse2_filter_[[+table]]_[[+filter]]]]</h4>
	<select name="[[+filter_key]]" id="[[+table]][[+delimeter]][[+filter]]_0">
		<option value="" selected>[[%mse2_select]]</option>
		[[+rows]]
	</select>
</fieldset>',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/msearch2/elements/chunks/chunk.mfilter2.filter.select.tpl',
      'content' => '<fieldset id="mse2_[[+table]][[+delimeter]][[+filter]]">
	<h4 class="filter_title">[[%mse2_filter_[[+table]]_[[+filter]]]]</h4>
	<select name="[[+filter_key]]" id="[[+table]][[+delimeter]][[+filter]]_0">
		<option value="" selected>[[%mse2_select]]</option>
		[[+rows]]
	</select>
</fieldset>',
    ),
  ),
  '9bb219e8fb61159af6ca8ea608d00324' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.mFilter2.filter.checkbox',
    ),
    'object' => 
    array (
      'id' => 34,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.mFilter2.filter.checkbox',
      'description' => '',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'snippet' => '<label for="mse2_[[+table]][[+delimeter]][[+filter]]_[[+idx]]" class="[[+disabled]]">
	<input type="checkbox" name="[[+filter_key]]" id="mse2_[[+table]][[+delimeter]][[+filter]]_[[+idx]]" value="[[+value]]" [[+checked]] [[+disabled]]/> [[+title]] <sup>[[+num]]</sup>
</label><br/>',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/msearch2/elements/chunks/chunk.mfilter2.filter.checkbox.tpl',
      'content' => '<label for="mse2_[[+table]][[+delimeter]][[+filter]]_[[+idx]]" class="[[+disabled]]">
	<input type="checkbox" name="[[+filter_key]]" id="mse2_[[+table]][[+delimeter]][[+filter]]_[[+idx]]" value="[[+value]]" [[+checked]] [[+disabled]]/> [[+title]] <sup>[[+num]]</sup>
</label><br/>',
    ),
  ),
  '4e7465099e16b53a31e2a4cec7e0c83c' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.mFilter2.filter.number',
    ),
    'object' => 
    array (
      'id' => 35,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.mFilter2.filter.number',
      'description' => '',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'snippet' => '<div class="form-group col-md-6">
	<label for="mse2_[[+table]][[+delimeter]][[+filter]]_[[+idx]]">[[+title]]
		<input type="text" name="[[+filter_key]]" id="mse2_[[+table]][[+delimeter]][[+filter]]_[[+idx]]" value="[[+value]]" class="form-control input-sm" />
	</label>
</div>',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/msearch2/elements/chunks/chunk.mfilter2.filter.number.tpl',
      'content' => '<div class="form-group col-md-6">
	<label for="mse2_[[+table]][[+delimeter]][[+filter]]_[[+idx]]">[[+title]]
		<input type="text" name="[[+filter_key]]" id="mse2_[[+table]][[+delimeter]][[+filter]]_[[+idx]]" value="[[+value]]" class="form-control input-sm" />
	</label>
</div>',
    ),
  ),
  'cbdc8e33d49b1bb5a6c5593729d7636e' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.mFilter2.filter.radio',
    ),
    'object' => 
    array (
      'id' => 36,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.mFilter2.filter.radio',
      'description' => '',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'snippet' => '<label for="mse2_[[+table]][[+delimeter]][[+filter]]_[[+idx]]" class="[[+disabled]]">
	<input type="radio" name="[[+filter_key]]" id="mse2_[[+table]][[+delimeter]][[+filter]]_[[+idx]]" value="[[+value]]" [[+checked]] [[+disabled]]/> [[+title]] <sup>[[+num]]</sup>
</label><br/>',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/msearch2/elements/chunks/chunk.mfilter2.filter.radio.tpl',
      'content' => '<label for="mse2_[[+table]][[+delimeter]][[+filter]]_[[+idx]]" class="[[+disabled]]">
	<input type="radio" name="[[+filter_key]]" id="mse2_[[+table]][[+delimeter]][[+filter]]_[[+idx]]" value="[[+value]]" [[+checked]] [[+disabled]]/> [[+title]] <sup>[[+num]]</sup>
</label><br/>',
    ),
  ),
  '24986b2bc7edcc6380deb4654a57b923' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.mFilter2.filter.option',
    ),
    'object' => 
    array (
      'id' => 37,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.mFilter2.filter.option',
      'description' => '',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'snippet' => '<option value="[[+value]]" [[+selected]] [[+disabled]] class="[[+disabled]]">[[+title]]&nbsp;([[+num]])</option>',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/msearch2/elements/chunks/chunk.mfilter2.filter.option.tpl',
      'content' => '<option value="[[+value]]" [[+selected]] [[+disabled]] class="[[+disabled]]">[[+title]]&nbsp;([[+num]])</option>',
    ),
  ),
  '52171f54f2be19ee2c62f01e278e7c9a' => 
  array (
    'criteria' => 
    array (
      'name' => 'mSearch2',
    ),
    'object' => 
    array (
      'id' => 53,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'mSearch2',
      'description' => '',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'snippet' => '/** @var modX $modx */
/** @var array $scriptProperties */
/** @var mSearch2 $mSearch2 */
if (!$modx->loadClass(\'msearch2\', MODX_CORE_PATH . \'components/msearch2/model/msearch2/\', false, true)) {return false;}
$mSearch2 = new mSearch2($modx, $scriptProperties);
$mSearch2->pdoTools->setConfig($scriptProperties);
$mSearch2->pdoTools->addTime(\'pdoTools loaded.\');

if (empty($queryVar)) {$queryVar = \'query\';}
if (empty($parentsVar)) {$parentsVar = \'parents\';}
if (empty($minQuery)) {$minQuery = $modx->getOption(\'index_min_words_length\', null, 3, true);}
if (empty($htagOpen)) {$htagOpen = \'<b>\';}
if (empty($htagClose)) {$htagClose = \'</b>\';}
if (empty($outputSeparator)) {$outputSeparator = "\\n";}
if (empty($plPrefix)) {$plPrefix = \'mse2_\';}
$returnIds = !empty($returnIds);
$fastMode = !empty($fastMode);

$class = \'modResource\';
$found = array();
$output = null;
$query = !empty($_REQUEST[$queryVar])
	? $mSearch2->getQuery(rawurldecode($_REQUEST[$queryVar]))
	: \'\';

if (empty($resources)) {
	if (empty($query) && isset($_REQUEST[$queryVar])) {
		$output = $modx->lexicon(\'mse2_err_no_query\');
	}
	elseif (empty($query) && !empty($forceSearch)) {
		$output = $modx->lexicon(\'mse2_err_no_query_var\');
	}
	elseif (!empty($query) && !preg_match(\'/^[0-9]{2,}$/\', $query) && mb_strlen($query,\'UTF-8\') < $minQuery) {
		$output = $modx->lexicon(\'mse2_err_min_query\');
	}

	$modx->setPlaceholder($plPrefix.$queryVar, $query);

	if (!empty($output)) {
		return !$returnIds
			? $output
			: \'\';
	}
	elseif (!empty($query)) {
		$found = $mSearch2->Search($query);
		$ids = array_keys($found);
		$resources = implode(\',\', $ids);
		if (empty($found)) {
			if ($returnIds) {
				return \'\';
			}
			elseif (!empty($query)) {
				$output = $modx->lexicon(\'mse2_err_no_results\');
			}
			if (!empty($tplWrapper) && !empty($wrapIfEmpty)) {
				$output = $mSearch2->pdoTools->getChunk(
					$tplWrapper,
					array(
						\'output\' => $output,
						\'total\' => 0,
						\'query\' => $query,
						\'parents\' => $modx->getPlaceholder($plPrefix.$parentsVar),
					),
					$fastMode
				);
			}
			if ($modx->user->hasSessionContext(\'mgr\') && !empty($showLog)) {
				$output .= \'<pre class="mSearchLog">\' . print_r($mSearch2->pdoTools->getTime(), 1) . \'</pre>\';
			}
			if (!empty($toPlaceholder)) {
				$modx->setPlaceholder($toPlaceholder, $output);
				return;
			}
			else {
				return $output;
			}
		}
	}
}
elseif (strpos($resources, \'{\') === 0) {
	$found = $modx->fromJSON($resources);
	$resources = implode(\',\', array_keys($found));
	unset($scriptProperties[\'resources\']);
}
/*----------------------------------------------------------------------------------*/
if (empty($returnIds)) {
    // Joining tables
    $leftJoin = array(
        \'mseIntro\' => array(
            \'class\' => \'mseIntro\',
            \'alias\' => \'Intro\',
            \'on\' => $class . \'.id = Intro.resource\'
        )
    );
    // Fields to select
    $resourceColumns = !empty($includeContent)
        ? $modx->getSelectColumns($class, $class)
        : $modx->getSelectColumns($class, $class, \'\', array(\'content\'), true);
    $select = array(
        $class => $resourceColumns,
        \'Intro\' => \'intro\'
    );
    $groupby = $class.\'.id, Intro.intro\';
} else {
    $leftJoin = array();
    $select = array($class . \'id\');
    $groupby = $class.\'.id\';
}

// Add custom parameters
foreach (array(\'leftJoin\', \'select\') as $v) {
    if (!empty($scriptProperties[$v])) {
        $tmp = $modx->fromJSON($scriptProperties[$v]);
        if (is_array($tmp)) {
            $$v = array_merge($$v, $tmp);
        }
    }
    unset($scriptProperties[$v]);
}

// Default parameters
$default = array(
	\'class\' => $class,
	\'leftJoin\' => $leftJoin,
	\'select\' => $select,
	\'groupby\' => $groupby,
	\'return\' => !empty($returnIds)
		? \'ids\'
		: \'data\',
    \'fastMode\' => $fastMode,
    \'nestedChunkPrefix\' => \'msearch2_\',
);
if (!empty($resources)) {
	$default[\'resources\'] = is_array($resources)
		? implode(\',\', $resources)
		: $resources;
}

// Merge all properties and run!
$mSearch2->pdoTools->setConfig(array_merge($default, $scriptProperties), false);
$mSearch2->pdoTools->addTime(\'Query parameters are prepared.\');
$rows = $mSearch2->pdoTools->run();

$log = \'\';
if ($modx->user->hasSessionContext(\'mgr\') && !empty($showLog)) {
	$log .= \'<pre class="mSearchLog">\' . print_r($mSearch2->pdoTools->getTime(), 1) . \'</pre>\';
}

// Processing results
if (!empty($returnIds)) {
	$modx->setPlaceholder(\'mSearch.log\', $log);
	if (!empty($toPlaceholder)) {
		$modx->setPlaceholder($toPlaceholder, $rows);
		return \'\';
	}
	else {
		return $rows;
	}
}
elseif (!empty($rows) && is_array($rows)) {
	$output = array();
	foreach ($rows as $k => $row) {
		// Processing main fields
		$row[\'weight\'] = isset($found[$row[\'id\']]) ? $found[$row[\'id\']] : \'\';
		$row[\'intro\'] = $mSearch2->Highlight($row[\'intro\'], $query, $htagOpen, $htagClose);

		$row[\'idx\'] = $mSearch2->pdoTools->idx++;
		$tplRow = $mSearch2->pdoTools->defineChunk($row);
		$output[] .= empty($tplRow)
			? $mSearch2->pdoTools->getChunk(\'\', $row)
			: $mSearch2->pdoTools->getChunk($tplRow, $row, $fastMode);
	}
	$mSearch2->pdoTools->addTime(\'Returning processed chunks\');
	if (!empty($toSeparatePlaceholders)) {
		$output[\'log\'] = $log;
		$modx->setPlaceholders($output, $toSeparatePlaceholders);
	}
	else {
		$output = implode($outputSeparator, $output) . $log;
	}
}
else {
	$output = $modx->lexicon(\'mse2_err_no_results\') . $log;
}

// Return output
if (!empty($tplWrapper) && (!empty($wrapIfEmpty) || !empty($output))) {
	$output = $mSearch2->pdoTools->getChunk(
		$tplWrapper,
		array(
			\'output\' => $output,
			\'total\' => $modx->getPlaceholder($mSearch2->pdoTools->config[\'totalVar\']),
			\'query\' => $modx->getPlaceholder($plPrefix.$queryVar),
			\'parents\' => $modx->getPlaceholder($plPrefix.$parentsVar),
		),
		$fastMode
	);
}

if (!empty($toPlaceholder)) {
	$modx->setPlaceholder($toPlaceholder, $output);
}
else {
	return $output;
}',
      'locked' => 0,
      'properties' => 'a:32:{s:3:"tpl";a:7:{s:4:"name";s:3:"tpl";s:4:"desc";s:13:"mse2_prop_tpl";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:16:"tpl.mSearch2.row";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:9:"returnIds";a:7:{s:4:"name";s:9:"returnIds";s:4:"desc";s:19:"mse2_prop_returnIds";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:7:"showLog";a:7:{s:4:"name";s:7:"showLog";s:4:"desc";s:17:"mse2_prop_showLog";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:8:"fastMode";a:7:{s:4:"name";s:8:"fastMode";s:4:"desc";s:18:"mse2_prop_fastMode";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:5:"limit";a:7:{s:4:"name";s:5:"limit";s:4:"desc";s:15:"mse2_prop_limit";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:10;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:6:"offset";a:7:{s:4:"name";s:6:"offset";s:4:"desc";s:16:"mse2_prop_offset";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:5:"depth";a:7:{s:4:"name";s:5:"depth";s:4:"desc";s:15:"mse2_prop_depth";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:10;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:15:"outputSeparator";a:7:{s:4:"name";s:15:"outputSeparator";s:4:"desc";s:25:"mse2_prop_outputSeparator";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:1:"
";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:13:"toPlaceholder";a:7:{s:4:"name";s:13:"toPlaceholder";s:4:"desc";s:23:"mse2_prop_toPlaceholder";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:22:"toSeparatePlaceholders";a:7:{s:4:"name";s:22:"toSeparatePlaceholders";s:4:"desc";s:32:"mse2_prop_toSeparatePlaceholders";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:7:"parents";a:7:{s:4:"name";s:7:"parents";s:4:"desc";s:17:"mse2_prop_parents";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:10:"includeTVs";a:7:{s:4:"name";s:10:"includeTVs";s:4:"desc";s:20:"mse2_prop_includeTVs";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:8:"tvPrefix";a:7:{s:4:"name";s:8:"tvPrefix";s:4:"desc";s:18:"mse2_prop_tvPrefix";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:5:"where";a:7:{s:4:"name";s:5:"where";s:4:"desc";s:15:"mse2_prop_where";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:15:"showUnpublished";a:7:{s:4:"name";s:15:"showUnpublished";s:4:"desc";s:25:"mse2_prop_showUnpublished";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:11:"showDeleted";a:7:{s:4:"name";s:11:"showDeleted";s:4:"desc";s:21:"mse2_prop_showDeleted";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:10:"showHidden";a:7:{s:4:"name";s:10:"showHidden";s:4:"desc";s:20:"mse2_prop_showHidden";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:1;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:14:"hideContainers";a:7:{s:4:"name";s:14:"hideContainers";s:4:"desc";s:24:"mse2_prop_hideContainers";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:14:"introCutBefore";a:7:{s:4:"name";s:14:"introCutBefore";s:4:"desc";s:24:"mse2_prop_introCutBefore";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:50;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:13:"introCutAfter";a:7:{s:4:"name";s:13:"introCutAfter";s:4:"desc";s:23:"mse2_prop_introCutAfter";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:250;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:8:"htagOpen";a:7:{s:4:"name";s:8:"htagOpen";s:4:"desc";s:18:"mse2_prop_htagOpen";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:3:"<b>";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:9:"htagClose";a:7:{s:4:"name";s:9:"htagClose";s:4:"desc";s:19:"mse2_prop_htagClose";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:4:"</b>";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:10:"parentsVar";a:7:{s:4:"name";s:10:"parentsVar";s:4:"desc";s:20:"mse2_prop_parentsVar";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:7:"parents";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:8:"queryVar";a:7:{s:4:"name";s:8:"queryVar";s:4:"desc";s:18:"mse2_prop_queryVar";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:5:"query";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:10:"tplWrapper";a:7:{s:4:"name";s:10:"tplWrapper";s:4:"desc";s:20:"mse2_prop_tplWrapper";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:11:"wrapIfEmpty";a:7:{s:4:"name";s:11:"wrapIfEmpty";s:4:"desc";s:21:"mse2_prop_wrapIfEmpty";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:11:"forceSearch";a:7:{s:4:"name";s:11:"forceSearch";s:4:"desc";s:21:"mse2_prop_forceSearch";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:1;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:8:"minQuery";a:7:{s:4:"name";s:8:"minQuery";s:4:"desc";s:18:"mse2_prop_minQuery";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";i:3;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:6:"fields";a:7:{s:4:"name";s:6:"fields";s:4:"desc";s:16:"mse2_prop_fields";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:9:"onlyIndex";a:7:{s:4:"name";s:9:"onlyIndex";s:4:"desc";s:19:"mse2_prop_onlyIndex";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:12:"onlyAllWords";a:7:{s:4:"name";s:12:"onlyAllWords";s:4:"desc";s:22:"mse2_prop_onlyAllWords";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:13:"showSearchLog";a:7:{s:4:"name";s:13:"showSearchLog";s:4:"desc";s:23:"mse2_prop_showSearchLog";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/msearch2/elements/snippets/snippet.msearch2.php',
      'content' => '/** @var modX $modx */
/** @var array $scriptProperties */
/** @var mSearch2 $mSearch2 */
if (!$modx->loadClass(\'msearch2\', MODX_CORE_PATH . \'components/msearch2/model/msearch2/\', false, true)) {return false;}
$mSearch2 = new mSearch2($modx, $scriptProperties);
$mSearch2->pdoTools->setConfig($scriptProperties);
$mSearch2->pdoTools->addTime(\'pdoTools loaded.\');

if (empty($queryVar)) {$queryVar = \'query\';}
if (empty($parentsVar)) {$parentsVar = \'parents\';}
if (empty($minQuery)) {$minQuery = $modx->getOption(\'index_min_words_length\', null, 3, true);}
if (empty($htagOpen)) {$htagOpen = \'<b>\';}
if (empty($htagClose)) {$htagClose = \'</b>\';}
if (empty($outputSeparator)) {$outputSeparator = "\\n";}
if (empty($plPrefix)) {$plPrefix = \'mse2_\';}
$returnIds = !empty($returnIds);
$fastMode = !empty($fastMode);

$class = \'modResource\';
$found = array();
$output = null;
$query = !empty($_REQUEST[$queryVar])
	? $mSearch2->getQuery(rawurldecode($_REQUEST[$queryVar]))
	: \'\';

if (empty($resources)) {
	if (empty($query) && isset($_REQUEST[$queryVar])) {
		$output = $modx->lexicon(\'mse2_err_no_query\');
	}
	elseif (empty($query) && !empty($forceSearch)) {
		$output = $modx->lexicon(\'mse2_err_no_query_var\');
	}
	elseif (!empty($query) && !preg_match(\'/^[0-9]{2,}$/\', $query) && mb_strlen($query,\'UTF-8\') < $minQuery) {
		$output = $modx->lexicon(\'mse2_err_min_query\');
	}

	$modx->setPlaceholder($plPrefix.$queryVar, $query);

	if (!empty($output)) {
		return !$returnIds
			? $output
			: \'\';
	}
	elseif (!empty($query)) {
		$found = $mSearch2->Search($query);
		$ids = array_keys($found);
		$resources = implode(\',\', $ids);
		if (empty($found)) {
			if ($returnIds) {
				return \'\';
			}
			elseif (!empty($query)) {
				$output = $modx->lexicon(\'mse2_err_no_results\');
			}
			if (!empty($tplWrapper) && !empty($wrapIfEmpty)) {
				$output = $mSearch2->pdoTools->getChunk(
					$tplWrapper,
					array(
						\'output\' => $output,
						\'total\' => 0,
						\'query\' => $query,
						\'parents\' => $modx->getPlaceholder($plPrefix.$parentsVar),
					),
					$fastMode
				);
			}
			if ($modx->user->hasSessionContext(\'mgr\') && !empty($showLog)) {
				$output .= \'<pre class="mSearchLog">\' . print_r($mSearch2->pdoTools->getTime(), 1) . \'</pre>\';
			}
			if (!empty($toPlaceholder)) {
				$modx->setPlaceholder($toPlaceholder, $output);
				return;
			}
			else {
				return $output;
			}
		}
	}
}
elseif (strpos($resources, \'{\') === 0) {
	$found = $modx->fromJSON($resources);
	$resources = implode(\',\', array_keys($found));
	unset($scriptProperties[\'resources\']);
}
/*----------------------------------------------------------------------------------*/
if (empty($returnIds)) {
    // Joining tables
    $leftJoin = array(
        \'mseIntro\' => array(
            \'class\' => \'mseIntro\',
            \'alias\' => \'Intro\',
            \'on\' => $class . \'.id = Intro.resource\'
        )
    );
    // Fields to select
    $resourceColumns = !empty($includeContent)
        ? $modx->getSelectColumns($class, $class)
        : $modx->getSelectColumns($class, $class, \'\', array(\'content\'), true);
    $select = array(
        $class => $resourceColumns,
        \'Intro\' => \'intro\'
    );
    $groupby = $class.\'.id, Intro.intro\';
} else {
    $leftJoin = array();
    $select = array($class . \'id\');
    $groupby = $class.\'.id\';
}

// Add custom parameters
foreach (array(\'leftJoin\', \'select\') as $v) {
    if (!empty($scriptProperties[$v])) {
        $tmp = $modx->fromJSON($scriptProperties[$v]);
        if (is_array($tmp)) {
            $$v = array_merge($$v, $tmp);
        }
    }
    unset($scriptProperties[$v]);
}

// Default parameters
$default = array(
	\'class\' => $class,
	\'leftJoin\' => $leftJoin,
	\'select\' => $select,
	\'groupby\' => $groupby,
	\'return\' => !empty($returnIds)
		? \'ids\'
		: \'data\',
    \'fastMode\' => $fastMode,
    \'nestedChunkPrefix\' => \'msearch2_\',
);
if (!empty($resources)) {
	$default[\'resources\'] = is_array($resources)
		? implode(\',\', $resources)
		: $resources;
}

// Merge all properties and run!
$mSearch2->pdoTools->setConfig(array_merge($default, $scriptProperties), false);
$mSearch2->pdoTools->addTime(\'Query parameters are prepared.\');
$rows = $mSearch2->pdoTools->run();

$log = \'\';
if ($modx->user->hasSessionContext(\'mgr\') && !empty($showLog)) {
	$log .= \'<pre class="mSearchLog">\' . print_r($mSearch2->pdoTools->getTime(), 1) . \'</pre>\';
}

// Processing results
if (!empty($returnIds)) {
	$modx->setPlaceholder(\'mSearch.log\', $log);
	if (!empty($toPlaceholder)) {
		$modx->setPlaceholder($toPlaceholder, $rows);
		return \'\';
	}
	else {
		return $rows;
	}
}
elseif (!empty($rows) && is_array($rows)) {
	$output = array();
	foreach ($rows as $k => $row) {
		// Processing main fields
		$row[\'weight\'] = isset($found[$row[\'id\']]) ? $found[$row[\'id\']] : \'\';
		$row[\'intro\'] = $mSearch2->Highlight($row[\'intro\'], $query, $htagOpen, $htagClose);

		$row[\'idx\'] = $mSearch2->pdoTools->idx++;
		$tplRow = $mSearch2->pdoTools->defineChunk($row);
		$output[] .= empty($tplRow)
			? $mSearch2->pdoTools->getChunk(\'\', $row)
			: $mSearch2->pdoTools->getChunk($tplRow, $row, $fastMode);
	}
	$mSearch2->pdoTools->addTime(\'Returning processed chunks\');
	if (!empty($toSeparatePlaceholders)) {
		$output[\'log\'] = $log;
		$modx->setPlaceholders($output, $toSeparatePlaceholders);
	}
	else {
		$output = implode($outputSeparator, $output) . $log;
	}
}
else {
	$output = $modx->lexicon(\'mse2_err_no_results\') . $log;
}

// Return output
if (!empty($tplWrapper) && (!empty($wrapIfEmpty) || !empty($output))) {
	$output = $mSearch2->pdoTools->getChunk(
		$tplWrapper,
		array(
			\'output\' => $output,
			\'total\' => $modx->getPlaceholder($mSearch2->pdoTools->config[\'totalVar\']),
			\'query\' => $modx->getPlaceholder($plPrefix.$queryVar),
			\'parents\' => $modx->getPlaceholder($plPrefix.$parentsVar),
		),
		$fastMode
	);
}

if (!empty($toPlaceholder)) {
	$modx->setPlaceholder($toPlaceholder, $output);
}
else {
	return $output;
}',
    ),
  ),
  '63bc91eb27cf9de0c94154e834c82dfa' => 
  array (
    'criteria' => 
    array (
      'name' => 'mSearchForm',
    ),
    'object' => 
    array (
      'id' => 54,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'mSearchForm',
      'description' => '',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'snippet' => '/** @var modX $modx */
/** @var array $scriptProperties */
/** @var pdoTools $pdoTools */
$pdoTools = $modx->getService(\'pdoTools\');
$pdoTools->setConfig($scriptProperties);
$pdoTools->addTime(\'pdoTools loaded.\');

/** @var mSearch2 $mSearch2 */
if (!$modx->loadClass(\'msearch2\', MODX_CORE_PATH . \'components/msearch2/model/msearch2/\', false, true)) {return false;}
$mSearch2 = new mSearch2($modx);
$mSearch2->initialize($modx->context->key);

$config = array(
	\'autocomplete\' => !empty($autocomplete) ? $autocomplete : \'\',
	\'queryVar\' => !empty($queryVar) ? $queryVar : \'query\',
	\'minQuery\' => !empty($minQuery) ? (integer) $minQuery : 3,
	\'pageId\' => !empty($pageId) ? (integer) $pageId : $modx->resource->id,
);
$scriptProperties = array_merge($scriptProperties, $config);

if (empty($tplForm)) {$tplForm = \'tpl.mSearch2.form\';}
$form = $pdoTools->getChunk($tplForm, $scriptProperties);

if (!empty($config[\'autocomplete\'])) {
	$hash = sha1(serialize($scriptProperties));
	$_SESSION[\'mSearch2\'][$hash] = $scriptProperties;

	$form = str_ireplace(\'<form\', \'<form data-key="\'.$hash.\'"\', $form);
	// Place for enabled log
	if ($modx->user->hasSessionContext(\'mgr\') && !empty($showLog)) {
		$form = str_ireplace(\'</form>\', "</form>\\n<pre class=\\"mSearchFormLog\\"></pre>", $form);
	}

	// Setting values for frontend javascript
	$main_config = array(
		\'cssUrl\' => $mSearch2->config[\'cssUrl\'].\'web/\',
		\'jsUrl\' => $mSearch2->config[\'jsUrl\'].\'web/\',
		\'actionUrl\' => $mSearch2->config[\'actionUrl\'],
	);

	$modx->regClientStartupScript(\'
	<script type="text/javascript">
		if (typeof mse2Config == "undefined") {mse2Config = \' . $modx->toJSON($main_config) . \';}
		if (typeof mse2FormConfig == "undefined") {mse2FormConfig = {};}
		mse2FormConfig["\' . $hash . \'"] = \' . $modx->toJSON($config) . \';
	</script>\', true);
	$modx->regClientScript(\'
	<script type="text/javascript">
		if ($("form.msearch2").length) {
			mSearch2.Form.initialize("form.msearch2");
		}
	</script>\', true);
}

return $form;',
      'locked' => 0,
      'properties' => 'a:10:{s:6:"pageId";a:7:{s:4:"name";s:6:"pageId";s:4:"desc";s:16:"mse2_prop_pageId";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:7:"tplForm";a:7:{s:4:"name";s:7:"tplForm";s:4:"desc";s:17:"mse2_prop_tplForm";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:17:"tpl.mSearch2.form";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:3:"tpl";a:7:{s:4:"name";s:3:"tpl";s:4:"desc";s:13:"mse2_prop_tpl";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:15:"tpl.mSearch2.ac";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:7:"element";a:7:{s:4:"name";s:7:"element";s:4:"desc";s:17:"mse2_prop_element";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:8:"mSearch2";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:5:"limit";a:7:{s:4:"name";s:5:"limit";s:4:"desc";s:15:"mse2_prop_limit";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:5;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:12:"autocomplete";a:7:{s:4:"name";s:12:"autocomplete";s:4:"desc";s:22:"mse2_prop_autocomplete";s:4:"type";s:4:"list";s:7:"options";a:3:{i:0;a:2:{s:4:"text";s:8:"Disabled";s:5:"value";i:0;}i:1;a:2:{s:4:"text";s:7:"Results";s:5:"value";s:7:"results";}i:2;a:2:{s:4:"text";s:7:"Queries";s:5:"value";s:7:"queries";}}s:5:"value";s:7:"results";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:8:"queryVar";a:7:{s:4:"name";s:8:"queryVar";s:4:"desc";s:18:"mse2_prop_queryVar";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:5:"query";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:8:"minQuery";a:7:{s:4:"name";s:8:"minQuery";s:4:"desc";s:18:"mse2_prop_minQuery";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";i:3;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:6:"fields";a:7:{s:4:"name";s:6:"fields";s:4:"desc";s:16:"mse2_prop_fields";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:9:"onlyIndex";a:7:{s:4:"name";s:9:"onlyIndex";s:4:"desc";s:19:"mse2_prop_onlyIndex";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/msearch2/elements/snippets/snippet.msearchform.php',
      'content' => '/** @var modX $modx */
/** @var array $scriptProperties */
/** @var pdoTools $pdoTools */
$pdoTools = $modx->getService(\'pdoTools\');
$pdoTools->setConfig($scriptProperties);
$pdoTools->addTime(\'pdoTools loaded.\');

/** @var mSearch2 $mSearch2 */
if (!$modx->loadClass(\'msearch2\', MODX_CORE_PATH . \'components/msearch2/model/msearch2/\', false, true)) {return false;}
$mSearch2 = new mSearch2($modx);
$mSearch2->initialize($modx->context->key);

$config = array(
	\'autocomplete\' => !empty($autocomplete) ? $autocomplete : \'\',
	\'queryVar\' => !empty($queryVar) ? $queryVar : \'query\',
	\'minQuery\' => !empty($minQuery) ? (integer) $minQuery : 3,
	\'pageId\' => !empty($pageId) ? (integer) $pageId : $modx->resource->id,
);
$scriptProperties = array_merge($scriptProperties, $config);

if (empty($tplForm)) {$tplForm = \'tpl.mSearch2.form\';}
$form = $pdoTools->getChunk($tplForm, $scriptProperties);

if (!empty($config[\'autocomplete\'])) {
	$hash = sha1(serialize($scriptProperties));
	$_SESSION[\'mSearch2\'][$hash] = $scriptProperties;

	$form = str_ireplace(\'<form\', \'<form data-key="\'.$hash.\'"\', $form);
	// Place for enabled log
	if ($modx->user->hasSessionContext(\'mgr\') && !empty($showLog)) {
		$form = str_ireplace(\'</form>\', "</form>\\n<pre class=\\"mSearchFormLog\\"></pre>", $form);
	}

	// Setting values for frontend javascript
	$main_config = array(
		\'cssUrl\' => $mSearch2->config[\'cssUrl\'].\'web/\',
		\'jsUrl\' => $mSearch2->config[\'jsUrl\'].\'web/\',
		\'actionUrl\' => $mSearch2->config[\'actionUrl\'],
	);

	$modx->regClientStartupScript(\'
	<script type="text/javascript">
		if (typeof mse2Config == "undefined") {mse2Config = \' . $modx->toJSON($main_config) . \';}
		if (typeof mse2FormConfig == "undefined") {mse2FormConfig = {};}
		mse2FormConfig["\' . $hash . \'"] = \' . $modx->toJSON($config) . \';
	</script>\', true);
	$modx->regClientScript(\'
	<script type="text/javascript">
		if ($("form.msearch2").length) {
			mSearch2.Form.initialize("form.msearch2");
		}
	</script>\', true);
}

return $form;',
    ),
  ),
  '723918a8f7214bcf72f551e149ef5bb8' => 
  array (
    'criteria' => 
    array (
      'name' => 'mFilter2',
    ),
    'object' => 
    array (
      'id' => 55,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'mFilter2',
      'description' => '',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'snippet' => '/** @var modX $modx */
/** @var array $scriptProperties */
/** @var mSearch2 $mSearch2 */
if (!$modx->loadClass(\'msearch2\', MODX_CORE_PATH . \'components/msearch2/model/msearch2/\', false, true)) {return false;}
$mSearch2 = new mSearch2($modx, $scriptProperties);
$mSearch2->initialize($modx->context->key);
$mSearch2->pdoTools->setConfig($scriptProperties);
$mSearch2->pdoTools->addTime(\'pdoTools loaded.\');
$savedProperties = array();

if (empty($queryVar)) {$queryVar = \'query\';}
if (empty($parentsVar)) {$parentsVar = \'parents\';}
if (empty($minQuery)) {$minQuery = $modx->getOption(\'index_min_words_length\', null, 3, true);}
if (empty($classActive)) {$classActive = \'active\';}
if (isset($scriptProperties[\'disableSuggestions\'])) {$scriptProperties[\'suggestions\'] = empty($scriptProperties[\'disableSuggestions\']);}
if (empty($toPlaceholders) && !empty($toPlaceholder)) {$toPlaceholders = $toPlaceholder;}
if (empty($plPrefix)) {$plPrefix = \'mse2_\';}
if (isset($_REQUEST[\'limit\']) && is_numeric($_REQUEST[\'limit\']) && abs($_REQUEST[\'limit\']) > 0) {$limit = abs($_REQUEST[\'limit\']);}
elseif (!isset($limit) || $limit === \'\') {$limit = 10;}
if (!isset($outputSeparator)) {$outputSeparator = "\\n";}
$fastMode = !empty($fastMode);
// All templates of filters are converted to lowercase
foreach ($scriptProperties as $k => $v) {
	if (strpos($k, \'tplFilter\') === 0) {
		$tmp = \'tplFilter.\' . strtolower(substr($k, 10));
		if ($tmp != $k) {
			unset($scriptProperties[$k]);
			$scriptProperties[$tmp] = $v;
		}
	}
}

$class = \'modResource\';
$output = array(\'filters\' => array(), \'results\' => array(), \'total\' => 0, \'limit\' => $limit);
$ids = $found = $log = $where = array();

// ---------------------- Retrieving ids of resources for filter
$query = !empty($_REQUEST[$queryVar])
	? $mSearch2->getQuery(rawurldecode($_REQUEST[$queryVar]))
	: \'\';

// Filter by ids
if (!empty($resources)) {
	$ids = array_map(\'trim\', explode(\',\', $resources));
}
elseif (isset($_REQUEST[$queryVar]) && empty($query)) {
	$output[\'results\'] =  $modx->lexicon(\'mse2_err_no_query\');
}
elseif (empty($query) && !empty($forceSearch)) {
	$output[\'results\'] = $modx->lexicon(\'mse2_err_no_query_var\');
}
elseif (isset($_REQUEST[$queryVar]) && !preg_match(\'/^[0-9]{2,}$/\', $query) && mb_strlen($query,\'UTF-8\') < $minQuery) {
	$output[\'results\'] = $modx->lexicon(\'mse2_err_min_query\');
}
elseif (isset($_REQUEST[$queryVar])) {
	$modx->setPlaceholder($plPrefix.$queryVar, $query);

	$found = $mSearch2->Search($query);
	$ids = array_keys($found);
    /*
	if (!empty($ids)) {
		$tmp = $scriptProperties;
		$tmp[\'returnIds\'] = 1;
		$tmp[\'resources\'] = implode(\',\', $ids);
		$tmp[\'parents\'] = $scriptProperties[\'parents\'];
		$tmp[\'limit\'] = 0;
        $mSearch2->pdoTools->addTime(\'Pass ids to the snippet \'.$scriptProperties[\'element\'].\': "\'.$tmp[\'resources\'].\'"\');
		$ids = explode(\',\', $modx->runSnippet($scriptProperties[\'element\'], $tmp));
		$mSearch2->pdoTools->addTime($scriptProperties[\'element\'] . \' returned ids: "\'.implode(\',\',$ids).\'"\');
	}
	if (empty($ids[0])) {
		$output[\'results\'] = $modx->lexicon(\'mse2_err_no_results\');
	}
    */
}

$modx->setPlaceholder($plPrefix.$queryVar, $query);

// Has error message - exit
if (!empty($output[\'results\'])) {
	$log = \'\';
	if ($modx->user->hasSessionContext(\'mgr\') && !empty($showLog)) {
		$log = \'<pre class="mFilterLog">\' . print_r($mSearch2->pdoTools->getTime(), 1) . \'</pre>\';
	}
	if (!empty($toSeparatePlaceholders)) {
		$output[\'log\'] = $log;
		$modx->setPlaceholders($output, $toSeparatePlaceholders);
		return;
	}
	elseif (!empty($toPlaceholders)) {
		$output[\'log\'] = $log;
		$modx->setPlaceholders($output, $toPlaceholders);
		return;
	}
	else {
		$output = $mSearch2->pdoTools->getChunk($scriptProperties[\'tplOuter\'], $output, $fastMode);
		$output .= $log;
		return $output;
	}
}

// ---------------------- Checking resources by status and custom "where" parameter
// Support for specifying property set in the element name
$elementName = $scriptProperties[\'element\'];
$elementSet = array();
if (strpos($elementName, \'@\') !== false) {
	list($elementName, $elementSet) = explode(\'@\', $elementName);
}
/** @var modSnippet $snippet */
if (!empty($elementName) && $element = $modx->getObject(\'modSnippet\', array(\'name\' => $elementName))) {
	$elementProperties = $element->getProperties();
	$elementPropertySet = !empty($elementSet)
		? $element->getPropertySet($elementSet)
		: array();
	if (!is_array($elementPropertySet)) {$elementPropertySet = array();}
	$params = array_merge(
		$elementProperties,
		$elementPropertySet,
		$scriptProperties,
		array(
			\'parents\' => empty($scriptProperties[$parentsVar]) && !empty($_REQUEST[$parentsVar])
				? $_REQUEST[$parentsVar]
				: $scriptProperties[$parentsVar],
			\'returnIds\' => 1,
			\'limit\' => 0,
		)
	);
	if (!empty($ids)) {
		$params[\'resources\'] = implode(\',\', $ids);
	}
	$element->setCacheable(false);
	if ($tmp = $element->process($params)) {
        $ids = explode(\',\', $tmp);
	}
	$mSearch2->pdoTools->addTime(\'Fetched \'.count($ids).\' ids for building filters from element "\'.$elementName.\'"\');
}
else {
	$modx->log(modX::LOG_LEVEL_ERROR, \'[mSearch2] Could not find main snippet with name: "\'.$elementName.\'"\');
	return \'\';
}

// ---------------------- Nothing to filter, exit
if (empty($ids)) {
    $log = $modx->user->hasSessionContext(\'mgr\') && !empty($showLog)
		? \'<pre class="mFilterLog">\' . print_r($mSearch2->pdoTools->getTime(), 1) . \'</pre>\'
        : \'\';
	$output = array_merge($output, array(
		\'filters\' => $modx->lexicon(\'mse2_err_no_filters\'),
		\'results\' => $modx->lexicon(\'mse2_err_no_results\'),
		\'log\' => $log
	));

	if (!empty($toSeparatePlaceholders)) {
		$modx->setPlaceholders($output, $toSeparatePlaceholders);
		return;
	}
	elseif (!empty($toPlaceholders)) {
		$modx->setPlaceholders($output, $toPlaceholders);
		return;
	}
	else {
		$output[\'results\'] .= $log;
		return $mSearch2->pdoTools->getChunk($scriptProperties[\'tplOuter\'], $output, $fastMode);
	}
}

// ---------------------- Checking for suggestions processing
// Checking by results count
if (!empty($scriptProperties[\'suggestionsMaxResults\']) && count($ids) > $scriptProperties[\'suggestionsMaxResults\']) {
	$scriptProperties[\'suggestions\'] = false;
	$mSearch2->pdoTools->addTime(\'Suggestions disabled by "suggestionsMaxResults" parameter: results count is \'.count($ids).\', max allowed is \'.$scriptProperties[\'suggestionsMaxResults\']);
}
else {
	$mSearch2->pdoTools->addTime(\'Total number of results: \'.count($ids));
}

// Then get filters
$mSearch2->pdoTools->addTime(\'Getting filters for \'.count($ids).\' ids\');
$filters = $mSearch2->getFilters($ids);
// And checking by filters count
$count = 0;
if (!empty($filters) && $scriptProperties[\'suggestions\']) {
    foreach ($filters as $tmp) {
        if (!is_array($tmp)) {continue;}
        $count += count(array_values($tmp));
    }
    if (!empty($scriptProperties[\'suggestionsMaxFilters\']) && $count > $scriptProperties[\'suggestionsMaxFilters\']) {
        $scriptProperties[\'suggestions\'] = false;
        $mSearch2->pdoTools->addTime(\'Suggestions disabled by "suggestionsMaxFilters" parameter: filters count is \'.$count.\', max allowed is \'.$scriptProperties[\'suggestionsMaxFilters\']);
    }
    else {
        $mSearch2->pdoTools->addTime(\'Total number of filters: \'.$count);
    }
}
$modx->setPlaceholder($plPrefix . \'filters_count\', $count );


// ---------------------- Loading results
$start_sort = implode(\',\', array_map(\'trim\' , explode(\',\', $scriptProperties[\'sort\'])));
$start_limit = 0;
$suggestions = array();
$page = $sort = \'\';

// Support for specifying property set in the paginator name
$paginatorName = $scriptProperties[\'paginator\'];
$paginatorSet = array();
if (strpos($paginatorName, \'@\') !== false) {
	list($paginatorName, $paginatorSet) = explode(\'@\', $paginatorName);
}

/** @var modSnippet $paginator */
if (!$paginator = $modx->getObject(\'modSnippet\', array(\'name\' => $paginatorName))) {
    $modx->log(modX::LOG_LEVEL_ERROR, \'[mSearch2] Could not find pagination snippet with name: "\'.$paginatorName.\'"\');

    return \'\';
}
$paginatorProperties = $paginator->getProperties();
$paginatorPropertySet = !empty($paginatorSet)
    ? $paginator->getPropertySet($paginatorSet)
    : array();
if (!is_array($paginatorPropertySet)) {$paginatorPropertySet = array();}
$paginatorProperties = array_merge(
    $paginatorProperties,
    $paginatorPropertySet,
    $elementPropertySet,
    $scriptProperties,
    array(
        \'resources\' => implode(\',\', $ids),
        \'parents\' => \'0\',
        \'element\' => $elementName,
        \'defaultSort\' => $start_sort,
        \'toPlaceholder\' => false,
        \'limit\' => $limit,
        \'ajaxMode\' => \'\',
        \'ajax\' => 0,
        \'frontend_js\' => \'\',
        \'frontend_css\' => \'\',
    )
);

// Switching chunk for rows, if specified
if (!empty($scriptProperties[\'tpls\'])) {
    $tmp = isset($_REQUEST[\'tpl\']) ? (integer) $_REQUEST[\'tpl\'] : 0;
    $tpls = array_map(\'trim\', explode(\',\', $scriptProperties[\'tpls\']));
    $paginatorProperties[\'tpls\'] = $tpls;
    if (isset($tpls[$tmp])) {
        $paginatorProperties[\'tpl\'] = $tpls[$tmp];
        $paginatorProperties[\'tpl_idx\'] = $tmp;
    }
}

// Trying to save weight of found ids if using mSearch2
$weight = false;
if (!empty($found) && strtolower($elementName) == \'msearch2\') {
    $tmp = array();
    foreach ($ids as $v) {
        $tmp[$v] = isset($found[$v])
            ? $found[$v]
            : 0;
    }
    $paginatorProperties[\'resources\'] = $modx->toJSON($tmp);
    $weight = true;
}

if (!empty($_REQUEST[\'sort\'])) {$sort = $_REQUEST[\'sort\'];}
elseif (!empty($start_sort)) {$sort = $start_sort;}
/*
else {
    $sortby = !empty($scriptProperties[\'sortby\']) ? $scriptProperties[\'sortby\'] : \'\';
    if (!empty($sortby)) {
        $sortdir = !empty($scriptProperties[\'sortdir\']) ? $scriptProperties[\'sortdir\'] : \'asc\';
        $sort = $sortby.$mSearch2->config[\'method_delimeter\'].$sortdir;
    }
}*/
if (!empty($_REQUEST[$paginatorProperties[\'pageVarKey\']])) {
    $page = (int) $_REQUEST[$paginatorProperties[\'pageVarKey\']];
}
if (!empty($sort)) {
    $paginatorProperties[\'sortby\'] = $mSearch2->getSortFields($sort);
    $paginatorProperties[\'sortdir\'] = \'\';
}

$start_limit = !empty($scriptProperties[\'limit\'])
        ? $scriptProperties[\'limit\']
        : $paginatorProperties[\'limit\'];
$paginatorProperties[\'start_limit\'] = $start_limit;
$savedProperties[\'paginatorProperties\'] = $paginatorProperties;

// We have a delimiters in $_GET, so need to filter resources
if (strpos(implode(array_keys($_GET)), $mSearch2->config[\'filter_delimeter\']) !== false || !empty($mSearch2->aliases)) {
    $matched = $mSearch2->Filter($ids, $_REQUEST);
    $matched = array_intersect($ids, $matched);
    if ($scriptProperties[\'suggestions\']) {
        $suggestions = $mSearch2->getSuggestions($ids, $_REQUEST, $matched);
        $mSearch2->pdoTools->addTime(\'Suggestions retrieved.\');
    }
    // Trying to save weight of found ids again
    if ($weight) {
        $tmp = array();
        foreach ($matched as $v) {$tmp[$v] = isset($found[$v]) ? $found[$v] : 0;}
        $paginatorProperties[\'resources\'] = $modx->toJSON($tmp);
    }
    else {
        $paginatorProperties[\'resources\'] = implode(\',\', $matched);
    }
}
// Saving log
$log = $mSearch2->pdoTools->timings;
$mSearch2->pdoTools->timings = array();

//$paginator->setProperties($paginatorProperties);
$paginator->setCacheable(false);
$output[\'results\'] = !empty($paginatorProperties[\'resources\'])
    ? $paginator->process($paginatorProperties)
    : $modx->lexicon(\'mse2_err_no_results\');
$output[\'total\'] = $modx->getPlaceholder($paginatorProperties[\'totalVar\']);

// ----------------------  Loading filters
$mSearch2->pdoTools->timings = $log;
if (!empty($paginator)) {
	$mSearch2->pdoTools->addTime(\'Fired paginator: "\'.$paginatorName.\'"\');
}
else {
	$mSearch2->pdoTools->addTime(\'Could not find pagination snippet with name: "\'.$paginatorName.\'"\');
}
if (empty($filters)) {
	$mSearch2->pdoTools->addTime(\'No filters retrieved\');
	$output[\'filters\'] = $modx->lexicon(\'mse2_err_no_filters\');
	if (empty($output[\'results\'])) {$output[\'results\'] = $modx->lexicon(\'mse2_err_no_results\');}
}
else {
	$mSearch2->pdoTools->addTime(\'Filters retrieved\');
	$request = array();
	foreach ($_GET as $k => $v) {
		$tmp = explode($mSearch2->config[\'values_delimeter\'], $v);
		$request[$k] = array();
		foreach ($tmp as $v2) {
			$request[$k][] = str_replace(\'"\', \'&quot;\', $v2);
		}
	}

	$aliases = $mSearch2->aliases;
	foreach ($filters as $filter => $data) {
		if (empty($data) || !is_array($data)) {
			continue;
		}
		$rows = $has_active = \'\';
		list($table, $method) = explode($mSearch2->config[\'filter_delimeter\'], $filter);
		$filter_key = !empty($aliases[$filter])
			? $aliases[$filter]
			: $filter;

		$tplOuter = !empty($scriptProperties[\'tplFilter.outer.\' . $filter_key])
			? $scriptProperties[\'tplFilter.outer.\' . $filter_key]
			: $scriptProperties[\'tplFilter.outer.default\'];
		$tplRow = !empty($scriptProperties[\'tplFilter.row.\' . $filter_key])
			? $scriptProperties[\'tplFilter.row.\' . $filter_key]
			: $scriptProperties[\'tplFilter.row.default\'];
		$tplEmpty = !empty($scriptProperties[\'tplFilter.empty.\' . $filter_key])
			? $scriptProperties[\'tplFilter.empty.\' . $filter_key]
			: \'\';

		$idx = 0;
		foreach ($data as $v) {
			if (empty($v)) {continue;}
			$checked = isset($request[$filter_key]) && in_array((string)$v[\'value\'], $request[$filter_key], true) && isset($v[\'type\']) && $v[\'type\'] != \'number\';
			if ($scriptProperties[\'suggestions\']) {
				if ($checked) {
					$num = \'\';
					$has_active = \'has_active\';
				}
				elseif (isset($suggestions[$filter_key][$v[\'value\']])) {
					$num = $suggestions[$filter_key][$v[\'value\']];
				}
				else {
					$num = !empty($v[\'resources\'])
						? count($v[\'resources\'])
						: \'\';
				}
			}
			else {
				$num = \'\';
			}

			$rows .= $mSearch2->pdoTools->getChunk($tplRow, array(
				\'filter\' => $method,
				\'table\' => $table,
				\'title\' => $v[\'title\'],
				\'value\' => $v[\'value\'],
				\'type\' => $v[\'type\'],
				\'checked\' => $checked
					? \'checked\'
					: \'\',
				\'selected\' => $checked
					? \'selected\'
					: \'\',
				\'disabled\' => !$checked && empty($num) && $scriptProperties[\'suggestions\']
					? \'disabled\'
					: \'\',
				\'delimeter\' => $mSearch2->config[\'filter_delimeter\'],
				\'idx\' => $idx++,
				\'num\' => $num,
				\'filter_key\' => $filter_key,
			), $fastMode);
		}

		$tpl = empty($rows) ? $tplEmpty : $tplOuter;
		if (!isset($output[\'filters\'][$filter])) {
			$output[\'filters\'][$filter] = \'\';
		}
		$output[\'filters\'][$filter] = $mSearch2->pdoTools->getChunk($tpl, array(
			\'filter\' => $method,
			\'table\' => $table,
			\'rows\' => $rows,
			\'has_active\' => $has_active,
			\'delimeter\' => $mSearch2->config[\'filter_delimeter\'],
			\'filter_key\' => $filter_key,
		), $fastMode);
	}

	if (empty($output[\'filters\'])) {
		$output[\'filters\'] = $modx->lexicon(\'mse2_err_no_filters\');
		if (empty($output[\'results\'])) {$output[\'results\'] = $modx->lexicon(\'mse2_err_no_results\');}
	}
	else {
		$mSearch2->pdoTools->addTime(\'Filters templated\');
	}
}
$mSearch2->pdoTools->addTime(\'Total filter operations: \'.$mSearch2->filter_operations);

// Saving params into cache for ajax requests
$savedProperties[\'scriptProperties\'] = $scriptProperties;
$hash = sha1(serialize($savedProperties));
$_SESSION[\'mSearch2\'][$hash] = $savedProperties;

// Active class for sort links
if (!empty($sort)) {$output[$sort] = $classActive;}
if (isset($paginatorProperties[\'tpl_idx\'])) {
	$output[\'tpl\'.$paginatorProperties[\'tpl_idx\']] = $classActive;
	$output[\'tpls\'] = 1;
}

// Setting values for frontend javascript
$config = array(
	\'cssUrl\' => $mSearch2->config[\'cssUrl\'].\'web/\',
	\'jsUrl\' => $mSearch2->config[\'jsUrl\'].\'web/\',
	\'actionUrl\' => $mSearch2->config[\'actionUrl\'],
	\'queryVar\' => $mSearch2->config[\'queryVar\'],
	\'idVar\' => $modx->getOption(\'request_param_id\', null, \'id\'),
	\'filter_delimeter\' => $mSearch2->config[\'filter_delimeter\'],
	\'method_delimeter\' => $mSearch2->config[\'method_delimeter\'],
	\'values_delimeter\' => $mSearch2->config[\'values_delimeter\'],
	\'start_sort\' => $start_sort,
	\'start_limit\' => $start_limit,
	\'start_page\' => 1,
	\'start_tpl\' => \'\',
	\'sort\' => $sort == $start_sort ? \'\' : $sort,
	\'limit\' => $limit == $start_limit ? \'\' : $limit,
	\'page\' => $page,
	\'pageVar\' => $paginatorProperties[\'pageVarKey\'],
	\'tpl\' => !empty($paginatorProperties[\'tpl_idx\'])
			? $paginatorProperties[\'tpl_idx\']
			: \'\',
	\'parentsVar\' => $parentsVar,
	\'key\' => $hash,
	\'pageId\' => !empty($pageId) ? (integer) $pageId : $modx->resource->id,
	$queryVar => isset($_REQUEST[$queryVar]) ? $_REQUEST[$queryVar] : \'\',
	$parentsVar => isset($_REQUEST[$parentsVar]) ? $_REQUEST[$parentsVar] : \'\',
	\'aliases\' => array_flip($mSearch2->aliases),
	\'options\' => array(),
	\'mode\' => in_array($scriptProperties[\'ajaxMode\'], array(\'button\', \'scroll\')) ? $scriptProperties[\'ajaxMode\'] : \'\',
	\'moreText\' => $modx->lexicon(\'mse2_more\'),
);
if (!empty($scriptProperties[\'filterOptions\'])) {
	$filterOptions = $modx->fromJSON($scriptProperties[\'filterOptions\']);
	if (is_array($filterOptions)) {
		$config[\'filterOptions\'] = $filterOptions;
	}
}
if (empty($noJsConfig)) {
$modx->regClientStartupScript(\'
<script type="text/javascript">mse2Config = \' . json_encode($config) . \';</script>\', true);
}
if (empty($noJsInitialize)) {
$modx->regClientScript(\'
<script type="text/javascript">
    if ($("#mse2_mfilter").length) {
        if (window.location.hash != "" && mSearch2.Hash.oldbrowser()) {
            var uri = window.location.hash.replace("#", "?");
            window.location.href = document.location.pathname + uri;
        }
        else {
            mSearch2.initialize("body");
        }
    }
    </script>\', true);
}
$modx->setPlaceholders($config, $plPrefix);

// Prepare output
$log = \'\';
if ($modx->user->hasSessionContext(\'mgr\') && !empty($showLog)) {
	$log = \'<pre class="mFilterLog">\' . print_r($mSearch2->pdoTools->getTime(), 1) . \'</pre>\';
}

if (!empty($toSeparatePlaceholders)) {
	$modx->setPlaceholders($output[\'filters\'], $toSeparatePlaceholders);
	$output[\'log\'] = $log;
	if (is_array($output[\'filters\'])) {
		$output[\'filters\'] = implode($outputSeparator, $output[\'filters\']);
	}

	$pcre = \'#^\' . preg_quote($toSeparatePlaceholders) . \'(\\d+)$#\';
	$tmp = array();
	foreach ($modx->placeholders as $k => $v) {
		if (preg_match($pcre, $k)) {
			$tmp[] = $v;
		}
	}

	$output[\'results\'] = !empty($tmp)
		? implode($outputSeparator, $tmp)
		: $modx->lexicon(\'mse2_err_no_results\');

	$modx->setPlaceholders($output, $toSeparatePlaceholders);
}
else {
	if (is_array($output[\'filters\'])) {
		$output[\'filters\'] = implode($outputSeparator, $output[\'filters\']);
	}
	if (!empty($toPlaceholders)) {
		$output[\'log\'] = $log;
		$modx->setPlaceholders($output, $toPlaceholders);
	}
	else {
		$output = $mSearch2->pdoTools->getChunk($scriptProperties[\'tplOuter\'], $output, $fastMode);
		$output .= $log;

		return $output;
	}
}',
      'locked' => 0,
      'properties' => 'a:37:{s:9:"paginator";a:7:{s:4:"name";s:9:"paginator";s:4:"desc";s:19:"mse2_prop_paginator";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:7:"pdoPage";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:7:"element";a:7:{s:4:"name";s:7:"element";s:4:"desc";s:17:"mse2_prop_element";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:8:"mSearch2";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:4:"sort";a:7:{s:4:"name";s:4:"sort";s:4:"desc";s:14:"mse2_prop_sort";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:7:"filters";a:7:{s:4:"name";s:7:"filters";s:4:"desc";s:17:"mse2_prop_filters";s:4:"type";s:8:"textarea";s:7:"options";a:0:{}s:5:"value";s:23:"resource|parent:parents";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:7:"aliases";a:7:{s:4:"name";s:7:"aliases";s:4:"desc";s:17:"mse2_prop_aliases";s:4:"type";s:8:"textarea";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:16:"showEmptyFilters";a:7:{s:4:"name";s:16:"showEmptyFilters";s:4:"desc";s:26:"mse2_prop_showEmptyFilters";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:1;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:9:"resources";a:7:{s:4:"name";s:9:"resources";s:4:"desc";s:19:"mse2_prop_resources";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:7:"parents";a:7:{s:4:"name";s:7:"parents";s:4:"desc";s:17:"mse2_prop_parents";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:5:"depth";a:7:{s:4:"name";s:5:"depth";s:4:"desc";s:15:"mse2_prop_depth";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:10;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:8:"tplOuter";a:7:{s:4:"name";s:8:"tplOuter";s:4:"desc";s:18:"mse2_prop_tplOuter";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:18:"tpl.mFilter2.outer";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:23:"tplFilter.outer.default";a:7:{s:4:"name";s:23:"tplFilter.outer.default";s:4:"desc";s:33:"mse2_prop_tplFilter.outer.default";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:25:"tpl.mFilter2.filter.outer";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:21:"tplFilter.row.default";a:7:{s:4:"name";s:21:"tplFilter.row.default";s:4:"desc";s:31:"mse2_prop_tplFilter.row.default";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:28:"tpl.mFilter2.filter.checkbox";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:10:"showHidden";a:7:{s:4:"name";s:10:"showHidden";s:4:"desc";s:20:"mse2_prop_showHidden";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:1;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:11:"showDeleted";a:7:{s:4:"name";s:11:"showDeleted";s:4:"desc";s:21:"mse2_prop_showDeleted";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:15:"showUnpublished";a:7:{s:4:"name";s:15:"showUnpublished";s:4:"desc";s:25:"mse2_prop_showUnpublished";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:14:"hideContainers";a:7:{s:4:"name";s:14:"hideContainers";s:4:"desc";s:24:"mse2_prop_hideContainers";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:7:"showLog";a:7:{s:4:"name";s:7:"showLog";s:4:"desc";s:17:"mse2_prop_showLog";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:8:"fastMode";a:7:{s:4:"name";s:8:"fastMode";s:4:"desc";s:18:"mse2_prop_fastMode";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:11:"suggestions";a:7:{s:4:"name";s:11:"suggestions";s:4:"desc";s:21:"mse2_prop_suggestions";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:1;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:21:"suggestionsMaxFilters";a:7:{s:4:"name";s:21:"suggestionsMaxFilters";s:4:"desc";s:31:"mse2_prop_suggestionsMaxFilters";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:400;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:21:"suggestionsMaxResults";a:7:{s:4:"name";s:21:"suggestionsMaxResults";s:4:"desc";s:31:"mse2_prop_suggestionsMaxResults";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:2000;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:16:"suggestionsRadio";a:7:{s:4:"name";s:16:"suggestionsRadio";s:4:"desc";s:26:"mse2_prop_suggestionsRadio";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:14:"toPlaceholders";a:7:{s:4:"name";s:14:"toPlaceholders";s:4:"desc";s:24:"mse2_prop_toPlaceholders";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:22:"toSeparatePlaceholders";a:7:{s:4:"name";s:22:"toSeparatePlaceholders";s:4:"desc";s:32:"mse2_prop_toSeparatePlaceholders";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:16:"filter_delimeter";a:7:{s:4:"name";s:16:"filter_delimeter";s:4:"desc";s:26:"mse2_prop_filter_delimeter";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:1:"|";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:16:"method_delimeter";a:7:{s:4:"name";s:16:"method_delimeter";s:4:"desc";s:26:"mse2_prop_method_delimeter";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:1:":";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:16:"values_delimeter";a:7:{s:4:"name";s:16:"values_delimeter";s:4:"desc";s:26:"mse2_prop_values_delimeter";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:1:",";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:4:"tpls";a:7:{s:4:"name";s:4:"tpls";s:4:"desc";s:14:"mse2_prop_tpls";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:11:"forceSearch";a:7:{s:4:"name";s:11:"forceSearch";s:4:"desc";s:21:"mse2_prop_forceSearch";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:6:"fields";a:7:{s:4:"name";s:6:"fields";s:4:"desc";s:16:"mse2_prop_fields";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:9:"onlyIndex";a:7:{s:4:"name";s:9:"onlyIndex";s:4:"desc";s:19:"mse2_prop_onlyIndex";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:12:"onlyAllWords";a:7:{s:4:"name";s:12:"onlyAllWords";s:4:"desc";s:22:"mse2_prop_onlyAllWords";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:13:"showSearchLog";a:7:{s:4:"name";s:13:"showSearchLog";s:4:"desc";s:23:"mse2_prop_showSearchLog";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:13:"filterOptions";a:7:{s:4:"name";s:13:"filterOptions";s:4:"desc";s:23:"mse2_prop_filterOptions";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:18:"suggestionsSliders";a:7:{s:4:"name";s:18:"suggestionsSliders";s:4:"desc";s:28:"mse2_prop_suggestionsSliders";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:1;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:8:"ajaxMode";a:7:{s:4:"name";s:8:"ajaxMode";s:4:"desc";s:18:"mse2_prop_ajaxMode";s:4:"type";s:4:"list";s:7:"options";a:3:{i:0;a:2:{s:4:"text";s:7:"Default";s:5:"value";s:0:"";}i:1;a:2:{s:4:"text";s:6:"Scroll";s:5:"value";s:6:"scroll";}i:2;a:2:{s:4:"text";s:6:"Button";s:5:"value";s:6:"button";}}s:5:"value";s:0:"";s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}s:9:"cacheTime";a:7:{s:4:"name";s:9:"cacheTime";s:4:"desc";s:19:"mse2_prop_cacheTime";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";i:0;s:7:"lexicon";s:19:"msearch2:properties";s:4:"area";s:0:"";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/msearch2/elements/snippets/snippet.mfilter2.php',
      'content' => '/** @var modX $modx */
/** @var array $scriptProperties */
/** @var mSearch2 $mSearch2 */
if (!$modx->loadClass(\'msearch2\', MODX_CORE_PATH . \'components/msearch2/model/msearch2/\', false, true)) {return false;}
$mSearch2 = new mSearch2($modx, $scriptProperties);
$mSearch2->initialize($modx->context->key);
$mSearch2->pdoTools->setConfig($scriptProperties);
$mSearch2->pdoTools->addTime(\'pdoTools loaded.\');
$savedProperties = array();

if (empty($queryVar)) {$queryVar = \'query\';}
if (empty($parentsVar)) {$parentsVar = \'parents\';}
if (empty($minQuery)) {$minQuery = $modx->getOption(\'index_min_words_length\', null, 3, true);}
if (empty($classActive)) {$classActive = \'active\';}
if (isset($scriptProperties[\'disableSuggestions\'])) {$scriptProperties[\'suggestions\'] = empty($scriptProperties[\'disableSuggestions\']);}
if (empty($toPlaceholders) && !empty($toPlaceholder)) {$toPlaceholders = $toPlaceholder;}
if (empty($plPrefix)) {$plPrefix = \'mse2_\';}
if (isset($_REQUEST[\'limit\']) && is_numeric($_REQUEST[\'limit\']) && abs($_REQUEST[\'limit\']) > 0) {$limit = abs($_REQUEST[\'limit\']);}
elseif (!isset($limit) || $limit === \'\') {$limit = 10;}
if (!isset($outputSeparator)) {$outputSeparator = "\\n";}
$fastMode = !empty($fastMode);
// All templates of filters are converted to lowercase
foreach ($scriptProperties as $k => $v) {
	if (strpos($k, \'tplFilter\') === 0) {
		$tmp = \'tplFilter.\' . strtolower(substr($k, 10));
		if ($tmp != $k) {
			unset($scriptProperties[$k]);
			$scriptProperties[$tmp] = $v;
		}
	}
}

$class = \'modResource\';
$output = array(\'filters\' => array(), \'results\' => array(), \'total\' => 0, \'limit\' => $limit);
$ids = $found = $log = $where = array();

// ---------------------- Retrieving ids of resources for filter
$query = !empty($_REQUEST[$queryVar])
	? $mSearch2->getQuery(rawurldecode($_REQUEST[$queryVar]))
	: \'\';

// Filter by ids
if (!empty($resources)) {
	$ids = array_map(\'trim\', explode(\',\', $resources));
}
elseif (isset($_REQUEST[$queryVar]) && empty($query)) {
	$output[\'results\'] =  $modx->lexicon(\'mse2_err_no_query\');
}
elseif (empty($query) && !empty($forceSearch)) {
	$output[\'results\'] = $modx->lexicon(\'mse2_err_no_query_var\');
}
elseif (isset($_REQUEST[$queryVar]) && !preg_match(\'/^[0-9]{2,}$/\', $query) && mb_strlen($query,\'UTF-8\') < $minQuery) {
	$output[\'results\'] = $modx->lexicon(\'mse2_err_min_query\');
}
elseif (isset($_REQUEST[$queryVar])) {
	$modx->setPlaceholder($plPrefix.$queryVar, $query);

	$found = $mSearch2->Search($query);
	$ids = array_keys($found);
    /*
	if (!empty($ids)) {
		$tmp = $scriptProperties;
		$tmp[\'returnIds\'] = 1;
		$tmp[\'resources\'] = implode(\',\', $ids);
		$tmp[\'parents\'] = $scriptProperties[\'parents\'];
		$tmp[\'limit\'] = 0;
        $mSearch2->pdoTools->addTime(\'Pass ids to the snippet \'.$scriptProperties[\'element\'].\': "\'.$tmp[\'resources\'].\'"\');
		$ids = explode(\',\', $modx->runSnippet($scriptProperties[\'element\'], $tmp));
		$mSearch2->pdoTools->addTime($scriptProperties[\'element\'] . \' returned ids: "\'.implode(\',\',$ids).\'"\');
	}
	if (empty($ids[0])) {
		$output[\'results\'] = $modx->lexicon(\'mse2_err_no_results\');
	}
    */
}

$modx->setPlaceholder($plPrefix.$queryVar, $query);

// Has error message - exit
if (!empty($output[\'results\'])) {
	$log = \'\';
	if ($modx->user->hasSessionContext(\'mgr\') && !empty($showLog)) {
		$log = \'<pre class="mFilterLog">\' . print_r($mSearch2->pdoTools->getTime(), 1) . \'</pre>\';
	}
	if (!empty($toSeparatePlaceholders)) {
		$output[\'log\'] = $log;
		$modx->setPlaceholders($output, $toSeparatePlaceholders);
		return;
	}
	elseif (!empty($toPlaceholders)) {
		$output[\'log\'] = $log;
		$modx->setPlaceholders($output, $toPlaceholders);
		return;
	}
	else {
		$output = $mSearch2->pdoTools->getChunk($scriptProperties[\'tplOuter\'], $output, $fastMode);
		$output .= $log;
		return $output;
	}
}

// ---------------------- Checking resources by status and custom "where" parameter
// Support for specifying property set in the element name
$elementName = $scriptProperties[\'element\'];
$elementSet = array();
if (strpos($elementName, \'@\') !== false) {
	list($elementName, $elementSet) = explode(\'@\', $elementName);
}
/** @var modSnippet $snippet */
if (!empty($elementName) && $element = $modx->getObject(\'modSnippet\', array(\'name\' => $elementName))) {
	$elementProperties = $element->getProperties();
	$elementPropertySet = !empty($elementSet)
		? $element->getPropertySet($elementSet)
		: array();
	if (!is_array($elementPropertySet)) {$elementPropertySet = array();}
	$params = array_merge(
		$elementProperties,
		$elementPropertySet,
		$scriptProperties,
		array(
			\'parents\' => empty($scriptProperties[$parentsVar]) && !empty($_REQUEST[$parentsVar])
				? $_REQUEST[$parentsVar]
				: $scriptProperties[$parentsVar],
			\'returnIds\' => 1,
			\'limit\' => 0,
		)
	);
	if (!empty($ids)) {
		$params[\'resources\'] = implode(\',\', $ids);
	}
	$element->setCacheable(false);
	if ($tmp = $element->process($params)) {
        $ids = explode(\',\', $tmp);
	}
	$mSearch2->pdoTools->addTime(\'Fetched \'.count($ids).\' ids for building filters from element "\'.$elementName.\'"\');
}
else {
	$modx->log(modX::LOG_LEVEL_ERROR, \'[mSearch2] Could not find main snippet with name: "\'.$elementName.\'"\');
	return \'\';
}

// ---------------------- Nothing to filter, exit
if (empty($ids)) {
    $log = $modx->user->hasSessionContext(\'mgr\') && !empty($showLog)
		? \'<pre class="mFilterLog">\' . print_r($mSearch2->pdoTools->getTime(), 1) . \'</pre>\'
        : \'\';
	$output = array_merge($output, array(
		\'filters\' => $modx->lexicon(\'mse2_err_no_filters\'),
		\'results\' => $modx->lexicon(\'mse2_err_no_results\'),
		\'log\' => $log
	));

	if (!empty($toSeparatePlaceholders)) {
		$modx->setPlaceholders($output, $toSeparatePlaceholders);
		return;
	}
	elseif (!empty($toPlaceholders)) {
		$modx->setPlaceholders($output, $toPlaceholders);
		return;
	}
	else {
		$output[\'results\'] .= $log;
		return $mSearch2->pdoTools->getChunk($scriptProperties[\'tplOuter\'], $output, $fastMode);
	}
}

// ---------------------- Checking for suggestions processing
// Checking by results count
if (!empty($scriptProperties[\'suggestionsMaxResults\']) && count($ids) > $scriptProperties[\'suggestionsMaxResults\']) {
	$scriptProperties[\'suggestions\'] = false;
	$mSearch2->pdoTools->addTime(\'Suggestions disabled by "suggestionsMaxResults" parameter: results count is \'.count($ids).\', max allowed is \'.$scriptProperties[\'suggestionsMaxResults\']);
}
else {
	$mSearch2->pdoTools->addTime(\'Total number of results: \'.count($ids));
}

// Then get filters
$mSearch2->pdoTools->addTime(\'Getting filters for \'.count($ids).\' ids\');
$filters = $mSearch2->getFilters($ids);
// And checking by filters count
$count = 0;
if (!empty($filters) && $scriptProperties[\'suggestions\']) {
    foreach ($filters as $tmp) {
        if (!is_array($tmp)) {continue;}
        $count += count(array_values($tmp));
    }
    if (!empty($scriptProperties[\'suggestionsMaxFilters\']) && $count > $scriptProperties[\'suggestionsMaxFilters\']) {
        $scriptProperties[\'suggestions\'] = false;
        $mSearch2->pdoTools->addTime(\'Suggestions disabled by "suggestionsMaxFilters" parameter: filters count is \'.$count.\', max allowed is \'.$scriptProperties[\'suggestionsMaxFilters\']);
    }
    else {
        $mSearch2->pdoTools->addTime(\'Total number of filters: \'.$count);
    }
}
$modx->setPlaceholder($plPrefix . \'filters_count\', $count );


// ---------------------- Loading results
$start_sort = implode(\',\', array_map(\'trim\' , explode(\',\', $scriptProperties[\'sort\'])));
$start_limit = 0;
$suggestions = array();
$page = $sort = \'\';

// Support for specifying property set in the paginator name
$paginatorName = $scriptProperties[\'paginator\'];
$paginatorSet = array();
if (strpos($paginatorName, \'@\') !== false) {
	list($paginatorName, $paginatorSet) = explode(\'@\', $paginatorName);
}

/** @var modSnippet $paginator */
if (!$paginator = $modx->getObject(\'modSnippet\', array(\'name\' => $paginatorName))) {
    $modx->log(modX::LOG_LEVEL_ERROR, \'[mSearch2] Could not find pagination snippet with name: "\'.$paginatorName.\'"\');

    return \'\';
}
$paginatorProperties = $paginator->getProperties();
$paginatorPropertySet = !empty($paginatorSet)
    ? $paginator->getPropertySet($paginatorSet)
    : array();
if (!is_array($paginatorPropertySet)) {$paginatorPropertySet = array();}
$paginatorProperties = array_merge(
    $paginatorProperties,
    $paginatorPropertySet,
    $elementPropertySet,
    $scriptProperties,
    array(
        \'resources\' => implode(\',\', $ids),
        \'parents\' => \'0\',
        \'element\' => $elementName,
        \'defaultSort\' => $start_sort,
        \'toPlaceholder\' => false,
        \'limit\' => $limit,
        \'ajaxMode\' => \'\',
        \'ajax\' => 0,
        \'frontend_js\' => \'\',
        \'frontend_css\' => \'\',
    )
);

// Switching chunk for rows, if specified
if (!empty($scriptProperties[\'tpls\'])) {
    $tmp = isset($_REQUEST[\'tpl\']) ? (integer) $_REQUEST[\'tpl\'] : 0;
    $tpls = array_map(\'trim\', explode(\',\', $scriptProperties[\'tpls\']));
    $paginatorProperties[\'tpls\'] = $tpls;
    if (isset($tpls[$tmp])) {
        $paginatorProperties[\'tpl\'] = $tpls[$tmp];
        $paginatorProperties[\'tpl_idx\'] = $tmp;
    }
}

// Trying to save weight of found ids if using mSearch2
$weight = false;
if (!empty($found) && strtolower($elementName) == \'msearch2\') {
    $tmp = array();
    foreach ($ids as $v) {
        $tmp[$v] = isset($found[$v])
            ? $found[$v]
            : 0;
    }
    $paginatorProperties[\'resources\'] = $modx->toJSON($tmp);
    $weight = true;
}

if (!empty($_REQUEST[\'sort\'])) {$sort = $_REQUEST[\'sort\'];}
elseif (!empty($start_sort)) {$sort = $start_sort;}
/*
else {
    $sortby = !empty($scriptProperties[\'sortby\']) ? $scriptProperties[\'sortby\'] : \'\';
    if (!empty($sortby)) {
        $sortdir = !empty($scriptProperties[\'sortdir\']) ? $scriptProperties[\'sortdir\'] : \'asc\';
        $sort = $sortby.$mSearch2->config[\'method_delimeter\'].$sortdir;
    }
}*/
if (!empty($_REQUEST[$paginatorProperties[\'pageVarKey\']])) {
    $page = (int) $_REQUEST[$paginatorProperties[\'pageVarKey\']];
}
if (!empty($sort)) {
    $paginatorProperties[\'sortby\'] = $mSearch2->getSortFields($sort);
    $paginatorProperties[\'sortdir\'] = \'\';
}

$start_limit = !empty($scriptProperties[\'limit\'])
        ? $scriptProperties[\'limit\']
        : $paginatorProperties[\'limit\'];
$paginatorProperties[\'start_limit\'] = $start_limit;
$savedProperties[\'paginatorProperties\'] = $paginatorProperties;

// We have a delimiters in $_GET, so need to filter resources
if (strpos(implode(array_keys($_GET)), $mSearch2->config[\'filter_delimeter\']) !== false || !empty($mSearch2->aliases)) {
    $matched = $mSearch2->Filter($ids, $_REQUEST);
    $matched = array_intersect($ids, $matched);
    if ($scriptProperties[\'suggestions\']) {
        $suggestions = $mSearch2->getSuggestions($ids, $_REQUEST, $matched);
        $mSearch2->pdoTools->addTime(\'Suggestions retrieved.\');
    }
    // Trying to save weight of found ids again
    if ($weight) {
        $tmp = array();
        foreach ($matched as $v) {$tmp[$v] = isset($found[$v]) ? $found[$v] : 0;}
        $paginatorProperties[\'resources\'] = $modx->toJSON($tmp);
    }
    else {
        $paginatorProperties[\'resources\'] = implode(\',\', $matched);
    }
}
// Saving log
$log = $mSearch2->pdoTools->timings;
$mSearch2->pdoTools->timings = array();

//$paginator->setProperties($paginatorProperties);
$paginator->setCacheable(false);
$output[\'results\'] = !empty($paginatorProperties[\'resources\'])
    ? $paginator->process($paginatorProperties)
    : $modx->lexicon(\'mse2_err_no_results\');
$output[\'total\'] = $modx->getPlaceholder($paginatorProperties[\'totalVar\']);

// ----------------------  Loading filters
$mSearch2->pdoTools->timings = $log;
if (!empty($paginator)) {
	$mSearch2->pdoTools->addTime(\'Fired paginator: "\'.$paginatorName.\'"\');
}
else {
	$mSearch2->pdoTools->addTime(\'Could not find pagination snippet with name: "\'.$paginatorName.\'"\');
}
if (empty($filters)) {
	$mSearch2->pdoTools->addTime(\'No filters retrieved\');
	$output[\'filters\'] = $modx->lexicon(\'mse2_err_no_filters\');
	if (empty($output[\'results\'])) {$output[\'results\'] = $modx->lexicon(\'mse2_err_no_results\');}
}
else {
	$mSearch2->pdoTools->addTime(\'Filters retrieved\');
	$request = array();
	foreach ($_GET as $k => $v) {
		$tmp = explode($mSearch2->config[\'values_delimeter\'], $v);
		$request[$k] = array();
		foreach ($tmp as $v2) {
			$request[$k][] = str_replace(\'"\', \'&quot;\', $v2);
		}
	}

	$aliases = $mSearch2->aliases;
	foreach ($filters as $filter => $data) {
		if (empty($data) || !is_array($data)) {
			continue;
		}
		$rows = $has_active = \'\';
		list($table, $method) = explode($mSearch2->config[\'filter_delimeter\'], $filter);
		$filter_key = !empty($aliases[$filter])
			? $aliases[$filter]
			: $filter;

		$tplOuter = !empty($scriptProperties[\'tplFilter.outer.\' . $filter_key])
			? $scriptProperties[\'tplFilter.outer.\' . $filter_key]
			: $scriptProperties[\'tplFilter.outer.default\'];
		$tplRow = !empty($scriptProperties[\'tplFilter.row.\' . $filter_key])
			? $scriptProperties[\'tplFilter.row.\' . $filter_key]
			: $scriptProperties[\'tplFilter.row.default\'];
		$tplEmpty = !empty($scriptProperties[\'tplFilter.empty.\' . $filter_key])
			? $scriptProperties[\'tplFilter.empty.\' . $filter_key]
			: \'\';

		$idx = 0;
		foreach ($data as $v) {
			if (empty($v)) {continue;}
			$checked = isset($request[$filter_key]) && in_array((string)$v[\'value\'], $request[$filter_key], true) && isset($v[\'type\']) && $v[\'type\'] != \'number\';
			if ($scriptProperties[\'suggestions\']) {
				if ($checked) {
					$num = \'\';
					$has_active = \'has_active\';
				}
				elseif (isset($suggestions[$filter_key][$v[\'value\']])) {
					$num = $suggestions[$filter_key][$v[\'value\']];
				}
				else {
					$num = !empty($v[\'resources\'])
						? count($v[\'resources\'])
						: \'\';
				}
			}
			else {
				$num = \'\';
			}

			$rows .= $mSearch2->pdoTools->getChunk($tplRow, array(
				\'filter\' => $method,
				\'table\' => $table,
				\'title\' => $v[\'title\'],
				\'value\' => $v[\'value\'],
				\'type\' => $v[\'type\'],
				\'checked\' => $checked
					? \'checked\'
					: \'\',
				\'selected\' => $checked
					? \'selected\'
					: \'\',
				\'disabled\' => !$checked && empty($num) && $scriptProperties[\'suggestions\']
					? \'disabled\'
					: \'\',
				\'delimeter\' => $mSearch2->config[\'filter_delimeter\'],
				\'idx\' => $idx++,
				\'num\' => $num,
				\'filter_key\' => $filter_key,
			), $fastMode);
		}

		$tpl = empty($rows) ? $tplEmpty : $tplOuter;
		if (!isset($output[\'filters\'][$filter])) {
			$output[\'filters\'][$filter] = \'\';
		}
		$output[\'filters\'][$filter] = $mSearch2->pdoTools->getChunk($tpl, array(
			\'filter\' => $method,
			\'table\' => $table,
			\'rows\' => $rows,
			\'has_active\' => $has_active,
			\'delimeter\' => $mSearch2->config[\'filter_delimeter\'],
			\'filter_key\' => $filter_key,
		), $fastMode);
	}

	if (empty($output[\'filters\'])) {
		$output[\'filters\'] = $modx->lexicon(\'mse2_err_no_filters\');
		if (empty($output[\'results\'])) {$output[\'results\'] = $modx->lexicon(\'mse2_err_no_results\');}
	}
	else {
		$mSearch2->pdoTools->addTime(\'Filters templated\');
	}
}
$mSearch2->pdoTools->addTime(\'Total filter operations: \'.$mSearch2->filter_operations);

// Saving params into cache for ajax requests
$savedProperties[\'scriptProperties\'] = $scriptProperties;
$hash = sha1(serialize($savedProperties));
$_SESSION[\'mSearch2\'][$hash] = $savedProperties;

// Active class for sort links
if (!empty($sort)) {$output[$sort] = $classActive;}
if (isset($paginatorProperties[\'tpl_idx\'])) {
	$output[\'tpl\'.$paginatorProperties[\'tpl_idx\']] = $classActive;
	$output[\'tpls\'] = 1;
}

// Setting values for frontend javascript
$config = array(
	\'cssUrl\' => $mSearch2->config[\'cssUrl\'].\'web/\',
	\'jsUrl\' => $mSearch2->config[\'jsUrl\'].\'web/\',
	\'actionUrl\' => $mSearch2->config[\'actionUrl\'],
	\'queryVar\' => $mSearch2->config[\'queryVar\'],
	\'idVar\' => $modx->getOption(\'request_param_id\', null, \'id\'),
	\'filter_delimeter\' => $mSearch2->config[\'filter_delimeter\'],
	\'method_delimeter\' => $mSearch2->config[\'method_delimeter\'],
	\'values_delimeter\' => $mSearch2->config[\'values_delimeter\'],
	\'start_sort\' => $start_sort,
	\'start_limit\' => $start_limit,
	\'start_page\' => 1,
	\'start_tpl\' => \'\',
	\'sort\' => $sort == $start_sort ? \'\' : $sort,
	\'limit\' => $limit == $start_limit ? \'\' : $limit,
	\'page\' => $page,
	\'pageVar\' => $paginatorProperties[\'pageVarKey\'],
	\'tpl\' => !empty($paginatorProperties[\'tpl_idx\'])
			? $paginatorProperties[\'tpl_idx\']
			: \'\',
	\'parentsVar\' => $parentsVar,
	\'key\' => $hash,
	\'pageId\' => !empty($pageId) ? (integer) $pageId : $modx->resource->id,
	$queryVar => isset($_REQUEST[$queryVar]) ? $_REQUEST[$queryVar] : \'\',
	$parentsVar => isset($_REQUEST[$parentsVar]) ? $_REQUEST[$parentsVar] : \'\',
	\'aliases\' => array_flip($mSearch2->aliases),
	\'options\' => array(),
	\'mode\' => in_array($scriptProperties[\'ajaxMode\'], array(\'button\', \'scroll\')) ? $scriptProperties[\'ajaxMode\'] : \'\',
	\'moreText\' => $modx->lexicon(\'mse2_more\'),
);
if (!empty($scriptProperties[\'filterOptions\'])) {
	$filterOptions = $modx->fromJSON($scriptProperties[\'filterOptions\']);
	if (is_array($filterOptions)) {
		$config[\'filterOptions\'] = $filterOptions;
	}
}
if (empty($noJsConfig)) {
$modx->regClientStartupScript(\'
<script type="text/javascript">mse2Config = \' . json_encode($config) . \';</script>\', true);
}
if (empty($noJsInitialize)) {
$modx->regClientScript(\'
<script type="text/javascript">
    if ($("#mse2_mfilter").length) {
        if (window.location.hash != "" && mSearch2.Hash.oldbrowser()) {
            var uri = window.location.hash.replace("#", "?");
            window.location.href = document.location.pathname + uri;
        }
        else {
            mSearch2.initialize("body");
        }
    }
    </script>\', true);
}
$modx->setPlaceholders($config, $plPrefix);

// Prepare output
$log = \'\';
if ($modx->user->hasSessionContext(\'mgr\') && !empty($showLog)) {
	$log = \'<pre class="mFilterLog">\' . print_r($mSearch2->pdoTools->getTime(), 1) . \'</pre>\';
}

if (!empty($toSeparatePlaceholders)) {
	$modx->setPlaceholders($output[\'filters\'], $toSeparatePlaceholders);
	$output[\'log\'] = $log;
	if (is_array($output[\'filters\'])) {
		$output[\'filters\'] = implode($outputSeparator, $output[\'filters\']);
	}

	$pcre = \'#^\' . preg_quote($toSeparatePlaceholders) . \'(\\d+)$#\';
	$tmp = array();
	foreach ($modx->placeholders as $k => $v) {
		if (preg_match($pcre, $k)) {
			$tmp[] = $v;
		}
	}

	$output[\'results\'] = !empty($tmp)
		? implode($outputSeparator, $tmp)
		: $modx->lexicon(\'mse2_err_no_results\');

	$modx->setPlaceholders($output, $toSeparatePlaceholders);
}
else {
	if (is_array($output[\'filters\'])) {
		$output[\'filters\'] = implode($outputSeparator, $output[\'filters\']);
	}
	if (!empty($toPlaceholders)) {
		$output[\'log\'] = $log;
		$modx->setPlaceholders($output, $toPlaceholders);
	}
	else {
		$output = $mSearch2->pdoTools->getChunk($scriptProperties[\'tplOuter\'], $output, $fastMode);
		$output .= $log;

		return $output;
	}
}',
    ),
  ),
  'fe0b1538efe55d5659a3327f775c43e2' => 
  array (
    'criteria' => 
    array (
      'name' => 'mSearch2',
    ),
    'object' => 
    array (
      'id' => 16,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'mSearch2',
      'description' => '',
      'editor_type' => 0,
      'category' => 11,
      'cache_type' => 0,
      'plugincode' => '$id = 0;

switch ($modx->event->name) {

	case \'OnDocFormSave\':
	case \'OnResourceDelete\':
	case \'OnResourceUndelete\':
		/* @var modResource $modResource */
		if (!empty($resource) && $resource instanceof modResource) {
			$id = $resource->get(\'id\');
		}
	break;

	case \'OnCommentSave\':
	case \'OnCommentRemove\':
	case \'OnCommentDelete\':
		/* @var TicketComment $TicketComment */
		if (!empty($TicketComment) && $TicketComment instanceof TicketComment) {
			$id = $TicketComment->getOne(\'Thread\')->get(\'resource\');
		}
	break;

}


if (!empty($id)) {
	/* @var modProcessorResponse $response */
	$response = $modx->runProcessor(\'mgr/index/update\', array(\'id\' => $id), array(\'processors_path\' => MODX_CORE_PATH . \'components/msearch2/processors/\'));

	if ($response->isError()) {
		$modx->log(modX::LOG_LEVEL_ERROR, print_r($response->getAllErrors(), true));
	}
}',
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/msearch2/elements/plugins/plugin.msearch2.php',
      'content' => '$id = 0;

switch ($modx->event->name) {

	case \'OnDocFormSave\':
	case \'OnResourceDelete\':
	case \'OnResourceUndelete\':
		/* @var modResource $modResource */
		if (!empty($resource) && $resource instanceof modResource) {
			$id = $resource->get(\'id\');
		}
	break;

	case \'OnCommentSave\':
	case \'OnCommentRemove\':
	case \'OnCommentDelete\':
		/* @var TicketComment $TicketComment */
		if (!empty($TicketComment) && $TicketComment instanceof TicketComment) {
			$id = $TicketComment->getOne(\'Thread\')->get(\'resource\');
		}
	break;

}


if (!empty($id)) {
	/* @var modProcessorResponse $response */
	$response = $modx->runProcessor(\'mgr/index/update\', array(\'id\' => $id), array(\'processors_path\' => MODX_CORE_PATH . \'components/msearch2/processors/\'));

	if ($response->isError()) {
		$modx->log(modX::LOG_LEVEL_ERROR, print_r($response->getAllErrors(), true));
	}
}',
    ),
  ),
  'dd9feab09490d0ccefc66f6813a64fda' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 16,
      'event' => 'OnDocFormSave',
    ),
    'object' => 
    array (
      'pluginid' => 16,
      'event' => 'OnDocFormSave',
      'priority' => 1,
      'propertyset' => 0,
    ),
  ),
  '3d54967637e581f46d3c68ce973c84b0' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 16,
      'event' => 'OnResourceDelete',
    ),
    'object' => 
    array (
      'pluginid' => 16,
      'event' => 'OnResourceDelete',
      'priority' => 1,
      'propertyset' => 0,
    ),
  ),
  'ef047544f80d438fa22e312614ce31e2' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 16,
      'event' => 'OnResourceUndelete',
    ),
    'object' => 
    array (
      'pluginid' => 16,
      'event' => 'OnResourceUndelete',
      'priority' => 1,
      'propertyset' => 0,
    ),
  ),
  '79ab123d67f57d5947916bdbf78426b0' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 16,
      'event' => 'OnCommentSave',
    ),
    'object' => 
    array (
      'pluginid' => 16,
      'event' => 'OnCommentSave',
      'priority' => 1,
      'propertyset' => 0,
    ),
  ),
  '652e3ccaee12273f77080bb1a12fa24a' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 16,
      'event' => 'OnCommentRemove',
    ),
    'object' => 
    array (
      'pluginid' => 16,
      'event' => 'OnCommentRemove',
      'priority' => 1,
      'propertyset' => 0,
    ),
  ),
  '0c42808acf21c321cb18f63c342362d9' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 16,
      'event' => 'OnCommentDelete',
    ),
    'object' => 
    array (
      'pluginid' => 16,
      'event' => 'OnCommentDelete',
      'priority' => 1,
      'propertyset' => 0,
    ),
  ),
  '4f0293c04b92e9bcacffbb57aceec1de' => 
  array (
    'criteria' => 
    array (
      'key' => 'mse2_frontend_css',
    ),
    'object' => 
    array (
      'key' => 'mse2_frontend_css',
      'value' => '[[+cssUrl]]web/default.css',
      'xtype' => 'textfield',
      'namespace' => 'msearch2',
      'area' => 'mse2_main',
      'editedon' => NULL,
    ),
  ),
  '9dc351af04d6665631f823a45f944307' => 
  array (
    'criteria' => 
    array (
      'key' => 'mse2_frontend_js',
    ),
    'object' => 
    array (
      'key' => 'mse2_frontend_js',
      'value' => '[[+jsUrl]]web/default.js',
      'xtype' => 'textfield',
      'namespace' => 'msearch2',
      'area' => 'mse2_main',
      'editedon' => NULL,
    ),
  ),
  'e5e9643a781c89fe660cfd062aca2087' => 
  array (
    'criteria' => 
    array (
      'key' => 'mse2_index_fields',
    ),
    'object' => 
    array (
      'key' => 'mse2_index_fields',
      'value' => 'pagetitle:5,longtitle:3,content:1,description:1,introtext:1',
      'xtype' => 'textarea',
      'namespace' => 'msearch2',
      'area' => 'mse2_index',
      'editedon' => NULL,
    ),
  ),
  '306d010b6ce90e1216a9217ba90ea6f0' => 
  array (
    'criteria' => 
    array (
      'key' => 'mse2_index_comments',
    ),
    'object' => 
    array (
      'key' => 'mse2_index_comments',
      'value' => '1',
      'xtype' => 'combo-boolean',
      'namespace' => 'msearch2',
      'area' => 'mse2_index',
      'editedon' => NULL,
    ),
  ),
  '7948a57ad3e3a9e7996a18476a59eb30' => 
  array (
    'criteria' => 
    array (
      'key' => 'mse2_index_comments_weight',
    ),
    'object' => 
    array (
      'key' => 'mse2_index_comments_weight',
      'value' => '1',
      'xtype' => 'numberfield',
      'namespace' => 'msearch2',
      'area' => 'mse2_index',
      'editedon' => NULL,
    ),
  ),
  '0e5839c6113de527d2bcb69344e8f7be' => 
  array (
    'criteria' => 
    array (
      'key' => 'mse2_index_min_words_length',
    ),
    'object' => 
    array (
      'key' => 'mse2_index_min_words_length',
      'value' => '3',
      'xtype' => 'numberfield',
      'namespace' => 'msearch2',
      'area' => 'mse2_index',
      'editedon' => NULL,
    ),
  ),
  '1bed58aa17b68038ea0fce8cf8b54dfa' => 
  array (
    'criteria' => 
    array (
      'key' => 'mse2_index_all',
    ),
    'object' => 
    array (
      'key' => 'mse2_index_all',
      'value' => '',
      'xtype' => 'combo-boolean',
      'namespace' => 'msearch2',
      'area' => 'mse2_index',
      'editedon' => NULL,
    ),
  ),
  '7e5ce378ed5ea54a92aad493b193359f' => 
  array (
    'criteria' => 
    array (
      'key' => 'mse2_index_split_words',
    ),
    'object' => 
    array (
      'key' => 'mse2_index_split_words',
      'value' => '#\\s|[,.:;!?"\'(){}\\/\\#]#u',
      'xtype' => 'textfield',
      'namespace' => 'msearch2',
      'area' => 'mse2_index',
      'editedon' => NULL,
    ),
  ),
  '9559fdecb4a3467a9111034a861296d4' => 
  array (
    'criteria' => 
    array (
      'key' => 'mse2_search_exact_match_bonus',
    ),
    'object' => 
    array (
      'key' => 'mse2_search_exact_match_bonus',
      'value' => '10',
      'xtype' => 'numberfield',
      'namespace' => 'msearch2',
      'area' => 'mse2_search',
      'editedon' => NULL,
    ),
  ),
  '512025d4f555581d1266385841ba0e97' => 
  array (
    'criteria' => 
    array (
      'key' => 'mse2_search_all_words_bonus',
    ),
    'object' => 
    array (
      'key' => 'mse2_search_all_words_bonus',
      'value' => '10',
      'xtype' => 'numberfield',
      'namespace' => 'msearch2',
      'area' => 'mse2_search',
      'editedon' => NULL,
    ),
  ),
  '5e7b65651e9fd93c97b2cf882d7cba1d' => 
  array (
    'criteria' => 
    array (
      'key' => 'mse2_search_like_match_bonus',
    ),
    'object' => 
    array (
      'key' => 'mse2_search_like_match_bonus',
      'value' => '3',
      'xtype' => 'numberfield',
      'namespace' => 'msearch2',
      'area' => 'mse2_search',
      'editedon' => NULL,
    ),
  ),
  '34bb6e1cdd62362c4b23e03fd9f56407' => 
  array (
    'criteria' => 
    array (
      'key' => 'mse2_search_split_words',
    ),
    'object' => 
    array (
      'key' => 'mse2_search_split_words',
      'value' => '#\\s#u',
      'xtype' => 'textfield',
      'namespace' => 'msearch2',
      'area' => 'mse2_search',
      'editedon' => NULL,
    ),
  ),
  'bc995908a6a5b8bd90c9fabe224a2d07' => 
  array (
    'criteria' => 
    array (
      'key' => 'mse2_old_search_algorithm',
    ),
    'object' => 
    array (
      'key' => 'mse2_old_search_algorithm',
      'value' => '',
      'xtype' => 'combo-boolean',
      'namespace' => 'msearch2',
      'area' => 'mse2_search',
      'editedon' => NULL,
    ),
  ),
  'd475958d9e09f4899f20469211b08767' => 
  array (
    'criteria' => 
    array (
      'key' => 'mse2_filters_handler_class',
    ),
    'object' => 
    array (
      'key' => 'mse2_filters_handler_class',
      'value' => 'mse2FiltersHandler',
      'xtype' => 'textfield',
      'namespace' => 'msearch2',
      'area' => 'mse2_main',
      'editedon' => NULL,
    ),
  ),
  '37ce3ba99d05a0bcc101afc1478f2b6d' => 
  array (
    'criteria' => 
    array (
      'name' => 'mse2OnBeforeSearchIndex',
    ),
    'object' => 
    array (
      'name' => 'mse2OnBeforeSearchIndex',
      'service' => 6,
      'groupname' => 'mSearch2',
    ),
  ),
  '5b454d7320b858a6c6970ae245762897' => 
  array (
    'criteria' => 
    array (
      'name' => 'mse2OnSearchIndex',
    ),
    'object' => 
    array (
      'name' => 'mse2OnSearchIndex',
      'service' => 6,
      'groupname' => 'mSearch2',
    ),
  ),
);