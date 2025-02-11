<?php 



function my_enqueue() {

    wp_enqueue_script( 'ajax-script', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), time() );

    wp_localize_script( 'ajax-script', 'my_ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

            wp_localize_script( 'ajax-script', 'my_site_object',
            array( 'site__url' => get_site_url( ) ) );
}
add_action( 'wp_enqueue_scripts', 'my_enqueue' );

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'Theme General Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        'redirect'      => true
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Header Settings',
        'menu_title'    => 'Header',
        'parent_slug'   => 'theme-general-settings',
    ));
    
    acf_add_options_sub_page(array(
        'page_title'    => 'Theme Footer Settings',
        'menu_title'    => 'Footer',
        'parent_slug'   => 'theme-general-settings',
    ));
	  acf_add_options_sub_page(array(
        'page_title'    => 'Theme Ability Concept Settings',
        'menu_title'    => 'Ability Concept',
        'parent_slug'   => 'theme-general-settings',
    ));


    
}

 //show and upload SVG
add_filter( 'wp_check_filetype_and_ext', function($data, $file, $filename, $mimes) {
    $filetype = wp_check_filetype( $filename, $mimes );
    return [
        'ext'             => $filetype['ext'],
        'type'            => $filetype['type'],
        'proper_filename' => $data['proper_filename']
    ];
  
  }, 10, 4 );

 function cc_mime_types($mimes) {
 $mimes['svg'] = 'image/svg+xml';
 return $mimes;
}

add_filter('upload_mimes', 'cc_mime_types');

add_theme_support( 'custom-logo' );
add_theme_support( 'post-thumbnails' );

//menu registration
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
     )
   );
 }
 add_action( 'init', 'register_my_menus' );

//  add class to menu items
function add_custom_class_to_all_menu_items($classes, $item, $args) {
    // Add your custom class to the array
    $classes[] = 'hasDropdown blue-it';

    return $classes;
}
add_filter('nav_menu_css_class', 'add_custom_class_to_all_menu_items', 10, 3);

// add class to sub menus

function wpdocs_custom_dropdown_class( $classes ) {
	$classes[] = 'dropDownMenu';

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'wpdocs_custom_dropdown_class' );


 /*
* Creating a function to create our CPT
*/
  
function custom_post_type() {
  
  // Set UI labels for Custom Post Type
      $labels = array(
          'name'                => _x( 'services', 'Post Type General Name' ),
          'singular_name'       => _x( 'Service', 'Post Type Singular Name' ),
          'menu_name'           => __( 'Services' ),
          'parent_item_colon'   => __( 'Parent Service' ),
          'all_items'           => __( 'All services' ),
          'view_item'           => __( 'View Service' ),
          'add_new_item'        => __( 'Add New Service' ),
          'add_new'             => __( 'Add New' ),
          'edit_item'           => __( 'Edit Service' ),
          'update_item'         => __( 'Update Service' ),
          'search_items'        => __( 'Search Service' ),
          'not_found'           => __( 'Not Found' ),
          'not_found_in_trash'  => __( 'Not found in Trash' ),
      );      
  // Set other options for Custom Post Type
      $args = array(
          'label'               => __( 'services' ),
          'description'         => __( 'Service news and reviews' ),
          'labels'              => $labels,
          // Features this CPT supports in Post Editor
          'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
          // You can associate this CPT with a taxonomy or custom taxonomy. 
          'taxonomies'          => array( 'genres' ),
       
          'hierarchical'        => false,
          'public'              => true,
          'show_ui'             => true,
          'show_in_menu'        => true,
          'show_in_nav_menus'   => true,
          'show_in_admin_bar'   => true,
          'menu_position'       => 5,
          'can_export'          => true,
          'has_archive'         => true,
          'exclude_from_search' => false,
          'publicly_queryable'  => true,
          'capability_type'     => 'post',
          'show_in_rest' => true,
    
      );
        
      // Registering your Custom Post Type
      register_post_type( 'services', $args ); 
  }
  add_action( 'init', 'custom_post_type', 0 );
  function my_custom_script() {

	wp_enqueue_script( 'jquery-min', get_template_directory_uri() . '/assets/js/jquery.min.js', array('jquery'), '3.7.1', true );
	wp_enqueue_script( 'custom-slick', get_template_directory_uri() . '/assets/js/slick.min.js', array('jquery'), '1.0', true );
	wp_enqueue_script( 'custom-script', get_template_directory_uri() . '/assets/js/custom.js', array('jquery'), time(), true );
	
}
add_action( 'wp_footer', 'my_custom_script' );


