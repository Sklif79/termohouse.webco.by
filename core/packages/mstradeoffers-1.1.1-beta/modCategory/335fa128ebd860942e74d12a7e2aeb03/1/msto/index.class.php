<?php

/**
 * Class mstoMainController
 */
abstract class mstoMainController extends modExtraManagerController {
	/** @var msto $msto */
	public $msto;
	public $miniShop2;

	/**
	 * @return void
	 */
	public function initialize() {
		if (!include_once MODX_CORE_PATH . 'components/minishop2/model/minishop2/minishop2.class.php') {
			throw new Exception('msOptionsPrice requires installed miniShop2.');
		}

		$corePath = $this->modx->getOption('msto_core_path', null, $this->modx->getOption('core_path') . 'components/msto/');
		require_once $corePath . 'model/msto/msto.class.php';

		$this->msto = new msto($this->modx);
		//$this->miniShop2 = new miniShop2($this->modx);

		$this->addCss($this->msto->config['cssUrl'] . 'mgr/main.css');
		$this->addJavascript($this->msto->config['jsUrl'] . 'mgr/msto.js');
		$this->addHtml('
		<script type="text/javascript">
			msto.config = ' . $this->modx->toJSON($this->msto->config) . ';
			msto.config.connector_url = "' . $this->msto->config['connectorUrl'] . '";
		</script>
		');

		parent::initialize();
	}


	/**
	 * @return array
	 */
	public function getLanguageTopics() {
		return array('msto:default');
	}


	/**
	 * @return bool
	 */
	public function checkPermissions() {
		return true;
	}
}


/**
 * Class IndexManagerController
 */
class IndexManagerController extends mstoMainController {

	/**
	 * @return string
	 */
	public static function getDefaultController() {
		return 'home';
	}
}