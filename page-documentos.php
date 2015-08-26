<?php 
/*
Template Name: Gestão de Documentos
*/
get_header(); ?>
    <!-- conteúdo lateral direita -->
    <section id="docecm" class="container">
    	<!-- navegação do site páginas -->
    	<?php get_template_part('menu', 'topo'); ?>
        <!-- Outros conteúdos -->
        <div class="mainContent">
        	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        	<div class="contentTextos">
            	<div class="icon-mobile"><img src="<?php echo get_stylesheet_directory_uri(); ?>/icones/icone-page-documental.png" width="58" height="59" alt="Patrimonial"></div>
            	
                <?php the_content(); ?>
                
                <div class="area-cliente-desk"><a href="<?php echo get_option('url_gestao_doc'); ?>"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/bt-area-cliente.png" alt="Área do Cliente"></a></div>         
                <div class="area-cliente"><a href="<?php echo get_option('url_gestao_doc'); ?>">ÁREA DO CLIENTE</a></div>
            </div>
            <div class="img-destaque">
            	<img src="<?php echo get_stylesheet_directory_uri(); ?>/fotos/foto-page-gestao-doc.png" alt="Gestão de Documentos">
            </div>
            <?php endwhile; endif; ?>
            <?php get_template_part('popup', 'contato'); ?>
        </div>
    </section>
<?php get_footer(); ?>    