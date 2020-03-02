Ext.namespace('msto.combo');

msto.combo.Options = function(config) {
    config = config || {};
    Ext.applyIf(config, {
        xtype: 'superboxselect',
        allowBlank: false,
        allowAddNewData: true,
        addNewDataOnBlur: false,
        msgTarget: 'under',
        resizable: true,
        forceFormValue: false,
        name: config.name,
        anchor: '100%',
        minChars: 2,
        pageSize: 10,
        store: new Ext.data.JsonStore({
            id: (config.name || 'tags') + '-msbe-minishop2-options',
            root: 'results',
            autoLoad: false,
            autoSave: false,
            totalProperty: 'total',
            fields: [config.name],
            url: msto.config.connector_url,
            baseParams: {
                action: 'mgr/misc/product/options/' + config.name,
                product_id: config.product_id,
            }
        }),
        mode: 'remote',
        displayField: config.name,
        valueField: config.name,
		originalName: config.name,
        triggerAction: 'all',
        extraItemCls: 'x-tag',
        expandBtnCls: 'x-form-trigger',
        clearBtnCls: 'x-form-trigger',
		 listeners: {
            beforeadditem: function() {
				this.removeAllItems();
			},
			additem: function(bs, value, f){
				if(this.name != 'color') return;
				Ext.getCmp('msto-gallery-images-view').getStore().reload({ params: { color: value } });
			},
			beforeremoveitem: function(bs, v, f){
				if(this.name != 'color') return;
				Ext.getCmp('msto-gallery-images-view').getStore().reload({ params: { color: '' } });
			}
        },
    });

    msto.combo.Options.superclass.constructor.call(this, config);
};
Ext.extend(msto.combo.Options, Ext.ux.form.SuperBoxSelect);
Ext.reg('msto-combo-options', msto.combo.Options);



//
msto.panel.Gallery = function (config) {
    config = config || {};

    Ext.apply(config, {
        border: false,
        id: 'msto-gallery-page',
        baseCls: 'x-panel',
        items: [/* {
            border: false,
            xtype: 'msto-gallery-page-toolbar',
            id: 'msto-gallery-page-toolbar',
            record: config.record,
        }, */ {
            border: false,
            layout: 'anchor',
            items: [{
                border: false,
                xtype: 'msto-gallery-images-panel',
                id: 'msto-gallery-images-panel',
                cls: 'modx-pb-view-ct',
                product_id: config.record.id,
				color: config.record.color,
                pageSize: config.pageSize
            }]
        }]
    });
  msto.panel.Gallery.superclass.constructor.call(this, config);

    this.on('afterrender', function () {
        var gallery = this;
        window.setTimeout(function() {
            gallery.initialize();
        }, 100);
    });
};
Ext.extend(msto.panel.Gallery, MODx.Panel, {
    errors: '',
    progress: null,

    initialize: function () {
        if (this.initialized) {
            return;
        }
        this._initUploader();

        var el = document.getElementById(this.id);
        el.addEventListener('dragenter', function () {
            this.className += ' drag-over';
        }, false);
        el.addEventListener('dragleave', function () {
            this.className = this.className.replace(' drag-over', '');
        }, false);
        el.addEventListener('drop', function () {
            this.className = this.className.replace(' drag-over', '');
        }, false);

        this.initialized = true;
    },

    _initUploader: function () {

        var params = {
            action: 'mgr/gallery/upload',
            id: this.record.id,
            source: this.record.source,
            ctx: 'mgr',
            HTTP_MODAUTH: MODx.siteId
        };

        this.uploader = new plupload.Uploader({
            url: miniShop2.config.connector_url + '?' + Ext.urlEncode(params),
            browse_button: 'msto-resource-upload-btn',
            container: this.id,
            drop_element: this.id,
            multipart: true,
            max_file_size: miniShop2.config.media_source.maxUploadSize || 10485760,
            filters: [{
                title: "Image files",
                extensions: miniShop2.config.media_source.allowedFileTypes || 'jpg,jpeg,png,gif'
            }],
            resize: {
                width: miniShop2.config.media_source.maxUploadWidth || 1920,
                height: miniShop2.config.media_source.maxUploadHeight || 1080
            }
        });

        var uploaderEvents = ['FilesAdded', 'FileUploaded', 'QueueChanged', /*'UploadFile',*/ 'UploadProgress', 'UploadComplete'];
        Ext.each(uploaderEvents, function (v) {
            var fn = 'on' + v;
            this.uploader.bind(v, this[fn], this);
        }, this);
        this.uploader.init();
    },

    onFilesAdded: function () {
        this.updateList = true;
    },

    removeFile: function (id) {
        this.updateList = true;
        var f = this.uploader.getFile(id);
        this.uploader.removeFile(f);
    },

    onQueueChanged: function (up) {
        if (this.updateList) {
            if (this.uploader.files.length > 0) {
                this.progress = Ext.MessageBox.progress(_('please_wait'));
                this.uploader.start();
            }
            else if (this.progress) {
                this.progress.hide();
            }
            up.refresh();
        }
    },

    /*
    onUploadFile: function (uploader, file) {
        this.updateFile(file);
    },
    */

    onUploadProgress: function (uploader, file) {
        if (this.progress) {
            this.progress.updateText(file.name);
            this.progress.updateProgress(file.percent / 100);
        }
    },

    onUploadComplete: function (x,y,z) {
        if (this.progress) {
            this.progress.hide();
        }
        if (this.errors.length > 0) {
            this.fireAlert();
        }
        this.resetUploader();

		var panel = Ext.getCmp('msto-gallery-images-panel');
        if (panel) {
            panel.view.getStore().reload();
            // Update thumbnail
            /* MODx.Ajax.request({
                url: miniShop2.config.connector_url,
                params: {
                    action: 'mgr/product/get',
                    id: this.record.id
                },
                listeners: {
                    success: {fn: function(r) {
                        panel.view.updateThumb(r.object['thumb']);
                    }}
                }
            }); */
        }
    },

    onFileUploaded: function (uploader, file, xhr) {
        var r = Ext.util.JSON.decode(xhr.response);
        if (!r.success) {
            this.addError(file.name, r.message);
        }
    },

    resetUploader: function () {
        this.uploader.files = {};
        this.uploader.destroy();
        this.errors = '';
        this._initUploader();
    },

    addError: function (file, message) {
        this.errors += file + ': ' + message + '<br/>';
    },

    fireAlert: function () {
        MODx.msg.alert(_('ms2_errors'), this.errors);
    },

    /*
     updateFile: function(file) {
     this.uploadGrid.updateFile(file);
     },
     */

});
Ext.reg('msto-gallery-page', msto.panel.Gallery);




