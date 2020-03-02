<?php return array (
  '12764875cd2aa2ae0137e05f0d8d2378' => 
  array (
    'criteria' => 
    array (
      'name' => 'sendex',
    ),
    'object' => 
    array (
      'name' => 'sendex',
      'path' => '{core_path}components/sendex/',
      'assets_path' => '',
    ),
  ),
  'eeb5ea20dd12eab7292582f77347d0d5' => 
  array (
    'criteria' => 
    array (
      'namespace' => 'sendex',
      'controller' => 'index',
    ),
    'object' => 
    array (
      'id' => 9,
      'namespace' => 'sendex',
      'controller' => 'index',
      'haslayout' => 1,
      'lang_topics' => 'sendex:default',
      'assets' => '',
      'help_url' => '',
    ),
  ),
  'fb2b0912b78a51260e998124cd5c9f0b' => 
  array (
    'criteria' => 
    array (
      'text' => 'sendex',
    ),
    'object' => 
    array (
      'text' => 'sendex',
      'parent' => 'components',
      'action' => '9',
      'description' => 'sendex_menu_desc',
      'icon' => 'images/icons/plugin.gif',
      'menuindex' => 0,
      'params' => '',
      'handler' => '',
      'permissions' => '',
      'namespace' => 'core',
    ),
  ),
  '10d059a7f529e3eebf8dac27b609829f' => 
  array (
    'criteria' => 
    array (
      'category' => 'Sendex',
    ),
    'object' => 
    array (
      'id' => 19,
      'parent' => 0,
      'category' => 'Sendex',
      'rank' => 0,
    ),
  ),
  '5181f1a0d7d8d993c4012db5900d53f6' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.Sendex.subscribe.auth',
    ),
    'object' => 
    array (
      'id' => 5,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.Sendex.subscribe.auth',
      'description' => '',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
      'snippet' => '


<form class="subscription__form">
					<div class="entitled-group entitled-group_field subscription__field">
						<label class="entitled-group__name">электронная почта</label>
						
						<input placeholder="user@mail.ru" class="field" name="sx_action" />
					</div>
					<button class="btn btn_prim btn_accent-hov btn_size_lg subscription__button">
						<span class="btn__label">[[%sendex_btn_subscribe]]</span>
					</button>
						[[+message]]
				</form>',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'static' => 0,
      'static_file' => 'core/components/sendex/elements/chunks/chunk.subscribe.auth.tpl',
      'content' => '


<form class="subscription__form">
					<div class="entitled-group entitled-group_field subscription__field">
						<label class="entitled-group__name">электронная почта</label>
						
						<input placeholder="user@mail.ru" class="field" name="sx_action" />
					</div>
					<button class="btn btn_prim btn_accent-hov btn_size_lg subscription__button">
						<span class="btn__label">[[%sendex_btn_subscribe]]</span>
					</button>
						[[+message]]
				</form>',
    ),
  ),
  '442093932c3f6fa071ee94f471436eac' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.Sendex.subscribe.guest',
    ),
    'object' => 
    array (
      'id' => 6,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.Sendex.subscribe.guest',
      'description' => '',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
      'snippet' => '<form class="subscription__form">
					<div class="entitled-group entitled-group_field subscription__field">
						<label class="entitled-group__name">электронная почта</label>
						
						<input placeholder="user@mail.ru" class="field"  />
					</div>
					<input type="hidden" name="name="sx_action" value="subscribe" >
					<button class="btn btn_prim btn_accent-hov btn_size_lg subscription__button">
						<span class="btn__label">[[%sendex_btn_subscribe]]</span>
					</button>
						[[+message]]
				</form>',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'static' => 0,
      'static_file' => 'core/components/sendex/elements/chunks/chunk.subscribe.guest.tpl',
      'content' => '<form class="subscription__form">
					<div class="entitled-group entitled-group_field subscription__field">
						<label class="entitled-group__name">электронная почта</label>
						
						<input placeholder="user@mail.ru" class="field"  />
					</div>
					<input type="hidden" name="name="sx_action" value="subscribe" >
					<button class="btn btn_prim btn_accent-hov btn_size_lg subscription__button">
						<span class="btn__label">[[%sendex_btn_subscribe]]</span>
					</button>
						[[+message]]
				</form>',
    ),
  ),
  '11eeddaeeed7a05d34b872264767ca41' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.Sendex.unsubscribe',
    ),
    'object' => 
    array (
      'id' => 7,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.Sendex.unsubscribe',
      'description' => '',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
      'snippet' => '<form action="" method="post">
	<p>
		[[%sendex_unsubscribe_intro?name=`[[+name]]`]]
		<small>[[+description]]</small>
	</p>
	<input type="hidden" name="code" value="[[+code]]">

	<input type="hidden" name="sx_action" value="unsubscribe">
	<button type="submit">[[%sendex_btn_unsubscribe]]</button>

	[[+message]]
</form>',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/sendex/elements/chunks/chunk.unsubscribe.tpl',
      'content' => '<form action="" method="post">
	<p>
		[[%sendex_unsubscribe_intro?name=`[[+name]]`]]
		<small>[[+description]]</small>
	</p>
	<input type="hidden" name="code" value="[[+code]]">

	<input type="hidden" name="sx_action" value="unsubscribe">
	<button type="submit">[[%sendex_btn_unsubscribe]]</button>

	[[+message]]
</form>',
    ),
  ),
  'cdfb476175217da3a7bab1a35939f3f2' => 
  array (
    'criteria' => 
    array (
      'name' => 'tpl.Sendex.activate',
    ),
    'object' => 
    array (
      'id' => 8,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'tpl.Sendex.activate',
      'description' => '',
      'editor_type' => 0,
      'category' => 0,
      'cache_type' => 0,
      'snippet' => '
[[+link]]',
      'locked' => 0,
      'properties' => 'a:0:{}',
      'static' => 0,
      'static_file' => 'core/components/sendex/elements/chunks/chunk.activate.tpl',
      'content' => '
[[+link]]',
    ),
  ),
  'caf9ad9de61d4691d495e6d9d3e78d06' => 
  array (
    'criteria' => 
    array (
      'name' => 'Sendex',
    ),
    'object' => 
    array (
      'id' => 64,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'Sendex',
      'description' => '',
      'editor_type' => 0,
      'category' => 19,
      'cache_type' => 0,
      'snippet' => '/** @var array $scriptProperties */
/** @var Sendex $Sendex */
$Sendex = $modx->getService(\'sendex\',\'Sendex\',$modx->getOption(\'sendex_core_path\',null,$modx->getOption(\'core_path\').\'components/sendex/\').\'model/sendex/\',$scriptProperties);
if (!($Sendex instanceof Sendex)) return \'\';

if (empty($tplSubscribeAuth)) {$tplSubscribeAuth = \'tpl.Sendex.subscribe.auth\';}
if (empty($tplSubscribeGuest)) {$tplSubscribeGuest = \'tpl.Sendex.subscribe.guest\';}
if (empty($tplUnsubscribe)) {$tplUnsubscribe = \'tpl.Sendex.unsubscribe\';}
if (empty($tplActivate)) {$tplActivate = \'tpl.Sendex.activate\';}
if (empty($linkTTL)) {$linkTTL = 1800;}

if (empty($id) || !$newsletter = $modx->getObject(\'sxNewsletter\', $id)) {
	return $modx->lexicon(\'sendex_newsletter_err_ns\');
}

/** @var sxNewsletter $newsletter */
if (!$newsletter->active && empty($showInactive)) {
	return $modx->lexicon(\'sendex_newsletter_err_disabled\');
}

$placeholders = $newsletter->toArray();
$placeholders[\'message\'] = \'\';
$placeholders[\'error\'] = 0;
if ($modx->user->isAuthenticated($modx->context->key)) {
	$placeholders = array_merge(
		$modx->user->toArray(),
		$modx->user->Profile->toArray(),
		$placeholders
	);
}

$isAuthenticated = $modx->user->isAuthenticated($modx->context->key);

if (!empty($_REQUEST[\'sx_action\'])) {
	$isAjax = isset($_SERVER[\'HTTP_X_REQUESTED_WITH\']) && $_SERVER[\'HTTP_X_REQUESTED_WITH\'] == \'XMLHttpRequest\';

	$params = $_GET;
	unset($params[$modx->getOption(\'request_param_alias\')]);
	unset($params[$modx->getOption(\'request_param_id\')]);

	switch ($_REQUEST[\'sx_action\']) {
		case \'subscribe\':
			if ($isAuthenticated && $modx->user->id) {
				if (!$response = $newsletter->Subscribe($modx->user->id)) {
					$placeholders[\'message\'] = $modx->lexicon(\'sendex_subscribe_err_email_wrong\');
					$placeholders[\'error\'] = 1;
				}
			}
			elseif (!empty($_REQUEST[\'email\'])) {
				$email = htmlentities(strip_tags(urldecode($_REQUEST[\'email\'])));
				$response = $newsletter->checkEmail($email, $modx->user->id, $linkTTL);
				if ($response === true) {
					$placeholders[\'message\'] = $modx->lexicon(\'sendex_subscribe_err_already\');
				}
				elseif ($response === false) {
					$placeholders[\'message\'] = $modx->lexicon(\'sendex_subscribe_err_email_wrong\');
					$placeholders[\'error\'] = 1;
				}
				else {
					$params[\'hash\'] = $response;
					$params[\'sx_action\'] = \'confirm\';
					$placeholders[\'link\'] = $modx->makeUrl($modx->resource->id, $modx->context->key, $params, \'full\');
					$placeholders[\'email_body\'] = $modx->getChunk($tplActivate, $placeholders);
					$response = $Sendex->sendEmail($email, $placeholders);
					if ($response !== true) {
						$placeholders[\'message\'] = $modx->lexicon(\'sendex_subscribe_err_email_send\');
						$placeholders[\'error\'] = 1;
					} else {
					    $params[\'sx_subscribed\'] = 1;
					}
				}
			}
			else {
				$placeholders[\'message\'] = $modx->lexicon(\'sendex_subscribe_err_email_ns\');
				$placeholders[\'error\'] = 1;
			}
			unset($params[\'email\'], $params[\'hash\']);
			break;
		case \'confirm\':
			if (!empty($_REQUEST[\'hash\'])) {
				$response = $newsletter->confirmEmail($_REQUEST[\'hash\']);
				$params[\'sx_confirmed\'] = 1;
				unset($params[\'hash\']);
			}
			break;
		case \'unsubscribe\':
			if (!empty($_REQUEST[\'code\'])) {
				$response = $newsletter->unSubscribe($_REQUEST[\'code\']);
				$params[\'sx_unsubscribed\'] = 1;
			}
			unset($params[\'code\']);
			break;
	}

	unset($params[\'sx_action\']);
	if (!$isAjax && empty($placeholders[\'message\'])) {
		$modx->sendRedirect($modx->makeUrl($modx->resource->id, $modx->context->key, $params, \'full\'));
	}
}

if ($isAuthenticated && $id = $newsletter->isSubscribed($modx->user->id)) {
	if ($subscriber = $modx->getObject(\'sxSubscriber\', $id)) {
		$placeholders = array_merge($subscriber->toArray(), $placeholders);
	}
	$output = $modx->getChunk($tplUnsubscribe, $placeholders);
}
else {
	$output = $isAuthenticated
		? $modx->getChunk($tplSubscribeAuth, $placeholders)
		: $modx->getChunk($tplSubscribeGuest, $placeholders);
}

if (!empty($isAjax)) {
	@session_write_close();
	exit($output);
}
else {
	return $output;
}',
      'locked' => 0,
      'properties' => 'a:6:{s:2:"id";a:7:{s:4:"name";s:2:"id";s:4:"desc";s:14:"sendex_prop_id";s:4:"type";s:11:"numberfield";s:7:"options";a:0:{}s:5:"value";s:0:"";s:7:"lexicon";s:17:"sendex:properties";s:4:"area";s:0:"";}s:12:"showInactive";a:7:{s:4:"name";s:12:"showInactive";s:4:"desc";s:24:"sendex_prop_showInactive";s:4:"type";s:13:"combo-boolean";s:7:"options";a:0:{}s:5:"value";b:0;s:7:"lexicon";s:17:"sendex:properties";s:4:"area";s:0:"";}s:16:"tplSubscribeAuth";a:7:{s:4:"name";s:16:"tplSubscribeAuth";s:4:"desc";s:28:"sendex_prop_tplSubscribeAuth";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:25:"tpl.Sendex.subscribe.auth";s:7:"lexicon";s:17:"sendex:properties";s:4:"area";s:0:"";}s:17:"tplSubscribeGuest";a:7:{s:4:"name";s:17:"tplSubscribeGuest";s:4:"desc";s:29:"sendex_prop_tplSubscribeGuest";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:26:"tpl.Sendex.subscribe.guest";s:7:"lexicon";s:17:"sendex:properties";s:4:"area";s:0:"";}s:14:"tplUnsubscribe";a:7:{s:4:"name";s:14:"tplUnsubscribe";s:4:"desc";s:26:"sendex_prop_tplUnsubscribe";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:22:"tpl.Sendex.unsubscribe";s:7:"lexicon";s:17:"sendex:properties";s:4:"area";s:0:"";}s:11:"tplActivate";a:7:{s:4:"name";s:11:"tplActivate";s:4:"desc";s:23:"sendex_prop_tplActivate";s:4:"type";s:9:"textfield";s:7:"options";a:0:{}s:5:"value";s:19:"tpl.Sendex.activate";s:7:"lexicon";s:17:"sendex:properties";s:4:"area";s:0:"";}}',
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/sendex/elements/snippets/snippet.sendex.php',
      'content' => '/** @var array $scriptProperties */
/** @var Sendex $Sendex */
$Sendex = $modx->getService(\'sendex\',\'Sendex\',$modx->getOption(\'sendex_core_path\',null,$modx->getOption(\'core_path\').\'components/sendex/\').\'model/sendex/\',$scriptProperties);
if (!($Sendex instanceof Sendex)) return \'\';

if (empty($tplSubscribeAuth)) {$tplSubscribeAuth = \'tpl.Sendex.subscribe.auth\';}
if (empty($tplSubscribeGuest)) {$tplSubscribeGuest = \'tpl.Sendex.subscribe.guest\';}
if (empty($tplUnsubscribe)) {$tplUnsubscribe = \'tpl.Sendex.unsubscribe\';}
if (empty($tplActivate)) {$tplActivate = \'tpl.Sendex.activate\';}
if (empty($linkTTL)) {$linkTTL = 1800;}

if (empty($id) || !$newsletter = $modx->getObject(\'sxNewsletter\', $id)) {
	return $modx->lexicon(\'sendex_newsletter_err_ns\');
}

/** @var sxNewsletter $newsletter */
if (!$newsletter->active && empty($showInactive)) {
	return $modx->lexicon(\'sendex_newsletter_err_disabled\');
}

$placeholders = $newsletter->toArray();
$placeholders[\'message\'] = \'\';
$placeholders[\'error\'] = 0;
if ($modx->user->isAuthenticated($modx->context->key)) {
	$placeholders = array_merge(
		$modx->user->toArray(),
		$modx->user->Profile->toArray(),
		$placeholders
	);
}

$isAuthenticated = $modx->user->isAuthenticated($modx->context->key);

if (!empty($_REQUEST[\'sx_action\'])) {
	$isAjax = isset($_SERVER[\'HTTP_X_REQUESTED_WITH\']) && $_SERVER[\'HTTP_X_REQUESTED_WITH\'] == \'XMLHttpRequest\';

	$params = $_GET;
	unset($params[$modx->getOption(\'request_param_alias\')]);
	unset($params[$modx->getOption(\'request_param_id\')]);

	switch ($_REQUEST[\'sx_action\']) {
		case \'subscribe\':
			if ($isAuthenticated && $modx->user->id) {
				if (!$response = $newsletter->Subscribe($modx->user->id)) {
					$placeholders[\'message\'] = $modx->lexicon(\'sendex_subscribe_err_email_wrong\');
					$placeholders[\'error\'] = 1;
				}
			}
			elseif (!empty($_REQUEST[\'email\'])) {
				$email = htmlentities(strip_tags(urldecode($_REQUEST[\'email\'])));
				$response = $newsletter->checkEmail($email, $modx->user->id, $linkTTL);
				if ($response === true) {
					$placeholders[\'message\'] = $modx->lexicon(\'sendex_subscribe_err_already\');
				}
				elseif ($response === false) {
					$placeholders[\'message\'] = $modx->lexicon(\'sendex_subscribe_err_email_wrong\');
					$placeholders[\'error\'] = 1;
				}
				else {
					$params[\'hash\'] = $response;
					$params[\'sx_action\'] = \'confirm\';
					$placeholders[\'link\'] = $modx->makeUrl($modx->resource->id, $modx->context->key, $params, \'full\');
					$placeholders[\'email_body\'] = $modx->getChunk($tplActivate, $placeholders);
					$response = $Sendex->sendEmail($email, $placeholders);
					if ($response !== true) {
						$placeholders[\'message\'] = $modx->lexicon(\'sendex_subscribe_err_email_send\');
						$placeholders[\'error\'] = 1;
					} else {
					    $params[\'sx_subscribed\'] = 1;
					}
				}
			}
			else {
				$placeholders[\'message\'] = $modx->lexicon(\'sendex_subscribe_err_email_ns\');
				$placeholders[\'error\'] = 1;
			}
			unset($params[\'email\'], $params[\'hash\']);
			break;
		case \'confirm\':
			if (!empty($_REQUEST[\'hash\'])) {
				$response = $newsletter->confirmEmail($_REQUEST[\'hash\']);
				$params[\'sx_confirmed\'] = 1;
				unset($params[\'hash\']);
			}
			break;
		case \'unsubscribe\':
			if (!empty($_REQUEST[\'code\'])) {
				$response = $newsletter->unSubscribe($_REQUEST[\'code\']);
				$params[\'sx_unsubscribed\'] = 1;
			}
			unset($params[\'code\']);
			break;
	}

	unset($params[\'sx_action\']);
	if (!$isAjax && empty($placeholders[\'message\'])) {
		$modx->sendRedirect($modx->makeUrl($modx->resource->id, $modx->context->key, $params, \'full\'));
	}
}

if ($isAuthenticated && $id = $newsletter->isSubscribed($modx->user->id)) {
	if ($subscriber = $modx->getObject(\'sxSubscriber\', $id)) {
		$placeholders = array_merge($subscriber->toArray(), $placeholders);
	}
	$output = $modx->getChunk($tplUnsubscribe, $placeholders);
}
else {
	$output = $isAuthenticated
		? $modx->getChunk($tplSubscribeAuth, $placeholders)
		: $modx->getChunk($tplSubscribeGuest, $placeholders);
}

if (!empty($isAjax)) {
	@session_write_close();
	exit($output);
}
else {
	return $output;
}',
    ),
  ),
  'c613c7e854f9aeae9b3fae3b1f785c25' => 
  array (
    'criteria' => 
    array (
      'name' => 'Sendex',
    ),
    'object' => 
    array (
      'id' => 22,
      'source' => 1,
      'property_preprocess' => 0,
      'name' => 'Sendex',
      'description' => '',
      'editor_type' => 0,
      'category' => 19,
      'cache_type' => 0,
      'plugincode' => 'switch ($modx->event->name) {

	case \'OnManagerPageInit\':
		$cssFile = MODX_ASSETS_URL.\'components/sendex/css/mgr/main.css\';
		$modx->regClientCSS($cssFile);
		break;

}',
      'locked' => 0,
      'properties' => NULL,
      'disabled' => 0,
      'moduleguid' => '',
      'static' => 0,
      'static_file' => 'core/components/sendex/elements/plugins/plugin.sendex.php',
      'content' => 'switch ($modx->event->name) {

	case \'OnManagerPageInit\':
		$cssFile = MODX_ASSETS_URL.\'components/sendex/css/mgr/main.css\';
		$modx->regClientCSS($cssFile);
		break;

}',
    ),
  ),
  '5a882beddfe70bb063bdbe1113b02bb7' => 
  array (
    'criteria' => 
    array (
      'pluginid' => 22,
      'event' => 'OnManagerPageInit',
    ),
    'object' => 
    array (
      'pluginid' => 22,
      'event' => 'OnManagerPageInit',
      'priority' => 0,
      'propertyset' => 0,
    ),
  ),
  'ba13ae09ff51da56998f562e2a1a9f2e' => 
  array (
    'criteria' => 
    array (
      'templatename' => 'Sendex',
    ),
    'object' => 
    array (
      'id' => 2,
      'source' => 1,
      'property_preprocess' => 0,
      'templatename' => 'Sendex',
      'description' => 'Demo template for newsletter',
      'editor_type' => 0,
      'category' => 0,
      'icon' => '',
      'template_type' => 0,
      'content' => '<h1>Available placeholders in Sendex template</h1>
<table>
	<tr><th colspan="2">sxNewsletter Object</th></tr>
	<tr><td>&#91;&#91;+newsletter.id&#93;&#93;</td><td>[[+newsletter.id]]</td></tr>
	<tr><td>&#91;&#91;+newsletter.name&#93;&#93;</td><td>[[+newsletter.name]]</td></tr>
	<tr><td>&#91;&#91;+newsletter.description&#93;&#93;</td><td>[[+newsletter.description]]</td></tr>
	<tr><td>&#91;&#91;+newsletter.active&#93;&#93;</td><td>[[+newsletter.active]]</td></tr>
	<tr><td>&#91;&#91;+newsletter.template&#93;&#93;</td><td>[[+newsletter.template]]</td></tr>
	<tr><td>&#91;&#91;+newsletter.image&#93;&#93;</td><td>[[+newsletter.image]]</td></tr>
	<tr><td>&#91;&#91;+newsletter.email_subject&#93;&#93;</td><td>[[+newsletter.email_subject]]</td></tr>
	<tr><td>&#91;&#91;+newsletter.email_from&#93;&#93;</td><td>[[+newsletter.email_from]]</td></tr>
	<tr><td>&#91;&#91;+newsletter.email_from_name&#93;&#93;</td><td>[[+newsletter.email_from_name]]</td></tr>
	<tr><td>&#91;&#91;+newsletter.email_reply&#93;&#93;</td><td>[[+newsletter.email_reply]]</td></tr>

	<tr><th colspan="2">sxSubscriber Object</th></tr>
	<tr><td>&#91;&#91;+subscriber.id&#93;&#93;</td><td>[[+subscriber.id]]</td></tr>
	<tr><td>&#91;&#91;+subscriber.newsletter_id&#93;&#93;</td><td>[[+subscriber.newsletter_id]]</td></tr>
	<tr><td>&#91;&#91;+subscriber.user_id&#93;&#93;</td><td>[[+subscriber.user_id]]</td></tr>
	<tr><td>&#91;&#91;+subscriber.email&#93;&#93;</td><td>[[+subscriber.email]]</td></tr>
	<tr><td>&#91;&#91;+subscriber.code&#93;&#93;</td><td>[[+subscriber.code]]</td></tr>

	<tr><th colspan="2">modUser Object (If a subscriber is an authorized user)</th></tr>
	<tr><td>&#91;&#91;+user.id&#93;&#93;</td><td>[[+user.id]]</td></tr>
	<tr><td>&#91;&#91;+user.username&#93;&#93;</td><td>[[+user.username]]</td></tr>
	<tr><td>&#91;&#91;+user.password&#93;&#93;</td><td>[[+user.password]]</td></tr>
	<tr><td>&#91;&#91;+user.class_key&#93;&#93;</td><td>[[+user.class_key]]</td></tr>
	<tr><td>&#91;&#91;+user.active&#93;&#93;</td><td>[[+user.active]]</td></tr>
	<tr><td>&#91;&#91;+user.primary_group&#93;&#93;</td><td>[[+user.primary_group]]</td></tr>
	<tr><td>&#91;&#91;+user.sudo&#93;&#93;</td><td>[[+user.sudo]]</td></tr>

	<tr><th colspan="2">modUserProfile Object (If a subscriber is an authorized user)</th></tr>
	<tr><td>&#91;&#91;+profile.id&#93;&#93;</td><td>[[+profile.id]]</td></tr>
	<tr><td>&#91;&#91;+profile.internalKey&#93;&#93;</td><td>[[+profile.internalKey]]</td></tr>
	<tr><td>&#91;&#91;+profile.fullname&#93;&#93;</td><td>[[+profile.fullname]]</td></tr>
	<tr><td>&#91;&#91;+profile.email&#93;&#93;</td><td>[[+profile.email]]</td></tr>
	<tr><td>&#91;&#91;+profile.phone&#93;&#93;</td><td>[[+profile.phone]]</td></tr>
	<tr><td>&#91;&#91;+profile.mobilephone&#93;&#93;</td><td>[[+profile.mobilephone]]</td></tr>
	<tr><td>&#91;&#91;+profile.dob&#93;&#93;</td><td>[[+profile.dob]]</td></tr>
	<tr><td>&#91;&#91;+profile.gender&#93;&#93;</td><td>[[+profile.gender]]</td></tr>
	<tr><td>&#91;&#91;+profile.address&#93;&#93;</td><td>[[+profile.address]]</td></tr>
	<tr><td>&#91;&#91;+profile.country&#93;&#93;</td><td>[[+profile.country]]</td></tr>
	<tr><td>&#91;&#91;+profile.city&#93;&#93;</td><td>[[+profile.city]]</td></tr>
	<tr><td>&#91;&#91;+profile.state&#93;&#93;</td><td>[[+profile.state]]</td></tr>
	<tr><td>&#91;&#91;+profile.zip&#93;&#93;</td><td>[[+profile.zip]]</td></tr>
	<tr><td>&#91;&#91;+profile.fax&#93;&#93;</td><td>[[+profile.fax]]</td></tr>
	<tr><td>&#91;&#91;+profile.photo&#93;&#93;</td><td>[[+profile.photo]]</td></tr>
	<tr><td>&#91;&#91;+profile.comment&#93;&#93;</td><td>[[+profile.comment]]</td></tr>
	<tr><td>&#91;&#91;+profile.website&#93;&#93;</td><td>[[+profile.website]]</td></tr>
</table>


<h1>Link for unsubscribe</h1>
Link must lead to page with Sendex call and contain right sx_action and user code:<br/>
<pre>&#91;&#91;~id_of_resource?scheme=`full`&action=`sx_unsubscribe`&code=`&#91;&#91;+subscriber.code&#93;&#93;`&#93;&#93;</pre>

<br/><br/>
For example:<br/>
<a href="[[~[[++site_start]]?scheme=`full`&sx_action=`unsubscribe`&code=`[[+subscriber.code]]`]]">Unsubscribe from this newsletter</a>
',
      'locked' => 0,
      'properties' => NULL,
      'static' => 0,
      'static_file' => 'core/components/sendex/elements/templates/template.sendex.tpl',
    ),
  ),
);