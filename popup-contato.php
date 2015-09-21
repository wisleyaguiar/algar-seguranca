<div class="popup-contato">
    <!--a href="#" class="bt-fechar-contato">Fechar</a-->
    <div class="num-tel">Entre em contato<br><span><?php echo get_option('tel_box_contato'); ?></span></div>
    <a href="<?php echo home_url() ?>/contato" id="receberContato" class="bt-receber-contato" onClick="dataLayer.push({'receberContato': '<?php echo get_post(get_the_ID())->post_name; ?>'});">Receber contato</a>
</div>