msOrderFiles.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'msof-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('msorderfiles') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('msorderfiles_items'),
                layout: 'anchor',
                items: [{
                    html: _('msorderfiles_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'msof-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    msOrderFiles.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(msOrderFiles.panel.Home, MODx.Panel);
Ext.reg('msof-panel-home', msOrderFiles.panel.Home);
