<?php

/**
 * The base class for msto.
 */
class msto
{
	/* @var modX $modx */
	public $modx;
	public $namespace = 'msto';
	public $cache = null;
	public $config = array();
	public $initialized = array();
	public $active = false;
	public $ms2;
	public $msDiscount;

	/**
	 * @param modX $modx
	 * @param array $config
	 */
	function __construct(modX &$modx, array $config = array())
	{
		$this->modx =& $modx;

		$corePath = $this->modx->getOption('msto_core_path', $config, $this->modx->getOption('core_path') . 'components/msto/');
		$assetsUrl = $this->modx->getOption('msto_assets_url', $config, $this->modx->getOption('assets_url') . 'components/msto/');
		$connectorUrl = $assetsUrl . 'connector.php';

		$this->config = array_merge(array(
			'assetsUrl' => $assetsUrl,
			'cssUrl' => $assetsUrl . 'css/',
			'jsUrl' => $assetsUrl . 'js/',
			'imagesUrl' => $assetsUrl . 'images/',
			'connectorUrl' => $connectorUrl,

			'corePath' => $corePath,
			'modelPath' => $corePath . 'model/',
			'chunksPath' => $corePath . 'elements/chunks/',
			'templatesPath' => $corePath . 'elements/templates/',
			'chunkSuffix' => '.chunk.tpl',
			'snippetsPath' => $corePath . 'elements/snippets/',
			'processorsPath' => $corePath . 'processors/',

			'json_response' => true,
			'webconnector' => $assetsUrl . 'web-connector.php',
			'frontend_css' => $this->modx->getOption('msto_frontend_css', null, '[[+assetsUrl]]css/web/default.css'),
			'frontend_js' => $this->modx->getOption('msto_frontend_js', null, '[[+assetsUrl]]js/web/default.js'),

			'show_count' => $this->modx->getOption('msto_show_count', null, false),
			'show_size' => $this->modx->getOption('msto_show_size', null, false),
			'show_weight' => $this->modx->getOption('msto_show_weight', null, false),
			'show_name' => $this->modx->getOption('msto_show_name', null, false),
			'show_desc' => $this->modx->getOption('msto_show_desc', null, false),

		), $config);

		$this->modx->addPackage('msto', $this->config['modelPath']);
		$this->modx->lexicon->load('msto:default');
		$this->active = $this->modx->getOption('msto_active', $config, false);

		if (!$this->ms2 = $modx->getService('miniShop2')) {
			$this->modx->log(modX::LOG_LEVEL_ERROR, 'msTradeOffers requires installed miniShop2.');
			return false;
		}

	}


	public function initialize($ctx = 'web', $scriptProperties = array()){
		$this->config = array_merge($this->config, $scriptProperties);
		$this->config['ctx'] = $ctx;
		if (!empty($this->initialized[$ctx])) {
			return true;
		}
		switch ($ctx) {
			case 'mgr':
				break;
			default:
				if (!defined('MODX_API_MODE') || !MODX_API_MODE) {
					if ($css = trim($this->config['frontend_css'])) {
						if (preg_match('/\.css/i', $css)) {
							$this->modx->regClientCSS(str_replace('[[+assetsUrl]]', $this->config['assetsUrl'], $css));
						}
					}
					if ($js = trim($this->config['frontend_js'])) {
						if (preg_match('/\.js/i', $js)) {
							$this->modx->regClientScript(str_replace('[[+assetsUrl]]', $this->config['assetsUrl'], $js));
						}
					}
					$config_js = preg_replace(array('/^\n/', '/\t{5}/'), '', '
						msto = {};
						mstoConfig = {
							jsUrl: "' . $this->config['jsUrl'] . 'web/",
							webconnector: "' . $this->config['webconnector'] . '",
							show_count: "' . $this->config['show_count'] . '",
							show_size: "' . $this->config['show_size'] . '",
							show_weight: "' . $this->config['show_weight'] . '",
							show_name: "' . $this->config['show_name'] . '",
							show_desc: "' . $this->config['show_desc'] . '",
							ctx: "' . $this->modx->context->get('key') . '"
						};
					');
					$this->modx->regClientStartupScript("<script type=\"text/javascript\">\n" . $config_js . "\n</script>", true);
				}
				$this->initialized[$ctx] = true;
				break;
		}
		return true;
	}

	/**
	 * @param $sp
	 */
	public function onDocFormPrerender($sp){
		if ($this->modx->getOption('mode', $sp) !== 'upd') {
			return;
		}
		if (!$this->modx->getObject('msProduct', $sp['id'])) {
			return;
		}
		$this->modx->controller->addLexiconTopic('msto:default,msto:manager');
		$this->modx->regClientCSS($this->config['cssUrl'] . 'mgr/main.css');
		$this->modx->regClientStartupScript($this->config['jsUrl'] . 'mgr/msto.js');
		$this->modx->regClientStartupScript($this->config['jsUrl'] . 'mgr/misc/utils.js');
		$this->modx->regClientStartupScript($this->config['jsUrl'] . 'mgr/misc/msto.combo.js');
		$data_js = preg_replace(array('/^\n/', '/\t{6}/'), '', '
			msto.config.connector_url = "' . $this->config['connectorUrl'] . '";
			msto.product_id = ' . $sp['id'] . ';
		');
		$this->modx->regClientStartupScript("<script type=\"text/javascript\">\n" . $data_js . "\n</script>", true);
		$this->modx->regClientStartupScript($this->config['jsUrl'] . 'mgr/inject/price.grid.js');
		$this->modx->regClientStartupScript($this->config['jsUrl'] . 'mgr/inject/tab.js');
	}
}