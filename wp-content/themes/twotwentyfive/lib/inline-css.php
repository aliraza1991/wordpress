<?php
 $general_colour = sanitize_hex_color(get_theme_mod('twotwentyfive_general_color', '#fff'));
 $inline_styles =  "
    a {
        color: {$general_colour} !important;
     }
     :focus {
     outline-color:  {$general_colour} !important;
    }
 ";