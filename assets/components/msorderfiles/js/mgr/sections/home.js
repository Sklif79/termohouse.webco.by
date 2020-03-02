msOrderFiles.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'msof-panel-home',
            renderTo: 'msof-panel-home-div'
        }]
    });
    msOrderFiles.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(msOrderFiles.page.Home, MODx.Component);
Ext.reg('msof-page-home', msOrderFiles.page.Home);