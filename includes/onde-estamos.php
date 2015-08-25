<?php
//Custom post Onde Estamos
 
add_action( 'init', 'OndeEstamosInit' );
function OndeEstamosInit() { global $ondeEstamos; $ondeEstamos = new OndeEstamos(); }
 
class OndeEstamos {
 
				function OndeEstamos() {
				register_post_type( 'onde-estamos',
					array(
						'label' => __( 'Onde Estamos' ),
						'singular_label' => __( 'Onde Estamos' ),
						'public' => true,
						'menu_position' => 5,
						'query_var' => true,
						'supports' => array('title','thumbnail','excerpt'),
						'rewrite' => array('slug'=>'onde-estamos')
						//'taxonomies' => array('post_tag')
					)
				);
 
                add_action("admin_init", array(&$this, "admin_init"));
                add_action('save_post', array(&$this, 'save_post_data'));
 
                // Add custom post navigation columns
                add_filter("manage_edit-onde-estamos_columns", array(&$this, "nav_columns"));
                add_action("manage_posts_custom_column", array(&$this, "custom_nav_columns"));
 
        }
 
        function admin_init(){
                add_meta_box("oe-dados-meta", "Dados de Localização", array(&$this, "ondeEstamosDadosMetaBox"), "onde-estamos", "normal", "high");
                add_meta_box("oe-mapa-meta", "Pontos no Mapa", array(&$this, "ondeEstamosMapaMetaBox"), "onde-estamos", "normal", "high");
        }
 
        function ondeEstamosDadosMetaBox() {
            global $post;
            $oe_cidade = get_post_meta($post->ID, 'oe_cidade', true);
			$oe_estado = get_post_meta($post->ID, 'oe_estado', true);
			$oe_end	   = get_post_meta($post->ID, 'oe_end', true);
			$oe_bairro = get_post_meta($post->ID, 'oe_bairro', true);
			$oe_cep	   = get_post_meta($post->ID, 'oe_cep', true);
			$oe_tel	   = get_post_meta($post->ID, 'oe_tel', true);
 
            // Verify
            echo'<input type="hidden" name="oe_dados_noncename" id="oe_dados_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />';
 
            // Fields entry   
			?>
            <table width="100%" border="0">
              <tbody>
                <tr>
                  <td width="30%"><p><strong>Cidade:</strong></p></td>
                  <td width="70%"><p><input type="text" name="oe_cidade" id="oe_cidade" placeholder="Cidade" value="<?php echo $oe_cidade; ?>" style="width:100%;"></p></td>
                </tr>
                <tr>
                  <td><p><strong>Estado:</strong></p></td>
                  <td><p><select name="oe_estado" id="oe_estado">
                            <option value="">Selecione</option>
                            <option value="AC"<?php if($oe_estado=='AC') { ?> selected<?php } ?>>Acre</option>
                            <option value="AL"<?php if($oe_estado=='AL') { ?> selected<?php } ?>>Alagoas</option>
                            <option value="AP"<?php if($oe_estado=='AP') { ?> selected<?php } ?>>Amapá</option>
                            <option value="AM"<?php if($oe_estado=='AM') { ?> selected<?php } ?>>Amazonas</option>
                            <option value="BA"<?php if($oe_estado=='BA') { ?> selected<?php } ?>>Bahia</option>
                            <option value="CE"<?php if($oe_estado=='CE') { ?> selected<?php } ?>>Ceará</option>
                            <option value="DF"<?php if($oe_estado=='DF') { ?> selected<?php } ?>>Distrito Federal</option>
                            <option value="ES"<?php if($oe_estado=='ES') { ?> selected<?php } ?>>Espirito Santo</option>
                            <option value="GO"<?php if($oe_estado=='GO') { ?> selected<?php } ?>>Goiás</option>
                            <option value="MA"<?php if($oe_estado=='MA') { ?> selected<?php } ?>>Maranhão</option>
                            <option value="MS"<?php if($oe_estado=='MS') { ?> selected<?php } ?>>Mato Grosso do Sul</option>
                            <option value="MT"<?php if($oe_estado=='MT') { ?> selected<?php } ?>>Mato Grosso</option>
                            <option value="MG"<?php if($oe_estado=='MG') { ?> selected<?php } ?>>Minas Gerais</option>
                            <option value="PA"<?php if($oe_estado=='PA') { ?> selected<?php } ?>>Pará</option>
                            <option value="PB"<?php if($oe_estado=='PB') { ?> selected<?php } ?>>Paraíba</option>
                            <option value="PR"<?php if($oe_estado=='PR') { ?> selected<?php } ?>>Paraná</option>
                            <option value="PE"<?php if($oe_estado=='PE') { ?> selected<?php } ?>>Pernambuco</option>
                            <option value="PI"<?php if($oe_estado=='PI') { ?> selected<?php } ?>>Piauí</option>
                            <option value="RJ"<?php if($oe_estado=='RJ') { ?> selected<?php } ?>>Rio de Janeiro</option>
                            <option value="RN"<?php if($oe_estado=='RN') { ?> selected<?php } ?>>Rio Grande do Norte</option>
                            <option value="RS"<?php if($oe_estado=='RS') { ?> selected<?php } ?>>Rio Grande do Sul</option>
                            <option value="RO"<?php if($oe_estado=='RO') { ?> selected<?php } ?>>Rondônia</option>
                            <option value="RR"<?php if($oe_estado=='RR') { ?> selected<?php } ?>>Roraima</option>
                            <option value="SC"<?php if($oe_estado=='SC') { ?> selected<?php } ?>>Santa Catarina</option>
                            <option value="SP"<?php if($oe_estado=='SP') { ?> selected<?php } ?>>São Paulo</option>
                            <option value="SE"<?php if($oe_estado=='SE') { ?> selected<?php } ?>>Sergipe</option>
                            <option value="TO"<?php if($oe_estado=='TO') { ?> selected<?php } ?>>Tocantins</option>
                        </select></p></td>
                </tr>
                <tr>
                  <td><p><strong>Endereço:</strong></p></td>
                  <td><p><input type="text" name="oe_end" id="oe_end" placeholder="Endereço" value="<?php echo $oe_end; ?>" style="width:100%;"></p></td>
                </tr>
                <tr>
                  <td><p><strong>Bairro:</strong></p></td>
                  <td><p><input type="text" name="oe_bairro" id="oe_bairro" placeholder="Bairro" value="<?php echo $oe_bairro; ?>" style="width:100%;"></p></td>
                </tr>
                <tr>
                  <td><p><strong>CEP:</strong></p></td>
                  <td><p><input type="text" name="oe_cep" id="oe_cep" placeholder="CEP" value="<?php echo $oe_cep; ?>" style="width:100%;"></p></td>
                </tr>
                <tr>
                  <td><p><strong>Telefone:</strong></p></td>
                  <td><p><input type="text" name="oe_tel" id="oe_tel" placeholder="Telefone" value="<?php echo $oe_tel; ?>" style="width:100%;"></p></td>
                </tr>
              </tbody>
            </table>
<?php   }            
 
