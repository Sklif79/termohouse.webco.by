<?php

class msOrderFiles
{
    public $config = array();
    public $initialized = array();
    public $msProperties = array();
    /** @var modX $modx */
    public $modx;
    /** @var modMediaSource $ms */
    public $ms;
    /** @var msofTools $Tools */
    public $Tools;
    /** @var pdoTools $pdoTools */
    public $pdoTools;

    /**
     * @param modX  $modx
     * @param array $config
     */
    function __construct(modX &$modx, array $config = array())
    {
        $this->modx = &$modx;

        $corePath = MODX_CORE_PATH . 'components/msorderfiles/';
        $assetsUrl = MODX_ASSETS_URL . 'components/msorderfiles/';
        $assetsPath = MODX_ASSETS_PATH . 'components/msorderfiles/';

        $this->config = array_merge(array(
            'assetsUrl' => $assetsUrl,
            'assetsPath' => $assetsPath,
            'cssUrl' => $assetsUrl . 'css/',
            'jsUrl' => $assetsUrl . 'js/',
            'vendorUrl' => $assetsUrl . 'vendor/',
            'imagesUrl' => $assetsUrl . 'images/',
            'connectorUrl' => $assetsUrl . 'connector.php',
            'actionUrl' => $assetsUrl . 'action.php',

            'corePath' => $corePath,
            'modelPath' => $corePath . 'model/',
            'pluginsPath' => $corePath . 'plugins/',
            'handlersPath' => $corePath . 'handlers/',
            'chunksPath' => $corePath . 'elements/chunks/',
            'templatesPath' => $corePath . 'elements/templates/',
            'chunkSuffix' => '.chunk.tpl',
            'snippetsPath' => $corePath . 'elements/snippets/',
            'processorsPath' => $corePath . 'processors/',

            'prepareResponse' => false,
            'jsonResponse' => false,

            'mediaSource' => $this->modx->getOption('msof_source', null, $this->modx->getOption('default_media_source', null, 1)),
            'fileExtensions' => 'jpg,jpeg,png,gif,zip,rar,bz2,gz,tar,csv,xls,xlsx,doc,docx,ppt,pptx,odt,pdf,txt',
        ), $config);

        $this->modx->addPackage('msorderfiles', $this->config['modelPath']);
        $this->modx->lexicon->load('msorderfiles:default');
    }

    /**
     * @param string $ctx
     * @param array  $sp
     *
     * @return bool
     */
    public function initialize($ctx = 'web', $sp = array())
    {
        $this->getMediaSourceProperties();

        //
        $this->config = array_merge($this->config, $sp, array('ctx' => $ctx));

        $this->getTools();
        if ($pdoTools = $this->getPdoTools()) {
            $pdoTools->setConfig($this->config);
        }

        if (empty($this->initialized[$ctx])) {
            switch ($ctx) {
                case 'mgr':
                    break;
                default:
                    if (!defined('MODX_API_MODE') || !MODX_API_MODE) {
                    }
                    break;
            }
        }

        return ($this->initialized[$ctx] = true);
    }

    /**
     * @param string $objectName
     * @param array  $sp
     *
     * @return bool
     */
    public function loadFrontendScripts($objectName = '', array $sp = array())
    {
        if (empty($objectName)) {
            $objectName = 'msOrderFiles';
        }
        $objectName = trim($objectName);
        $className = $objectName . '_' . $sp['propkey'];

        if (empty($this->modx->loadedjscripts[$className]) && (!defined('MODX_API_MODE') || !MODX_API_MODE)) {
            $pls = $this->Tools->makePlaceholders($this->config);
            if ($css = trim($this->modx->getOption('msof_frontend_css'))) {
                $this->modx->regClientCSS(str_replace($pls['pl'], $pls['vl'], $css));
            }
            if ($js = trim($this->modx->getOption('msof_frontend_js'))) {
                $this->modx->regClientScript(str_replace($pls['pl'], $pls['vl'], $js));
            }

            $params = $this->modx->toJSON(array_merge(array(
                'assetsUrl' => $this->config['assetsUrl'],
                'vendorUrl' => $this->config['vendorUrl'],
                'actionUrl' => $this->config['actionUrl'],
                'lexicon' => array(
                    'dictDefaultMessage' => '',
                    'dictMaxFilesExceeded' => $this->modx->lexicon('msorderfiles_dz_dictMaxFilesExceeded'),
                    'dictFallbackMessage' => $this->modx->lexicon('msorderfiles_dz_dictFallbackMessage'),
                    'dictFileTooBig' => $this->modx->lexicon('msorderfiles_dz_dictFileTooBig'),
                    'dictInvalidFileType' => $this->modx->lexicon('msorderfiles_dz_dictInvalidFileType'),
                    'dictResponseError' => $this->modx->lexicon('msorderfiles_dz_dictResponseError'),
                    'dictCancelUpload' => $this->modx->lexicon('msorderfiles_dz_dictCancelUpload'),
                    'dictCancelUploadConfirmation' => $this->modx->lexicon('msorderfiles_dz_dictCancelUploadConfirmation'),
                    'dictRemoveFile' => $this->modx->lexicon('msorderfiles_dz_dictRemoveFile'),
                    'dictDefaultCanceled' => $this->modx->lexicon('msorderfiles_dz_dictDefaultCanceled'),
                ),
            ), $sp));
            $this->modx->regClientScript('<script type="text/javascript">
                if (typeof(' . $className . ') == "undefined") {
                    var ' . $className . ' = new ' . $objectName . '(' . $params . ');
                }
            </script>', true);

            $this->modx->loadedjscripts[$className] = true;
        }

        return !empty($this->modx->loadedjscripts[$className]);
    }

    /**
     * @return msofTools
     */
    public function getTools()
    {
        if (!is_object($this->Tools)) {
            if ($class = $this->modx->loadClass('tools.msofTools', $this->config['handlersPath'], true, true)) {
                $this->Tools = new $class($this->modx, $this->config);
            }
        }

        return $this->Tools;
    }

    /**
     * @return pdoTools
     */
    public function getPdoTools()
    {
        if (class_exists('pdoTools') && !is_object($this->pdoTools)) {
            $this->pdoTools = $this->modx->getService('pdoTools');
        }

        return $this->pdoTools;
    }

    /**
     * @return array
     */
    public function getMediaSourceProperties()
    {
        if (!is_object($this->ms) && $this->config['mediaSource']) {
            if ($this->ms = $this->modx->getObject('sources.modMediaSource', $this->config['mediaSource'])) {
                $this->msProperties = $this->ms->getPropertyList();
            }
        }
        if (!empty($this->msProperties)) {
            if (!is_array($this->config['fileExtensions'])) {
                if (!$tmpFileExtensions = $this->msProperties['allowedFileTypes']) {
                    $tmpFileExtensions = $this->config['fileExtensions'];
                }
                $this->config['fileExtensions'] = array_map('trim', explode(',', $tmpFileExtensions));
            }
        }

        return $this->msProperties;
    }

    /**
     * @param string $key
     * @param array  $properties
     *
     * @return array|bool
     */
    public function saveProperties($key, array $properties = array())
    {
        return !empty($key) ? ($_SESSION['msOrderFiles']['properties'][$key] = $properties) : false;
    }

    /**
     * @param string $key
     *
     * @return array
     */
    public function getProperties($key)
    {
        $session_properties = &$_SESSION['msOrderFiles']['properties'];

        return !empty($session_properties[$key]) ? $session_properties[$key] : array();
    }
}