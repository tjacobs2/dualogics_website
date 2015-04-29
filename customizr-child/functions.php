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

