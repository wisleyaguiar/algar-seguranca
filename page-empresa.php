<?php 
/*
Template Name: Empresa
*/
get_header(); ?>
    <!-- conteúdo lateral direita -->
    <section id="empresa" class="container">
    	<!-- navegação do site páginas -->
    	<?php get_template_part('menu', 'topo'); ?>
        <!-- Outros conteúdos -->
        <div class="mainContent">
        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        	<div class="contentTextos">
            	<h2><?php echo get_post_meta($post->ID,'titulo_internas',true); ?></h2>
                <ul class="listSegmento">
                    <?php wp_nav_menu( array( 'theme_location' => 'menu-service-empresa', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
                </ul>
                <?php the_content(); ?>
            </div>
            <div class="img-destaque">
           	<?php // check if the post has a Post Thumbnail assigned to it.
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('full');
			}  else { ?>
            	<img src="<?php echo get_stylesheet_directory_uri(); ?>/fotos/foto-img-page-empresa.png" alt="Grandes Empresas" width="397" height="914">
            <?php } ?>
            </div>
            <div class="img-destaque-mobile">
            	<?php if (class_exists('MultiPostThumbnails')) :
					MultiPostThumbnails::the_post_thumbnail(
						get_post_type(),
						'mobile-image',
						$post->ID,
						'full'
					);
				endif; ?>
            </div>
            <ul class="listSegmentoMobile">
                <?php wp_nav_menu( array( 'theme_location' => 'menu-service-empresa', 'container' => '', 'items_wrap' => '%3$s' ) ); ?>
            </ul>
            <?php endwhile; endif; ?>
            <?php get_template_part('popup', 'contato'); ?>
        </div>
    </section>
<?php get_footer(); ?>    