msto.grid.Option = function(config) {
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
                            action: config.action || 'mgr/settings/option/sort',
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
        id: 'msto-grid-product-option',
        url: msto.config.connector_url,
        baseParams: {
            action: 'mgr/settings/option/getlist'
        },
        fields: ['id', 'name', 'key', 'description', 'active', 'editable', 'remains', 'weight', 'article'],
        autoHeight: true,
        paging: true,
        remoteSort: true,
        save_action: 'mgr/settings/option/updatefromgrid',
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
            header: _('msto_key'),
            dataIndex: 'key',
            width: 100,
            sortable: true
        }, {
            header: _('msto_remains'),
            dataIndex: 'remains',
            sortable: true,
            width: 50,
            editor: {
                xtype: 'combo-boolean',
                renderer: 'boolean'
            }
        }, {
            header: _('msto_weight'),
            dataIndex: 'weight',
            sortable: true,
            width: 50,
            editor: {
                xtype: 'combo-boolean',
                renderer: 'boolean'
            }
        }, {
            header: _('msto_article'),
            dataIndex: 'article',
            sortable: true,
            width: 50,
            editor: {
                xtype: 'combo-boolean',
                renderer: 'boolean'
            }
        }, {
            header: _('msto_active'),
            dataIndex: 'active',
            sortable: true,
            width: 50,
            editor: {
                xtype: 'combo-boolean',
                renderer: 'boolean'
            }
        }

        ],
        tbar: [{
            text: '<i class="icon icon-plus"></i> ' + _('msto_btn_create'),
            handler: this.createOption,
            scope: this
        }],
        ddGroup: 'dd',
        enableDragDrop: true,
        listeners: {
            render: {
                fn: this.dd,
                scope: this
            }
        }
    });
    msto.grid.Option.superclass.constructor.call(this, config);
};
Ext.extend(msto.grid.Option, MODx.grid.Grid, {
    windows: {}

    ,
    getMenu: function() {
        var m = [];
        m.push({
            text: _('msto_menu_update'),
            handler: this.updateOption
        });
        if (this.menu.record.editable) {
            m.push('-');
            m.push({
                text: _('msto_menu_remove'),
                handler: this.removeOption
            });
        }
        this.addContextMenuItem(m);
    }

    ,
    createOption: function(btn, e) {
        if (this.windows.createOption) {
            this.windows.createOption.close();
            this.windows.createOption.destroy();
            this.windows.createOption = undefined;
        }
        if (!this.windows.createOption) {
            this.windows.createOption = MODx.load({
                xtype: 'msto-window-option-create',
                id: 'msto-window-option-create',
                fields: this.getOptionFields('create'),
                listeners: {
                    success: {
                        fn: function() {
                            this.refresh();
                        },
                        scope: this
                    }
                }
            });
        }
        this.windows.createOption.fp.getForm().reset();
        this.windows.createOption.fp.getForm().setValues({
            active: 1
        });
        this.windows.createOption.show(e.target);
    }


    ,
    updateOption: function(btn, e, row) {
        if (typeof(row) != 'undefined') {
            this.menu.record = row.data;
        }
        var id = this.menu.record.id;

        MODx.Ajax.request({
            url: msto.config.connector_url,
            params: {
                action: 'mgr/settings/option/get',
                id: id
            },
            listeners: {
                success: {
                    fn: function(r) {

                        if (this.windows.updateOption) {
                            try {
                                this.windows.updateOption.close();
                                this.windows.updateOption.destroy();
                            } catch (e) {}
                        }
                        this.windows.updateOption = MODx.load({
                            xtype: 'msto-window-option-update',
                            record: r.object,
                            fields: this.getOptionFields('update'),
                            listeners: {
                                success: {
                                    fn: function() {
                                        this.refresh();
                                    },
                                    scope: this
                                }
                            }
                        });
                        this.windows.updateOption.fp.getForm().reset();
                        this.windows.updateOption.show(e.target);
                        this.windows.updateOption.fp.getForm().setValues(r.object);
                    },
                    scope: this
                }
            }
        });
    }

    ,
    removeOption: function(btn, e) {
        if (!this.menu.record) return false;

        MODx.msg.confirm({
            title: _('msto_menu_remove') + '"' + this.menu.record.name + '"',
            text: _('msto_menu_remove_confirm'),
            url: this.config.url,
            params: {
                action: 'mgr/settings/option/remove',
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
    getOptionFields: function(type) {

        var fields = [];
        var disabled = type == 'update' ? true : false;
        fields.push({
                xtype: 'hidden',
                name: 'id',
                id: 'msto-product-option-id-' + type
            }, {
                xtype: 'textfield',
                fieldLabel: _('msto_name'),
                name: 'name',
                hiddenName: 'name',
                allowBlank: false,
                anchor: '99%',
                id: 'msto-product-option-name-name-' + type
            }, {
                xtype: 'msto-combo-product-key',
                disabled: disabled,
                fieldLabel: _('msto_key'),
                name: 'key',
                hiddenName: 'key',
                allowBlank: false,
                anchor: '99%',
                id: 'msto-product-option-key-' + type
            }, {
                xtype: 'textarea',
                fieldLabel: _('msto_description'),
                name: 'description',
                anchor: '99%',
                id: 'msto-product-option-description-' + type
            }

            , {
                xtype: 'checkboxgroup',
                columns: 2,
                items: [{
                    xtype: 'xcheckbox',
                    boxLabel: _('msto_remains'),
                    name: 'remains',
                    id: 'msto-product-option-remains-' + type
                }, {
                    xtype: 'xcheckbox',
                    boxLabel: _('msto_weight'),
                    name: 'weight',
                    id: 'msto-product-option-weight-' + type
                }, {
                    xtype: 'xcheckbox',
                    boxLabel: _('msto_active'),
                    name: 'active',
                    id: 'msto-product-option-active-' + type
                }],
                id: 'msto-product-option-group-' + type
            }

        );

        return fields;
    }

});
Ext.reg('msto-grid-setting-option', msto.grid.Option);


msto.window.CreateOption = function(config) {
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
        action: 'mgr/settings/option/create',
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
    msto.window.CreateOption.superclass.constructor.call(this, config);
};
Ext.extend(msto.window.CreateOption, MODx.Window);
Ext.reg('msto-window-option-create', msto.window.CreateOption);


msto.window.UpdateOption = function(config) {
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
        action: 'mgr/settings/option/update',
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
    msto.window.UpdateOption.superclass.constructor.call(this, config);
};
Ext.extend(msto.window.UpdateOption, MODx.Window);
Ext.reg('msto-window-option-update', msto.window.UpdateOption);
