<?php 
/*
    Headings
        Heading 1
        Heading 2
        Heading 3
        Heading 4
        Heading 5
        Heading 6
    Inline
        Bold
        Italic
        Underline
        Strikethrough
        Superscript
        Subscript
        Code
    Blocks
        Paragraph
        Blockquote
        Div
        Pre
    Alignment
        Left
        Center
        Right
        Justify
        */
        
function cdils_change_mce_block_formats( $init ) {
	$block_formats = array(
		'Paragraph=p',
		'Heading 1=h1',
		'Heading 2=h2',
		'Heading 3=h3',
		'Heading 4=h4',
		'Client Name=h5',
		'Client position=h6',
		'Preformatted=pre',
		'Code=code'
	);

   
	$init['block_formats'] = implode( ';', $block_formats );
 
	return $init;
}
//add_filter( 'tiny_mce_before_init', 'cdils_change_mce_block_formats' );




/*-----------------------------------------------------------------*/
//     ADD BTN WITH FORMATS
/*-----------------------------------------------------------------*/

function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');


function my_mce_before_init_insert_formats( $init_array ) {  
 
	// Define the style_formats array
	 
	$style_formats = array(  

		array(  
			'title' => 'Client Name',  
			'block' => 'span',  
			'classes' => 'client_name',
			'wrapper' => true,
		),  
		array(  
			'title' => 'Client Position',  
			'block' => 'span',  
			'classes' => 'client_position',
			'wrapper' => true,
		),
	
	);

	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
		 
	return $init_array;  
	   
} 

add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' );



function add_editor_styles_sub_dir() {
	add_editor_style( trailingslashit( get_template_directory_uri() ) . '/rich-editor.css' );
}
add_action( 'after_setup_theme', 'add_editor_styles_sub_dir' );
 ?>
