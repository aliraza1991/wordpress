<?php

function twotwentyfive_post_meta () {
  printf(esc_html__('Posted on %s', 'twotwentyfive'),
  '<a href="'.esc_url(get_permalink()).'"><time datetime="'. esc_attr(get_the_date('l F j, Y')) .'"> '.esc_html(get_the_date('l F j, Y')).' </time>
  </a>'
);
printf(esc_html__('By %s', 'twotwentyfive'),
  '<a href="'.esc_url(get_author_posts_url(get_the_author_meta('ID'))).'"> '.esc_html(get_the_author()).'</a>'
);
}

function twotwentyfive_readmore_link(){ 
  echo '<a href="'.get_the_permalink().'" title="'.the_title_attribute(['echo'=>false]).'">';
   printf(wp_kses(
     __('Read more <span class="u-screen-reader_text">About %s</span>', 'twotwentyfive'),
     [
       'span'=> [
         'class'=>[

         ]
       ]
     ]
   ),
   get_the_title()
  );
  echo '</a>';
 }

 function twotwentyfive_delete_post() {
   $url = add_query_arg([
     'action' => 'twotwentyfive_delete_post',
     'post' => get_the_ID(),
     'nonce' => wp_create_nonce('twotwentyfive_delete_post' .get_the_ID())
   ], home_url());
   if(current_user_can('delete_post' , get_the_ID())){
      return "<a href='{$url}'>". esc_html__('Delete Post', 'twotwentyfive'). "</a>";
   }
 }
?>