add_action( 'wp_footer', 'mycustom_wp_footer' );
function mycustom_wp_footer() {
?>
<script type="text/javascript">
(function($) {
        $(document).ready(function() {

                fixCF7MultiSubmit();

                function fixCF7MultiSubmit(){
                                jQuery('input.wpcf7-submit[type="submit"]').click(function() {
                                        var disabled = jQuery(this).attr('data-disabled');
                                        if (disabled && disabled == "disabled") {
                                                return false;
                                        } else {
                                                jQuery(this).attr('data-disabled',"disabled");
                                                return true;
                                        }
                                });
                        jQuery('.wpcf7').bind("wpcf7submit",function(){
                                jQuery(this).find('input.wpcf7-submit[type="submit"]').attr('data-disabled',"enabled");
                        });
                }
        });
}(jQuery));
</script>
<?php
}
function mytheme_add_woocommerce_support() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'mytheme_add_woocommerce_support' );



function add_product_revisions() {
    add_post_type_support('product', 'revisions');
}
add_action('init', 'add_product_revisions');

function wpse27856_set_content_type(){
    return "text/html";
}
add_filter( 'wp_mail_content_type','wpse27856_set_content_type' );

function send_inquiry_email() {
    $headers = array('Content-Type: text/html; charset=UTF-8');
    
     $to = 'info@abilityconcepts.ca';
    $subject = 'Product Inquiry';

    // Construct the email body with custom CSS styles
    $body = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Product Inquiry</title>
        <style>
        #outlook a {padding:0;} /* Force Outlook to provide a "view in browser" menu link. */
body{width:100% !important; -webkit-text-size-adjust:100%; -ms-text-size-adjust:100%; margin:0; padding:0; line-height: 100% !important;}

            /* Your CSS styles here */
            body {
                font-family: Arial, sans-serif;
                background-color: #fff;
            }
            table {
                width: 100%;
                border: 1px solid #e6e6e6;
                max-width: 499px;
                margin: 20px auto ;
                background-color: #fff;
                padding: 23px;

            },
            table tr th
            {
           width:65%;
            },
            table tr td
            {
           width:35%;
            },
            th, td {
                border: 1px solid #e6e6e6;
                padding: 8px;
				text-align: left;
            }
        </style>
    </head>
    <body>';

    // Add your email content here

    $body .= '<table  style="margin: 20px auto ;">';
    $body .= '<tr><td  style=" border: 1px solid #e6e6e6; text-align:center;" colspan="2"><img style="margin-bottom:20px; " src="https://abilityconcepts.ca/wp-content/uploads/2024/07/logo-1.png" alt="Image Description"></td></tr>';
	$body .= '<tr><th style="   border: 1px solid #e6e6e6;  padding: 8px; text-align: left; width:65%;">Product Name </th><td style="   border: 1px solid #e6e6e6;  padding: 8px; text-align: left; width:35%;">' . $_POST['product_name'] .  "</td></tr>";
    $body .= '<tr><th style="   border: 1px solid #e6e6e6;  padding: 8px; text-align: left; width:65%;">First Name </th><td style="   border: 1px solid #e6e6e6;  padding: 8px; text-align: left; width:35%;">' . $_POST['first_name'] .  "</td></tr>";
    $body .= '<tr><th style="   border: 1px solid #e6e6e6;  padding: 8px; text-align: left; width:65%;">Last Name </th><td style="   border: 1px solid #e6e6e6;  padding: 8px; text-align: left; width:35%;">' . $_POST['last_name'] .  "</td></tr>";
    $body .= '<tr><th style="   border: 1px solid #e6e6e6;  padding: 8px; text-align: left; width:65%;">Number </th><td style="   border: 1px solid #e6e6e6;  padding: 8px; text-align: left; width:35%;">' . $_POST['phone_number'] . "</td></tr>";
    $body .= '<tr><th style="   border: 1px solid #e6e6e6;  padding: 8px; text-align: left; width:65%;">Email </th><td style="   border: 1px solid #e6e6e6;  padding: 8px; text-align: left; width:35%;">' . $_POST['email'] .  "</td></tr>";
    $body .= '<tr><th style="   border: 1px solid #e6e6e6;  padding: 8px; text-align: left; width:65%;">Message </th><td style="   border: 1px solid #e6e6e6;  padding: 8px; text-align: left; width:35%;">' . $_POST['message'] .  "</td></tr>";
    if (isset($_POST['select_data'])) {
        foreach ($_POST['select_data'] as $select_item) {
            $body .= '<tr>
                        <th style="border: 1px solid #e6e6e6; padding: 8px; text-align: left; width:65%;">' . $select_item['key'] . '</th>
                        <td style="border: 1px solid #e6e6e6; padding: 8px; text-align: left; width:35%;">' . $select_item['value'] . '</td>
                      </tr>';
        }
    }

    if (isset($_POST['check_data'])) {
        foreach ($_POST['check_data'] as $check_item) {
            $body .= '<tr>
                        <th style="border: 1px solid #e6e6e6; padding: 8px; text-align: left; width:65%;">' . $check_item['key'] . '</th>
                        <td style="border: 1px solid #e6e6e6; padding: 8px; text-align: left; width:35%;">' . $check_item['value'] . '</td>
                      </tr>';
        }
    }

    if (isset($_POST['radio_data'])) {
        foreach ($_POST['radio_data'] as $radio_item) {
            $body .= '<tr>
                        <th style="border: 1px solid #e6e6e6; padding: 8px; text-align: left; width:65%;">' . htmlspecialchars($radio_item['key']) . '</th>
                        <td style="border: 1px solid #e6e6e6; padding: 8px; text-align: left; width:35%;">' . htmlspecialchars($radio_item['value']) . '</td>
                      </tr>';
        }
    }
    

 if (empty($_POST['total_amount'])) {
           $cfp = "Contact For Price";
			$body  .= '<tr><th style="   border: 1px solid #e6e6e6; padding: 8px; text-align: left; width:65%;"> Total Price </th><td style="   border: 1px solid #e6e6e6; padding: 8px; text-align: left; width:35%;">' . $cfp .  "</td></tr>";
	 }else{

	$body  .= '<tr><th style="   border: 1px solid #e6e6e6; padding: 8px; text-align: left; width:65%;"> Total Price </th><td style="   border: 1px solid #e6e6e6; padding: 8px; text-align: left; width:35%;">' . $_POST['total_amount'] .  "</td></tr>";
	 }
    $body .= '</table></html>';

    // Send the email using WordPress's built-in wp_mail() function
    wp_mail($to, $subject, $body, $headers);

    // Send a JSON response back to the front-end
    $response = array('message' => 'Email sent successfully');
    wp_send_json_success($response);
}

