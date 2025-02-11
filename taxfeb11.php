<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header( 'shop' );

/**
 * Hook: woocommerce_before_main_content.
 *
 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
 * @hooked woocommerce_breadcrumb - 20
 * @hooked WC_Structured_Data::generate_website_data() - 30
 */


$current_url = $_SERVER['REQUEST_URI'];
$url_parts = explode('/', $current_url);

$currentcategory_slug = $url_parts[count($url_parts) - 2];

?>

<!-- banner starts -->
<div class="innerPage-banner banner-bg innerPage-banner-overlay" style="background-image: url(<?php echo get_template_directory_uri();?>/assets/images/products.jpg);">
        <div class="container">
            <div class="pageTitle-wrap text-center">
                <h1 class="page-title">All Products
                </h1>
            </div>

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb no-bullets">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Products</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- banner ends -->
	<?php
	/**
	 * Hook: woocommerce_archive_description.
	 *
	 * @hooked woocommerce_taxonomy_archive_description - 10
	 * @hooked woocommerce_product_archive_description - 10
	 */
	do_action( 'woocommerce_archive_description' );
	?>

<div class="productslanding padding-common ">
        <div class="container">
            <div class="row gx-5">
			<div class="col-lg-4 col-xl-3">
			<?php get_sidebar(); ?>

			</div>
<?php


	/**
	 * Hook: woocommerce_before_shop_loop.
	 *
	 * @hooked woocommerce_output_all_notices - 10
	 * @hooked woocommerce_result_count - 20
	 * @hooked woocommerce_catalog_ordering - 30
	 */

	 ?>
	 <div class="col-lg-8 col-xl-9">
<div class="row">
	<div class="col-md-12">
	
                            <div class="resultlisting__top">
                                <div class="resultlisting__toplft">

                                    <span class="resultlisting "> 
									


									<script>
										
jQuery(document).ready(function($) {

function result_count()
{



  var result_elements = document.getElementsByClassName('result_cnt');
    var result_count = 0;

    for (var i = 0; i < result_elements.length; i++) {
        if (result_elements[i].textContent.trim().length > 0) {
            result_count++;
        }
    }

    var resultlisting_element = document.querySelector('.resultlisting');
    if (resultlisting_element) {
        resultlisting_element.textContent = 'Showing all ' + result_count + ' results';
    }
}
	result_count()
})
</script>
									</span>
                                </div>
                                <div class="resultlisting__topryt">
                                    
									<div class="resultlisting__sort">
                                        <div class="resultlisting__sortbox">
											
                                            <label for="">Sort By:</label>	
										<?php
$show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', 'menu_order' ) );
		$catalog_orderby_options = apply_filters(
			'woocommerce_catalog_orderby',
			array(
				'menu_order' => __( 'Default sorting', 'woocommerce' ),
				'popularity' => __( 'Sort by popularity', 'woocommerce' ),
				'rating'     => __( 'Sort by average rating', 'woocommerce' ),
				'date'       => __( 'Sort by latest', 'woocommerce' ),
				'price'      => __( 'Sort by price: low to high', 'woocommerce' ),
				'price-desc' => __( 'Sort by price: high to low', 'woocommerce' ),
			)
		);

		$default_orderby = wc_get_loop_prop( 'is_search' ) ? 'relevance' : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby', '' ) );
		// phpcs:disable WordPress.Security.NonceVerification.Recommended
		$orderby = isset( $_GET['orderby'] ) ? wc_clean( wp_unslash( $_GET['orderby'] ) ) : $default_orderby;
											?>
											<form class="woocommerce-ordering"  method="post"  id="ordForm">
	<select name="orderby" class="orderby" aria-label="<?php esc_attr_e( 'Shop order', 'woocommerce' ); ?>">
		<?php foreach ( $catalog_orderby_options as $id => $name ) : ?>
			<option value="<?php echo esc_attr( $id ); ?>" <?php selected( $orderby, $id ); ?>><?php echo esc_html( $name ); ?></option>
		<?php endforeach; ?>
	</select>
	<input type="hidden" name="paged" value="1" />
	<?php wc_query_string_form_fields( null, array( 'orderby', 'submit', 'paged', 'product-page', 'product_cat','s'  ) ); ?>
