<div class="<?php the_sub_field('style'); ?>" uk-alert>
	<?php if ( get_sub_field('is_dismissable') ) { ?>
    <a class="uk-alert-close" uk-close></a>
	<?php } ?>
    <h3><?php the_sub_field('title'); ?></h3>
    <?php the_sub_field('content'); ?>
</div>