// Hook the AJAX handler function to the appropriate WordPress AJAX actions
add_action('wp_ajax_send_inquiry_email', 'send_inquiry_email'); // For logged-in users
add_action('wp_ajax_nopriv_send_inquiry_email', 'send_inquiry_email');

// For non-logged-in users

add_action('woocommerce_single_product_summary', 'total_change', 15);

function total_change() {
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    global $woocommerce;
    // Get the current product
    $_product = new WC_Product(get_the_ID());
    // Initialize variables
    $symbol = get_woocommerce_currency_symbol();
    $title = $_product->get_title();
    $price = $_product->get_price();
    // Output the result
    echo "<p >{$title}: <span class='total_price'>{$price}</span></p>";

}

remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_price', 10 );

// Add this code to your theme's functions.php file or a custom plugin.
// Store the custom data to cart object
add_filter('woocommerce_add_cart_item_data', 'save_custom_product_data', 10, 2);

function save_custom_product_data($cart_item_data, $product_id) {
    if (isset($_POST['radio_group']) && !empty($_POST['radio_group'])) {
        // Clean and sanitize the custom price
        $custom_price = wc_format_decimal(sanitize_text_field($_POST['radio_group']), 2);

        // Add custom data to cart item
        $cart_item_data['custom_price'] = $custom_price;
    }
    return $cart_item_data;
}


