// JavaScript Document
jQuery(window).load(function(){
  jQuery('.slider').fractionSlider({
		'fullWidth':			true,
		'controls': 			true, 
		'pager': 			false,
		'responsive': 		true,
		'dimensions': 	'1669,828',
	    'increase': 			true,
		'pauseOnHover': 		false,
		'slideEndAnimation':	true
	});
});

jQuery( ".mapa-onde-estamos a" ).hover(
  function() {
    jQuery( this ).children('.box-infos-mapa').addClass("animated fadeIn");;
  }, function() {
    jQuery( this ).children('.box-infos-mapa').removeClass("animated fadeIn");
  }
);

jQuery(".menuPaginasResponsivo").click(function(){
	jQuery(".menuResponsivoContent").toggle("fast");
});

jQuery('.lista-onde-estamos h3').click(function(){
		var box = jQuery(this).attr('id');
		jQuery('div#'+box).toggle("slow");
		if(jQuery(this).hasClass('ativado')) {
			jQuery(this).removeClass("ativado");
		} else {
			jQuery(this).addClass("ativado");
		}
	});

if (document.documentElement.clientWidth <= 768) {
	// scripts
	jQuery("a[href='#abreMenu']").click(function(e){
		e.preventDefault();
		jQuery(".linksMenu").toggle("slow");
		if(jQuery(this).hasClass('ativado')) {
			jQuery(this).removeClass("ativado");
		} else {
			jQuery(this).addClass("ativado");
		}
	});
	
	jQuery('.linkMP').bxSlider({
		pager:false,
		minSlides: 2,
  		maxSlides: 7,
  		slideWidth: 115,
  		slideMargin: 14
	});
	
	jQuery('.listaSolucoes li').click(function(){
		var box = jQuery(this).attr('id');
		jQuery('#'+box+' .toltip').toggle("slow");
		if(jQuery(this).hasClass('ativado')) {
			jQuery(this).removeClass("ativado");
		} else {
			jQuery(this).addClass("ativado");
		}
	});
}