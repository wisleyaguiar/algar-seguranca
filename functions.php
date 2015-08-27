<?php 

// Setando os estilos e javascripts
function algarseguranca_enqueue_style() {
	wp_enqueue_style( 'reset_css', get_stylesheet_directory_uri() . '/css/reset.css', false );
	wp_enqueue_style( 'fonts_custom', get_stylesheet_directory_uri() . '/fonts/stylesheet.css', false );
	wp_enqueue_style( 'icones_free', get_stylesheet_directory_uri() . '/lib/font-awesome-4.4.0/css/font-awesome.min.css', false );
	wp_enqueue_style( 'animate', get_stylesheet_directory_uri() . '/css/animate.css', false );
	wp_enqueue_style( 'fractionslider', get_stylesheet_directory_uri() . '/css/fractionslider.css', false );
	wp_enqueue_style( 'bxslider', get_stylesheet_directory_uri() . '/js/jquery.bxslider/jquery.bxslider.css', false );
	wp_enqueue_style( 'core', get_stylesheet_directory_uri() . '/style.css', false );
}

function algarseguranca_enqueue_script() {
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.js', array('jquery'), false, true );
	wp_enqueue_script( 'fractionslider', get_stylesheet_directory_uri() . '/js/jquery.fractionslider.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'bxslider', get_stylesheet_directory_uri() . '/js/jquery.bxslider/jquery.bxslider.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), false, true );
}

add_action( 'wp_enqueue_scripts', 'algarseguranca_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'algarseguranca_enqueue_script' );

// Menus do Site
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu-1' => __( 'Header Menu 1' ),
      'header-menu-2' => __( 'Header Menu 2' ),
	  'sidebar-menu-1' => __( 'Lateral Menu 1' ),
	  'menu-service-empresa' => __( 'Menu Serviços Empresa' ),
	  'menu-service-industria' => __( 'Menu Serviços Industria' ),
	  'menu-service-rural' => __( 'Menu Serviços Rural' ),
	  'menu-service-condominios' => __( 'Menu Serviços Condomínios' ),
	  'menu-service-pmes' => __( 'Menu Serviços PME&acute;s' ),
	  'menu-service-residencial' => __( 'Menu Serviços Residencial' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// Custom posts
include('includes/onde-estamos.php');

// Shortcode soluções
// Add Shortcode
function solucoes_shortcode( $atts , $content = null ) {
	$content = str_replace('<p>','',$content);
	$content = str_replace('</p>','',$content);
	// Code
	return '<ul class="listaSolucoes">' . do_shortcode($content) . '</ul>';
}
add_shortcode( 'solucoes', 'solucoes_shortcode' );

// Add Shortcode
function item_shortcode( $atts , $content = null ) {
	
	$content = str_replace('<p>','',$content);
	$content = str_replace('</p>','',$content);
	
	// Attributes
	extract( shortcode_atts(
		array(
			'icone' => 'cpi',
			'titulo' => 'Consultoria e projetos integrados',
		), $atts )
	);
	
	return '<li id="'.$atts['icone'].'"><a class="'.$atts['icone'].'">'.$atts['titulo'].'</a><div class="toltip"><div class="pointer-toltip"></div><p>'.$content.'</p></div></li>';
	
}
add_shortcode( 'item', 'item_shortcode' );

// Opções do Tema
add_action('admin_menu', 'add_global_custom_options');
function add_global_custom_options()
{
    add_options_page('Opções do Tema', 'Opções do Tema', 'manage_options', 'functions','global_custom_options');
}

function global_custom_options()
{
?>
    <div class="wrap">
        <h2>Página de Opções</h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>
            
            <table class="form-table">
              <tbody>
                <tr>
                  <th scope="row"><label for="url_area_cliente">URL Área do Cliente:</label></th>
                  <td><input type="text" name="url_area_cliente" value="<?php echo get_option('url_area_cliente'); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                  <th scope="row"><label for="url_gestao_doc">URL Área Gestão de Documentos:</label></th>
                  <td><input type="text" name="url_gestao_doc" value="<?php echo get_option('url_gestao_doc'); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                  <th scope="row"><label for="tel_box_contato">Nº Telefone Box Contato:</label></th>
                  <td><input type="text" name="tel_box_contato" value="<?php echo get_option('tel_box_contato'); ?>" class="regular-text" /></td>
                </tr>
              </tbody>
            </table>
            
            <p class="submit"><input type="submit" name="Submit" value="Salvar alterações" class="button button-primary" /></p>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="url_area_cliente,url_gestao_doc,tel_box_contato" />
        </form>
    </div>
<?php
}