</form>
</div>
<div class="resultlisting__sortbox small_short_box">
                                            <label for="">Show:</label>
                                            <select id="product-count" name="orderby" class="orderby" aria-label="Shop order">
                                                <option value="16" selected="selected">Products per page</option>
                                                <option value="4">4</option>
                                                <option value="8">8</option>
                                                <option value="12">12</option>
                                                <option value="16">16</option>
                                                <option value="20">20</option>
                                            </select>
                                        </div>
										</div>
                                     <div class="productshowtype">
                                        <span class="productlisttype [ icon  icon--grid ]  active  "><svg xmlns="http://www.w3.org/2000/svg" width="31.84" height="32" viewBox="0 0 31.84 32">
                                            <g id="noun-grid-4629390" transform="translate(-15.12 -14.32)">
                                              <g id="Group_978" data-name="Group 978" transform="translate(15.62 14.82)">
                                                <path id="Path_678" data-name="Path 678" d="M19.657,14.821h5.971a4.047,4.047,0,0,1,4.037,4.037v5.971a4.047,4.047,0,0,1-4.037,4.037H19.657a4.047,4.047,0,0,1-4.037-4.037V18.858a4.047,4.047,0,0,1,4.037-4.037ZM36.451,31.774h5.971a4.047,4.047,0,0,1,4.037,4.037v5.971a4.047,4.047,0,0,1-4.037,4.037H36.451a4.047,4.047,0,0,1-4.037-4.037V35.812a4.047,4.047,0,0,1,4.037-4.037Zm5.971,1.571H36.451a2.475,2.475,0,0,0-2.466,2.466v5.971a2.475,2.475,0,0,0,2.466,2.466h5.971a2.475,2.475,0,0,0,2.466-2.466V35.812a2.475,2.475,0,0,0-2.466-2.466ZM19.657,31.774h5.971a4.047,4.047,0,0,1,4.037,4.037v5.971a4.047,4.047,0,0,1-4.037,4.037H19.657a4.047,4.047,0,0,1-4.037-4.037V35.812a4.047,4.047,0,0,1,4.037-4.037Zm5.971,1.571H19.657a2.475,2.475,0,0,0-2.466,2.466v5.971a2.475,2.475,0,0,0,2.466,2.466h5.971a2.475,2.475,0,0,0,2.466-2.466V35.812a2.475,2.475,0,0,0-2.466-2.466ZM36.451,14.82h5.971a4.047,4.047,0,0,1,4.037,4.037v5.971a4.047,4.047,0,0,1-4.037,4.037H36.451a4.047,4.047,0,0,1-4.037-4.037V18.857a4.047,4.047,0,0,1,4.037-4.037Zm5.971,1.571H36.451a2.475,2.475,0,0,0-2.466,2.466v5.971a2.475,2.475,0,0,0,2.466,2.466h5.971a2.475,2.475,0,0,0,2.466-2.466V18.857a2.475,2.475,0,0,0-2.466-2.466Zm-16.794,0H19.657a2.475,2.475,0,0,0-2.466,2.466v5.971a2.475,2.475,0,0,0,2.466,2.466h5.971a2.475,2.475,0,0,0,2.466-2.466V18.857a2.475,2.475,0,0,0-2.466-2.466Z" transform="translate(-15.62 -14.82)" fill="none" stroke="none" stroke-width="1"/>
                                              </g>
                                            </g>
                                          </svg></span>
                                        <span class="productgridtype [ icon  icon--list ]   ">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="41.69" height="31" viewBox="0 0 41.69 31">
                                                <g id="noun-list-969174" transform="translate(-2 -4.5)">
                                                  <circle id="Ellipse_21" data-name="Ellipse 21" cx="3.5" cy="3.5" r="3.5" transform="translate(3 5.5)" fill="none" stroke="#6a6a6a" stroke-width="2"/>
                                                  <path id="Path_679" data-name="Path 679" d="M12.308,12.115H32.153a3.308,3.308,0,1,0,0-6.615H12.308a3.308,3.308,0,0,0,0,6.615Z" transform="translate(7.23 0)" fill="none" stroke="#6a6a6a" stroke-width="2"/>
                                                  <circle id="Ellipse_22" data-name="Ellipse 22" cx="3.5" cy="3.5" r="3.5" transform="translate(3 16.5)" fill="none" stroke="#6a6a6a" stroke-width="2"/>
                                                  <path id="Path_680" data-name="Path 680" d="M32.153,10.5H12.308a3.308,3.308,0,0,0,0,6.615H32.153a3.308,3.308,0,1,0,0-6.615Z" transform="translate(7.23 6.025)" fill="none" stroke="#6a6a6a" stroke-width="2"/>
                                                  <circle id="Ellipse_23" data-name="Ellipse 23" cx="3.5" cy="3.5" r="3.5" transform="translate(3 27.5)" fill="none" stroke="#6a6a6a" stroke-width="2"/>
                                                  <path id="Path_681" data-name="Path 681" d="M32.153,15.5H12.308a3.308,3.308,0,1,0,0,6.615H32.153a3.308,3.308,0,1,0,0-6.615Z" transform="translate(7.23 12.05)" fill="none" stroke="#6a6a6a" stroke-width="2"/>
                                                </g>
                                              </svg>
                                              
                                          </span>
                                    </div>
                                </div>
                            </div>

                        </div>
   
                            <div class="mobFilterhHldr">

                                <div class="filter_mocicn">
                                    <span>  <img src="<?php echo get_template_directory_uri(); ?>/assets/images/filter.png" alt=""></span>
                                    <span>Filters</span>

                                </div>
                                <!--  -->
                                <div class="productshowtype">
                                    <span class="productlisttype [ icon  icon--grid ]  active  "><svg xmlns="http://www.w3.org/2000/svg" width="31.84" height="32" viewBox="0 0 31.84 32">
                                        <g id="noun-grid-4629390" transform="translate(-15.12 -14.32)">
                                          <g id="Group_978" data-name="Group 978" transform="translate(15.62 14.82)">
                                            <path id="Path_678" data-name="Path 678" d="M19.657,14.821h5.971a4.047,4.047,0,0,1,4.037,4.037v5.971a4.047,4.047,0,0,1-4.037,4.037H19.657a4.047,4.047,0,0,1-4.037-4.037V18.858a4.047,4.047,0,0,1,4.037-4.037ZM36.451,31.774h5.971a4.047,4.047,0,0,1,4.037,4.037v5.971a4.047,4.047,0,0,1-4.037,4.037H36.451a4.047,4.047,0,0,1-4.037-4.037V35.812a4.047,4.047,0,0,1,4.037-4.037Zm5.971,1.571H36.451a2.475,2.475,0,0,0-2.466,2.466v5.971a2.475,2.475,0,0,0,2.466,2.466h5.971a2.475,2.475,0,0,0,2.466-2.466V35.812a2.475,2.475,0,0,0-2.466-2.466ZM19.657,31.774h5.971a4.047,4.047,0,0,1,4.037,4.037v5.971a4.047,4.047,0,0,1-4.037,4.037H19.657a4.047,4.047,0,0,1-4.037-4.037V35.812a4.047,4.047,0,0,1,4.037-4.037Zm5.971,1.571H19.657a2.475,2.475,0,0,0-2.466,2.466v5.971a2.475,2.475,0,0,0,2.466,2.466h5.971a2.475,2.475,0,0,0,2.466-2.466V35.812a2.475,2.475,0,0,0-2.466-2.466ZM36.451,14.82h5.971a4.047,4.047,0,0,1,4.037,4.037v5.971a4.047,4.047,0,0,1-4.037,4.037H36.451a4.047,4.047,0,0,1-4.037-4.037V18.857a4.047,4.047,0,0,1,4.037-4.037Zm5.971,1.571H36.451a2.475,2.475,0,0,0-2.466,2.466v5.971a2.475,2.475,0,0,0,2.466,2.466h5.971a2.475,2.475,0,0,0,2.466-2.466V18.857a2.475,2.475,0,0,0-2.466-2.466Zm-16.794,0H19.657a2.475,2.475,0,0,0-2.466,2.466v5.971a2.475,2.475,0,0,0,2.466,2.466h5.971a2.475,2.475,0,0,0,2.466-2.466V18.857a2.475,2.475,0,0,0-2.466-2.466Z" transform="translate(-15.62 -14.82)" fill="none" stroke="none" stroke-width="1"/>
                                          </g>
                                        </g>
                                      </svg></span>
                                    <span class="productgridtype [ icon  icon--list ]   ">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="41.69" height="31" viewBox="0 0 41.69 31">
                                            <g id="noun-list-969174" transform="translate(-2 -4.5)">
                                              <circle id="Ellipse_21" data-name="Ellipse 21" cx="3.5" cy="3.5" r="3.5" transform="translate(3 5.5)" fill="none" stroke="#6a6a6a" stroke-width="2"/>
                                              <path id="Path_679" data-name="Path 679" d="M12.308,12.115H32.153a3.308,3.308,0,1,0,0-6.615H12.308a3.308,3.308,0,0,0,0,6.615Z" transform="translate(7.23 0)" fill="none" stroke="#6a6a6a" stroke-width="2"/>
                                              <circle id="Ellipse_22" data-name="Ellipse 22" cx="3.5" cy="3.5" r="3.5" transform="translate(3 16.5)" fill="none" stroke="#6a6a6a" stroke-width="2"/>
                                              <path id="Path_680" data-name="Path 680" d="M32.153,10.5H12.308a3.308,3.308,0,0,0,0,6.615H32.153a3.308,3.308,0,1,0,0-6.615Z" transform="translate(7.23 6.025)" fill="none" stroke="#6a6a6a" stroke-width="2"/>
                                              <circle id="Ellipse_23" data-name="Ellipse 23" cx="3.5" cy="3.5" r="3.5" transform="translate(3 27.5)" fill="none" stroke="#6a6a6a" stroke-width="2"/>
                                              <path id="Path_681" data-name="Path 681" d="M32.153,15.5H12.308a3.308,3.308,0,1,0,0,6.615H32.153a3.308,3.308,0,1,0,0-6.615Z" transform="translate(7.23 12.05)" fill="none" stroke="#6a6a6a" stroke-width="2"/>
                                            </g>
                                          </svg>
                                          
                                      </span>
                                </div>
                            </div>

                        </div>
                 

                    <div class="row gy-5 products grid group filter-content">
	 <?php
	global $product;

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$search_query = isset($_GET['s']) ? sanitize_text_field($_GET['s']) : '';
$category_slug = isset($_GET['product_cat']) ? sanitize_text_field($_GET['product_cat']) : '';
$current_url = $_SERVER['REQUEST_URI'];
$url_parts = explode('/', $current_url);
$currentcategory_slug = $url_parts[count($url_parts) - 2];
$args = [];
if (!empty($search_query)) {

// $post_id = wc_get_product_id_by_sku($search_query);

  $args = [
            'post_type' => 'product',
	   'orderby' => 'meta_value_num',
    'meta_key' => '_price',
    'order' => 'desc',
            'meta_query' => [
                [
                    'key'     => '_sku',
                    'value'   => $search_query,
                    'compare' => 'LIKE',
                ],
            ],
	   'product_cat'    => $category_slug,

        ];
// print_r($args);
 $products = get_posts($args);

    if (empty($products)) {
// echo "sadsd";
	 $args = [
            'post_type'      => 'product',
            'orderby' => 'meta_value_num',
            'meta_key' => '_price',
            'order' => 'desc',
		    's'  =>  $search_query,
            'posts_per_page' => 16,
            'paged'          => $paged,
            'search_columns' => array( 'post_name', 'post_title' ),
            'product_cat'    => $category_slug,

		 
		  
		 
        ];
}
    
} else {
    $args = [
    'post_type'      => 'product',
    'posts_per_page' => 16,
    'paged'          => $paged,
    'product_cat'    =>  $currentcategory_slug,
    'order'          => 'DESC', 
    'orderby'        => 'meta_value_num', 
    'meta_key'       => '_price',
    'meta_query'     => [
        'relation' => 'OR', 
        [
            'key' => 'contact_shop_text', 
        ],
        [
            'key'     => '_price',
            'type'    => 'NUMERIC', 
        ],
    ],
];
}

