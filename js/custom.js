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
		'slideEndAnimation':	true,
		'timeout': 5000
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
		jQuery('.lista-onde-estamos div').hide('slow');
		jQuery('.lista-onde-estamos h3').removeClass("ativado");
		var box = jQuery(this).attr('id');
		//jQuery('div#'+box).toggle("slow");
		if(jQuery(this).hasClass('ativado')) {
			jQuery(this).removeClass("ativado");
			jQuery(this).next('div').hide('slow');
		} else {
			jQuery(this).addClass("ativado");
			jQuery(this).next('div').show('slow');
		}
	});

// Mascara de telefone
var SPMaskBehavior = function (val) {
		return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
	},
	spOptions = {
		onKeyPress: function(val, e, field, options) {
			field.mask(SPMaskBehavior.apply({}, arguments), options);
		}
	};

jQuery('#tel').mask(SPMaskBehavior, spOptions);

jQuery( "#segmento" )
	.change(function () {
		var str = "";
		jQuery( "#segmento option:selected" ).each(function() {
			str = jQuery(this).text();
		});
		jQuery( "#nomeSeguimento").val(str);
		var res = str.split(" ");
		if(res[0]==='Orçamento'){
			jQuery('#uploadfile').show();
		} else {
			jQuery('#uploadfile').hide();
		}
	})
	.change();

function validarUpload() {
	if(jQuery("#nomeArquivo").val()===''){
		jQuery('#uploadfile').hide();
		return true;
	}
	return true;
}

// Formulário de Contato
jQuery("#formContatoField").validate({
	debug: true,
	rules: {
		nome: "required",
		email: {
			required: true,
			email: true
		},
		tel: "required",
		pessoa: "required",
		segmento: "required",
		nomeEmpresa: "required",
		estado: "required",
		cidade: "required",
		mensagem: "required"
	},
	messages: {
		nome: "Nome é obrigatório",
		email: {
			required: "Email é obrigatório",
			email: "Email incorreto."
		},
		tel: "Telefone obrigatório",
		pessoa: "Tipo de pessoa obrigatório",
		segmento: "Seguimento obrigatório",
		nomeEmpresa: "Nome da empresa obrigatório",
		estado: "Estado obrigatório",
		cidade: "Cidade Obrigatório",
		mensagem: "Mensagem de contato obrigatória"
	},
	submitHandler: function(form) {
		jQuery.ajax({
			url: ajax_object.ajax_url,
			dataType:'json',
			data: jQuery(form).serialize(),
			method: 'POST',
			beforeSend: function(){
				jQuery("#enviar").attr("disabled", "disabled").html("Enviando...");
			}
		}).done(function(data){
			if(data.erro){
				jQuery("#enviar").removeAttr("disabled").html("Enviar");
				alert(data.msg);
			} else {
				jQuery("#enviar").html(data.msg);
				alert('Seu contato foi enviado com sucesso!')
				dataLayer.push({'event':'gtm.formSubmit','formContato': 'Enviado'});
				jQuery("#nome,#email,#tel,#nomeEmpresa,#cidade,#mensagem").val("");
			}
		});
	}
});

jQuery('.menuDesliza ul li a.submenumobi').click(function(e){
    e.preventDefault();
    jQuery(this).next().toggle('slow');
});
	
// Responsive
var ativado = false;
var slider;
//var linksMenuGA = jQuery('.linksMenuGA').html();
//var linksMenu = jQuery('.linksMenu').html();

var windowWidth = jQuery(window).width();
if (windowWidth <= 768) {
	if(ativado===false) {
		// Menu header
		jQuery('.menuMobile').click(function(e){
			if(jQuery(this).hasClass('ativado')) {
				jQuery(this).removeClass('ativado');
				//jQuery('.linksMenu').fadeOut();
				jQuery('.page').animate({'left':0},500,function(){
					jQuery(this).css({'position':'relative'});
					jQuery('body').css({'overflow':'auto'});
				});
			} else {
				jQuery(this).addClass('ativado');
				//jQuery('.linksMenu').fadeIn();
				jQuery('.page').animate({'left':'77%'},500).css({'position':'fixed'});
                jQuery('body').css({'overflow':'hidden'});
			}
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
		
		slider = jQuery('.linkMP').bxSlider({
			pager:false,
			minSlides: 2,
			maxSlides: 7,
			slideWidth: 117,
			slideMargin: 14
		});
		ativado=true;
		
		// Menu no outro
		//jQuery(".linksMenu").append(linksMenuGA);
		//jQuery(".linksMenu").hide();
	}
	jQuery(".menuResponsivoContent").show();
}

jQuery(window).on('resize', function(){
var win = jQuery(this); //this = window
if (win.width() <= 768) {
	if(ativado===false) {
		// Menu header
		jQuery('.menuMobile').click(function(e){
			if(jQuery(this).hasClass('ativado')) {
				jQuery(this).removeClass('ativado');
				//jQuery('.linksMenu').fadeOut();
				jQuery('.page').animate({'left':0},500,function(){
					jQuery(this).css({'position':'relative'});
					jQuery('body').css({'overflow':'auto'});
				});
			} else {
				jQuery(this).addClass('ativado');
				//jQuery('.linksMenu').fadeIn();
                jQuery('.page').animate({'left':'77%'},500).css({'position':'fixed'});
                jQuery('body').css({'overflow':'hidden'});
			}
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
		
		slider = jQuery('.linkMP').bxSlider({
			pager:false,
			minSlides: 2,
			maxSlides: 7,
			slideWidth: 117,
			slideMargin: 14
		});
		ativado=true;
		
		// Menu no outro
		//jQuery(".linksMenu").append(linksMenuGA);
		//jQuery(".linksMenu").hide();
	}
	jQuery(".menuResponsivoContent").show();
	
} else {
	ativado = false;
	slider.destroySlider();
	
	if(win.width() > 768 && win.width() <= 1024) {
		jQuery(".menuResponsivoContent").hide();
	} else {
		jQuery(".menuResponsivoContent").show();
	}
	//jQuery('.linksMenu').show();
	//jQuery('.linksMenu').html(linksMenu);
	jQuery('.page').animate({'left':0},500).css({'position':'relative'});
	jQuery('body').css({'overflow':'auto'});
	jQuery('.menuMobile').removeClass('ativado');
}

});