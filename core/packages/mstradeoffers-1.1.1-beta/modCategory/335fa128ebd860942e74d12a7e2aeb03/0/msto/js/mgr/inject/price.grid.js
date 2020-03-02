msto.grid.Price = function(config) {
	config = config || {};
	config.product_id = msto.product_id;

	this.sm = new Ext.grid.CheckboxSelectionModel();

	if (!config.menu) {
		config.menu = [];
	}
	config.menu.push({
		text: _('msto_price_selected_set_active'),
		handler: this.activeSelected,
		scope: this
	}, {
		text: _('msto_price_selected_set_inactive'),
		handler: this.inactiveSelected,
		scope: this
	});
	config.menu.push('-');
	config.menu.push({
		text: _('msto_price_selected_delete'),
		handler: this.deleteSelected,
		scope: this
	});


	if (!config.tbar) {
		config.tbar = [];
	}
	config.tbar.push({
		text: '<i class="icon icon-list"></i> ' + _('msto_bulk_actions'),
		menu: config.menu
	}, '-', {
		text: '<i class="icon icon-plus"></i> ' + _('msto_btn_create'),
		handler: this.createPrice,
		scope: this
	});

	MODx.Ajax.request({
		url: msto.config.connector_url,
		params: {
			action: 'mgr/price/getlist',
			product_id: config.product_id
		},
		listeners: {
			success: { fn: function(r){
				//console.log(r);
				},
				scope: this
			}
		}
	});

	Ext.applyIf(config, {
		id: 'msto-grid-product-price',
		url: msto.config.connector_url,
		baseParams: {
			action: 'mgr/price/getlist',
			product_id: config.product_id
		},
		fields: ['id', 'product_id', 'name', 'size', 'color', 'image', 'price', 'count', 'weight', 'article', 'rank', 'active'],
		columns: this.getColumns(),
		paging: true,
		autoHeight: true,
		remoteSort: true,
		sm: this.sm,
		save_action: 'mgr/price/updatefromgrid',
		autosave: true,
		save_callback: this.updateRow

	});
	msto.grid.Price.superclass.constructor.call(this, config);
};
Ext.extend(msto.grid.Price, MODx.grid.Grid, {

	getMenu: function() {
		var m = [];
		m.push({
			text: _('msto_menu_update'),
			handler: this.updatePrice
		});
		m.push({
			text: _('msto_menu_remove'),
			handler: this.removePrice
		});
		this.addContextMenuItem(m);
	},

	getColumns: function() {
		var columns = [this.sm];

		columns.push({
			header: _('msto_image'),
			dataIndex: 'image',
			width: 60,
			renderer: msto.utils.renderImage
		},{
			header: _('msto_article'),
			dataIndex: 'article',
			width: 75,
			sortable: true,
			editor: {
				xtype: 'textfield'
			}
		});

		if (MODx.config.msto_show_name != 0) {
			columns.push({
				header: _('msto_name'),
				dataIndex: 'name',
				width: 75,
			});
		}

		columns.push({
			header: _('msto_color'),
			dataIndex: 'color',
			width: 75,
			sortable: true
		});

		if (MODx.config.msto_show_size != 0) {
			columns.push({
				header: _('msto_size'),
				dataIndex: 'size',
				width: 75,
				sortable: true
			});
		}

		columns.push({
			header: _('msto_price'),
			dataIndex: 'price',
			width: 75,
			sortable: true,
			editor: {
				xtype: 'numberfield'
			}
		});

		if (MODx.config.msto_show_count != 0) {
			columns.push({
				header: _('msto_count'),
				dataIndex: 'count',
				width: 75,
				sortable: true,
				editor: {
					xtype: 'numberfield'
				},
				renderer: msto.utils.renderCount
			});
		}

		if (MODx.config.msto_show_weight != 0) {
			columns.push({
				header: _('msto_weight'),
				dataIndex: 'weight',
				width: 75,
				sortable: true,
				editor: {
					xtype: 'numberfield'
				},
			});
		}

		columns.push({
			header: _('msto_active'),
			dataIndex: 'active',
			sortable: true,
			width: 50,
			editor: {
				xtype: 'combo-boolean',
				renderer: 'boolean'
			}
		});

		return columns;
	},

	updateRow: function(response) {
		var row = response.object;
		var items = this.store.data.items;

		for (var i = 0; i < items.length; i++) {
			var item = items[i];
			if (item.id == row.id) {
				item.data = row;
			}
		}
	},

	createPrice: function(btn, e) {

		var product_id = btn.scope.config.product_id;

		if (this.windows.createPrice) {
			try {
				this.windows.createPrice.close();
				this.windows.createPrice.destroy();
				this.windows.createPrice = undefined;
			} catch (e) {}
		}

		if (!this.windows.createPrice) {
			this.windows.createPrice = MODx.load({
				xtype: 'msto-window-price-create',
				title: _('msto_btn_create'),
				fields: this.getPriceFields('create'),
				baseParams: {
					action: 'mgr/price/create'
				},
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
		this.windows.createPrice.fp.getForm().reset();
		this.windows.createPrice.fp.getForm().setValues({
			product_id: product_id,
			active: 1,
			count: 0
		});
		this.windows.createPrice.show(e.target);
	},

	updatePrice: function(btn, e, row) {
		if (typeof(row) != 'undefined') {
			this.menu.record = row.data;
		}
		var id = this.menu.record.id;
		var product_id = btn.scope.config.product_id;

		MODx.Ajax.request({
			url: msto.config.connector_url,
			params: {
				action: 'mgr/price/get',
				id: id
			},
			listeners: {
				success: {
					fn: function(r) {

						if (this.windows.updatePrice) {
							try {
								this.windows.updatePrice.close();
								this.windows.updatePrice.destroy();
							} catch (e) {}
						}
						this.windows.updatePrice = MODx.load({
							xtype: 'msto-window-price-update',
							record: r.object,
							fields: this.getPriceFields('update'),
							listeners: {
								success: {
									fn: function() {
										this.refresh();
									},
									scope: this
								}
							}
						});
						this.windows.updatePrice.fp.getForm().reset();
						this.windows.updatePrice.fp.getForm().setValues(r.object);
						this.windows.updatePrice.show(e.target);
					},
					scope: this
				}
			}
		});
	},

	getPriceFields: function(type) {

		var fields = [];
		var disabled = type == 'update' ? true : false;

		fields.push({
			xtype: 'hidden',
			name: 'id',
			id: 'msto-product-price-id-' + type
		},{
			xtype: 'hidden',
			name: 'product_id',
			id: 'msto-product-product_id-' + type
		}, {
			xtype: 'textfield',
			fieldLabel: _('msto_article'),
			name: 'article',
			allowBlank: false,
			anchor: '99%',
		 });

		 if (MODx.config.msto_show_name != 0) {
			fields.push({
				xtype: 'textfield',
			 	name: 'name',
			 	allowBlank: true,
				fieldLabel: _('msto_name'),
				anchor: '99%',
			});
		}

		 if (MODx.config.msto_show_desc != 0) {
			fields.push({
				xtype: 'textarea',
			 	name: 'desc',
			 	allowBlank: true,
				fieldLabel: _('msto_desc'),
				anchor: '99%',
			});
		}

		fields.push({
		 	xtype: 'msto-combo-options',
		 	name: 'color',
			fieldLabel: _('msto_color'),
			anchor: '99%',
			product_id: msto.product_id,
		 });

		if (MODx.config.msto_show_size != 0) {
			fields.push({
				xtype: 'msto-combo-options',
			 	name: 'size',
				fieldLabel: _('msto_size'),
				anchor: '99%',
				allowBlank: true,
				product_id: msto.product_id,
			});
		}

		fields.push({
			xtype: 'textfield',
			maskRe: /[0123456789\.\-]/,
			fieldLabel: _('msto_price'),
			name: 'price',
			hiddenName: 'price',
			allowBlank: false,
			anchor: '99%',
			id: 'msto-product-price-text-' + type
		});

		if (MODx.config.msto_show_count != 0) {
			fields.push({
				xtype: 'numberfield',
				fieldLabel: _('msto_count'),
				name: 'count',
				hiddenName: 'count',
				allowBlank: true,
				anchor: '99%',
				id: 'msto-product-price-count-' + type
			});
		}

		if (MODx.config.msto_show_weight != 0) {
			fields.push({
				xtype: 'numberfield',
				fieldLabel: _('msto_weight'),
				name: 'weight',
				hiddenName: 'weight',
				allowBlank: true,
				anchor: '99%',
				id: 'msto-product-price-weight-' + type
			});
		}

		fields.push({
			xtype: 'xcheckbox',
			fieldLabel: _('msto_active'),
			name: 'active',
		},
		/*{
			xtype: 'msto-gallery-images-view',
			cls: 'msto-gallery',
			product_id: msto.product_id,
			color: type == 'update' ?  this.menu.record.color : '',
		}, */
		{
			xtype: 'msto-gallery-page',
			cls: 'msto-gallery',
			record: {
				id: msto.product_id,
				color: type == 'update' ?  this.menu.record.color : '',
			}
		});

		return fields;
	},

	removePrice: function(btn, e) {
		if (this.menu.record) {
			MODx.msg.confirm({
				title: _('msto_menu_remove'),
				text: _('msto_menu_remove_confirm'),
				url: msto.config.connector_url,
				params: {
					action: 'mgr/price/remove',
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
	},

	deleteSelected: function(btn, e) {
		var cs = this.getSelectedAsList();
		if (cs === false) return false;

		MODx.msg.confirm({
			title: _('msto_menu_remove'),
			text: _('msto_menu_remove_multiple_confirm'),
			url: msto.config.connector_url,
			params: {
				action: 'mgr/price/delete_multiple',
				ids: cs
			},
			listeners: {
				'success': {
					fn: function(r) {
						this.getSelectionModel().clearSelections(true);
						this.refresh();
					},
					scope: this
				}
			}
		});

		return true;
	},

	activeSelected: function(btn, e) {
		var cs = this.getSelectedAsList();
		if (cs === false) return false;

		MODx.msg.confirm({
			title: _('msto_menu_active'),
			text: _('msto_menu_active_multiple_confirm'),
			url: msto.config.connector_url,
			params: {
				action: 'mgr/price/active_multiple',
				ids: cs,
				value: 1
			},
			listeners: {
				'success': {
					fn: function(r) {
						this.getSelectionModel().clearSelections(true);
						this.refresh();
					},
					scope: this
				}
			}
		});

		return true;
	},

	inactiveSelected: function(btn, e) {
		var cs = this.getSelectedAsList();
		if (cs === false) return false;

		MODx.msg.confirm({
			title: _('msto_menu_inactive'),
			text: _('msto_menu_inactive_multiple_confirm'),
			url: msto.config.connector_url,
			params: {
				action: 'mgr/price/active_multiple',
				ids: cs,
				value: 0
			},
			listeners: {
				'success': {
					fn: function(r) {
						this.getSelectionModel().clearSelections(true);
						this.refresh();
					},
					scope: this
				}
			}
		});

		return true;
	}

});
Ext.reg('msto-product-prices-grid', msto.grid.Price);


msto.window.CreatePrice = function(config) {
	config = config || {};
	this.ident = config.ident || 'meuitem' + Ext.id();
	Ext.applyIf(config, {
		title: _('msto_menu_create'),
		id: this.ident,
		width: 500,
		autoHeight: true,
		labelAlign: 'left',
		url: msto.config.connector_url,
		action: 'mgr/price/create',
		fields: config.fields,
		cls: 'msto-offer-window',
		keys: [{
			key: Ext.EventObject.ENTER,
			shift: true,
			fn: function() {
				this.submit()
			},
			scope: this
		}]
	});
	msto.window.CreatePrice.superclass.constructor.call(this, config);

	this.on('resize', function() {
		window.setTimeout(function() {
            var height = document.getElementById('msto-gallery-images-view').firstChild.nextSibling.clientHeight - 3;
			document.getElementById('msto-resource-upload-btn').setAttribute("style","height:" + height + "px");
        }, 200);
	});

	this.on('hide', function() {
        var w = this;
        window.setTimeout(function() {
            w.close();
        }, 200);
    });
};
Ext.extend(msto.window.CreatePrice, MODx.Window);
Ext.reg('msto-window-price-create', msto.window.CreatePrice);


msto.window.UpdatePrice = function(config) {
	config = config || {};
	this.ident = config.ident || 'meuitem' + Ext.id();
	Ext.applyIf(config, {
		title: _('msto_menu_update'),
		id: this.ident,
		width: 500,
		autoHeight: true,
		labelAlign: 'left',
		url: msto.config.connector_url,
		action: 'mgr/price/update',
		fields: config.fields,
		cls: 'msto-offer-window',
		keys: [{
			key: Ext.EventObject.ENTER,
			shift: true,
			fn: function() {
				this.submit()
			},
			scope: this
		}]
	});
	msto.window.UpdatePrice.superclass.constructor.call(this, config);

	this.on('resize', function() {
		window.setTimeout(function() {
            var height = document.getElementById('msto-gallery-images-view').firstChild.nextSibling.clientHeight - 3;
			document.getElementById('msto-resource-upload-btn').setAttribute("style","height:" + height + "px");
        }, 200);
	});

	this.on('hide', function() {
        var w = this;
        window.setTimeout(function() {
            w.close();
        }, 200);
    });
};
Ext.extend(msto.window.UpdatePrice, MODx.Window);
Ext.reg('msto-window-price-update', msto.window.UpdatePrice);