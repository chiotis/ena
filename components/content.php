<article uk-height-viewport="expand: true">

	<?php
		while ( have_posts() ) : the_post();
	?>
		<?php if ( ( get_field('show_title') == 'show' ) || ( get_field('show_title' ) == null ) ) { ?>
		<div class="uk-card uk-card-body uk-card-large uk-background-cover uk-background-blend-overlay uk-background-secondary uk-light" style="background-image: url(<?php the_post_thumbnail_url(); ?>)">
			<?php the_title( '<h1>', '</h1>' ); ?>
			<p class="uk-article-meta">Written by <a href="#">Super User</a> on 12 April 2012. Posted in <a href="#">Blog</a></p>
		</div>
		<?php } ?>

		<div id="post-<?php the_ID(); ?>" <?php post_class('uk-article ' . get_field('content_container_padding') ); ?> >
	<?php

			// Show the lead text if is a singular template and if the field has content
			if ( is_singular() && get_field('single_lead') ) { 
				echo '<p class="uk-text-lead">' . get_field('single_lead') . '</p>'; 
			}

			// Action hook
			if ( is_singular() ) { 
				do_action('ena_before_content'); 
			}

			// Display the main content
			require_once get_template_directory() . '/components/content-builder.php';
			the_content();

			// Action hook
			if ( is_singular() ) { 
				do_action('ena_after_content'); 
			}
			
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'underscores' ),
				'after'  => '</div>',
			) );

			// If comments are open or we have at least one comment, load up the comment template.
			// if ( comments_open() || get_comments_number() ) :
			// 	comments_template();
			// endif;
			echo '</div>';
		endwhile; // End of the loop.
	?>
</article>