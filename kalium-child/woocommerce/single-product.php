<?php
defined( 'ABSPATH' ) || exit;

get_header(); // Load theme header
?>

<main class="woocommerce-single-product">
    <?php
    while ( have_posts() ) : the_post();
	
    //breadcrumb
    if (function_exists('woocommerce_breadcrumb')) {
        echo '<div class="breadcrumb_main-wrapper">';
            echo '<div class="breadcrumb_Container">';
                echo '<nav class="custom-breadcrumbs">';
                woocommerce_breadcrumb();
                echo '</nav>';
            echo '</div>';
        echo '</div>';
    }?>
	<div class="single-prd-meta-main-wrapper">
		<div class="single-prd-meta-container">
			<div class="prd-meta-row">
				<div class="prd-meta-col img-col">
					<div class="meta-img-wrapper">
						<?php
						echo wp_get_attachment_image( get_post_thumbnail_id(), 'full' );
						?>
					</div>
				</div>

				<div class="prd-meta-col meta-content">
					<?php 
					$product_smart_name = get_field('product_smart_name'); 
					$product_brand_logo = get_field('brand_logo');

					if ($product_smart_name) {
						echo '<h1>' . esc_html($product_smart_name) . '</h1>';
					}
					echo '<div class="prd-title-heading">';
						the_title();
					echo '</div>';
					echo '<div class="prd-short-desc">';
						woocommerce_template_single_excerpt();
					echo '</div>';

					if (!empty($product_brand_logo) && is_numeric($product_brand_logo)) {
						$image_url = wp_get_attachment_image_url($product_brand_logo, 'full'); // Get full-size image URL

						if ($image_url) {
							echo '<div class="prd-brand-logo">';
								echo '<img src="' . esc_url($image_url) . '" alt="Brand Logo" />';
							echo '</div>';
						}
					}
					woocommerce_template_single_price(); // Price
					woocommerce_template_single_add_to_cart();
					
					?>
						<div class="prd-single-newsletter-cta">
							<a href="#footer">Iscriviti alla newsletter</a> e ottieni un codice sconto del 10% sul primo ordine
						</div>

						<div class="prd-single-basic-info">
							<ul>
								<li class="prd-time">
									<strong>Tempi di consegna:</strong> Pronta consegna
								</li>
								<li class="prd-check">
									<strong>Servizio reso supportato:</strong>  Spedizioni espresse in viaggio su mezzi in sicurezza, gratuite sugli ordini superiori a  500.00 € in Italia 
								</li>
								<li class="prd-loc">
									<strong>Spedizioni espresse e sicure: </strong> Servizio di reso o sostituzione della merce ordinata
								</li>
							</ul>
						</div>

						<div class="prd-single-popup-button">
							<button class="popup-button">ulteriori informazioni</button>
							
							<div class="prd-detail-popup-wrapper">
								<div class="popup-overlay"></div>
								<div class="prd-detail-popup">
									<button class="close-popup"></button>
									<div class="prd-detail-content">
										<div class="woocommerce-product-details__full-description">
											<?php the_content(); ?>
										</div>
									</div>
								</div>
							</div>

						</div>

				</div>
			</div>
		</div>
	</div>

	
	<?php
	//Related products
	echo '<div class="custom-related-prd-wrapper archive woocommerce woocommerce-page">';
		echo '<div class="custom-related-prd-container">';
			echo '<div class="products-archive--products">';
				echo do_shortcode('[related_products limit="3"]'); // Adjust as needed
			echo '</div>';
		echo '</div>';
	echo '</div>';
	
	echo '<div class="custom-related-prd-wrapper archive woocommerce woocommerce-page recent-main-wrapper">';
		echo '<div class="custom-related-prd-container">';
			echo '<div class="external-links-wrapper">';
				echo '<a href="#" class="btn-class">servizio clienti</a>';
				echo '<a href="#" class="btn-class">whatsapp</a>';
				echo '<a href="#" class="btn-class">recensioni</a>';
			echo '</div>';
			echo '<h2>Potrebbe interessarti anche</h2>';
			echo '<div class="products-archive--products">';
				echo do_shortcode('[recent_products limit="3"]'); // Adjust as needed
			echo '</div>';
		echo '</div>';
	echo '</div>';	
	endwhile; ?>
</main>

<?php
get_footer();
