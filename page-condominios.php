<?php 
/*
Template Name: Condomínios
*/
get_header(); ?>
    <!-- conteúdo lateral direita -->
    <section id="condominios" class="container">
    	<!-- navegação do site páginas -->
    	<?php get_template_part('menu', 'topo'); ?>
        <!-- Outros conteúdos -->
        <div class="mainContent">
        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        	<div class="contentTextos">
            	<h2><?php echo get_post_meta($post->ID,'titulo_internas',true); ?></h2>
                <ul class="listSegmento">
                	<?php wp_nav_menu( array( 'theme_location' => 'menu-service-condominios', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
                </ul>
                <?php the_content(); ?>
            </div>
            <div class="img-destaque">
            	<img src="<?php echo get_stylesheet_directory_uri(); ?>/fotos/foto-page-condominios.png" alt="Condominios">
            </div>
            <ul class="listSegmentoMobile">
                <?php wp_nav_menu( array( 'theme_location' => 'menu-service-condominios', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
            </ul>
            <?php endwhile; endif; ?>
            <?php get_template_part('popup','contato'); ?>
        </div>
    </section>
<?php get_footer(); ?>    