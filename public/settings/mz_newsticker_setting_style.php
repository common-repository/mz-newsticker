<?php
require_once dirname( __FILE__ ) . '/settings_api.php';
 

 

/*-----------------------------------------------------
 * trigger setting api class
 *-----------------------------------------------------*/
function mznst_newsticker_get_option( $option, $section, $default = '' ) {

	$options = get_option( $section );

	if ( isset( $options[$option] ) ) {
		return $options[$option];
	}

	return $default;
}


function mznst_newsticker_style_for_setting_options(){
	?>
<style type="text/css">
	.str_move {    
    background:<?php echo mznst_newsticker_get_option( 'mznst_newsticker_bg_color', 'mznst_newsticker_style_settings', '#39393C' );?>;
   
     
	}
	.marquee-items li a{
	color:<?php echo mznst_newsticker_get_option( 'mznst_newsticker_font_color', 'mznst_newsticker_style_settings', '#FFFFFF' );?>;
	font-size:<?php echo mznst_newsticker_get_option( 'mznst_newsticker_font_size', 'mznst_newsticker_style_settings', '16' );?>px;

	}
	.marquee-items li span{

		color:<?php echo mznst_newsticker_get_option( 'mznst_newsticker_icon_color', 'mznst_newsticker_style_settings', '#FFFFFF' );?>;
		font-size:<?php echo mznst_newsticker_get_option( 'mznst_newsticker_icon_size', 'mznst_newsticker_style_settings', '16' );?>px;
	}
	.marquee-items {  
  animation: marquee <?php echo mznst_newsticker_get_option( 'mznst_newsticker_slideshowSpeed', 'mznst_newsticker_general_settings', '3' );?>s linear infinite forwards;   
}
.str_move, .marquee-title{
	height: <?php echo mznst_newsticker_get_option( 'mznst_newsticker_container_height', 'mznst_newsticker_style_settings', '46' );?>px;
}
 
 .marquee-title h2{
 	 font-size: <?php echo mznst_newsticker_get_option( 'mznst_newsticker_title_font_size', 'mznst_newsticker_style_settings', '16' );?>px !important;
 	  padding: <?php echo mznst_newsticker_get_option( 'mznst_newsticker_title_padding', 'mznst_newsticker_style_settings', '13px 10px' );?>;
 	   color: <?php echo mznst_newsticker_get_option( 'mznst_newsticker_title_color', 'mznst_newsticker_style_settings', '#fff' );?>;
 }
	  
.marquee-title{   
  	background: <?php echo mznst_newsticker_get_option( 'mznst_newsticker_title_background', 'mznst_newsticker_style_settings', '#000' );?>;
  }	 
		
</style>
<?php
}
add_action('wp_head','mznst_newsticker_style_for_setting_options');


/*---------------------------------------------------
 * Add script in footer for settings options
 *---------------------------------------------------*/
function mznst_newsticker_script_for_setting_options(){
	?>
<script>
jQuery.noConflict();
(function( $ ) {
  $(function() {

 
$(document).ready(function($){


	  $('.marquee-items').liMarquee({
			direction: '<?php echo mznst_newsticker_get_option( 'mznst_newsticker_direction', 'mznst_newsticker_general_settings', 'left' );?>',		
			loop:-1,			
			scrolldelay: 0,		
			scrollamount:<?php echo mznst_newsticker_get_option( 'mznst_newsticker_slideshowSpeed', 'mznst_newsticker_general_settings', '120' );?>,	
			circular: true,		
			drag: true			
		}); 
  

	 
});


});
})(jQuery);
</script> 
<?php
}
add_action('wp_footer', 'mznst_newsticker_script_for_setting_options');


