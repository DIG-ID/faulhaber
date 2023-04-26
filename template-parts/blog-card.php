<article id="" <?php post_class( 'blog-post' ); ?> >
	<header>
		<?php
		if ( has_post_thumbnail() ) :
			the_post_thumbnail( 'medium' );
		endif;
		?>
	</header>
	<div class="blog-content">
		<a href="<?php the_permalink(); ?>"><h2><?php the_title(); ?></h2></a>
		<?php the_excerpt(); ?>
		<a href="<?php the_permalink(); ?>">Read more</a>
	</div>
</article>