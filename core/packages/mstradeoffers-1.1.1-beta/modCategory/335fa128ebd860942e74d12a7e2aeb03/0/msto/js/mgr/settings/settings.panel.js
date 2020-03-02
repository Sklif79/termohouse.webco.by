msto.page.Settings = function(config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'msto-panel-settings',
            renderTo: 'msto-panel-settings-div'
        }]
    });
    msto.page.Settings.superclass.constructor.call(this, config);
};
Ext.extend(msto.page.Settings, MODx.Component);
Ext.reg('msto-page-settings', msto.page.Settings);

msto.panel.Settings = function(config) {
    config = config || {};
    Ext.apply(config, {
        border: false,
        deferredRender: true,
        baseCls: 'modx-formpanel',
        items: [{
            html: '<h2>' + _('msto') + ' :: ' + _('msto_settings') + '</h2>',
            border: false,
            cls: 'modx-page-header container'
        }, {
            xtype: 'modx-tabs',
            id: 'msto-settings-tabs',
            bodyStyle: 'padding: 10px',
            defaults: {
                border: false,
                autoHeight: true
            },
            border: true,
            hideMode: 'offsets'

            ,
            items: [{
                title: _('msto_setting_option'),
                items: [{
                    html: '<p>' + _('msto_setting_option_intro') + '</p>',
                    border: false,
                    bodyCssClass: 'panel-desc',
                    bodyStyle: 'margin-bottom: 10px'
                }, {
                    xtype: 'msto-grid-setting-option'
                }]
            }, {
                title: _('msto_setting_operation'),
                items: [{
                    html: '<p>' + _('msto_setting_operation_intro') + '</p>',
                    border: false,
                    bodyCssClass: 'panel-desc',
                    bodyStyle: 'margin-bottom: 10px'
                }, {
                    xtype: 'msto-grid-setting-operation'
                }]
            }, {
                title: _('msto_lexicon_editor'),
                items: [{
                    html: '<p>' + _('msto_lexicon_editor_intro') + '</p>',
                    border: false,
                    bodyCssClass: 'panel-desc',
                    bodyStyle: 'margin-bottom: 10px'
                }, {
                    // xtype: 'msto-grid-lexicon'
                }]
            }]

        }]
    });
    msto.panel.Settings.superclass.constructor.call(this, config);
};
Ext.extend(msto.panel.Settings, MODx.Panel);
Ext.reg('msto-panel-settings', msto.panel.Settings);
