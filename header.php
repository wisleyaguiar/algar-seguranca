<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title(); ?></title>

<!-- Styles -->
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
<noscript>
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/css/mobile.css" />
</noscript>
<script>
// Edit to suit your needs.
var ADAPT_CONFIG = {
  // Where is your CSS?
  path: '<?php echo get_stylesheet_directory_uri(); ?>/css/',

  // false = Only run once, when page first loads.
  // true = Change on window resize and page tilt.
  dynamic: true,

  // First range entry is the minimum.
  // Last range entry is the maximum.
  // Separate ranges by "to" keyword.
  range: [
    '0px    to 768px  = mobile.css',
	'768px  to 1024px  = tablet.css',
	'1024px  to 1440px = desktop.css'
  ]
};
</script>
<script src="<?php echo get_stylesheet_directory_uri(); ?>/js/adapt.min.js"></script>
</head>
<body<?php if(!is_front_page()) { ?> class="internas"<?php } ?>>
<?php do_action( 'body_open' ); ?>
<!-- Google Tag Manager -->
<noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-KCDZRN" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src=
        '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-KCDZRN');</script>
<!-- End Google Tag Manager -->
<div class="menuDesliza">
    <ul>
        <li><a href="#" class="submenumobi">Institucional</a>
            <ul>
                <?php wp_nav_menu( array( 'theme_location' => 'mobile-menu-institucional', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
            </ul>
        </li>
        <li><a href="https://www.elancers.net/frames/algar/frame_geral.asp">Trabalhe Conosco</a></li>
        <li><a href="#" class="submenumobi">Serviços</a>
            <ul>
                <?php wp_nav_menu( array( 'theme_location' => 'mobile-menu-servicos', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
            </ul>
        </li>
        <li><a href="#" class="submenumobi">Áreas de Atuação</a>
            <ul>
                <?php wp_nav_menu( array( 'theme_location' => 'header-menu-2', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
            </ul>
        </li>
    </ul>
</div>
<div class="page">
	<!-- Header menu Lateral -->
	<header class="header">
    	<div class="logo"><a href="<?php echo home_url() ?>" title="Algar Segurança"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo-algar-seguranca.png" alt="Algar Segurança"/></a></div>
        <nav class="maiMenu">
        	<a href="#abreMenu" class="menuMobile">Menu</a>
        	<ul class="linksMenu">
            <?php
			if ( has_nav_menu( 'sidebar-menu-1' ) ) {
				 wp_nav_menu( array( 'theme_location' => 'sidebar-menu-1', 'container' => '', 'items_wrap' => '%3$s' ) );
			} else { ?>
            	<li class="agentecuida<?php if(is_page('agentecuida')) { ?> ativado<?php } ?>"><a href="<?php echo home_url("/agentecuida") ?>">#agentecuida</a></li>
                <li class="patrimonial<?php if(is_page('patrimonial')) { ?> ativado<?php } ?>"><a href="<?php echo home_url('/patrimonial') ?>">Patrimonial</a></li>
                <li class="eletronica<?php if(is_page('eletronica')) { ?> ativado<?php } ?>"><a href="<?php echo home_url('/eletronica') ?>">Eletrônica</a></li>
                <li class="monitoramento<?php if(is_page('monitoramento')) { ?> ativado<?php } ?>"><a href="<?php echo home_url('/monitoramento') ?>">Monitoramento</a></li>
                <li class="docecm<?php if(is_page('gestao-documental')) { ?> ativado<?php } ?>"><a href="<?php echo home_url('/gestao-documental') ?>">Gestão Documental</a></li>
                <li class="contato<?php if(is_page('contato')) { ?> ativado<?php } ?>"><a href="<?php echo home_url('/contato') ?>">Contato</a></li>
            <?php } ?>
            </ul>
        </nav>
        <a href="<?php echo home_url('/contato') ?>" class="contatoMobile">Contato</a>
    </header>