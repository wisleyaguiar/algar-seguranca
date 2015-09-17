<?php 
/*
Template Name: Patrimonial
*/
get_header(); ?>
    <!-- conteúdo lateral direita -->
    <section id="patrimonial" class="container">
    	<!-- navegação do site páginas -->
    	<?php get_template_part('menu','topo'); ?>
        <!-- Outros conteúdos -->
        <div class="mainContent">
        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        	<div class="contentTextos">
            	<div class="icon-mobile"><img src="<?php echo get_stylesheet_directory_uri(); ?>/icones/icone-page-patrimonial.png" width="58" height="59" alt="Patrimonial"></div>
                <?php the_content(); ?>
            </div>
            <div class="img-destaque">
            	<?php // check if the post has a Post Thumbnail assigned to it.
				if ( has_post_thumbnail() ) {
					the_post_thumbnail('full');
				}  else { ?>
            		<img src="<?php echo get_stylesheet_directory_uri(); ?>/fotos/foto-page-patrimonial.png" alt="Patrimonial">
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
                	<img src="<?php echo get_stylesheet_directory_uri(); ?>/fotos/foto-page-patrimonial.png" alt="Patrimonial">
                <?php } ?>
            </div>
            <?php endwhile; endif; ?>
            <?php get_template_part('popup', 'contato'); ?>
        </div>
    </section>
<?php get_footer(); ?>    