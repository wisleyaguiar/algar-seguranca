<?php get_header(); ?>
    <!-- conteúdo lateral direita -->
    <section id="search" class="container">
    	<!-- navegação do site páginas -->
    	<?php get_template_part('menu', 'topo'); ?>
        <!-- Outros conteúdos -->
        <div class="mainContent">
        	<div class="coluna-left">
            	<div class="contentTextos">
                    <?php
					global $query_string;
					
					$query_args = explode("&", $query_string);
					$search_query = array();
					
					foreach($query_args as $key => $string) {
						$query_split = explode("=", $string);
						$search_query[$query_split[0]] = urldecode($query_split[1]);
					} // foreach
					
					$search = new WP_Query($search_query); ?>
					
					<?php if ( $search->have_posts() ) : ?>

                    <!-- pagination here -->
                	<h2>Resultado da pesquisa</h2>
                    <!-- the loop -->
                    <?php while ( $search->have_posts() ) : $search->the_post(); ?>
                        <p>&rsaquo; <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
                    <?php endwhile; ?>
                    <!-- end of the loop -->
                
                    <!-- pagination here -->
                
                    <?php wp_reset_postdata(); ?>
                
                <?php else : ?>
                    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </section>
<?php get_footer(); ?>    