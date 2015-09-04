<?php 
/*
Template Name: PME
*/
get_header(); ?>
    <!-- conteúdo lateral direita -->
    <section id="pme" class="container">
    	<!-- navegação do site páginas -->
    	<?php get_template_part('menu', 'topo'); ?>
        <!-- Outros conteúdos -->
        <div class="mainContent">
        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        	<div class="contentTextos">
            	<h2><?php echo get_post_meta($post->ID,'titulo_internas',true); ?></h2>
                <ul class="listSegmento">
                	<?php wp_nav_menu( array( 'theme_location' => 'menu-service-pmes', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
                </ul>
                <?php the_content(); ?>
            </div>
            <div class="img-destaque">
            	<?php // check if the post has a Post Thumbnail assigned to it.
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('full');
				}  else { ?>
            		<img src="<?php echo get_stylesheet_directory_uri(); ?>/fotos/foto-page-pmes.png" alt="PMEs">
                <?php } ?>
            </div>
            <ul class="listSegmentoMobile">
                <?php wp_nav_menu( array( 'theme_location' => 'menu-service-pmes', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
            </ul>
            <?php endwhile; endif; ?>
            <?php get_template_part('popup','contato'); ?>
        </div>
    </section>
<?php get_footer(); ?>    