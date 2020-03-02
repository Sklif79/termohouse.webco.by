msOrderFiles.grid.Files = function (config) {
    config = config || {};
    if (!config['id']) {
        config['id'] = 'msof-grid-files';
    }
    config['actionPrefix'] = 'mgr/file/';
    Ext.applyIf(config, {
        baseParams: {
            action: config['actionPrefix'] + 'getlist',
            order_id: config['order_id'] || 0,
            sort: 'id',
            dir: 'DESC',
        },
        multi_select: true,
        pageSize: Math.round(MODx.config['default_per_page'] / 2),

        ddGroup: 'msof-files',
        ddAction: config['actionPrefix'] + 'sort',
        enableDragDrop: true,
    });
    msOrderFiles.grid.Files.superclass.constructor.call(this, config);
};
Ext.extend(msOrderFiles.grid.Files, msOrderFiles.grid.Default, {
    getFields: function (config) {
        return [
            'id',
            'createdby',
            'createdby_formatted',
            'name',
            'description',
            'active',
            'actions'
        ];
    },

    getColumns: function (config) {
        return [{
            header: _('msorderfiles_grid_id'),
            dataIndex: 'id',
            width: 70,
            sortable: true,
            fixed: true,
            resizable: false,
            hidden: true,
        }, {
            header: _('msorderfiles_grid_user'),
            dataIndex: 'createdby_formatted',
            width: 120,
            sortable: true,
            renderer: function (val, p, rec) {
                if (rec.data['createdby']) {
                    return String.format('<a href="?a=security/user/update&id={0}" class="msof-link">{1}</a>', rec.data['createdby'], Ext.util.Format.htmlEncode(val));
                }

                return Ext.util.Format.htmlEncode(val);
            },
        }, {
            header: _('msorderfiles_grid_name'),
            dataIndex: 'name',
            width: 200,
            sortable: true,
            renderer: function (val, cell, row) {
                return msOrderFiles.utils.fileLink(val, row.json['url']);
            }
        }, {
            header: _('msorderfiles_grid_description'),
            dataIndex: 'description',
            width: 250,
            sortable: false,
            hidden: true,
        }, {
            header: _('msorderfiles_grid_active'),
            dataIndex: 'active',
            width: 70,
            sortable: true,
            fixed: true,
            resizable: false,
            renderer: msOrderFiles.utils.renderBoolean,
        }, {
            header: _('msorderfiles_grid_actions'),
            dataIndex: 'actions',
            id: 'actions',
            width: 120,
            sortable: false,
            fixed: true,
            resizable: false,
            renderer: msOrderFiles.utils.renderActions,
        }];
    },

    getTopBar: function (config) {
        return [{
            text: '<i class="icon icon-upload"></i>&nbsp;' + _('msorderfiles_button_upload'),
            cls: 'primary-button',
            handler: this.uploadFiles,
            scope: this,
        }, '->', this.getSearchField(config)];
    },

    getListeners: function (config) {
        return {
            rowDblClick: function (grid, rowIndex, e) {
                var row = grid.store.getAt(rowIndex);
                this.updateFile(grid, e, row);
            },
        };
    },

    uploadFiles: function (btn, e) {
        if (!this.uploader) {
            this.uploader = new MODx.util.MultiUploadDialog.Dialog({
                url: this.config['url'],
                base_params: {
                    action: this['actionPrefix'] + 'upload',
                    order_id: this.config['order_id'],
                    source: msOrderFiles.config['media_source'] || MODx.config['default_media_source'],
                    wctx: MODx.ctx || '',
                },
                permitted_extensions: msOrderFiles.config['file_extensions'] || MODx.config['upload_files'].toLowerCase().split(','),
                cls: 'ext-ux-uploaddialog-dialog modx-upload-window',
            });
            this.uploader.on('hide', function () {
                this.getBottomToolbar().changePage(1);
            }, this);
            this.uploader.on('close', function () {
                this.getBottomToolbar().changePage(1);
            }, this);
        }
        this.uploader.show(btn);
    },

    updateFile: function (btn, e, row) {
        if (typeof(row) != 'undefined') {
            this.menu.record = row.data;
        } else if (!this.menu.record) {
            return false;
        }
        var id = this.menu.record.id;

        MODx.Ajax.request({
            url: this.config['url'],
            params: {
                action: this['actionPrefix'] + 'get',
                id: id,
            },
            listeners: {
                success: {
                    fn: function (r) {
                        var w = MODx.load({
                            xtype: 'msof-window-file-update',
                            id: Ext.id(),
                            record: r,
                            listeners: {
                                success: {
                                    fn: function () {
                                        this.refresh();
                                    },
                                    scope: this
                                },
                                failure: {fn: this._listenerHandler, scope: this},
                            },
                        });
                        w.reset();
                        w.setValues(r.object);
                        w.show(e.target);
                    }, scope: this
                },
                failure: {fn: this._listenerHandler, scope: this},
            }
        });
    },

    enableFile: function () {
        this.loadMask.show();
        return this._doAction('enable');
    },

    disableFile: function () {
        this.loadMask.show();
        return this._doAction('disable');
    },

    removeFile: function () {
        return this._doAction('remove', null, true);
    },
});
Ext.reg('msof-grid-files', msOrderFiles.grid.Files);