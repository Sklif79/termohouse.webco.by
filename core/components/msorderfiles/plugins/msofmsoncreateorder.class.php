<?php

/**
 *
 */
class msofmsOnCreateOrder extends msofPlugin
{
    public function run()
    {
        $sp = &$this->sp;
        $modx = &$this->modx;
        $msof = &$this->msof;
        $order = &$sp['msOrder'];

        $condition = array(
            'order_id' => 0,
            'createdby' => (int)$modx->user->id,
            'context_key' => $order->context,
            'session' => session_id(),
        );
        if ($files = $modx->getIterator('msOrderFile', $condition)) {
            /** @var msOrderFile $file */
            foreach ($files as $file) {
                $file->fromArray(array(
                    'order_id' => $order->id,
                    'createdby' => $order->user_id,
                ));
                $file->save();

                // $data = $file->toArray();
                // $data['url'] = $msof->Tools->sanitizePath(MODX_BASE_PATH . $data['url']);
                // $response = $msof->Tools->runProcessor('mgr/file/upload', array(
                //     'file' => $data['url'],
                //     'remove_tmp_file' => false,
                //     'order_id' => $order->id,
                //     'createdby' => $order->user_id,
                //     'source' => $data['source'],
                //     'ctx' => $data['context_key'],
                //     'session' => $data['session'],
                //     'name' => $data['name'],
                //     'description' => $data['description'],
                //     'properties' => $data['properties'],
                // ));
                // if ($errors = $msof->Tools->formatProcessorErrors($response)) {
                //     $modx->log(modX::LOG_LEVEL_ERROR, print_r($errors, 1));
                // }
                // $file->remove();
            }
        }
    }
}