add_action('woocommerce_before_calculate_totals', 'add_custom_price_to_cart', 10, 1);
function add_custom_price_to_cart( $cart ) {
    if ( is_admin() && ! defined( 'DOING_AJAX' ) ) {
        return;
    }

    foreach ( $cart->get_cart() as $cart_item_key => $cart_item ) {
        // Check if custom price is set for the item
		if (isset($_POST['radio_group']) && !empty($_POST['radio_group'])) {
			print_r($cart_item['data']->set_price( $cart_item['data']->get_price() + $cart_item['radio_group'] ));
			
		}
		}
			// Clean and sanitize the custom price
        if ( isset( $cart_item['custom_price'] ) ) {
            // Add the custom price to the product price
            $cart_item['data']->set_price( $cart_item['data']->get_price() + $cart_item['custom_price'] );
        }
    }

	function my_function(){
		echo  "sdsdsdsd";
   }
   add_action('woocommerce_before_cart', 'my_function');

   function enable_widgets() {

    register_sidebar(
        array(
            'name' => 'Main Sidebar',
            'id'   => 'sidebar',
            'description'   => 'Here you can add widgets to the main sidebar.',
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 id="widget-heading">',
            'after_title'   => '</h5>'
    ));

 }

 add_action('widgets_init','enable_widgets');
 add_filter( 'use_widgets_block_editor', '__return_false' );
 remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb' );

  function filtertermproduct() {
   
global $wp;
$base = home_url( $wp->request ); // Gets the current page we are on.

?>
<input type="hidden" name="base" value="<?php echo $base; ?>"/>
<?php
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
$search_query = isset($_REQUEST['s']) ? sanitize_text_field($_REQUEST['s']) : '';
$args = [];

if (!empty($search_query)) {
   $orderbypricdesc = isset($_POST['orderby']) && $_POST['orderby'] == 'price-desc';
$args = [
    'post_type' => 'product',
    'meta_query' => [
        [
            'key' => '_sku',
            'value' => $search_query, // Case-insensitive search
            'compare' => 'LIKE',
        ],
    ],
    'orderby' => 'meta_value_num',
    'meta_key' => '_price',
 'order' => $orderbypricdesc ? 'DESC' : 'ASC',
];
    $products = get_posts($args);

    if (empty($products)) {
 $orderbypricdesc = isset($_POST['orderby']) && $_POST['orderby'] == 'price-desc';
        echo 'empty products';
        $args = [
            'post_type'      => 'product',
            's'             => $search_query,
            'posts_per_page' => 16,
            'paged'          => $page,
            'search_columns' => ['post_name', 'post_title'],
            'tax_query'      => [],
			  'meta_query'     => [],
			 'orderby' => 'meta_value_num',
    'meta_key' => '_price',
    'order' => $orderbypricdesc ? 'DESC' : 'ASC',
			
        ];
    }
} else {
    $count = isset($_POST['count']) ? intval($_POST['count']) : 16;
    $pcat_name = isset($_POST['pcat_nmae']) ? sanitize_text_field($_POST['pcat_nmae']) : '';
    $cat_name = isset($_POST['cat_name']) ? sanitize_text_field($_POST['cat_name']) : '';
    $choice = isset($_POST['choice']) ? array_map('sanitize_text_field', $_POST['choice']) : [];
    $sprice_p = isset($_POST['sprice']) ? floatval($_POST['sprice']) : '';
    $eprice_p = isset($_POST['eprice']) ? floatval($_POST['eprice']) : '';
    $orderbyprice = isset($_POST['orderby']) && $_POST['orderby'] == 'price';
    $orderbypricdesc = isset($_POST['orderby']) && $_POST['orderby'] == 'price-desc';
    $orderbypopularity = isset($_POST['orderby']) && $_POST['orderby'] == 'popularity';
    $orderbyrating = isset($_POST['orderby']) && $_POST['orderby'] == 'rating';

    $args = [
        'post_type'      => 'product',
        'post_status'    => 'publish',
        'posts_per_page' => $count,
        'paged'          => $page,
        's'             => $search_query, 
        'meta_query'     => [],
        'tax_query'      => [],
    ];

    if ($orderbyprice || $orderbypricdesc) {
        $args['meta_query'][] = [
            'key'     => '_price',
            'compare' => 'EXISTS',
        ];
        $args['orderby']  = 'meta_value_num';
        $args['meta_key'] = '_price';
        $args['order']    = $orderbypricdesc ? 'DESC' : 'ASC';
    } elseif ($orderbypopularity) {
        $args['orderby']  = 'meta_value_num';
        $args['meta_key'] = 'total_sales';
        $args['order']    = 'DESC';
    } elseif ($orderbyrating) {
        $args['orderby']  = 'meta_value_num';
        $args['meta_key'] = '_wc_average_rating';
        $args['order']    = 'DESC';
    }

    if (!empty($pcat_name)) {
        $args['tax_query'][] = [
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $pcat_name,
        ];
    }

    if (!empty($cat_name)) {
        $args['tax_query'][] = [
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $cat_name,
        ];
    }

    if (!empty($choice)) {
        $args['tax_query'][] = [
            'taxonomy' => 'product_tag',
            'field'    => 'slug',
            'terms'    => $choice,
        ];
    }

    if (!empty($sprice_p) || !empty($eprice_p)) {
        $args['meta_query'][] = [
            'key'     => '_price',
            'value'   => [$sprice_p, $eprice_p],
            'type'    => 'NUMERIC',
            'compare' => 'BETWEEN',
        ];
    }
}

// print_r($args);

    $query = new WP_Query($args);

    if ($query->have_posts()) :
        while ($query->have_posts()) :
            $query->the_post();
            $product = wc_get_product( get_the_ID());
            // Your existing loop to display product information
            $product_title = get_the_title();
            $regular_price = get_post_meta(get_the_ID(), '_regular_price', true);
            $sale_price = get_post_meta(get_the_ID(), '_price', true);
            $product_permalink = get_permalink(get_the_ID());
            $image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
            ?>
            <div class="add_class col-md-3 col-xl-3 col-lg-4 col-md-4 col-sm-6 result_cnt">
                <div class="product_box product-page product-page">
                    <div class="figure_img">
                        <a href="<?php echo esc_url($product_permalink); ?>">
                            <img src="<?php echo $image_url[0]; ?>" alt="<?php echo esc_attr($product_title); ?>">
                        </a>
                    </div>
                    <div class="discription">
						<div class="product_info">
                        <h2><?php echo esc_html($product_title); ?></h2>
                        	<div class="productrtng">
<?php
$prod_review = $product->get_average_rating();

// Check if $prod_review is not null and greater than 0
if($prod_review !== null && $prod_review > 0) {
    // Loop to display stars based on the average rating
    for($i = 0; $i < floor($prod_review); $i++) {
        echo '<span class="fa fa-star"></span>';
    }
    // Check for fractional part to display half star
    if(($prod_review - floor($prod_review)) >= 0.5) {
        echo '<span class="fa fa-star-half-o"></span>';
    }
}

?>

					</div>
              <?php
$priceRRP = get_post_meta(get_the_ID(), 'contact_shop_text', true);
$regular_price = $product->get_regular_price();
$sale_price = $product->get_sale_price();

if ($priceRRP) {
    echo '<p class="ModalBtn" style="cursor:pointer; margin:0;" id="openModalBtn">' . $priceRRP . '</p>';
} elseif ($regular_price !== '' && $regular_price !== null) {
    // Handle zero and non-empty regular prices
    echo '<p>' . wc_price($regular_price) . '</p>';
} elseif ($sale_price !== '' && $sale_price !== null) {
    // Handle zero and non-empty sale prices
    echo '<p>' . wc_price($sale_price) . '</p>';
} elseif ($product->is_type('variable')) {
    $variable_regular_price = $product->get_variation_regular_price();
    $variable_sale_price = $product->get_variation_sale_price();

    if ($variable_regular_price !== '' && $variable_regular_price !== null) {
        // Handle zero and non-empty variable regular prices
        echo '<p>' . wc_price($variable_regular_price) . '</p>';
    } elseif ($variable_sale_price !== '' && $variable_sale_price !== null) {
        // Handle zero and non-empty variable sale prices
        echo '<p>' . wc_price($variable_sale_price) . '</p>';
    }
}
?>

						</div>
                        <a href="<?php echo esc_url($product_permalink); ?>" class="common-button btn-transparent">
                            VIEW DETAILS
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" class="plus_button" viewBox="0 0 12 21">
                                    <text transform="translate(6 17)" fill="#aebd26"
                                        font-family="Mulish-Bold, Mulish" font-weight="700">
                                        <tspan x="-5.1" y="0">+</tspan>
                                    </text>
                                </svg>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
            <?php
        endwhile;
        $pagination_items =  paginate_links(array(
            'base'    => '%_%', 
      'format'  => '?page=%#%', 
              'current' => max(1, $page),
              'total'   => $query->max_num_pages,
              'prev_text' => is_rtl() ? '&rarr;' : '<svg xmlns="http://www.w3.org/2000/svg" width="32.047" height="13.805" viewBox="0 0 32.047 13.805"><g id="noun-arrow-109399" opacity="0.5"><path id="Path_616" data-name="Path 616" d="M50.036,44.214H21.372l4.852,4.817a.769.769,0,1,1-1.084,1.091l-6.155-6.11a.769.769,0,0,1,0-1.088l6.109-6.156a.769.769,0,1,1,1.092,1.084L21.4,42.675H50.036a.77.77,0,0,1,0,1.539Z" transform="translate(-18.758 -36.541)" fill="#6a6a6a" /></g></svg>',
              'next_text' => is_rtl() ? '&larr;' : '<svg id="noun-arrow-109399" xmlns="http://www.w3.org/2000/svg" width="32.047" height="13.805" viewBox="0 0 32.047 13.805"><path id="Path_616" data-name="Path 616" d="M19.527,44.214H48.191l-4.852,4.817a.769.769,0,1,0,1.084,1.091l6.155-6.11a.769.769,0,0,0,0-1.088l-6.109-6.156a.769.769,0,1,0-1.092,1.084l4.786,4.822H19.527a.77.77,0,0,0,0,1.539Z" transform="translate(-18.758 -36.542)" fill="#6a6a6a" /></svg>',
  'type' => 'array'
          ));
          if ($pagination_items) {
              echo '<div class="col-md-12 productslanding__pagination">';
              echo '<div class="productslanding__paginationinnr">';
              echo '<ul class="no-bullets shop_paginate filter-paginate">';
              foreach ($pagination_items as $item) {
                  // Check if the current item is the current page
                  $active_class = strpos($item, 'current') !== false ? 'pagination_link  active' : 'pagination_link';
                  echo '<li data-page="'.$current.'" class="' . $active_class . '"><a >' . $item . '</a></li>';
              }
              echo '</ul>';
              echo '</div>';
              echo '</div>';
          }
                          wp_reset_postdata();              ?>
  
      <?php
	 else:
	 ?>
<div class="col-6"><div class="woocommerce-no-products-found">
	
	<div class="wc-block-components-notice-banner is-info">
		<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24" aria-hidden="true" focusable="false">
			<path d="M12 3.2c-4.8 0-8.8 3.9-8.8 8.8 0 4.8 3.9 8.8 8.8 8.8 4.8 0 8.8-3.9 8.8-8.8 0-4.8-4-8.8-8.8-8.8zm0 16c-4 0-7.2-3.3-7.2-7.2C4.8 8 8 4.8 12 4.8s7.2 3.3 7.2 7.2c0 4-3.2 7.2-7.2 7.2zM11 17h2v-6h-2v6zm0-8h2V7h-2v2z"></path>
		</svg>
		<div class="wc-block-components-notice-banner__content">
			No products were found matching your selection.		</div>
	</div>
	</div>
</div>

<?php
      endif;
      wp_die();
}