// print_r($args);
$loop = new WP_Query( $args );



if ( $loop->have_posts() ) {
    while ( $loop->have_posts() ) {
        $loop->the_post();

        ?>
    	<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6  result_cnt full-width-grid ">
			
			<div class="product_box product-page product-page">
				<div class="figure_img">
					<a href="<?php the_permalink(); ?>">
						<img src="<?php echo wp_get_attachment_url( $product->get_image_id() ); ?>" alt="">
					</a>
				</div>
				<div class="discription">
					<div class="product_info">
					<h2><?php the_title(); ?>
					</h2>
					<div class="productrtng">
					<?php	$prod_review = $product->get_average_rating();


if($prod_review !== null && $prod_review > 0) {
   
    for($i = 0; $i < floor($prod_review); $i++) {
        echo '<span class="fa fa-star"></span>';
    }

    if(($prod_review - floor($prod_review)) >= 0.5) {
        echo '<span class="fa fa-star-half-o"></span>';
    }
}  ?>
					</div>
				 <?php
      if ($product) {
    if ($product->is_type('variable')) {
        $regular_price = $product->get_variation_regular_price();
        $sale_price = $product->get_variation_sale_price();

        if ($regular_price) {
            echo '<p>' . wc_price($regular_price) . '</p>';
        } elseif ($sale_price) {
            echo '<p>' . wc_price($sale_price) . '</p>';
        }
    } else {
        $regular_price = $product->get_regular_price();
        $sale_price = $product->get_sale_price();

        if ($regular_price !== '') {
            echo '<p>' . wc_price($regular_price) . '</p>';
        } elseif ($sale_price !== '') {
            echo '<p>' . wc_price($sale_price) . '</p>';
        } elseif ($regular_price === '' && $sale_price === '') {
            $priceRRP = get_post_meta(get_the_ID(), 'contact_shop_text', true);
            if ($priceRRP) {
                echo '<p class="ModalBtn" style="cursor:pointer;" id="openModalBtn">' . $priceRRP . '</p>';
            }
        }
    }
}?>
					</div>
                   
                    <?php get_field('short_discription');?>
                    <p style="display:none" class="short_discription"><?php  $desc = get_field('short_description');
                    if($desc){

                        echo $desc; 
                    }
                    ?></p>

					<a href="<?php the_permalink(); ?>" class="common-button btn-transparent">View Detail<span><svg
								xmlns="http://www.w3.org/2000/svg" class="plus_button"
								viewBox="0 0 12 21">
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
  
	}
    $pagination_items =  paginate_links(array(
        'base'    => '%_%', 
  'format'  => '?page=%#%', 
          'current' => max(1, $paged),
          'total'   => $loop->max_num_pages,
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
              echo '<li data-page="'.$paged.'" class="' . $active_class . '"><a >' . $item . '</a></li>';
          }
          echo '</ul>';
          echo '</div>';
          echo '</div>';
      }




// Restore the global $post variable
wp_reset_postdata();


  }
else

{
?>
						
<div class="col-6">
	
		<div class="woocommerce-no-products-found">
	<?php wc_print_notice( esc_html__( 'No products were found matching your selection.', 'woocommerce' ), 'notice' ); ?>
</div>
	</div>
						<?php
}
						
?>


</div>
				  </div>
</div>
</div>
</div>

<?php
get_footer( 'shop' );
