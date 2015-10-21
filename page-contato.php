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
        	<div class="contentTextos" style="position: relative;">
            	<?php the_content(); ?>
                <div style="position: absolute; top:0; right: 0;"><a role="button" class="btn btn-primary" href="https://grupoalgarcdt.elancers.net/frames/algar/frame_geral.asp" target="_blank">Vagas Abertas</a></div>
                <div class="formContato" id="formContato">
                	<form name="formContato" id="formContatoField" action="<?php echo home_url('/'); ?>" method="post" enctype="multipart/form-data">
                    	<div class="form-grupo">
                        	<label for="nome">*Nome</label>
                            <input type="text" name="nome" id="nome" class="form-campo">
                        </div>
                        <div class="form-grupo">
                        	<label for="email">*E-mail</label>
                            <input type="text" name="email" id="email" class="form-campo">
                        </div>
                        <div class="form-grupo">
                        	<label for="tel">*Telefone</label>
                            <input type="text" name="tel" id="tel" class="form-campo2">
                        </div>
                        <div class="form-grupo">
                        	<p>*Você é:</p>
                        	<label for="pfisica" class="radio">
                            <input type="radio" name="pessoa" id="pfisica" class="form-radio" value="Pessoa Física"> Pessoa Física</label>
                            <label for="pjuridica" class="radio">
                            <input type="radio" name="pessoa" id="pjuridica" class="form-radio" value="Pessoa Jurídica"> Pessoa Jurídica</label>
                        </div>
                        <div class="form-grupo">
                        	<label for="segmento">*Selecione área para contato</label>
                            <select name="segmento" id="segmento" class="form-campo3">
                            	<option value="">Escolher</option>
                                <?php $destinatarios = get_option('destinatario'); ?>
                                <?php if(is_array($destinatarios)) { ?>
                                    <?php foreach($destinatarios as $destinatario) { ?>
                                        <option value="<?php echo $destinatario['email'] ?>"><?php echo $destinatario['nome'] ?></option>
                                    <?php } ?>
                                <?php } ?>
                            </select>
                            <input type="hidden" name="nomeSeguimento" id="nomeSeguimento" value="">
                        </div>
                        <div class="form-grupo" id="uploadfile">
                            <label for="fileuploader">Caso necessário, você pode anexar um arquivo à sua solicitação.</label><br>
                            <div id="fileuploader">Enviar Arquivo</div>
                        </div>
                        <input type="hidden" name="nomeArquivo" id="nomeArquivo" value="">
                        <div class="form-grupo">
                        	<label for="nomeEmpresa">*Nome da empresa</label>
                            <input type="text" name="nomeEmpresa" id="nomeEmpresa" class="form-campo">
                        </div>
                        <div class="form-grupo">
                        	<label for="estado">*Estado</label>
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
                        	<label for="cidade">*Cidade</label>
                            <input type="text" name="cidade" id="cidade" class="form-campo2">
                        </div>
                        <div class="form-grupo">
                        	<label for="mensagem">*Mensagem</label>
                            <textarea name="mensagem" id="mensagem" class="form-textarea"></textarea>
                            <input type="hidden" name="action" value="my_action">
                        </div>
                        <button type="submit" name="enviar" id="enviar">Enviar</button>
                    </form>
                </div>
                
            </div>
            <div class="img-destaque">
            <?php // check if the post has a Post Thumbnail assigned to it.
			if ( has_post_thumbnail() ) {
				the_post_thumbnail('full');
			}  else { ?>
            	<img src="<?php echo get_stylesheet_directory_uri(); ?>/fotos/foto-page-contato.png" alt="Entre em Contato">
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
                <img src="<?php echo get_stylesheet_directory_uri(); ?>/fotos/foto-page-contato.png" alt="Entre em Contato">
                <?php } ?>
            </div>
            <?php endwhile; endif; ?>
            <?php //get_template_part('popup','contato'); ?>
        </div>
    </section>
    <script>
        jQuery(document).ready(function() {
            jQuery("#fileuploader").uploadFile({
                url: "<?php echo get_stylesheet_directory_uri(); ?>/upload.php",
                multiple: false,
                dragDrop: false,
                maxFileCount: 1,
                onSuccess: function (files) {
                    //files: list of files
                    //data: response from server
                    //xhr : jquer xhr object
                    jQuery('#nomeArquivo').val(files[0]);
                    jQuery("#uploadfile").html("Arquivo anexado com sucesso!");
                }
            });
        });
    </script>
<?php get_footer(); ?>