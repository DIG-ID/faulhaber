<?php
/*Diese Datei ist ein Teil vonhello-elementor-child, hello-elementor child theme.

Alle Funktionen dieser Datei werden vor den Funktionen des Eltern-Themes geladen.
Erfahre mehr unter https://codex.wordpress.org/Child_Themes.

Notiz: Diese Funktion lädt das Stylesheet des Eltern-Themes vor dem Stylesheet des Child-Themes
(Lass es an Ort und Stelle, es sei denn du weißt, was du tust.)
*/

if ( ! function_exists( 'suffice_child_enqueue_child_styles' ) ) {
	function hello_elementor_child_enqueue_child_styles() {
		// loading parent style
		wp_register_style(
			'parente2-style',
			get_template_directory_uri() . '/style.css'
		);

		wp_enqueue_style( 'parente2-style' );
		// loading child style
		wp_register_style(
			'childe2-style',
			get_stylesheet_directory_uri() . '/dist/style.css'
		);
		wp_enqueue_style( 'childe2-style');

		if ( is_page( 'media-corner-2' ) ) :
			wp_enqueue_script( 'infinity-scroll', 'https://unpkg.com/infinite-scroll@4/dist/infinite-scroll.pkgd.min.js', array(), 1, false );
		endif;
	}
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_child_styles' );

/*Hier kannst du deine eigenen Funktionen schreiben */



function digid_blog_shortcode( $atts ){
	//Protect against arbitrary paged values
	$paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

	$blog_filter_args = array(
		'posts_per_page' => 6,
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'orber_by'       => 'date',
		'order'          => 'DESC',
		'paged'          => $paged,
	);

	$blog_query = new WP_Query( $blog_filter_args );

	if ( $blog_query->have_posts() ) :
		echo '<div class="blog-container">';
		while ( $blog_query->have_posts() ) :
			$blog_query->the_post();
			get_template_part( 'template-parts/blog-card' );
		endwhile;
		echo '</div>';
	endif;

	$big = 999999999; // need an unlikely integer
	echo paginate_links(
		array(
			'base'    => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
			'format'  => '?paged=%#%',
			'current' => max( 1, get_query_var( 'paged' ) ),
			'total'   => $blog_query->max_num_pages,
		)
	);

	?>
	<script>
		let elem = document.querySelector('.blog-container');
		let infScroll = new InfiniteScroll( elem, {
			// options
			path: '.next.page-numbers',
			append: '.blog-post',
			history: false,
			status: '.page-load-status',
		});

	</script>
	<?php

}
add_shortcode( 'blogfilter', 'digid_blog_shortcode' );