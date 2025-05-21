<?php if (isset($redux_demo["header_layout"])) {
    get_header($redux_demo["header_layout"]);
} else {
    get_header();
}
?>
<div class="<?php if(isset($redux_demo['jp_sidebar']) ){ ?><?php echo esc_html($redux_demo['jp_sidebar']); ?><?php } ?>">
<?php if ( isset($redux_demo['jp_tag1']) && is_tag($redux_demo['jp_tag1'])) { 
		get_template_part($redux_demo['jp_tagtemplate1']); 
	} elseif (isset($redux_demo['jp_tag2']) && is_tag($redux_demo['jp_tag2'])) {
		get_template_part($redux_demo['jp_tagtemplate2']); 
	} elseif (isset($redux_demo['jp_tag3']) && is_tag($redux_demo['jp_tag3'])) {
		get_template_part($redux_demo['jp_tagtemplate3']); 		
	} else { 
		get_template_part('tag_default'); 
	} ?>
</div>	
<?php 
if( isset($redux_demo['footer_layout']) ){
  get_template_part($redux_demo['footer_layout']);
} else{
    get_footer();
}
?>