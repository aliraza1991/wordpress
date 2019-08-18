<?php
/*
Plugin Name:  influencer
Plugin URI:   https://alirazaiap.000webhostapp.com/
Description:  Influencer Marketing is like a hybrid of old and new marketing tools, taking the idea of the celebrity endorsement and placing it into a modern day content-driven marketing campaign. 
              The main difference is that the results of the campaign are usually collaborations between brands and influencers.
Version:      1.1.0
Author:       Ali Raza
Author URI:   https://alirazaiap.000webhostapp.com/game.html
*/
// define('ABSPATH') or die("Hey, you can't access this file");
if(!defined('WPINC')){
    die;
}
if(!defined('PLUGIN_VERSION')){
    define('PLUGIN_VERSION','1.1.0');
}
if(!defined('PLUGIN_DIR')){
    define('PLUGIN_DIR',plugin_dir_path(__FILE__));
}
if(!defined('PLUGIN_URL')){
    define('PLUGIN_URL', plugins_url(__FILE__));
}




if(!function_exists('influencer_scripts')){
    function influencer_scripts(){
        $slug = '';
        $page_includes = array('frontendpage','addcompany','viewcompany','influencer','viewinfluencer','setting','editcompany','editinfluence');
        $currentpage = $_GET['page'];
        if(empty($currentpage)){
            $actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            // echo $actual_link;
            if(preg_match("/addcompany/",$actual_link)){
               $currentpage = "frontendpage";
            }
            if(preg_match("/login/",$actual_link)){
                $currentpage = "frontendpage";
            }
            if(preg_match("/profile/",$actual_link)){
                $currentpage = "frontendpage";
            }
            if(preg_match("/addinfluencer/",$actual_link)){
                $currentpage = "frontendpage";
            }
            if(preg_match("/edit-profile/",$actual_link)){
                $currentpage = "frontendpage";
            }
        }
        if(in_array($currentpage,$page_includes)){
            wp_enqueue_media();
            wp_enqueue_style('boostrap-css',"https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css");
            wp_enqueue_style( 'style-css', plugins_url( 'assets/css/style.css' , __FILE__ ));
            wp_enqueue_style( 'jquery.notifyBar', plugins_url( 'assets/css/jquery.notifyBar.css' , __FILE__ ));
            wp_enqueue_style( 'jquery.dataTables.min', plugins_url( 'assets/css/jquery.dataTables.min.css' , __FILE__ ));
            wp_enqueue_script('jquery.min.js',"https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js",array('jquery', 'jquery-core'),true);
            wp_enqueue_script('popper.min.js', "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js");
            wp_enqueue_script('bootstrap.min.js', "https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js");
            wp_enqueue_script('validate.min', "https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.16.0/jquery.validate.min.js");
            wp_enqueue_script( 'jquery.dataTables.min', plugins_url( 'assets/js/jquery.dataTables.min.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
            wp_enqueue_script( 'jquery.notifyBar.js', plugins_url( 'assets/js/jquery.notifyBar.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
            wp_enqueue_script( 'custom-js', plugins_url( 'assets/js/script.js' , __FILE__ ), array('jquery', 'jquery-ui-core'));
            wp_localize_script( 'custom-js', 'ajax_url_obj',admin_url( 'admin-ajax.php' ));
        }
      
    }
    add_action('init', 'influencer_scripts');
}
// add menu
function influencer_menu() {
    add_menu_page(
        'influencerplugin',
        'Influencer Marketing',   
        'manage_options',
        'addcompany',
        'add_custom_submenu',
        'dashicons-share-alt',
        70
    );
}
add_action( 'admin_menu', 'influencer_menu' );

// add  submenu


function add_custom_submenu()
{
    add_submenu_page(
         'addcompany',
         'Company',
        'Add company',
         'manage_options',
         'addcompany',
        'add_custom_submenu_html'
    );
}
add_action('admin_menu', 'add_custom_submenu');



function add_custom_submenu_html(){
    include_once(PLUGIN_DIR.'view/add-company.php');
}

function view_company()
{
    add_submenu_page(
         'addcompany',
         'view Company',
        'View companies',
         'manage_options',
         'viewcompany',
        'view_company_html'
    );
}
add_action('admin_menu', 'view_company');

function view_company_html(){
    include_once(PLUGIN_DIR.'view/view_company.php');
}

// add submenu2
function add_custom_submenu2()
{
    add_submenu_page(
         'addcompany',
         'influencer',
        'Add Influencer',
         'manage_options',
         'influencer',
        'add_custom_submenu2_html'
    );
}
add_action('admin_menu', 'add_custom_submenu2');
function add_custom_submenu2_html(){
    include_once(PLUGIN_DIR.'view/add-influence.php');
}
//
function view_influencer()
{
    add_submenu_page(
         'addcompany',
         'view Influencer',
        'View Influences',
         'manage_options',
         'viewinfluencer',
        'view_influencer_html'
    );
}
add_action('admin_menu', 'view_influencer');
function view_influencer_html(){
    include_once(PLUGIN_DIR.'view/view-influence.php');
}

function add_setting_submenu()
{
    add_submenu_page(
         'addcompany',
         'setting',
        'setting',
         'manage_options',
         'setting',
        'add_setting_submenu_html'
    );
}
add_action('admin_menu', 'add_setting_submenu');
function add_setting_submenu_html(){
    include_once(PLUGIN_DIR.'view/setting.php');
}


function edit_company_form()
{
    add_submenu_page(
         'addcompany',
         '',
        '',
         'manage_options',
         'editcompany',
        'edit_company_form_html'
    );
}
add_action('admin_menu', 'edit_company_form');

function edit_company_form_html(){
    include_once(PLUGIN_DIR.'view/edit-company.php');
}


function edit_influence_form()
{
    add_submenu_page(
         'addcompany',
         '',
        '',
         'manage_options',
         'editinfluence',
        'edit_influence_form_html'
    );
}
add_action('admin_menu', 'edit_influence_form');

function edit_influence_form_html(){

  include_once(PLUGIN_DIR.'view/edit-influence.php');
}

function add_custom_profile_html(){

    include_once(PLUGIN_DIR.'view/profile.php');
}

function edit_profile_html(){

    include_once(PLUGIN_DIR.'view/edit-profile.php');
}



//custom login form
function add_custom_login_html(){
  include_once(PLUGIN_DIR.'view/login.php');
}
//
function company_table(){
	global $wpdb;
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    $charset_collate = $wpdb->get_charset_collate();
    // if(count($wpdb->get_var('SHOW TABLES LIKE "wp_company_wp"')) == 0){
    // $sql = "CREATE TABLE `wp_company_wp` (
    //     `id` int(11) NOT NULL AUTO_INCREMENT,
    //     `name` varchar(255) NOT NULL,
    //     `email` varchar(255) NOT NULL,
    //     `pass` varchar(255) NOT NULL,
    //     `company_name` varchar(255) NOT NULL,
    //     `image` varchar(255) NOT NULL,
    //     `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    //     PRIMARY KEY (`id`)
    //    ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
    // dbDelta( $sql );
    // }
    if(count($wpdb->get_var('SHOW TABLES LIKE "wp_influencer_contact"')) == 0){
        $sql = "CREATE TABLE `wp_influencer_contact` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `company_id` int(11) NOT NULL,
            `influencer_id` int(11) NOT NULL,
            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
           ) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1";
              dbDelta( $sql );
    }

    if(count($wpdb->get_var('SHOW TABLES LIKE "wp_influencer"')) == 0){
        $sql = "CREATE TABLE `wp_influencer` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `name` varchar(255)  NULL,
            `email` varchar(255) NOT NULL,
            `pass` varchar(255)  NULL,
            `social` varchar(255)  NULL,
            `company_name` varchar(255)  NULL,
            `image` varchar(255)  NULL,
            `type` varchar(255)  NULL,
            `like_follow` int(11)  NULL,
            `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
           ) ENGINE=InnoDB DEFAULT CHARSET=latin1";
        dbDelta( $sql );
    }


 // custom page company 
    $page = array(
    'post_title' => "Company",
    'post_content' => '[company-form]',
    'post_status' => "publish",
    'post_name' => "addcompany",
    'post_type' => "page"
);
   $post_id = wp_insert_post($page);
    add_option('plugin_page_id',$post_id);
    
// custom page edit Profile 
$page = array(
    'post_title' => "Edit Profile",
    'post_content' => '[edit-profile-page]',
    'post_status' => "publish",
    'post_name' => "edit-profile",
    'post_type' => "page"
);
   $post_id = wp_insert_post($page);
    add_option('plugin_edit_profile_id',$post_id);

// custom page Influencer 
    $page = array(
    'post_title' => "Influencer",
    'post_content' => '[influencer-form]',
    'post_status' => "publish",
    'post_name' => "addinfluencer",
    'post_type' => "page"
);
   $post_id = wp_insert_post($page);
    add_option('plugin_influencer_page_id',$post_id);
    


// custom page Login 
    $page = array(
    'post_title' => "Login Page",
    'post_content' => '[login-form]',
    'post_status' => "publish",
    'post_name' => "login",
    'post_type' => "page"
);
   $post_id = wp_insert_post($page);
    add_option('plugin_login_page_id',$post_id);
    


// custom page profile 
    $page = array(
    'post_title' => "Profile Page",
    'post_content' => '[profile_page]',
    'post_status' => "publish",
    'post_name' => "profile",
    'post_type' => "page"
);
   $post_id = wp_insert_post($page);
    add_option('plugin_profile_page_id',$post_id);
    
    


}
register_activation_hook( __FILE__, 'company_table' );

function deactive_table(){
    global $wpdb;
    $wpdb->query('DROP table IF Exists wp_influencer_contact');   
    $wpdb->query('DROP table IF Exists wp_influencer'); 
    if(!empty(get_option('plugin_page_id'))){
        wp_delete_post(get_option('plugin_page_id'));
          delete_option("plugin_page_id",true);
      }  
      if(!empty(get_option('plugin_profile_page_id'))){
        wp_delete_post(get_option('plugin_profile_page_id'));
          delete_option("plugin_profile_page_id",true);
      }  
      if(!empty(get_option('plugin_login_page_id'))){
        wp_delete_post(get_option('plugin_login_page_id'));
          delete_option("plugin_login_page_id",true);
      }  
      if(!empty(get_option('plugin_influencer_page_id'))){
        wp_delete_post(get_option('plugin_influencer_page_id'));
          delete_option("plugin_influencer_page_id",true);
      }  
      if(!empty(get_option('plugin_edit_profile_id'))){
        wp_delete_post(get_option('plugin_edit_profile_id'));
          delete_option("plugin_edit_profile_id",true);
      }  
      
}
register_deactivation_hook( __FILE__, 'deactive_table' );

//     
//hortcode
add_shortcode('company-form', 'add_custom_submenu_html');
add_shortcode('profile_page', 'add_custom_profile_html');
add_shortcode('login-form', 'add_custom_login_html');
add_shortcode('influencer-form', 'add_custom_submenu2_html');
add_shortcode('edit-profile-page', 'edit_profile_html');



add_action('wp_ajax_company_form','prefix_ajax_company_form');
function prefix_ajax_company_form(){
    if($_REQUEST['param']=="add_com"){
        global $wpdb; 
        $insert = $wpdb->insert(
            'wp_influencer',
            array(
                "name"=>$_REQUEST['name'],
                "email"=>$_REQUEST['email'],
                "pass"=>$_REQUEST['password'],
                "type"=>"company",
                "company_name"=>$_REQUEST['company_name'],
                "image"=>$_REQUEST['image_url']
            ));
            if($insert){
                echo json_encode(array("status"=>1,"message"=>'Database insertion successful'));exit(); 
            }
            else{
                echo json_encode(array("status"=>0,"message"=>'Sorry, Technical error'));exit();
            }  
    }
    //
    elseif($_REQUEST['param']=="contact_to_influencer"){
        global $wpdb;
        // print_r($_REQUEST);
        $get_res1 = $wpdb->get_row($wpdb->prepare(
            "SELECT * from wp_influencer_contact where company_id = %d AND influencer_id = %d",$_REQUEST['company_id'],$_REQUEST['influencer_id']
        ),ARRAY_A
        );
        if($get_res1){
            echo json_encode(array("status"=>0,"message"=>'Already Conatcted')); exit();
        }
        else{
        $wpdb->insert(
            'wp_influencer_contact',
            array(
                "company_id"=>$_REQUEST['company_id'],
                "influencer_id"=>$_REQUEST['influencer_id'], 
            ));
            echo json_encode(array("status"=>1,"message"=>'Database update successful')); exit();
    }
}
    //
    elseif($_REQUEST['param']=="edit_com"){
        global $wpdb;
       $edit_com = $wpdb->update(
            'wp_influencer',
            array(
                "name"=>$_REQUEST['name'],
                "email"=>$_REQUEST['email'],
                "company_name"=>$_REQUEST['company_name'],
                "image"=>$_REQUEST['image_url']
            ),array("id"=>$_REQUEST['c_id']));
            if($edit_com){
            echo json_encode(array("status"=>1,"message"=>'Database update successful')); exit();
            }
            else{
                echo json_encode(array("status"=>0,"message"=>'Technical error')); exit();
            }
    }
    elseif($_REQUEST['param']=="del_com"){
        global $wpdb;
        $wpdb->delete(
         "wp_influencer",
         [
           "id"=>$_REQUEST['com_id']
         ]
       );
            echo json_encode('Database delete successful'); exit();
    }
}

add_action('wp_ajax_influencer_form','prefix_ajax_influencer_form');
function prefix_ajax_influencer_form(){
    if($_REQUEST['param']=="add_influence"){
        global $wpdb;  
        if($wpdb->insert(
            'wp_influencer',
            array(
                "name"=>$_REQUEST['name'],
                "email"=>$_REQUEST['email'],
                "social"=>$_REQUEST['social_name'],
                "type"=>"influencer",
                "like_follow"=>$_REQUEST['like_follow'],
                "image"=>$_REQUEST['image_url'],
                "pass"=>$_REQUEST['password'],
            )) == false) echo json_encode(array("status"=>0,"message"=>'Database Insertion failed')); else 
            echo json_encode(array("status"=>1,"message"=>'Database insertion successful')); exit();
    }
    elseif($_REQUEST['param']=="delete_influence"){
        global $wpdb;
       $wpdb->delete(
            "wp_influencer",
            [
            "id"=>$_REQUEST['influence_id']
            ]
        );
               echo json_encode('Database delete successful'); exit();
    }
    elseif($_REQUEST['param']=="edit_influence"){
        global $wpdb;
       $up = $wpdb->update(
            'wp_influencer',
            array(
                "name"=>$_REQUEST['name'],
                "email"=>$_REQUEST['email'],
                "social"=>$_REQUEST['social_name'],
                "like_follow"=>$_REQUEST['like_follow'],
                "image"=>$_REQUEST['image_url'],
            ),array("id"=>$_REQUEST['in_id']));
            if($up){
            echo json_encode(array("status"=>1,"message"=>'Database update successful')); exit();
            }
            else{
                echo json_encode(array("status"=>0,"message"=>'technical error')); exit();
            }
    }
    elseif($_REQUEST['param']=="influence_login"){
        global $wpdb;
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $data_res  = $wpdb->get_row($wpdb->prepare(
            "SELECT * from wp_influencer where email = %s and pass = %s",$email,$password
        ),ARRAY_A
        );
        if($data_res){
            echo json_encode(array("status"=>1,"url"=>"customtheme/profile/?id=".$data_res['id'])); exit();
        } 
        else{
            echo json_encode(array("status"=>0,"message"=>"Failed")); exit();
        }
    }
}


// function login_redirect( $redirect_to, $request, $user ){
//     return home_url('profile');
// }
// add_filter( 'login_redirect', 'login_redirect', 10, 3 );

add_filter( 'login_redirect', function() { return site_url('/'); } );

add_filter("page_template","custom_add_company_layouts");
function custom_add_company_layouts($page_template){
    global $post;
    $page_slug = $post->post_name;
    if($page_slug=="addinfluencer"){
        $page_template = PLUGIN_DIR.'/frontend/add-influencer.php';
    }
    if($page_slug=="login"){
        $page_template =  PLUGIN_DIR."/frontend/login.php";
    }
    if($page_slug=="profile"){
        $page_template = PLUGIN_DIR.'/frontend/profile.php';
    }
    if($page_slug=="edit-profile"){
        $page_template = PLUGIN_DIR.'/frontend/edit-profile.php';
    }
    if($page_slug=="addcompany"){
        $page_template = PLUGIN_DIR.'/frontend/add-company.php';
    }
    return $page_template;
}