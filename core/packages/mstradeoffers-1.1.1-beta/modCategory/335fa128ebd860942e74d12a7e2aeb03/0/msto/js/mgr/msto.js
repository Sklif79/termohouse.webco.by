var msto = function(config) {
	config = config || {};
	msto.superclass.constructor.call(this, config);
};
Ext.extend(msto, Ext.Component, {
	page: {},
	window: {},
	grid: {},
	tree: {},
	panel: {},
	combo: {},
	config: {},
	view: {},
	utils: {},
	keymap: {},
	plugin: {}
});
Ext.reg('msto', msto);

msto = new msto();
