<?php
/**
* Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
* @return bool True if metabox should show
*/
function efpose_hide_if_no_cats( $field ) {
// Don't show this field if not in the cats category.
if ( ! has_tag( 'cats', $field->object_id ) ) {
  return false;
}
return true;
}
/**
* Manually render a field.
*/
function efpose_render_row_cb( $field_args, $field ) {
$classes     = $field->row_classes();
$id          = $field->args( 'id' );
$label       = $field->args( 'name' );
$name        = $field->args( '_name' );
$value       = $field->escaped_value();
$description = $field->args( 'description' );
?>
<div class="custom-field-row <?php echo esc_attr( $classes ); ?>">
  <p>
    <label for="<?php echo esc_attr( $id ); ?>"><?php echo esc_html( $label ); ?></label>
  </p>
  <p>
    <input id="<?php echo esc_attr( $id ); ?>" type="text" name="<?php echo esc_attr( $name ); ?>" value="<?php echo esc_html( $value ); ?>"/>
  </p>
  <p class="description"><?php echo esc_html( $description ); ?></p>
</div>
<?php
}
/**
* Manually render a field column display.
*/
function efpose_display_text_small_column( $field_args, $field ) {
?>
<div class="custom-column-display <?php echo esc_attr( $field->row_classes() ); ?>">
  <p><?php echo esc_html( $field->escaped_value() ); ?></p>
  <p class="description"><?php echo esc_html( $field->args( 'description' ) ); ?></p>
</div>
<?php
}
/**
* Conditionally displays a message if the $post_id is 2
*/
function efpose_before_row_if_2( $field_args, $field ) {
if ( 2 == $field->object_id ) {
  echo '<p>Testing <b>"before_row"</b> parameter (on $post_id 2)</p>';
} else {
  echo '<p>Testing <b>"before_row"</b> parameter (<b>NOT</b> on $post_id 2)</p>';
}
}
//==================FUNCTION TO PLACE METABOX TO POST FORMAT. DO NOT DELETE==================
function efpose_show_on_post_format( $display, $post_format ) {
  if ( ! isset( $post_format['show_on']['key'] ) ) {
      return $display;
  }
  $post_id = 0;
  // If we're showing it based on ID, get the current ID
  if ( isset( $_GET['post'] ) ) {
      $post_id = $_GET['post'];
  } elseif ( isset( $_POST['post_ID'] ) ) {
      $post_id = $_POST['post_ID'];
  }
  if ( ! $post_id ) {
      return $display;
  }
  $value  = get_post_format($post_id);
  if ( empty( $post_format['show_on']['key'] ) ) {
      return (bool) $value;
  }
  return $value == $post_format['show_on']['value'];
}
add_filter( 'cmb2_show_on', 'efpose_show_on_post_format', 10, 2 );
//==================START METABOX PLACE ON POST FORMAT GALLERY==================
add_action( 'cmb2_admin_init', 'efpose_gallery_metabox' );
function efpose_gallery_metabox() {
$efpose_grouppf = new_cmb2_box( array(
     'id'            => 'efpose_gallery_metabox',
     'title'         => __('Article Gallery', 'efpose'),
     'object_types' => array( 'post', ), // Post type
     'context'       => 'normal',
   'show_on'      => array( 'key' => 'post_format', 'value' => 'gallery' ),    
     'priority'      => 'high',
     'show_names'    => true, // Show field names on the left
) );  
//embedd gallery here
$efpose_grouppf->add_field( array(
  'name'        => esc_html__( 'Insert gallery code here', 'efpose' ),
  'description' => esc_html__( 'Create gallery on your post, then cut and paste the code here. Custom Place for Gallery instead on standard post location', 'efpose' ),
  'id'          => 'efpose_gallery',
  'type'        => 'text',
) );  
}
//==================START METABOX PLACE ON POST FORMAT VIDEO==================
add_action( 'cmb2_admin_init', 'efpose_singlepostvideo_metabox' );
function efpose_singlepostvideo_metabox() {
$efpose_grouppf = new_cmb2_box( array(
     'id'            => 'efpose_singlepostvideo_metabox',
     'title'         => __('VIDEO LINK', 'efpose'),
     'object_types' => array( 'post', ), // Post type
     'context'       => 'normal',
	 'show_on'      => array( 'key' => 'post_format', 'value' => 'video' ),    
     'priority'      => 'high',
     'show_names'    => true, // Show field names on the left
) );  
// embedd video here
$efpose_grouppf->add_field( array(
	  'name'        => esc_html__( 'Video URL', 'efpose' ),
	  'description' => esc_html__( 'Insert Video URL Here', 'efpose' ),
	  'id'          => 'efpose_video',
	  'type'        => 'text',
) );  
}
//==================START METABOX PLACE ON POST FORMAT AUDIO==================
add_action( 'cmb2_admin_init', 'efpose_singlepostaudio_metabox' );
function efpose_singlepostaudio_metabox() {
$efpose_grouppf = new_cmb2_box( array(
     'id'            => 'efpose_singlepostaudio_metabox',
     'title'         => __('AUDIO LINK', 'efpose'),
     'object_types' => array( 'post', ), // Post type
     'context'       => 'normal',
	 'show_on'      => array( 'key' => 'post_format', 'value' => 'audio' ),    
     'priority'      => 'high',
     'show_names'    => true, // Show field names on the left
) );  

// embedd audio here
$efpose_grouppf->add_field( array(
	  'name'        => esc_html__( 'Audio URL', 'efpose' ),
	  'description' => esc_html__( 'Insert Audio URL Here', 'efpose' ),
	  'id'          => 'efpose_audio',
	  'type'        => 'text',
) );  
}
//==================START METABOX PLACE ON POST ==================
add_action( 'cmb2_admin_init', 'efpose_postintro_metabox' );
function efpose_postintro_metabox() {
$efpose_grouppf = new_cmb2_box( array(
     'id'            => 'efpose_postintro_metabox',
     'title'         => __('CUSTOMIZE POST ELEMENTS', 'efpose'),
     'object_types' => array( 'post', ), // Post type
     'context'       => 'normal',
     'priority'      => 'high',
     'show_names'    => true, // Show field names on the left
) );  
    $efpose_grouppf->add_field( array(
        'name'             => 'SIDEBAR POSITION',
        'desc'             => 'Define Sidebar Position',
        'id'               => 'efpose_sidebar',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => 'custom',
        'options'          => array(
            'default' => esc_html__( 'Right/default', 'efpose' ),		
            'left' => esc_html__( 'Left', 'efpose' ),
        ),
    ) );
    $efpose_grouppf->add_field( array(
        'name'             => 'POST COLUMNS',
        'desc'             => 'Total Post Columns to Display',
        'id'               => 'efpose_post_columns',
        'type'             => 'select',
        'show_option_none' => false,
        'default'          => 'custom',
        'options'          => array(
            'none' => esc_html__( '1 Column', 'efpose' ),		
            'ctest' => esc_html__( '2 Columns', 'efpose' ),
        ),
    ) );
	$efpose_grouppf->add_field( array(
		  'name'        => esc_html__( 'ARTICLE INTRO', 'efpose' ),
		  'description' => esc_html__( 'Type Intro For Your Article', 'efpose' ),
		  'id'          => 'post_intro',
		  'type' => 'textarea_small',
	 )); 
	$efpose_grouppf->add_field( array(
		'name' => esc_html__( 'ADV Vertical', 'efpose' ),
		'id'   => 'adv_vert',
		'type' => 'file',
        'preview_size' => 'medium', // Image size to use when previewing in the admin.		
	) );
	$efpose_grouppf->add_field( array(
		  'name'        => esc_html__( 'ADV Vertical link', 'efpose' ),
		  'description' => esc_html__( 'Type complete link ex. https://abcd.com', 'efpose' ),
		  'id'          => 'adv_vertlink',
		  'type' => 'text',
	 ));
	$efpose_grouppf->add_field( array(
		'name' => esc_html__( 'ADV Top', 'efpose' ),
		'id'   => 'adv_top',
		'type' => 'file',
        'preview_size' => 'medium', // Image size to use when previewing in the admin.		
	) );	
	$efpose_grouppf->add_field( array(
		  'name'        => esc_html__( 'ADV Top link', 'efpose' ),
		  'description' => esc_html__( 'Type complete link ex. https://abcd.com', 'efpose' ),
		  'id'          => 'adv_toplink',
		  'type' => 'text',
	 ));	
	$efpose_grouppf->add_field( array(
		'name' => esc_html__( 'ADV Bottom', 'efpose' ),
		'id'   => 'adv_horz',
		'type' => 'file',
        'preview_size' => 'medium', // Image size to use when previewing in the admin.		
	) );	
	$efpose_grouppf->add_field( array(
		  'name'        => esc_html__( 'ADV Bottom link', 'efpose' ),
		  'description' => esc_html__( 'Type complete link ex. https://abcd.com', 'efpose' ),
		  'id'          => 'adv_bottomlink',
		  'type' => 'text',
	 ));		
}
//==================START METABOX PLACE ON POST ==================
add_action( 'cmb2_admin_init', 'term_metabox_register' );
    function term_metabox_register() {
    $cat_field = new_cmb2_box( array(
        'id'            => 'catimage',
        'title'         => esc_attr__( 'Category Options', 'efpose' ),
        'object_types'     => array( 'term' ), // Tells CMB2 to use term_meta vs post_meta
        'taxonomies'       => array( 'category','post_tag' ), 
    ) );

    $cat_field->add_field( array(
        'name'             => 'Feature Image',
        'desc'             => 'Upload your Feature image. Best size: 1225px x 600px',
		'id'         	 => 'catfit',
        'type'             => 'file',
    ) );

    $cat_field->add_field( array(
        'name'             => 'Adv Horizontal Top',
        'desc'             => 'Upload your ADV image.',
		'id'         	 => 'catadv_top',
        'type'             => 'file',
    ) );	
	$cat_field->add_field( array(
		  'name'        => esc_html__( 'Adv Horizontal Top Link', 'efpose' ),
		  'description' => esc_html__( 'Type complete link ex. https://abcd.com', 'efpose' ),
		  'id'          => 'adv_cattoplink',
		  'type' => 'text',
	 ));

    $cat_field->add_field( array(
        'name'             => 'Adv Horizontal Bottom',
        'desc'             => 'Upload your ADV image.',
		'id'         	 => 'catadv_bottom',
        'type'             => 'file',
    ) );	
	$cat_field->add_field( array(
		  'name'        => esc_html__( 'Adv Horizontal Top Link', 'efpose' ),
		  'description' => esc_html__( 'Type complete link ex. https://abcd.com', 'efpose' ),
		  'id'          => 'adv_catbottomlink',
		  'type' => 'text',
	 ));	 
}
/**
* Callback to define the optionss-saved message.
*/
function efpose_options_page_message_callback( $cmb, $args ) {
if ( ! empty( $args['should_notify'] ) ) {
  if ( $args['is_updated'] ) {
    // Modify the updated message.
    $args['message'] = sprintf( esc_html__( '%s &mdash; Updated!', 'efpose' ), $cmb->prop( 'title' ) );
  }
  add_settings_error( $args['setting'], $args['code'], $args['message'], $args['type'] );
}
}