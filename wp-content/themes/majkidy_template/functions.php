<?php

add_theme_support( 'post-thumbnails' );

//Exit if access directly
if(!defined('ABSPATH')){
    exit;
}

//Registrace post-type děti

function registruj_post_type(){

    $popisky = array(
        'name'               => 'Děti', 
        'singular_name'      => 'Dítě',
        'menu_name'          => 'Děti',
        'name_admin_bar'     => 'Děti',
        'add_new'            => 'Přidat dítě',
        'add_new_item'       => 'Přidat nové dítě',
        'edit_item'          => 'Upravit dítě',
        'all_items'          => 'Všechny děti',
        'search_items'       => 'Vyhledat dítě',
        'not_found'          => 'Žádné dítě nenalezeno',
        'not_found_in_trash' => 'Koš je prázdný'
    );

    $args = array(
        'public' => true, 
        'labels' => $popisky,
        'menu_icon' => 'dashicons-universal-access', 
        'description'        => 'popisek',
        'show_ui'            => true,
        'show_in_menu'       => true,
        'rewrite'            => array( 'slug' => 'deti' ), 
        'has_archive'        => true, 
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array(
                'title',
                'thumbnail',
                'custom-fields',
                'thumbnail'
            )
        );

    register_post_type('deti', $args);

}
add_action('init', 'registruj_post_type');

//Registrace taxonomie skupiny

function registruj_taxonomii(){

    $labels = array(
        'name'              => 'Skupiny' ,
        'singular_name'     => 'Skupina',
        'search_items'      => 'Vyhledat skupinu' ,
        'all_items'         => 'Všechny skupiny' ,
        'edit_item'         => 'Upravit skupinu' ,
        'update_item'       => 'Uložit skupinu' ,
        'add_new_item'      => 'Přidat novou skupinu' ,
        'new_item_name'     => 'Název nové skupiny' ,
        'menu_name'         => 'Skupiny' ,
    );

    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true
    );

    register_taxonomy("skupiny", "deti", $args);
}
add_action('init', 'registruj_taxonomii');

//Registrace post-type zprávy

function registruj_post_type_2(){

    $popisky = array(
        'name'               => 'Zprávy', 
        'singular_name'      => 'Zpráva',
        'menu_name'          => 'Zpráva',
        'name_admin_bar'     => 'Zpráva',
        'add_new'            => 'Poslat zprávu',
        'add_new_item'       => 'Poslat novou zprávu',
        'edit_item'          => 'Upravit zprávu',
        'all_items'          => 'Všechny zprávy',
        'search_items'       => 'Vyhledat zprávu',
        'not_found'          => 'Žádná zpráva nenalezena',
        'not_found_in_trash' => 'Koš je prázdný'
    );

    $args = array(
        'public' => true, 
        'labels' => $popisky,
        'menu_icon' => 'dashicons-welcome-write-blog', 
        'description'        => 'popisek',
        'show_ui'            => true,
        'show_in_menu'       => true,
        'rewrite'            => array( 'slug' => 'zpravy' ), 
        'has_archive'        => true, 
        'hierarchical'       => true,
        'menu_position'      => null,
        'supports'           => array(
                'title',
                'custom-fields',
                'editor'

            )
        );

    register_post_type('zpravy', $args);

}
add_action('init', 'registruj_post_type_2');

//Registrace ACF - děti

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_dite',
		'title' => 'Dítě',
		'fields' => array (
			array (
				'key' => 'field_583c39a4ae4b7',
				'label' => 'Rodič',
				'name' => 'rodic',
				'type' => 'user',
				'required' => 1,
				'role' => array (
					0 => 'all',
				),
				'field_type' => 'select',
				'allow_null' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'deti',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

//Registrace ACF - zprávy

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => 'acf_zpravy',
		'title' => 'Zprávy',
		'fields' => array (
			array (
				'key' => 'field_583c3cebc9a2d',
				'label' => 'Dítě',
				'name' => 'dite',
				'type' => 'post_object',
				'post_type' => array (
					0 => 'deti',
				),
				'taxonomy' => array (
					0 => 'all',
				),
				'allow_null' => 1,
				'multiple' => 0,
			),
			array (
				'key' => 'field_583c3c79cf015',
				'label' => 'Skupina',
				'name' => 'skupina',
				'type' => 'taxonomy',
				'taxonomy' => 'skupiny',
				'field_type' => 'multi_select',
				'allow_null' => 1,
				'load_save_terms' => 0,
				'return_format' => 'id',
				'multiple' => 0,
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'zpravy',
					'order_no' => 0,
					'group_no' => 0,
				),
			),
		),
		'options' => array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => array (
			),
		),
		'menu_order' => 0,
	));
}

//ACF - vypnutí ve backend

include_once('advanced-custom-fields/acf.php');
define( 'ACF_LITE', true );

//Změna loga na login page

function custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url(wp-content/themes/majkidy_template/img/login.png) !important;}
    </style>';
}

add_action('login_head', 'custom_login_logo');