        function ondeEstamosMapaMetaBox() {
            global $post;
            $oe_ponto_top = get_post_meta($post->ID, 'oe_ponto_top', true);
			$oe_ponto_left = get_post_meta($post->ID, 'oe_ponto_left', true);
 
            // Verify
            echo'<input type="hidden" name="oe_mapa_noncename" id="oe_mapa_noncename" value="'.wp_create_nonce( plugin_basename(__FILE__) ).'" />'; 
 
            //Field entry
            ?>
            <table width="100%" border="0">
              <tbody>
                <tr>
                  <td width="30%"><p><strong>Posição top</strong></p></td>
                  <td width="70%"><p><input type="text" name="oe_ponto_top" id="oe_ponto_top" value="<?php echo $oe_ponto_top; ?>" placeholder="ex.: 100px" style="width:50%;"></p></td>
                </tr>
                <tr>
                  <td><p><strong>Posição left</strong></p></td>
                  <td><p><input type="text" name="oe_ponto_left" id="oe_ponto_left" value="<?php echo $oe_ponto_left; ?>" placeholder="ex.: 100px" style="width:50%;"></p></td>
                </tr>
              </tbody>
            </table>
            
<?php   }
 
        function save_post_data( $post_id ) {
                global $post;
 
                // Verify slider url
                if ( !wp_verify_nonce( $_POST["oe_dados_noncename"], plugin_basename(__FILE__) )) {
                        return $post_id;
                }
                if ( 'page' == $_POST['post_type'] ) {
                        if ( !current_user_can( 'edit_page', $post_id ))
                                return $post_id;
                } else {
                        if ( !current_user_can( 'edit_post', $post_id ))
                                return $post_id;
                }
 
                $oe_cidade = $_POST['oe_cidade'];                    
                // New, Update, and Delete
                if(get_post_meta($post_id, 'oe_cidade') == "") 
                        add_post_meta($post_id, 'oe_cidade', $oe_cidade, true);
                elseif($oe_cidade != get_post_meta($post_id, 'oe_cidade', true))
                        update_post_meta($post_id, 'oe_cidade', $oe_cidade); 
                elseif($oe_cidade == "")
                        delete_post_meta($post_id, 'oe_cidade', get_post_meta($post_id, 'oe_cidade', true));
				
				$oe_estado = $_POST['oe_estado'];                    
                // New, Update, and Delete
                if(get_post_meta($post_id, 'oe_estado') == "") 
                        add_post_meta($post_id, 'oe_estado', $oe_estado, true);
                elseif($oe_estado != get_post_meta($post_id, 'oe_estado', true))
                        update_post_meta($post_id, 'oe_estado', $oe_estado); 
                elseif($oe_estado == "")
                        delete_post_meta($post_id, 'oe_estado', get_post_meta($post_id, 'oe_estado', true));
				
				$oe_end = $_POST['oe_end'];                    
                // New, Update, and Delete
                if(get_post_meta($post_id, 'oe_end') == "") 
                        add_post_meta($post_id, 'oe_end', $oe_end, true);
                elseif($oe_end != get_post_meta($post_id, 'oe_end', true))
                        update_post_meta($post_id, 'oe_end', $oe_end); 
                elseif($oe_end == "")
                        delete_post_meta($post_id, 'oe_end', get_post_meta($post_id, 'oe_end', true));
				
				$oe_bairro = $_POST['oe_bairro'];                    
                // New, Update, and Delete
                if(get_post_meta($post_id, 'oe_bairro') == "") 
                        add_post_meta($post_id, 'oe_bairro', $oe_bairro, true);
                elseif($oe_bairro != get_post_meta($post_id, 'oe_bairro', true))
                        update_post_meta($post_id, 'oe_bairro', $oe_bairro); 
                elseif($oe_bairro == "")
                        delete_post_meta($post_id, 'oe_bairro', get_post_meta($post_id, 'oe_bairro', true));
				
				$oe_cep = $_POST['oe_cep'];                    
                // New, Update, and Delete
                if(get_post_meta($post_id, 'oe_cep') == "") 
                        add_post_meta($post_id, 'oe_cep', $oe_cep, true);
                elseif($oe_cep != get_post_meta($post_id, 'oe_cep', true))
                        update_post_meta($post_id, 'oe_cep', $oe_cep); 
                elseif($oe_cep == "")
                        delete_post_meta($post_id, 'oe_cep', get_post_meta($post_id, 'oe_cep', true));
				
				$oe_tel = $_POST['oe_tel'];                    
                // New, Update, and Delete
                if(get_post_meta($post_id, 'oe_tel') == "") 
                        add_post_meta($post_id, 'oe_tel', $oe_tel, true);
                elseif($oe_tel != get_post_meta($post_id, 'oe_tel', true))
                        update_post_meta($post_id, 'oe_tel', $oe_tel); 
                elseif($oe_tel == "")
                        delete_post_meta($post_id, 'oe_tel', get_post_meta($post_id, 'oe_tel', true));                            
 
 
                // Verify slider target
                if ( !wp_verify_nonce( $_POST["oe_mapa_noncename"], plugin_basename(__FILE__) )) {
                        return $post_id;
                }
                if ( 'page' == $_POST['post_type'] ) {
                        if ( !current_user_can( 'edit_page', $post_id ))
                                return $post_id;
                } else {
                        if ( !current_user_can( 'edit_post', $post_id ))
                                return $post_id;
                }
 
                $oe_ponto_top = $_POST['oe_ponto_top'];                    
                // New, Update, and Delete
                if(get_post_meta($post_id, 'oe_ponto_top') == "") 
                        add_post_meta($post_id, 'oe_ponto_top', $oe_ponto_top, true);
                elseif($oe_ponto_top != get_post_meta($post_id, 'oe_ponto_top', true))
                        update_post_meta($post_id, 'oe_ponto_top', $oe_ponto_top); 
                elseif($oe_ponto_top == "")
                        delete_post_meta($post_id, 'oe_ponto_top', get_post_meta($post_id, 'oe_ponto_top', true));
				
				$oe_ponto_left = $_POST['oe_ponto_left'];                    
                // New, Update, and Delete
                if(get_post_meta($post_id, 'oe_ponto_left') == "") 
                        add_post_meta($post_id, 'oe_ponto_left', $oe_ponto_left, true);
                elseif($oe_ponto_left != get_post_meta($post_id, 'oe_ponto_left', true))
                        update_post_meta($post_id, 'oe_ponto_left', $oe_ponto_left); 
                elseif($oe_ponto_left == "")
                        delete_post_meta($post_id, 'oe_ponto_left', get_post_meta($post_id, 'oe_ponto_left', true));        
        }
 
        function nav_columns($columns) {
                $columns = array(
                        "cb" => "<input type=\"checkbox\" />",
                        "title" => "Nome da Cidade",
                        "estado" => "Estado",
                        "cep" => "CEP",
						"telefone" => "Telefone"
                );
 
                return $columns;
        }
 
        function custom_nav_columns($column) {
                global $post;
                switch ($column) {
                        case "estado":
                                $meta = get_post_custom();
                                echo $meta["oe_estado"][0];
                                break;
                        case "cep":
                                $meta = get_post_custom();
                                echo $meta["oe_cep"][0];
                                break;
						case "telefone":
                                $meta = get_post_custom();
                                echo $meta["oe_tel"][0];
                                break;
                }
        }
 
}
// End Onde Estamos Painel