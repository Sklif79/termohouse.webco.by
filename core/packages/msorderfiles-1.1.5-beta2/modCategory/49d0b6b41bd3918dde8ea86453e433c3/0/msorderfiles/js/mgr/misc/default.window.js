msOrderFiles.window.Default = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        title: '',
        url: msOrderFiles.config['connector_url'],
        record: {},
        baseParams: {},
        fields: this.getFields(config),
        keys: this.getKeys(config),
        buttons: this.getButtons(config),
        listeners: this.getListeners(config),
        cls: (config['cls'] || 'modx-window') + ' msof-window',
        bodyCssClass: 'msof-window-tabs',
        width: 600,
        autoHeight: true,
        allowDrop: false,
    });
    msOrderFiles.window.Default.superclass.constructor.call(this, config);

    this.on('hide', function () {
        var w = this;
        window.setTimeout(function () {
            w.close();
        }, 200);
    });
};
Ext.extend(msOrderFiles.window.Default, MODx.Window, {
    getFields: function (config) {
        return [];
    },

    getButtons: function (config) {
        return [{
            text: config['cancelBtnText'] || _('cancel'),
            scope: this,
            handler: function () {
                (config['closeAction'] !== 'close')
                    ? this.hide()
                    : this.close();
            }
        }, {
            text: config['saveBtnText'] || _('save'),
            cls: 'primary-button',
            scope: this,
            handler: this.submit,
        }];
    },

    getKeys: function (config) {
        return [{
            key: Ext.EventObject.ENTER,
            shift: true,
            fn: function () {
                this.submit();
            }, scope: this
        }];
    },

    getListeners: function (config) {
        return {};
    },
});
Ext.reg('msof-window-default', msOrderFiles.window.Default);