    	<!-- navegação do site páginas -->
<div class="header-fixo">
    	<nav class="menuGrupoAlgar">
        	<div class="link-facebook"><a href="https://www.facebook.com/algarseguranca?fref=ts" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/facebook.png" alt="Facebook" /></a></div>
        	<ul class="linksMenuGA">
            	<?php
				if ( has_nav_menu( 'header-menu-1' ) ) {
					 wp_nav_menu( array( 'theme_location' => 'header-menu-1', 'container' => '', 'items_wrap' => '%3$s' ) );
				} else { ?>
            	<li><a href="http://www.algar.com.br/" target="_blank">Grupo Algar</a></li>
                <li><a href="#">Canal Integridade</a></li>
                <li><a href="https://www.elancers.net/frames/algar/frame_geral.asp" target="_blank">Trabalhe Conosco</a></li>
                <?php } ?>
            </ul>
        </nav>
        <div class="menuPaginas">
        	<div class="menuPaginasResponsivo"><i class="fa fa-bars"></i> Menu</div>
            <div class="menuResponsivoContent">
                <nav class="mPaginas">
                    <ul class="linkMP">
                    <?php
					if ( has_nav_menu( 'header-menu-2' ) ) {
						 wp_nav_menu( array( 'theme_location' => 'header-menu-2', 'container' => '', 'items_wrap' => '%3$s' ) );
					} else { ?>
                        <li class="empresa<?php if(is_page('empresa')) { ?> ativado<?php } ?>"><a href="<?php echo home_url("/empresa") ?>">Empresa</a></li>
                        <li class="industrial<?php if(is_page('industrial')) { ?> ativado<?php } ?>"><a href="<?php echo home_url("/industrial") ?>">Indústria</a></li>
                        <li class="rural<?php if(is_page('rural')) { ?> ativado<?php } ?>"><a href="<?php echo home_url("/rural") ?>">Rural</a></li>
                        <li class="condominios<?php if(is_page('condominios')) { ?> ativado<?php } ?>"><a href="<?php echo home_url("/condominios") ?>">Condomínios</a></li>
                        <li class="pmes<?php if(is_page('pmes')) { ?> ativado<?php } ?>"><a href="<?php echo home_url("/pmes") ?>">PME's</a></li>
                        <li class="residencial<?php if(is_page('residencial')) { ?> ativado<?php } ?>"><a href="<?php echo home_url("/residencial") ?>">Residencial</a></li>
                    <?php } ?>
                    </ul>
                </nav>
                <div class="buscaSite">
                    <form action="<?php echo home_url('/'); ?>" method="get" name="formBusca" id="formBusca">
                        <div class="grupo-form">
                            <label for="termo">Busque no site</label>
                            <input type="text" name="s" id="s" class="input-busca" placeholder="<?php echo esc_attr_x( 'Busque no site', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>">
                        </div>
                        <div class="bt-busca">
                            <button type="submit" name="buscar" id="buscar" class="bt-buscar"></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div>