add_action('wp_ajax_nopriv_filtertermproduct', 'filtertermproduct');
add_action('wp_ajax_filtertermproduct', 'filtertermproduct');





 /**
 * Rename product data tabs
 */
add_filter( 'woocommerce_product_tabs', 'woo_rename_tabs', 98 );
function woo_rename_tabs( $tabs ) {

	$tabs['description']['title'] = __( 'More Info' );		// Rename the description tab			// Rename the reviews tab
	$tabs['additional_information']['title'] = __( 'Detail' );	// Rename the additional information tab
    $tabs['reviews']['title'] = __( 'Reviews' );	

	return $tabs;
	
}

add_filter( 'woocommerce_product_tabs', 'woo_reorder_tabs', 98 );
function woo_reorder_tabs( $tabs ) {

	$tabs['reviews']['priority'] = 15;			// Reviews first
	$tabs['description']['priority'] = 5;			// Description second
	$tabs['Detail']['priority'] = 10;	// Additional information third

	return $tabs;
}
 add_filter( 'woocommerce_product_description_heading', '__return_null' );

add_theme_support( 'wc-product-gallery-zoom' );
add_theme_support( 'wc-product-gallery-lightbox' );
add_theme_support( 'wc-product-gallery-slider' ); 

add_filter( 'woocommerce_single_product_carousel_options', 'ud_update_woo_flexslider_options' );

