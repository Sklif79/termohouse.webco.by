<?php

class msofTools
{
    public $config = array();
    /** @var modX $modx */
    protected $modx;
    /** @var msOrderFiles $msof */
    protected $msof;

    /**
     * @param $modx
     * @param $config
     */
    public function __construct(&$modx, &$config)
    {
        $this->modx = &$modx;
        $this->config = &$config;

        $path = MODX_CORE_PATH . 'components/modextralayout/model/modextralayout/';
        $this->msof = $this->modx->getService('msorderfiles', 'msOrderFiles', $path);
    }

    /**
     * Shorthand for original modX::invokeEvent() method with some useful additions.
     *
     * @param       $eventName
     * @param array $params
     * @param       $glue
     *
     * @return array
     */
    public function invokeEvent($eventName, array $params = array(), $glue = '<br/>')
    {
        if (isset($this->modx->event->returnedValues)) {
            $this->modx->event->returnedValues = null;
        }
        $response = $this->modx->invokeEvent($eventName, $params);
        if (is_array($response) && count($response) > 1) {
            foreach ($response as $k => $v) {
                if (empty($v)) {
                    unset($response[$k]);
                }
            }
        }
        $message = is_array($response) ? implode($glue, $response) : trim((string)$response);
        if (isset($this->modx->event->returnedValues) && is_array($this->modx->event->returnedValues)) {
            $params = array_merge($params, $this->modx->event->returnedValues);
        }

        return array(
            'success' => empty($message),
            'message' => $message,
            'data' => $params,
        );
    }

    /**
     * @param string $action
     * @param array  $data
     *
     * @return modProcessorResponse
     */
    public function runProcessor($action = '', $data = array())
    {
        $this->modx->error->reset();
        $processorsPath = !empty($this->msof->config['processorsPath']) ? $this->msof->config['processorsPath'] : MODX_CORE_PATH;

        /* @var modProcessorResponse $response */
        $response = $this->modx->runProcessor($action, $data, array('processors_path' => $processorsPath));

        return $this->msof->config['prepareResponse'] ? $this->prepareResponse($response) : $response;
    }

    /**
     * This method returns prepared response
     *
     * @param mixed $response
     *
     * @return array|string $response
     */
    public function prepareResponse($response)
    {
        if ($response instanceof modProcessorResponse) {
            $output = $response->getResponse();
        } else {
            $message = $response;
            if (empty($message)) {
                $message = $this->modx->lexicon('err_unknown');
            }
            $output = $this->failure($message);
        }
        if ($this->msof->config['jsonResponse'] AND is_array($output)) {
            $output = $this->modx->toJSON($output);
        } elseif (!$this->msof->config['jsonResponse'] AND !is_array($output)) {
            $output = $this->modx->fromJSON($output);
        }

        return $output;
    }

    /**
     * More convenient error messages.
     *
     * @param modProcessorResponse $response
     * @param string               $glue
     *
     * @return string
     */
    public function formatProcessorErrors(modProcessorResponse $response, $glue = '<br>')
    {
        $errormsgs = array();

        if ($response->hasMessage()) {
            $errormsgs[] = $response->getMessage();
        }
        if ($response->hasFieldErrors()) {
            if ($errors = $response->getFieldErrors()) {
                foreach ($errors as $error) {
                    $errormsgs[] = $error->message;
                }
            }
        }

        return implode($glue, $errormsgs);
    }

    /**
     * Process and return the output from a Chunk by name.
     *
     * @param string $chunk
     * @param array  $params
     *
     * @return string
     */
    public function getChunk($chunk, array $params = array())
    {
        if ($pdoTools = $this->msof->getPdoTools()) {
            return $pdoTools->getChunk($chunk, $params);
        }

        return $this->modx->getChunk($chunk, $params);
    }

    /**
     * Method for transform array to placeholders
     * @var array  $array With keys and values
     * @var string $prefix
     * @return array $array Two nested arrays With placeholders and values
     */
    public function makePlaceholders(array $array = array(), $prefix = '')
    {
        $result = array(
            'pl' => array(),
            'vl' => array(),
        );
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                $result = array_merge_recursive($result, $this->makePlaceholders($v, $prefix . $k . '.'));
            } else {
                $result['pl'][$prefix . $k] = '[[+' . $prefix . $k . ']]';
                $result['vl'][$prefix . $k] = $v;
            }
        }

        return $result;
    }

    /**
     * @param string $message
     * @param array  $data
     * @param array  $placeholders
     *
     * @return array|string
     */
    public function success($message = '', $data = array(), $placeholders = array())
    {
        $response = array(
            'success' => true,
            'message' => $this->modx->lexicon($message, $placeholders),
            'data' => $data,
        );

        return $this->msof->config['jsonResponse'] ? $this->modx->toJSON($response) : $response;
    }

    /**
     * @param string $message
     * @param array  $data
     * @param array  $placeholders
     *
     * @return array|string
     */
    public function failure($message = '', $data = array(), $placeholders = array())
    {
        $response = array(
            'success' => false,
            'message' => $this->modx->lexicon($message, $placeholders),
            'data' => $data,
        );

        return $this->msof->config['jsonResponse'] ? $this->modx->toJSON($response) : $response;
    }

    /**
     * @param $json
     *
     * @return int
     */
    public function isJSON($json)
    {
        $pcre_regex = '
            /
            (?(DEFINE)
               (?<number>   -? (?= [1-9]|0(?!\d) ) \d+ (\.\d+)? ([eE] [+-]? \d+)? )    
               (?<boolean>   true | false | null )
               (?<string>    " ([^"\\\\]* | \\\\ ["\\\\bfnrt\/] | \\\\ u [0-9a-f]{4} )* " )
               (?<array>     \[  (?:  (?&json)  (?: , (?&json)  )*  )?  \s* \] )
               (?<pair>      \s* (?&string) \s* : (?&json)  )
               (?<object>    \{  (?:  (?&pair)  (?: , (?&pair)  )*  )?  \s* \} )
               (?<json>   \s* (?: (?&number) | (?&boolean) | (?&string) | (?&array) | (?&object) ) \s* )
            )
            \A (?&json) \Z
            /six   
        ';

        return preg_match($pcre_regex, $json);
    }

    /**
     * @param string $path
     *
     * @return string
     */
    public function sanitizePath($path)
    {
        return preg_replace(array("/\.*[\/|\\\]/i", "/[\/|\\\]+/i"), array('/', '/'), $path);
    }
}