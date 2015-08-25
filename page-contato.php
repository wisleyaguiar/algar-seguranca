<?php 
/*
Template Name: Contato
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
            	<?php the_content(); ?>
                <div class="formContato" id="formContato">
                	<form name="formContato" action="#" method="post">
                    	<div class="form-grupo">
                        	<label for="nome">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-campo">
                        </div>
                        <div class="form-grupo">
                        	<label for="email">E-mail</label>
                            <input type="text" name="email" id="email" class="form-campo">
                        </div>
                        <div class="form-grupo">
                        	<label for="telfixo">Telefone fixo</label>
                            <input type="text" name="telfixo" id="telfixo" class="form-campo2">
                        </div>
                        <div class="form-grupo">
                        	<label for="cel">Celular</label>
                            <input type="text" name="cel" id="cel" class="form-campo2">
                        </div>
                        <div class="form-grupo">
                        	<p>Você é:</p>
                        	<label for="pfisica" class="radio">
                            <input type="radio" name="pessoa" id="pfisica" class="form-radio" value="Pessoa Física"> Pessoa Física</label>
                            <label for="pjuridica" class="radio">
                            <input type="radio" name="pessoa" id="pjuridica" class="form-radio" value="Pessoa Jurídica"> Pessoa Jurídica</label>
                        </div>
                        <div class="form-grupo">
                        	<label for="segmento">Segmento de atuação</label>
                            <input type="text" name="segmento" id="segmento" class="form-campo">
                        </div>
                        <div class="form-grupo">
                        	<label for="nomeEmpresa">Nome da empresa</label>
                            <input type="text" name="nomeEmpresa" id="nomeEmpresa" class="form-campo">
                        </div>
                        <div class="form-grupo">
                        	<label for="estado">Estado</label>
                            <input type="text" name="estado" id="estado" class="form-campo2">
                        </div>
                        <div class="form-grupo">
                        	<label for="cidade">Cidade</label>
                            <input type="text" name="cidade" id="cidade" class="form-campo2">
                        </div>
                        <div class="form-grupo">
                        	<label for="mensagem">Mensagem</label>
                            <textarea name="mensagem" id="mensagem" class="form-textarea"></textarea>
                        </div>
                        <button type="submit" name="enviar" id="enviar">Enviar</button>
                    </form>
                </div>
                <div class="area-cliente"><a href="#">ÁREA DO CLIENTE</a></div>
            </div>
            <div class="img-destaque">
            	<img src="<?php echo get_stylesheet_directory_uri(); ?>/fotos/foto-page-contato.png" alt="Entre em Contato">
            </div>
            <?php endwhile; endif; ?>
            <?php get_template_part('popup','contato'); ?>
        </div>
    </section>
<?php get_footer(); ?>