Ext.ComponentMgr.onAvailable('minishop2-window-order-update', function (w) {
    msOrderFiles.config['order_id'] = w.record['id'] || 0;
    msOrderFiles.config['user_id'] = w.record['user_id'] || 0;

    w.fields.items.push({
        xtype: 'msof-grid-files',
        title: _('msorderfiles_order_tab'),
        order_id: msOrderFiles.config['order_id'],
    });
});