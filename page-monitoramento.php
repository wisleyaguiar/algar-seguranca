<?php 
/*
Template Name: Monitoramento
*/
get_header(); ?>
    <!-- conteúdo lateral direita -->
    <section id="monitoramento" class="container">
    	<!-- navegação do site páginas -->
    	<?php get_template_part('menu','topo'); ?>
        <!-- Outros conteúdos -->
        <div class="mainContent">
        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        	<div class="contentTextos">
            	<div class="icon-mobile"><img src="<?php echo get_stylesheet_directory_uri(); ?>/icones/icone-page-monitoramento.png" width="58" height="59" alt="Patrimonial"></div>
            	
                <?php the_content(); ?>
                 
                <!--div class="area-cliente-desk"><a href="<?php echo get_option('url_area_cliente'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bt-area-cliente.png" alt="Área do Cliente"></a></div-->
                <div class="area-cliente"><a href="<?php echo get_option('url_area_cliente'); ?>">ÁREA DO CLIENTE</a></div>
            </div>
            <div class="img-destaque">
            <?php // check if the post has a Post Thumbnail assigned to it.
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('full');
			}  else { ?>
            	<img src="<?php echo get_stylesheet_directory_uri(); ?>/fotos/foto-page-monitoramento.png" alt="Monitoramento">
            <?php } ?>
            </div>
            <div class="img-destaque-mobile">
            	<?php if (class_exists('MultiPostThumbnails')) {
					MultiPostThumbnails::the_post_thumbnail(
						get_post_type(),
						'mobile-image',
						$post->ID,
						'full'
					);
				} else { ?>
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/fotos/foto-page-monitoramento.png" alt="Monitoramento">
                <?php } ?>
            </div>
            <?php endwhile; endif; ?>
            <?php get_template_part('popup', 'contato'); ?>
        </div>
    </section>
<?php get_footer(); ?>    