<?php
/**
* This is where you can copy and paste your functions !
*/

/**
 * Add custom Dualogics copyright
**/
add_filter('tc_credits_display', 'my_custom_credits');
function my_custom_credits(){ 
  $credits = 'Dualogics, LLC.';
  $newline_credits = '';
  return '
    <div class="span4 credits">
      <p> &middot; &copy; '.esc_attr( date( 'Y' ) ).' <a href="'.esc_url( home_url() ).'" title="'.esc_attr(get_bloginfo()).'" rel="bookmark">'.esc_attr(get_bloginfo()).'</a> &middot; '.($credits ? $credits : 'Test').' &middot;'.($newline_credits ? '<br />&middot; '.$newline_credits.' &middot;' : '').'</p>
    </div>';
}

/**
 * Add Google Analytics tracking number
**/
add_action('wp_head', 'my_analytics', 20);
function my_analytics() {
 ?>
  <script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  
    ga('create', 'UA-62413542-1', 'auto');
    ga('send', 'pageview');
  
  </script> 
 <?php
}

/**
 * Move features below Home page (last thing before footer)
**/
//we hook the code on the wp_head hook, this way it will be executed before any html rendering.
add_action ('wp_head', 'move_my_fp');
function move_my_fp() {
  //we unhook the featured pages
  remove_action  ( '__before_main_container', array( TC_featured_pages::$instance , 'tc_fp_block_display'), 10 );

  //we re-hook the block. Check out the priority here : set to 0 to be the first in the list of different actions hooked to this hook 
  add_action  ( '__before_footer', array( TC_featured_pages::$instance , 'tc_fp_block_display'), 0 );
}

