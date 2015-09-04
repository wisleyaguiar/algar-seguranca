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
                            <select name="segmento" id="segmento" class="form-campo3">
                            	<option value="">Escolher</option>
                                <?php $destinatarios = get_option('destinatario'); ?>
                                <?php if(is_array($destinatarios)) { ?>
                                <?php foreach($destinatarios as $destinatario) { ?>
                                <option value="<?php echo $destinatario['email'] ?>"><?php echo $destinatario['nome'] ?></option>
                                <?php } ?>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-grupo">
                        	<label for="nomeEmpresa">Nome da empresa</label>
                            <input type="text" name="nomeEmpresa" id="nomeEmpresa" class="form-campo">
                        </div>
                        <div class="form-grupo">
                        	<label for="estado">Estado</label>
                            <select name="estado" id="estado" class="form-campo3">
                                <option value="">Selecione</option>
                                <option value="AC">Acre</option>
                                <option value="AL">Alagoas</option>
                                <option value="AP">Amapá</option>
                                <option value="AM">Amazonas</option>
                                <option value="BA">Bahia</option>
                                <option value="CE">Ceará</option>
                                <option value="DF">Distrito Federal</option>
                                <option value="ES">Espirito Santo</option>
                                <option value="GO">Goiás</option>
                                <option value="MA">Maranhão</option>
                                <option value="MS">Mato Grosso do Sul</option>
                                <option value="MT">Mato Grosso</option>
                                <option value="MG">Minas Gerais</option>
                                <option value="PA">Pará</option>
                                <option value="PB">Paraíba</option>
                                <option value="PR">Paraná</option>
                                <option value="PE">Pernambuco</option>
                                <option value="PI">Piauí</option>
                                <option value="RJ">Rio de Janeiro</option>
                                <option value="RN">Rio Grande do Norte</option>
                                <option value="RS">Rio Grande do Sul</option>
                                <option value="RO">Rondônia</option>
                                <option value="RR">Roraima</option>
                                <option value="SC">Santa Catarina</option>
                                <option value="SP">São Paulo</option>
                                <option value="SE">Sergipe</option>
                                <option value="TO">Tocantins</option>
                            </select>
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
                <div class="area-cliente"><a href="<?php echo get_option('url_area_cliente'); ?>">ÁREA DO CLIENTE</a></div>
            </div>
            <div class="img-destaque">
            <?php // check if the post has a Post Thumbnail assigned to it.
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('full');
			}  else { ?>
            	<img src="<?php echo get_stylesheet_directory_uri(); ?>/fotos/foto-page-contato.png" alt="Entre em Contato">
            <?php } ?>
            </div>
            <?php endwhile; endif; ?>
            <?php //get_template_part('popup','contato'); ?>
        </div>
    </section>
<?php get_footer(); ?>