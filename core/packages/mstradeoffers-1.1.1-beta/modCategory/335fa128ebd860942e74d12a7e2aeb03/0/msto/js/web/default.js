var msto = {
	config: {
		msform : '.ms2_form',
        article : '.msto-article',
        price : '.msto-price',
        sizes : '#msto-sizes',
        count : '.msto-count',
        weight : '.msto-weight',
        gallery : '#msto-gallery',
	},
    initialize: function(){
		if(typeof jQuery === 'undefined') document.write('<script src="' + mstoConfig.jsUrl + 'web/lib/jquery.min.js"><\/script>');
        $(document).on('change', msto.config.msform, function(e){
			if(['options[color]', 'options[size]'].indexOf(e.target.name) != -1){
				var data = $(this).serializeObject();
				data.changed = e.target.name;
				msto.request('offer/get', data);
			}
		});

		$(document).on("msto.load.gallery", msto.config.gallery, function() {
		  console.log('msto.load.gallery');
		});


	},
	request: function(action, data){
		data.action = action;
		$.ajax({
			 type: 'POST',
			 dataType: 'json',
			 url: mstoConfig.webconnector,
		     data: data,
			 success: function(response){
			 	var link = window.location.pathname + '?sku=' + response.article;
			 	window.history.replaceState( {} , false, link);
			 	if(data.changed == 'options[color]'){
			 		if(mstoConfig.show_size) $(msto.config.sizes).load(link + ' ' + msto.config.sizes +  ' > *');
			 		$(msto.config.gallery).load(link + ' ' + msto.config.gallery +  ' > *', function(){
			 			$(this).trigger("msto.load.gallery");
			 		});

			 	}
			 	if(mstoConfig.show_count) $(msto.config.count).text(response.count);
			 	$(msto.config.article).text(response.article);
			 	$(msto.config.price).text(response.price);
			 	if(mstoConfig.show_weight) $(msto.config.weight).text(response.weight);
			}
		});
	}
};

msto.initialize();

$.fn.serializeObject = function()
{
   var o = {};
   var a = this.serializeArray();
   $.each(a, function() {
   	   if(!this.value) return;
       if (o[this.name]) {
           if (!o[this.name].push) {
               o[this.name] = [o[this.name]];
           }
           o[this.name].push(this.value || '');
       } else {
           o[this.name] = this.value || '';
       }
   });
   return o;
};