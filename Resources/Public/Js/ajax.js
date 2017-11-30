$( document ).ready(function() {

	
	function loadElements (element, cat01, cat02, page, limit){
		
		/*var ajaxUrl = 'index.php?id=192&L=0&no_cache=1&tx_rmmattigschauer_msproducts%5Baction%5D=ajax&tx_rmmattigschauer_msproducts%5Bcontroller%5D=Produkte';*/
		var ajaxUrl = element.attr('href');
		var container = element.closest('.generated-products').find('#generated-results');
		var limit = $('#ms-limit').val();
		
		if(!page)
			var page = 0;//$('#ms-page').val();
		
		var cat00 = $('#ms-getcat').val();
		
		//console.log(ajaxUrl + " - " + cat01 + " - " + cat02 + " - " + page + " - " + limit);
		
		if (ajaxUrl !== undefined && ajaxUrl !== '') {
			
			$.ajax({
				url: ajaxUrl,
				type: 'POST',
				data:{
					"tx_rmmattigschauer_msproducts[controller]":'Produkte',
					"tx_rmmattigschauer_msproducts[action]":'ajax',
					"tx_rmmattigschauer_msproducts[cat00]": parseInt(cat00),
					"tx_rmmattigschauer_msproducts[cat01]": parseInt(cat01),
					"tx_rmmattigschauer_msproducts[cat02]": parseInt(cat02),
					"tx_rmmattigschauer_msproducts[number]": parseInt(page),
					"tx_rmmattigschauer_msproducts[limit]": parseInt(limit)
				},
				success: function (result) {
					
					//console.log("success");
					var ajaxDom = $(result).find('.tx-rm-mattigschauer').children();
					
					if(!page)
						page = 1;
					
					$('#ms-page').val(page);
					
					//console.log(ajaxDom);
					
					//$('#' + container).replaceWith(ajaxDom);
					//$('#'+container+' .page-navigation').remove();
					//$('#'+container+' .news-clear').remove();
					
					//container.append(ajaxDom);
					container.html(ajaxDom);
		
				}
			});
		
		}
		
	}
	
	$('.load_more').on('click', '.load_button', function (e) {

		e.preventDefault();
	
		var selBox01 = $('#analog_kat').find(":selected").val();
		var selBox02 = $('#analog_uw').find(":selected").val();
		var element = $(this);

		loadElements(element, selBox01, selBox02);
		
	});
	
	$('.generated-products').on('change', '#analog_kat', function(e) {
		
		var selBox01 = $('#analog_kat').find(":selected").val();
		var selBox02 = $('#analog_uw').find(":selected").val();
		var element = $(this).closest('.generated-products').find('.load_button');//.find('.load_more');
		$('#ms-page').val(1);

		loadElements(element, selBox01, selBox02);
	
	});
	
	$('.generated-products').on('change', '#analog_uw', function(e) {
		
		var selBox01 = $('#analog_kat').find(":selected").val();
		var selBox02 = $('#analog_uw').find(":selected").val();
		var element = $(this).closest('.generated-products').find('.load_button');
		$('#ms-page').val(1);

		loadElements(element, selBox01, selBox02);
		
	});
	
		/* next button */
	
	$('.generated-products').on('click', '.ms_next', function(e) {
		
		//console.log("next");
		
		var selBox01 = $('#analog_kat').find(":selected").val();
		var selBox02 = $('#analog_uw').find(":selected").val();
		var element = $(this).closest('.generated-products').find('.load_button');
		var limit = $('#ms-limit').val();
		var pages = parseInt($('#ms-pages').val());
		var page = 0;

		if(parseInt($('#ms-page').val()) < pages){
			//console.log("geht no:"+parseInt($('#ms-page').val()));
			page = parseInt($('#ms-page').val())+1;
		
			loadElements(element, selBox01, selBox02, page, limit);
			
		}else{
			//console.log("geht nimma");
			//page = parseInt($('#ms-page').val());
		}
		
	});
	
	$('.generated-products').on('click', '.ms_previous', function(e) {
		
		//console.log("previous");
		
		var selBox01 = $('#analog_kat').find(":selected").val();
		var selBox02 = $('#analog_uw').find(":selected").val();
		var element = $(this).closest('.generated-products').find('.load_button');
		var limit = $('#ms-limit').val();
		var page = 0;
		
		if(parseInt($('#ms-page').val()) > 0){
			//console.log("geht no:"+parseInt($('#ms-page').val()));
			page = parseInt($('#ms-page').val())-1;
			
			loadElements(element, selBox01, selBox02, page, limit);
			
		}else{
			//console.log("geht nimma");
			//page = parseInt($('#ms-page').val());
		}
		
	});
	
	$('.generated-products').on('click', '#show-5', function(e) {
		
		var selBox01 = $('#analog_kat').find(":selected").val();
		var selBox02 = $('#analog_uw').find(":selected").val();
		var element = $(this).closest('.generated-products').find('.load_button');
		$('#ms-limit').val('5');

		loadElements(element, selBox01, selBox02, 0, 5);
		
	});
	
	$('.generated-products').on('click', '#show-10', function(e) {
		
		var selBox01 = $('#analog_kat').find(":selected").val();
		var selBox02 = $('#analog_uw').find(":selected").val();
		var element = $(this).closest('.generated-products').find('.load_button');
		$('#ms-limit').val('10');

		loadElements(element, selBox01, selBox02, 0, 10);
		
	});
	
	$('.generated-products').on('click', '#show-25', function(e) {
		
		var selBox01 = $('#analog_kat').find(":selected").val();
		var selBox02 = $('#analog_uw').find(":selected").val();
		var element = $(this).closest('.generated-products').find('.load_button');
		$('#ms-limit').val('25');

		loadElements(element, selBox01, selBox02, 0, 25);
		
	});
	
	
});