function ud_update_woo_flexslider_options( $options ) {

    $options['directionNav'] = true;

    return $options;
}

function custom_shop_products_limit( $query ) {
    if ( is_admin() || ! $query->is_main_query() ) {
        return;
    }

    if ( is_post_type_archive( 'product' ) || is_shop()  ) {
        $query->set( 'posts_per_page', 16 ); // Change 12 to the number of products you want to display per page
    }
}
add_action( 'pre_get_posts', 'custom_shop_products_limit' );

add_filter( 'woocommerce_redirect_single_search_result', '__return_false' );


add_filter( 'woocommerce_product_tabs', 'my_remove_product_tabs', 98 );
 
function my_remove_product_tabs( $tabs ) {
  unset( $tabs['additional_information'] ); // To remove the additional information tab
  return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );

function woo_new_product_tab( $tabs ) {
    // Adds the new tab
    $tabs['Detail'] = array(
        'title'     => __( 'Detail', 'woocommerce' ),
        'priority'  => 15,
        'callback'  => 'woo_new_product_tab_content_template'
    );

    return $tabs;
}


function woo_new_product_tab_content_template() {
    // Load the custom template file
    wc_get_template( 'single-product/tabs/detail.php', array(), '', get_template_directory() );
}


add_filter( 'woocommerce_dropdown_variation_attribute_options_args', static function( $args ) {
    $args['class'] = 'attribute';
    return $args;
}, 2 );



