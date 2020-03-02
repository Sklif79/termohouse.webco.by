msto.grid.Operation = function(config) {
    config = config || {};

    this.exp = new Ext.grid.RowExpander({
        expandOnDblClick: false,
        tpl: new Ext.Template('<p class="desc">{description}</p>'),
        renderer: function(v, p, record) {
            return record.data.description != '' && record.data.description != null ? '<div class="x-grid3-row-expander">&#160;</div>' : '&#160;';
        }
    });
    this.dd = function(grid) {
        this.dropTarget = new Ext.dd.DropTarget(grid.container, {
            ddGroup: 'dd',
            copy: false,
            notifyDrop: function(dd, e, data) {
                var store = grid.store.data.items;
                var target = store[dd.getDragData(e).rowIndex].id;
                var source = store[data.rowIndex].id;
                if (target != source) {
                    dd.el.mask(_('loading'), 'x-mask-loading');
                    MODx.Ajax.request({
                        url: msto.config.connector_url,
                        params: {
                            action: config.action || 'mgr/settings/operation/sort',
                            source: source,
                            target: target
                        },
                        listeners: {
                            success: {
                                fn: function(r) {
                                    dd.el.unmask();
                                    grid.refresh();
                                },
                                scope: grid
                            },
                            failure: {
                                fn: function(r) {
                                    dd.el.unmask();
                                },
                                scope: grid
                            }
                        }
                    });
                }
            }
        });
    };
    Ext.applyIf(config, {
        id: 'msto-grid-product-operation',
        url: msto.config.connector_url,
        baseParams: {
            action: 'mgr/settings/operation/getlist'
        },
        fields: ['id', 'name', 'description', 'color', 'active', 'editable'],
        autoHeight: true,
        paging: true,
        remoteSort: true,
        save_action: 'mgr/settings/operation/updatefromgrid',
        autosave: true,
        plugins: this.exp,
        columns: [this.exp, {
            header: _('msto_id'),
            dataIndex: 'id',
            width: 50,
            sortable: true
        }, {
            header: _('msto_name'),
            dataIndex: 'name',
            width: 100,
            sortable: true,
            editor: {
                xtype: 'textfield'
            }
        }, {
            header: _('msto_color'),
            dataIndex: 'color',
            renderer: this.renderColor,
            width: 50
        }, {
            header: _('msto_active'),
            dataIndex: 'active',
            sortable: true,
            width: 50,
            editor: {
                xtype: 'combo-boolean',
                renderer: 'boolean'
            }
        }],
        tbar: [
            /*{
             text: '<i class="icon icon-plus"></i> '+_('msto_btn_create')
             ,handler: this.createOperation
             ,scope: this
             }*/
        ],
        ddGroup: 'dd',
        enableDragDrop: true,
        listeners: {
            render: {
                fn: this.dd,
                scope: this
            }
        }
    });
    msto.grid.Operation.superclass.constructor.call(this, config);
};
Ext.extend(msto.grid.Operation, MODx.grid.Grid, {
    windows: {}

    ,
    getMenu: function() {
        var m = [];
        m.push({
            text: _('msto_menu_update'),
            handler: this.updateOperation
        });
        if (this.menu.record.editable) {
            m.push('-');
            m.push({
                text: _('msto_menu_remove'),
                handler: this.removeOperation
            });
        }
        this.addContextMenuItem(m);
    }

    ,
    renderColor: function(value) {
        return '<div style="width: 30px; height: 20px; border-radius: 3px; background: #' + value + '">&nbsp;</div>'
    }
    /* ,createOperation: function(btn,e) {
     if (this.windows.createOperation) {
     this.windows.createOperation.close();
     this.windows.createOperation.destroy();
     this.windows.createOperation = undefined;
     }
     if (!this.windows.createOperation) {
     this.windows.createOperation = MODx.load({
     xtype: 'msto-window-operation-create'
     ,id: 'msto-window-operation-create'
     ,fields: this.getOperationFields('create')
     ,listeners: {
     success: {fn:function() { this.refresh(); },scope:this}
     }
     });
     }
     this.windows.createOperation.fp.getForm().reset();
     this.windows.createOperation.fp.getForm().setValues({
     active: 1
     });
     this.windows.createOperation.show(e.target);
     }*/


    ,
    updateOperation: function(btn, e, row) {
        if (typeof(row) != 'undefined') {
            this.menu.record = row.data;
        }
        var id = this.menu.record.id;

        MODx.Ajax.request({
            url: msto.config.connector_url,
            params: {
                action: 'mgr/settings/operation/get',
                id: id
            },
            listeners: {
                success: {
                    fn: function(r) {

                        if (this.windows.updateOperation) {
                            try {
                                this.windows.updateOperation.close();
                                this.windows.updateOperation.destroy();
                            } catch (e) {}
                        }
                        this.windows.updateOperation = MODx.load({
                            xtype: 'msto-window-operation-update',
                            record: r.object,
                            fields: this.getOperationFields('update'),
                            listeners: {
                                success: {
                                    fn: function() {
                                        this.refresh();
                                    },
                                    scope: this
                                }
                            }
                        });
                        this.windows.updateOperation.fp.getForm().reset();
                        this.windows.updateOperation.show(e.target);
                        this.windows.updateOperation.fp.getForm().setValues(r.object);
                    },
                    scope: this
                }
            }
        });
    }

    ,
    removeOperation: function(btn, e) {
        if (!this.menu.record) return false;

        MODx.msg.confirm({
            title: _('msto_menu_remove') + '"' + this.menu.record.name + '"',
            text: _('msto_menu_remove_confirm'),
            url: this.config.url,
            params: {
                action: 'mgr/settings/operation/remove',
                id: this.menu.record.id
            },
            listeners: {
                success: {
                    fn: function(r) {
                        this.refresh();
                    },
                    scope: this
                }
            }
        });
    }

    ,
    getOperationFields: function(type) {

        var fields = [];
        var disabled = type == 'update' ? true : false;
        fields.push({
                xtype: 'hidden',
                name: 'id',
                id: 'msto-product-operation-id-' + type
            }, {
                xtype: 'hidden',
                name: 'color',
                id: 'msto-product-operation-color-' + type
            }, {
                xtype: 'textfield',
                fieldLabel: _('msto_name'),
                name: 'name',
                hiddenName: 'name',
                allowBlank: false,
                anchor: '99%',
                id: 'msto-product-operation-name-' + type
            }, {
                xtype: 'colorpalette',
                fieldLabel: _('msto_color'),
                id: 'msto-product-operation-colorpalette-' + type,
                listeners: {
                    select: function(palette, setColor) {
                        Ext.getCmp('msto-product-operation-color-' + type).setValue(setColor)
                    },
                    beforerender: function(palette) {
                        var color = Ext.getCmp('msto-product-operation-color-' + type).value;
                        if (color != 'undefined') {
                            palette.value = color;
                        }
                    }
                }
            }, {
                xtype: 'textarea',
                fieldLabel: _('msto_description'),
                name: 'description',
                anchor: '99%',
                id: 'msto-product-operation-description-' + type
            }, {
                xtype: 'xcheckbox',
                boxLabel: _('msto_active'),
                name: 'active',
                id: 'msto-product-operation-active-' + type
            }

        );

        return fields;
    }

});
Ext.reg('msto-grid-setting-operation', msto.grid.Operation);


