<?php

function academy() {
    ob_start();
    get_template_part('tradingAcademy');
    return ob_get_clean();   
} 
add_shortcode( 'ata_academy', 'academy' );

