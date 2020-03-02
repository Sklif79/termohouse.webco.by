/**
 * Вкладки/поля для окон добавления/редактирования
 *
 * @param config
 * @returns {{object}}
 * @constructor
 */
msOrderFiles.fields.File = function (config) {
    var data = config['record'] ? config.record['object'] : null;
    var r = [];

    r.push({
        layout: 'column',
        border: false,
        style: {marginTop: '0px'},
        anchor: '100%',
        items: [{
            columnWidth: .5,
            layout: 'form',
            style: {marginRight: '5px'},
            items: [{
                html: '<div style="margin: 17px 0 0; text-align: left;"><a href="' + data['url'] + '" target="_blank">' + _('msorderfiles_button_open') + '</a></div>',
            }, {
                xtype: 'textfield',
                id: config['id'] + '-name',
                name: 'name',
                fieldLabel: _('msorderfiles_field_name'),
                anchor: '100%',
            }, {
                xtype: 'textfield',
                id: config['id'] + '-file',
                name: 'file',
                fieldLabel: _('msorderfiles_field_file'),
                anchor: '100%',
            }],
        }, {
            columnWidth: .5,
            layout: 'form',
            style: {marginLeft: '5px'},
            items: [{
                xtype: 'textarea',
                id: config['id'] + '-description',
                name: 'description',
                fieldLabel: _('msorderfiles_field_description'),
                height: 137,
                anchor: '100%',
            }],
        }],
    }, {
        xtype: 'xcheckbox',
        id: config['id'] + '-active',
        name: 'active',
        boxLabel: _('msorderfiles_field_active'),
        hideLabel: true,
    });

    if (data) {
        r.push({
            xtype: 'hidden',
            id: config['id'] + '-id',
            name: 'id',
        });
    }

    return r;
};

/**
 * Окно редактирования файла
 *
 * @param config
 * @constructor
 */
msOrderFiles.window.UpdateFile = function (config) {
    config = config || {};
    if (!config['id']) {
        config['id'] = 'msof-window-file-update';
    }
    Ext.applyIf(config, {
        title: _('msorderfiles_window_file_update'),
        baseParams: {
            action: 'mgr/file/update',
        },
        modal: true,
        resizable: false,
        maximizable: false,
        minimizable: false,
    });
    msOrderFiles.window.UpdateFile.superclass.constructor.call(this, config);
};
Ext.extend(msOrderFiles.window.UpdateFile, msOrderFiles.window.Default, {
    getFields: function (config) {
        return msOrderFiles.fields.File(config);
    },
});
Ext.reg('msof-window-file-update', msOrderFiles.window.UpdateFile);