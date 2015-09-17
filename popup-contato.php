<div class="popup-contato">
    <!--a href="#" class="bt-fechar-contato">Fechar</a-->
    <div class="num-tel">Entre em contato<br><span><?php echo get_option('tel_box_contato'); ?>2</span></div>
    <button type="submit" name="receberContato" id="receberContato" class="bt-receber-contato" onClick="window.location='<?php echo home_url() ?>/contato'; dataLayer.push('receberContato','<?php echo get_the_ID(); ?>');">Receber contato</button>
</div>