msto.window.CreateOperation = function(config) {
    config = config || {};
    this.ident = config.ident || 'mecitem' + Ext.id();
    Ext.applyIf(config, {
        title: _('msto_menu_create'),
        id: this.ident,
        width: 600,
        autoHeight: true,
        labelAlign: 'left',
        labelWidth: 180,
        url: msto.config.connector_url,
        action: 'mgr/settings/operation/create',
        fields: config.fields,
        keys: [{
            key: Ext.EventObject.ENTER,
            shift: true,
            fn: function() {
                this.submit()
            },
            scope: this
        }]
    });
    msto.window.CreateOperation.superclass.constructor.call(this, config);
};
Ext.extend(msto.window.CreateOperation, MODx.Window);
Ext.reg('msto-window-operation-create', msto.window.CreateOperation);


msto.window.UpdateOperation = function(config) {
    config = config || {};
    this.ident = config.ident || 'meuitem' + Ext.id();
    Ext.applyIf(config, {
        title: _('msto_menu_update'),
        id: this.ident,
        width: 600,
        autoHeight: true,
        labelAlign: 'left',
        labelWidth: 180,
        url: msto.config.connector_url,
        action: 'mgr/settings/operation/update',
        fields: config.fields,
        keys: [{
            key: Ext.EventObject.ENTER,
            shift: true,
            fn: function() {
                this.submit()
            },
            scope: this
        }]
    });
    msto.window.UpdateOperation.superclass.constructor.call(this, config);
};
Ext.extend(msto.window.UpdateOperation, MODx.Window);
Ext.reg('msto-window-operation-update', msto.window.UpdateOperation);