/**
 * Add a custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );



// Display Fields
add_action( 'woocommerce_product_options_general_product_data', 'woo_add_custom_general_fields' );

// Save Fields
add_action( 'woocommerce_process_product_meta', 'woo_add_custom_general_fields_save' );

function woo_add_custom_general_fields() {

    global $woocommerce, $post;

    // Text Field creation
    woocommerce_wp_text_input( 
        array( 
            'id'          => 'contact_shop_text', 
            'label'       => __( 'Contact shop Text', 'woocommerce' ), 
            'placeholder' => 'Contact shop Text',
            'desc_tip'    => 'true',

        )
        );
    
   } 
    function woo_add_custom_general_fields_save( $post_id ){

// TextField save
$woocommerce_rrpprice = $_POST['contact_shop_text'];
// if( !empty( $woocommerce_rrpprice ) ):
update_post_meta( $post_id, 'contact_shop_text', esc_html( $woocommerce_rrpprice ) );
// endif;

}

function custom_wc_ajax_variation_threshold( $qty, $product ) {
	return 40;
}

add_filter( 'woocommerce_ajax_variation_threshold', 'custom_wc_ajax_variation_threshold', 10, 2 );


// Modify WooCommerce product search SQL to search only in product titles
// function modify_woocommerce_product_search_sql($search_sql, $query) {
//     global $wpdb;

//     if (isset($query->query_vars['s']) && !empty($query->query_vars['s'])) {
//         $search_terms = explode(' ', $query->query_vars['s']);
//         $search = array();

//         foreach ($search_terms as $term) {
//             $search[] = $wpdb->prepare("{$wpdb->posts}.post_title LIKE %s", '%' . $wpdb->esc_like($term) . '%');  
//         }

//         if (!empty($search)) {
//             $search_sql = " AND (" . implode(' AND ', $search) . ") "; 

//         }
//     }

//     return $search_sql;
// }
// add_filter('posts_search', 'modify_woocommerce_product_search_sql', 10, 2);

function move_price_option_to_top( $orderby ) {
    // Remove the "Sort by price: low to high" option from the array
    unset( $orderby['price-desc'] );

    // Add the "Sort by price: low to high" option to the beginning of the array
    $orderby = array_merge( array( 'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ) ), $orderby );

    return $orderby;
}
add_filter( 'woocommerce_catalog_orderby', 'move_price_option_to_top', 20 );

add_filter( 'woocommerce_product_variations_limit', function() { 
    return 100; // Set the desired limit 
});


function hide_quick_edit_comment_status() {
    global $pagenow;
    if ($pagenow == 'edit.php') {
        echo '
        <script>
            jQuery(document).ready(function($) {
                $("select[name=\'comment_status\']").closest("label").hide();
            });
        </script>
        ';
    }
}
add_action('admin_footer', 'hide_quick_edit_comment_status');


/**
 * // Remove the reviews 
 */

function remove_woocommerce_product_tabs( $tabs ) {
    // Remove the reviews tab
    unset( $tabs['reviews'] ); 
    
    return $tabs;
}
add_filter( 'woocommerce_product_tabs', 'remove_woocommerce_product_tabs', 98 );





