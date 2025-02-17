<?php
/**
 * Kalium WordPress Theme
 *
 * @author Laborator
 * @link   https://kaliumtheme.com
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Direct access not allowed.
}

/**
 * After theme setup hooks.
 */
function kalium_child_after_setup_theme() {

	// Load translations for child theme
	load_child_theme_textdomain( 'kalium-child', get_stylesheet_directory() . '/languages' );
}

add_action( 'after_setup_theme', 'kalium_child_after_setup_theme' );

/**
 * This will enqueue style.css of child theme.
 */
function kalium_child_wp_enqueue_scripts() {

	// Remove if you are not going to use style.css
	wp_enqueue_style( 'kalium-child', get_stylesheet_directory_uri() . '/style.css' );

	wp_enqueue_style('kalium-main-css', get_stylesheet_directory_uri() . '/assets/css/custom.css');

	wp_enqueue_style('kalium-main-css-1', get_stylesheet_directory_uri() . '/assets/css/custom-1.css');

	wp_enqueue_style('kalium-swiper-css', get_stylesheet_directory_uri() . '/assets/css/swiper.css');

	// Enqueue the main theme script with dependencies.
	wp_enqueue_script('kalium-swiper-js', get_stylesheet_directory_uri() . '/assets/js/swiper.js', array( 'jquery' ));

	wp_enqueue_script('custom-main-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array( 'jquery' ));

}

add_action( 'wp_enqueue_scripts', 'kalium_child_wp_enqueue_scripts', 110 );


function prd_category_cards_slider_shortcode() {
    // Fetch top-level product categories
    $categories = get_terms(array(
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'parent'     => 0, // Get only first-level categories
    ));

    // Define the fallback image URL
    $fallback_image = 'https://juniorb.spaziodemo.org/wp-content/uploads/2025/02/cate-fall-back.jpg'; // Ensure the path is correct
    // Start output buffering
    ob_start(); ?>
    <div class="prd-catgeory-main-wrapper">
        <div class="prd-catgeory-header">
            <h2>Prodoti</h2>
        </div>
    <?php
    if (!empty($categories) && !is_wp_error($categories)) : ?>
        <div class="prd-category-cards-wrapper">
            <div class="swiper prd-category-cards-slider">
                <div class="swiper-wrapper">
                    <?php foreach ($categories as $category) :
                        $category_link = get_term_link($category);
                        $thumbnail_id = get_term_meta($category->term_id, 'thumbnail_id', true);
                        $category_image = $thumbnail_id ? wp_get_attachment_url($thumbnail_id) : $fallback_image; // Corrected fallback image
                    ?>
                        <div class="swiper-slide">
                            <div class="card-slide-inner">
                                <a href="<?php echo esc_url($category_link); ?>" class="card-slide-img-wrapper">
                                    <img src="<?php echo esc_url($category_image); ?>" alt="<?php echo esc_attr($category->name); ?>">
                                </a>
                                <a href="<?php echo esc_url($category_link); ?>" class="prd-cat-name-wra">
                                    <?php echo esc_html($category->name); ?>
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>

    <?php endif; ?>
    </div>
    <?php
    return ob_get_clean(); // Return the buffered output
}

// Register the shortcode
add_shortcode('prd_category_slider', 'prd_category_cards_slider_shortcode');



// Hook into WooCommerce after the main content
function custom_html_at_end_of_shop_page() {
    if (is_shop() || is_product_category()) {
        ?>
         <div class="custom-section-wrapper">
			 <div class="section-container">
				 <div class="external-links-wrapper">
					 <a href="#" class="btn-class">servizio clienti</a>
					 <a href="#" class="btn-class">whatsapp</a>
					 <a href="#" class="btn-class">recensioni</a>
				 </div>
			 </div>
        </div>
        <?php
    }
}
add_action('woocommerce_after_main_content', 'custom_html_at_end_of_shop_page', 20);

// Hook into WooCommerce before the main content (at the start of the page)
function custom_html_at_start_of_shop_page() {
    if (is_product_category()) {
        $term = get_queried_object();
        $category_title = single_term_title('', false);
        $category_subtitle = get_field('category_subtitle', 'product_cat_' . $term->term_id);
        echo '<div class="custom-cate-main">';
        echo '<div class="custom-category-header">';
        echo '<h1 class="cate-heading">' . esc_html($category_title) . '</h1>'; 
        if ($category_subtitle) {
            echo '<h3 class="cate-subtitle">' . esc_html($category_subtitle) . '</h3>';
        }
        echo '</div>';
        echo '</div>';
		
    }
}
add_action('woocommerce_before_main_content', 'custom_html_at_start_of_shop_page', 10);

function html_at_start_of_shop_page() {
    if (is_shop()) { // Ensures it's only the Shop page
        echo '<div class="custom-cate-main">';
        echo '<div class="custom-category-header">';
        echo '<h1 class="cate-heading">' . esc_html(get_the_title(get_option('woocommerce_shop_page_id'))) . '</h1>'; 
        echo '</div>';
        echo '</div>';
    }
}
add_action('woocommerce_before_main_content', 'html_at_start_of_shop_page', 10);


