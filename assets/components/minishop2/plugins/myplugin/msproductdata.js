miniShop2.plugin.pluginname = { //pluginname не изменяем.
    getFields: function(config) {
        return {
			  currency: {
                xtype: 'combo-currency'
								,name: 'currency'
								,hiddenName: 'currency'
                ,description: '<b>[[+currency]]</b><br />' + _('ms2_product_currency_help')
            },
        europrice: {
            xtype: 'numberfield',
            decimalPrecision: 2,
            description: '<b>[[+europrice]]</b><br />' + _('ms2_product_europrice_help')
        },
        europrice_old: {
            xtype: 'numberfield',
            decimalPrecision: 2,
            description: '<b>[[+europrice]]</b><br />' + _('ms2_product_europrice_help')
        },
        }
    }
    ,getColumns: function() {
        return {
            currency: {width:50, sortable:false, editor: {xtype:'combo-currency', renderer: 'true'}},
            europrice: {width:50, sortable:false, editor: {xtype: 'numberfield'}},
            europrice_old: {width:50, sortable:false, editor: {xtype: 'numberfield'}},
       }
    }
};

miniShop2.combo.currency = function(config) {
    config = config || {};
    Ext.applyIf(config,{
        store: new Ext.data.ArrayStore({
            id: 0
            ,fields: ['currency','display']
            ,data: [
                ['0','BYN']
                ,['1','RUB']
                ,['2','EUR']
            ]
        })
        ,mode: 'local'
        ,displayField: 'display'
        ,valueField: 'currency'
    });
    miniShop2.combo.currency.superclass.constructor.call(this,config);
};
Ext.extend(miniShop2.combo.currency,MODx.combo.ComboBox);
Ext.reg('combo-currency',miniShop2.combo.currency);