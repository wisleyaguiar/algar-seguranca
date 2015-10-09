<?php 

// Setando os estilos e javascripts
function algarseguranca_enqueue_style() {
	wp_enqueue_style( 'reset_css', get_stylesheet_directory_uri() . '/css/reset.css', false );
	wp_enqueue_style( 'fonts_custom', get_stylesheet_directory_uri() . '/fonts/stylesheet.css', false );
	wp_enqueue_style( 'icones_free', get_stylesheet_directory_uri() . '/lib/font-awesome-4.4.0/css/font-awesome.min.css', false );
	wp_enqueue_style( 'animate', get_stylesheet_directory_uri() . '/css/animate.css', false );
	wp_enqueue_style( 'fractionslider', get_stylesheet_directory_uri() . '/css/fractionslider.css', false );
	wp_enqueue_style( 'bxslider', get_stylesheet_directory_uri() . '/js/jquery.bxslider/jquery.bxslider.css', false );
    wp_enqueue_style( 'uploadfile', get_stylesheet_directory_uri() . '/css/uploadfile.css', false);
	wp_enqueue_style( 'core', get_stylesheet_directory_uri() . '/style.css', false );
}

function algarseguranca_enqueue_script() {
	wp_enqueue_script( 'bootstrap', get_stylesheet_directory_uri() . '/js/bootstrap.js', array('jquery'), false, true );
	wp_enqueue_script( 'fractionslider', get_stylesheet_directory_uri() . '/js/jquery.fractionslider.min.js', array('jquery'), false, true );
	wp_enqueue_script( 'bxslider', get_stylesheet_directory_uri() . '/js/jquery.bxslider/jquery.bxslider.min.js', array('jquery'), false, true );
    wp_enqueue_script( 'mask', get_stylesheet_directory_uri() . '/js/jquery.mask.min.js', array('jquery'), false, true);
    wp_enqueue_script( 'validation', get_stylesheet_directory_uri() . '/js/jquery.validate.js', array('jquery'), false, true);
    wp_enqueue_script( 'uploadfile', get_stylesheet_difectory_uri() . '/js/jquery.uploadfile.min.js', array('jquery'), false, true);
	wp_enqueue_script( 'custom', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), false, true );

    wp_localize_script( 'custom', 'ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'algarseguranca_enqueue_style' );
add_action( 'wp_enqueue_scripts', 'algarseguranca_enqueue_script' );

// Imagens destaques
if ( function_exists( 'add_theme_support' ) ) { 
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 150, 150, true ); // default Post Thumbnail dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size( 'pages-thumb', 350, 9999 ); //300 pixels wide (and unlimited height)
}

if (class_exists('MultiPostThumbnails')) {
    new MultiPostThumbnails(
        array(
            'label' => 'Imagem Mobile',
            'id' => 'mobile-image',
            'post_type' => 'page'
        )
    );
}

// Customizando o Admin
// Custom WordPress Login Logo
function my_login_logo() { ?>
<style type="text/css">
   body.login div#login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri() ?>/images/logo-algar-geral.png);
        padding-bottom: 30px;
		background-size:auto;
		width:177px;
   }
 </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
//Link na tela de login para a página inicial 
function my_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'my_login_logo_url' );
 
function my_login_logo_url_title() {
    return 'Algar Segurança';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );

