<?php if ( get_sub_field('image') ) { ?>
<div class="uk-card <?php the_sub_field('content_inner_padding'); ?> <?php the_sub_field('style'); ?> uk-grid-collapse uk-child-width-1-2@s <?php if ( get_sub_field('hover_effect') ) { echo 'uk-card-hover'; } ?> <?php the_sub_field('content_align'); ?>" uk-grid>
	<?php if ( get_sub_field('image_right') ) { ?>
	<div class="uk-flex-last@s uk-card-media-right uk-cover-container">
	<?php } else { ?>
	<div class="uk-card-media-left uk-cover-container">
	<?php } ?>
		<img src="<?php the_sub_field('image'); ?>" alt="" uk-cover>
		<canvas width="600" height="400"></canvas>
	</div>
	<div>
		<div class="uk-card-body">
			<?php if ( get_sub_field('badge') ) { ?>
			<div class="uk-card-badge uk-label"><?php the_sub_field('badge'); ?></div>
			<?php } ?>
			<?php if ( get_sub_field('icon') ) { ?>
			<p><span uk-icon="icon: <?php the_sub_field('icon'); ?>; ratio: 3"></span></p>
			<?php } ?>
			<h3 class="uk-card-title <?php the_sub_field('animation_effect'); ?>"><?php the_sub_field('title'); ?></h3>
			<div class="<?php the_sub_field('animation_effect'); ?>">
				<?php the_sub_field('content'); ?>
				<?php if ( get_sub_field('button_label') ) { ?>
				<a class="uk-button <?php the_sub_field('button_style'); ?>" href="<?php the_sub_field('button_link'); ?>" <?php if ( get_sub_field('link_new_window') ) { echo 'target="_blank"'; } ?> <?php if ( get_sub_field('link_nofollow') ) { echo 'rel="nofollow"'; } ?>><?php the_sub_field('button_label'); ?></a>
				<?php } ?>
			</div>
		</div>
	</div>
</div>
<?php } else { ?>
<div class="uk-card <?php the_sub_field('content_inner_padding'); ?> uk-card-body <?php the_sub_field('style'); ?> <?php if ( get_sub_field('hover_effect') ) { echo 'uk-card-hover'; } ?> <?php the_sub_field('content_align'); ?>" >
	<?php if ( get_sub_field('badge') ) { ?>
	<div class="uk-card-badge uk-label <?php the_sub_field('animation_effect'); ?>"><?php the_sub_field('badge'); ?></div>
	<?php } ?>
	<?php if ( get_sub_field('icon') ) { ?>
	<p><span uk-icon="icon: <?php the_sub_field('icon'); ?>; ratio: 3"></span></p>
	<?php } ?>
	<h3 class="uk-card-title <?php the_sub_field('animation_effect'); ?>"><?php the_sub_field('title'); ?></h3>
	<div class="<?php the_sub_field('animation_effect'); ?>">
		<?php the_sub_field('content'); ?>
		<?php if ( get_sub_field('button_label') ) { ?>
		<a class="uk-button <?php the_sub_field('button_style'); ?>" href="<?php the_sub_field('button_link'); ?>" <?php if ( get_sub_field('link_new_window') ) { echo 'target="_blank"'; } ?> <?php if ( get_sub_field('link_nofollow') ) { echo 'rel="nofollow"'; } ?>><?php the_sub_field('button_label'); ?></a>
		<?php } ?>
	</div>
</div>
<?php } ?>