//
msto.panel.Images = function (config) {
    config = config || {};

    this.view = MODx.load({
        xtype: 'msto-gallery-images-view',
        id: 'msto-gallery-images-view',
        cls: 'minishop2-gallery-images',
        containerScroll: true,
        pageSize: 0,
        product_id: config.product_id,
		color: config.color,
        emptyText: _('msto_gallery_empty'),
    });

    Ext.applyIf(config, {
        id: 'msto-gallery-images-panel',
        cls: 'browser-view',
        border: false,
        items: [{
			xtype: 'button',
            id: 'msto-resource-upload-btn',
            text: _('msto_gallery_upload_btn')
		}, this.view],
        tbar: this.getTopBar(config),
        bbar: this.getBottomBar(config),
    });
    msto.panel.Images.superclass.constructor.call(this, config);

    var dv = this.view;
    dv.on('render', function () {
        dv.dragZone = new miniShop2.DragZone(dv);
        dv.dropZone = new miniShop2.DropZone(dv);
    });
};
Ext.extend(msto.panel.Images, MODx.Panel, {
	getTopBar: function () {},
    getBottomBar: function () {},
});
Ext.reg('msto-gallery-images-panel', msto.panel.Images);




//
msto.view.Images = function (config) {
    config = config || {};

    this._initTemplates();

    Ext.applyIf(config, {
        url: msto.config.connector_url,
        fields: [
            'id', 'product_id', 'name', 'description', 'url', 'createdon', 'createdby', 'file', 'test', 'checked',
            'thumbnail', 'source', 'source_name', 'type', 'rank', 'active', 'properties', 'class',
            'add', 'alt', 'actions'
        ],
        id: 'msto-gallery-images-view',
        baseParams: {
            action: 'mgr/gallery/getlist',
            product_id: config.product_id,
            color: config.color,
            parent: 0,
            type: 'image',
            limit: 0
        },
        //loadingText: _('loading'),
        enableDD: true,
        multiSelect: true,
        tpl: this.templates.thumb,
        itemSelector: 'div.modx-browser-thumb-wrap',
        listeners: {},
        prepareData: this.formatData.createDelegate(this)
    });
    msto.view.Images.superclass.constructor.call(this, config);

	this.addEvents('sort', 'select');
    this.on('sort', this.onSort, this);

    var widget = this;
    /* this.getStore().on('beforeload', function () {
        widget.getEl().mask(_('loading'), 'x-mask-loading');
    });
    this.getStore().on('load', function () {
        widget.getEl().unmask();
    }); */
};
Ext.extend(msto.view.Images, MODx.DataView, {

    templates: {},
    windows: {},

    onSort: function (o) {
        var el = this.getEl();
        el.mask(_('loading'), 'x-mask-loading');
        MODx.Ajax.request({
            url: miniShop2.config.connector_url,
            params: {
                action: 'mgr/gallery/sort',
                product_id: this.config.product_id,
                source: o.source.id,
                target: o.target.id
            },
            listeners: {
                success: {
                    fn: function (r) {
                        el.unmask();
                        this.store.reload();
                        //noinspection JSUnresolvedFunction
                        //this.updateThumb(r.object['thumb']);
                    }, scope: this
                }
            }
        });
    },



    updateFile: function (btn, e) {
        var node = this.cm.activeNode;
        var data = this.lookup[node.id];
        if (!data) {
            return;
        }

        var w = MODx.load({
            xtype: 'minishop2-gallery-image',
            record: data,
            listeners: {
                success: {
                    fn: function () {
                        this.store.reload()
                    }, scope: this
                }
            }
        });
        w.setValues(data);
        w.show(e.target);
    },

    showFile: function () {
        var node = this.cm.activeNode;
        var data = this.lookup[node.id];
        if (!data) {
            return;
        }

        window.open(data.url);
    },

    fileAction: function (method) {
        var ids = this._getSelectedIds();
        if (!ids.length) {
            return false;
        }
        this.getEl().mask(_('loading'), 'x-mask-loading');
        MODx.Ajax.request({
            url: miniShop2.config.connector_url,
            params: {
                action: 'mgr/gallery/multiple',
                method: method,
                ids: Ext.util.JSON.encode(ids),
            },
            listeners: {
                success: {
                    fn: function (r) {
                        if (method == 'remove') {
                            //noinspection JSUnresolvedFunction
                            //this.updateThumb(r.object['thumb']);
                        }
                        this.store.reload();
                    }, scope: this
                },
                failure: {
                    fn: function (response) {
                        MODx.msg.alert(_('error'), response.message);
                    }, scope: this
                },
            }
        })
    },

    deleteFiles: function () {
        var ids = this._getSelectedIds();
        var title = ids.length > 1
            ? 'ms2_gallery_file_delete_multiple'
            : 'ms2_gallery_file_delete';
        var message = ids.length > 1
            ? 'ms2_gallery_file_delete_multiple_confirm'
            : 'ms2_gallery_file_delete_confirm';
        Ext.MessageBox.confirm(
            _(title),
            _(message),
            function (val) {
                if (val == 'yes') {
                    this.fileAction('remove');
                }
            },
            this
        );
    },

    generateThumbs: function () {
        this.fileAction('generate');
    },

   run: function (p) {
        p = p || {};
        var v = {};
        Ext.apply(v, this.store.baseParams);
        Ext.apply(v, p);
        this.changePage(1);
        this.store.baseParams = v;
        this.store.load();
    },

    formatData: function (data) {
       this.lookup['msto-gallery-image-' + data.id] = data;
        return data;
    },

    _initTemplates: function () {
        this.templates.thumb = new Ext.XTemplate(
            '<tpl for=".">\
				<div class="msto-thumb-wrap">\
					<input type="checkbox" value="{id}" name="image_id[]" {checked}/>\
	                <div class="modx-browser-thumb-wrap modx-pb-thumb-wrap {class}" id="msto-gallery-image-{id}">\
	                        <img src="{thumbnail}" title="{name}" />\
	                </div>\
				</div>\
            </tpl>'
        );
        this.templates.thumb.compile();
    },

	_showContextMenu: function (v, i, n, e) {
        e.preventDefault();
        var data = this.lookup[n.id];
        var m = this.cm;
        m.removeAll();

        var menu = miniShop2.utils.getMenu(data.actions, this, this._getSelectedIds());
        for (var item in menu) {
            if (!menu.hasOwnProperty(item)) {
                continue;
            }
            m.add(menu[item]);
        }

        m.show(n, 'tl-c?');
        m.activeNode = n;
    },

    _getSelectedIds: function () {
        var ids = [];
        var selected = this.getSelectedRecords();

        for (var i in selected) {
            if (!selected.hasOwnProperty(i)) {
                continue;
            }
            ids.push(selected[i]['id']);
        }

        return ids;
    },

});
Ext.reg('msto-gallery-images-view', msto.view.Images);


