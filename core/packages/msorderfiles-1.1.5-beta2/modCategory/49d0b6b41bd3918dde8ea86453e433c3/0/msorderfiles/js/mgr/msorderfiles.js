var msOrderFiles = function (config) {
    config = config || {};
    msOrderFiles.superclass.constructor.call(this, config);
};
Ext.extend(msOrderFiles, Ext.Component, {
    page: {},
    window: {},
    grid: {},
    tree: {},
    panel: {},
    combo: {},
    config: {},
    view: {},
    utils: {},
    ux: {},
    fields: {},
});
Ext.reg('msorderfiles', msOrderFiles);

msOrderFiles = new msOrderFiles();