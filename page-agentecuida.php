<?php 
/*
Template Name: A Gente Cuida
*/
get_header(); ?>
    <!-- conteúdo lateral direita -->
    <section id="agentecuida" class="container">
    	<!-- navegação do site páginas -->
    	<?php get_template_part('menu', 'topo'); ?>
        <!-- Outros conteúdos -->
        <div class="mainContent">
        	<div class="coluna-left">
            	<div class="contentTextos">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php the_content(); ?>
                    <?php endwhile; endif; ?>
                </div>
            </div>
            <div class="coluna-right">
            	<div class="contentTextos">
                    <h2>Onde Estamos</h2>
                    <p><?php echo get_post_meta($post->ID,'txt-onde-estamos',true); ?></p>
                    <div class="mapa-onde-estamos">
                        <?php // WP_Query arguments
						$args = array (
							'post_type'              => array( 'onde-estamos' ),
							'pagination'             => false,
							'posts_per_page'         => '-1',
							'order'                  => 'ASC',
							'orderby'                => 'title',
						);
						
						// The Query
						$ondeestamos = new WP_Query( $args );
						
						// The Loop
						if ( $ondeestamos->have_posts() ) {
							while ( $ondeestamos->have_posts() ) {
								$ondeestamos->the_post();
						$oe_cidade = get_post_meta($post->ID, 'oe_cidade', true);
						$oe_estado = get_post_meta($post->ID, 'oe_estado', true);
						$oe_end	   = get_post_meta($post->ID, 'oe_end', true);
						$oe_bairro = get_post_meta($post->ID, 'oe_bairro', true);
						$oe_cep	   = get_post_meta($post->ID, 'oe_cep', true);
						$oe_tel	   = get_post_meta($post->ID, 'oe_tel', true);
						$oe_ponto_top = get_post_meta($post->ID, 'oe_ponto_top', true);
						$oe_ponto_left = get_post_meta($post->ID, 'oe_ponto_left', true); ?>
                        <a href="#<?php echo $post->post_name;?>" class="indicador-mapa" id="<?php echo $post->post_name;?>" style="top:<?php echo $oe_ponto_top ?>; left:<?php echo $oe_ponto_left ?>;">
                            <div class="box-infos-mapa" style="z-index:<?php echo $post->ID; ?>">
                                <h2><?php echo $oe_cidade; ?>/<?php echo $oe_estado; ?></h2>
                                <p><?php echo $oe_end; ?> – <?php echo $oe_bairro; ?><br>CEP <?php echo $oe_cep; ?></p>
                                <p class="telefone"><?php echo $oe_tel ?></p>
                            </div>
                        </a>
                        <?php 	}
						} else {
							// no posts found
						}
						
						// Restore original Post Data
						wp_reset_postdata(); ?>
                    </div>
            	</div>
            </div>
            <div class="lista-onde-estamos">
            	<?php $estados = array(
					array("sigla" => "AC", "nome" => "Acre"),
					array("sigla" => "AL", "nome" => "Alagoas"),
					array("sigla" => "AM", "nome" => "Amazonas"),
					array("sigla" => "AP", "nome" => "Amapá"),
					array("sigla" => "BA", "nome" => "Bahia"),
					array("sigla" => "CE", "nome" => "Ceará"),
					array("sigla" => "DF", "nome" => "Distrito Federal"),
					array("sigla" => "ES", "nome" => "Espírito Santo"),
					array("sigla" => "GO", "nome" => "Goiás"),
					array("sigla" => "MA", "nome" => "Maranhão"),
					array("sigla" => "MT", "nome" => "Mato Grosso"),
					array("sigla" => "MS", "nome" => "Mato Grosso do Sul"),
					array("sigla" => "MG", "nome" => "Minas Gerais"),
					array("sigla" => "PA", "nome" => "Pará"),
					array("sigla" => "PB", "nome" => "Paraíba"),
					array("sigla" => "PR", "nome" => "Paraná"),
					array("sigla" => "PE", "nome" => "Pernambuco"),
					array("sigla" => "PI", "nome" => "Piauí"),
					array("sigla" => "RJ", "nome" => "Rio de Janeiro"),
					array("sigla" => "RN", "nome" => "Rio Grande do Norte"),
					array("sigla" => "RO", "nome" => "Rondônia"),
					array("sigla" => "RS", "nome" => "Rio Grande do Sul"),
					array("sigla" => "RR", "nome" => "Roraima"),
					array("sigla" => "SC", "nome" => "Santa Catarina"),
					array("sigla" => "SE", "nome" => "Sergipe"),
					array("sigla" => "SP", "nome" => "São Paulo"),
					array("sigla" => "TO", "nome" => "Tocantins")
				); ?>
                <?php foreach($estados as $estado) { 
				
				// WP_Query arguments
				$args = array (
					'post_type'              => array( 'onde-estamos' ),
					'pagination'             => false,
					'posts_per_page'         => '-1',
					'order'                  => 'ASC',
					'meta_query'             => array(
						array(
							'key'       => 'oe_estado',
							'value'     => $estado['sigla'],
							'compare'   => '=',
						),
					),
				);
				
				// The Query
				$query_estados = new WP_Query( $args );
				
				// The Loop
				if ( $query_estados->have_posts() ) { ?>
                    
                    <h3 id="<?php echo $estado['sigla'] ?>"><?php echo $estado['nome'] ?></h3>
                    <div id="<?php echo $estado['sigla'] ?>">
                        <?php while ( $query_estados->have_posts() ) {
		$query_estados->the_post(); ?>
                        <p><span><?php echo get_post_meta($post->ID, 'oe_cidade', true); ?></span><br>
                        <?php echo get_post_meta($post->ID, 'oe_end', true); ?> – <?php echo get_post_meta($post->ID, 'oe_bairro', true); ?><br>
                        CEP <?php echo get_post_meta($post->ID, 'oe_cep', true); ?> <?php echo get_post_meta($post->ID, 'oe_cidade', true); ?> – <?php echo get_post_meta($post->ID, 'oe_estado', true); ?><br>
                        <?php echo get_post_meta($post->ID, 'oe_cep', true); ?></p>
                        <?php } ?>
                    </div>
                 <?php
				} else {
					// no posts found
				}
				
				// Restore original Post Data
				wp_reset_postdata(); ?>   
                <?php } ?>
            </div>
        </div>
    </section>
<?php get_footer(); ?>    