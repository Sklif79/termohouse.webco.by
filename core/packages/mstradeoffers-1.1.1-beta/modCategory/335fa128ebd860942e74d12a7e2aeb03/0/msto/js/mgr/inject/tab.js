Ext.ComponentMgr.onAvailable('minishop2-product-tabs', function() {
    this.on('beforerender', function() {

        this.add({
            title: _('msto_tab_title'),
            hideMode: 'offsets',
            items: [
                /* {
                 html: _('msto_tab_intro'),
                 cls: 'modx-page-header container',
                 border: false
                 },*/
                {
                    xtype: 'msto-product-prices-grid',
					cls: 'main-wrapper'
                }
            ]
        });
    });
});