// Menus do Site
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu-1' => __( 'Header Menu 1' ),
      'header-menu-2' => __( 'Header Menu 2' ),
	  'sidebar-menu-1' => __( 'Lateral Menu 1' ),
	  'menu-service-empresa' => __( 'Menu Serviços Empresa' ),
	  'menu-service-industria' => __( 'Menu Serviços Industria' ),
	  'menu-service-rural' => __( 'Menu Serviços Rural' ),
	  'menu-service-condominios' => __( 'Menu Serviços Condomínios' ),
	  'menu-service-pmes' => __( 'Menu Serviços PME&acute;s' ),
	  'menu-service-residencial' => __( 'Menu Serviços Residencial' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

// Custom posts
include('includes/onde-estamos.php');

// Shortcode soluções
// Add Shortcode
function solucoes_shortcode( $atts , $content = null ) {
	$content = str_replace('<p>','',$content);
	$content = str_replace('</p>','',$content);
	// Code
	return '<ul class="listaSolucoes">' . do_shortcode($content) . '</ul>';
}
add_shortcode( 'solucoes', 'solucoes_shortcode' );

// Add Shortcode
function item_shortcode( $atts , $content = null ) {
	
	$content = str_replace('<p>','',$content);
	$content = str_replace('</p>','',$content);
	
	// Attributes
	extract( shortcode_atts(
		array(
			'icone' => 'cpi',
			'titulo' => 'Consultoria e projetos integrados',
		), $atts )
	);
	
	return '<li id="'.$atts['icone'].'"><a class="'.$atts['icone'].'">'.$atts['titulo'].'</a><div class="toltip"><div class="pointer-toltip"></div><p>'.$content.'</p></div></li>';
	
}
add_shortcode( 'item', 'item_shortcode' );

// Opções do Tema
add_action('admin_menu', 'add_global_custom_options');
function add_global_custom_options()
{
    add_options_page('Opções do Tema', 'Opções do Tema', 'manage_options', 'functions','global_custom_options');
}

function global_custom_options()
{
?>
    <div class="wrap">
        <h2 style="margin-bottom:30px;">Página de Opções</h2>
        <form method="post" action="options.php" enctype="multipart/form-data">
            <?php wp_nonce_field('update-options') ?>
            <style type="text/css">
				@import url(//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css);
			</style>
            <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
            <script>
  jQuery(function() {
    jQuery( "#tabs" ).tabs();
  });
  </script>
            <div id="tabs">
  <ul>
    <li><a href="#tabs-1">Links Diversos</a></li>
    <li><a href="#tabs-2">Formulário de Contato</a></li>
  </ul>
  <div id="tabs-1">
            <table class="form-table">
              <tbody>
                <tr>
                  <th scope="row"><label for="url_area_cliente">URL Área do Cliente:</label></th>
                  <td><input type="text" name="url_area_cliente" value="<?php echo get_option('url_area_cliente'); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                  <th scope="row"><label for="url_gestao_doc">URL Área Gestão de Documentos:</label></th>
                  <td><input type="text" name="url_gestao_doc" value="<?php echo get_option('url_gestao_doc'); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                  <th scope="row"><label for="tel_box_contato">Nº Telefone Box Contato:</label></th>
                  <td><input type="text" name="tel_box_contato" value="<?php echo get_option('tel_box_contato'); ?>" class="regular-text" /></td>
                </tr>
                <tr>
                  <th scope="row"><label for="url_facebook">URL Facebook:</label></th>
                  <td><input type="text" name="url_facebook" value="<?php echo get_option('url_facebook'); ?>" class="regular-text" /></td>
                </tr>
              </tbody>
            </table>
            </div>
  <div id="tabs-2">
    <h3>Destinatários dos Emails:</h3>
    <?php
	$destinatarios = get_option('destinatario');
	$c = 0;
	if(is_array($destinatarios)) { ?>
    <table width="100%" border="0">
      <tbody class="lista-destinos">
        <?php foreach($destinatarios as $destinatario) { ?>
        <?php if(isset($destinatario['nome']) || isset($destinatario['email'])) { ?> 
        <tr>
          <td><input type="text" value="<?php echo $destinatario['nome']; ?>" name="destinatario[<?php echo $c; ?>][nome]" style="width:100%"></td>
          <td><input type="text" value="<?php echo $destinatario['email']; ?>" name="destinatario[<?php echo $c; ?>][email]" style="width:100%"></td>
          <td><button type="button" class="button button-primary remove">Remover</button></td>
        </tr>
        <?php $c = $c+1; } ?>
        <?php } ?>
      </tbody>
    </table>
	<?php } else { ?>
    <table width="100%" border="0">
      <tbody class="lista-destinos">
      </tbody>
    </table>
    <p>Nenhum Destinatário Cadastrado.</p>
    <?php } ?>
    <button type="button" class="button button-primary" id="addMaisItens">Adicionar Mais Itens</button>
    <script>
		var count = <?php echo $c; ?>;
		jQuery('#addMaisItens').click(function(e){
			e.preventDefault();
			count = count+1;
			jQuery('.lista-destinos').append('<tr><td><input type="text" value="" name="destinatario['+count+'][nome]" style="width:100%"></td><td><input type="text" value="" name="destinatario['+count+'][email]" style="width:100%"></td><td><button type="button" class="button button-primary remove">Remover</button></td></tr>');
			return false;
		});
		jQuery('.remove').live('click',function(){
			jQuery(this).parent().parent().remove();
		});
	</script>
    <h3>Configuração de Envio:</h3>
    <table class="form-table">
      <tbody>
        <tr>
          <th scope="row"><label for="server_smtp">Servidor SMTP:</label></th>
          <td><input type="text" name="server_smtp" value="<?php echo get_option('server_smtp'); ?>" class="regular-text" /></td>
        </tr>
        <tr>
          <th scope="row"><label for="user_smtp">Usuário:</label></th>
          <td><input type="text" name="user_smtp" value="<?php echo get_option('user_smtp'); ?>" class="regular-text" /></td>
        </tr>
        <tr>
          <th scope="row"><label for="pass_smtp">Senha:</label></th>
          <td><input type="password" name="pass_smtp" value="<?php echo get_option('pass_smtp'); ?>" class="regular-text" /></td>
        </tr>
      </tbody>
    </table>
  </div>
</div>

            <p class="submit"><input type="submit" name="Submit" value="Salvar alterações" class="button button-primary" /></p>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="url_area_cliente,url_gestao_doc,tel_box_contato,url_facebook,destinatario,server_smtp,user_smtp,pass_smtp" />
        </form>
    </div>
<?php
}

// Envio de formulário
add_action( 'wp_ajax_my_action', 'enviarFormulario' );
add_action( 'wp_ajax_nopriv_my_action', 'enviarFormulario' );

    function enviarFormulario() {
        global $wpdb;

        require_once('lib/PHPMailer-master/PHPMailerAutoload.php');

        // Recebendo os dados do form
        $nome = strip_tags(trim($_POST['nome']));
        $email = strip_tags(trim($_POST['email']));
        $tel = strip_tags(trim($_POST['tel']));
        $pessoa = strip_tags(trim($_POST['pessoa']));
        $segmento = strip_tags(trim($_POST['segmento']));
        $nomeSeguimento = strip_tags(trim($_POST['nomeSeguimento']));
        $nomeEmpresa = strip_tags(trim($_POST['nomeEmpresa']));
        $estado = strip_tags(trim($_POST['estado']));
        $cidade = strip_tags(trim($_POST['cidade']));
        $mensagem = strip_tags(trim($_POST['mensagem']));

        // Validando dados pelo servidor
        $erros = 0;
        $msg = "";

        if(empty($nome) || strlen($nome)<3) {
            $erros++;
            $msg .= "Nome não informado.";
        }

        if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)){
            $erros++;
            $msg .= "Email inválido.";
        }

        if(empty($tel) || strlen($tel)<11) {
            $erros++;
            $msg .= "Telefone não informado.";
        }

        if(empty($pessoa)) {
            $erros++;
            $msg .= "Você é não informado.";
        }

        if(empty($segmento)) {
            $erros++;
            $msg .= "Segmento não informado.";
        }

        if(empty($nomeEmpresa)) {
            $erros++;
            $msg .= "Nome da empresa não informado.";
        }

        if(empty($estado)) {
            $erros++;
            $msg .= "Estado não informado.";
        }

        if(empty($cidade)) {
            $erros++;
            $msg .= "Cidade não informado.";
        }

        if(empty($mensagem)) {
            $erros++;
            $msg .= "Mensagem não informado.";
        }

        if($erros>0){
            $resp['msg'] = $msg;
            $resp['erro'] = true;
        } else {
            $mail = new PHPMailer;
            $mail->CharSet = 'UTF-8';

            //$mail->SMTPDebug = 3;                               // Enable verbose debug output

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = get_option('server_smtp');              // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = get_option('user_smtp');            // SMTP username
            $mail->Password = get_option('pass_smtp');            // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            $mail->From = get_option('user_smtp');
            $mail->FromName = 'Contato Algar Segurança';

            // Array Segmento
            $destinatario = explode(',',$segmento);

            if(is_array($destinatario)) {
                if(count($destinatario)>1){
                    for($i=0;$i<count($destinatario);$i++){
                        $mail->addAddress($destinatario[$i]);
                    }
                } else {
                    $mail->addAddress($destinatario[0]);
                }
            } else {
                $mail->addAddress($segmento);     // Add a recipient
            }
            $mail->addReplyTo($email, $nome);
            //$mail->addCC('cc@example.com');
            $mail->addBCC('muniz@tobe.ppg.br');
            $mail->addBCC('wisley@tobe.ppg.br');

            $mail->isHTML(true);                  // Set email format to HTML

            $mail->Subject = 'Contato Via Site Algar Seguranca';
            $mail->Body    = '<h2>Dados Enviados:</h2><p>Nome: '.$nome.'</p><p>Email: '.$email.'</p><p>Telefone: '.$tel.'</p><p>Tipo Pessoa: '.$pessoa.'</p><p>Segmento de destino: '.$nomeSeguimento.'</p><p>Nome da Empresa: '.$nomeEmpresa.'</p><p>Estado: '.$estado.'</p><p>Cidade: '.$cidade.'</p><p>Mensagem: '.$mensagem.'</p>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if(!$mail->send()) {
                $resp['msg'] = 'Message could not be sent. Mailer Error: ' . $mail->ErrorInfo;
                $resp['erro'] = true;
            } else {

                $wpdb->insert(
                    'wp_contatos',
                    array(
                        'nome' => $nome,
                        'email' => $email,
                        'tel' => $tel,
                        'pessoa' => $pessoa,
                        'segmento' => $segmento,
                        'nomeEmpresa' => $nomeEmpresa,
                        'estado' => $estado,
                        'cidade' => $cidade,
                        'mensagem' => $mensagem
                    ),
                    array(
                        '%s',
                        '%s',
                        '%s',
                        '%s',
                        '%s',
                        '%s',
                        '%s',
                        '%s',
                        '%s'
                    )
                );

                $resp['msg'] = 'Mensagem Enviada com sucesso!';
                $resp['erro'] = false;
            }
        }

        echo json_encode($resp);
        wp_die();

    }