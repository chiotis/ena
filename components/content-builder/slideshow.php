<div class="uk-position-relative uk-visible-toggle uk-light" 
    uk-slideshow="
        finite: false; 
        ratio: <?php the_sub_field('slideshow_box_ratio'); ?>; 
        animation: <?php the_sub_field('slide_effect'); ?>;
        autoplay: <?php if ( get_sub_field('autoplay') ) { echo 'true'; } else { echo 'false'; } ?> ;
        autoplay-interval: <?php the_sub_field('autoplay_interval'); ?>; 
        pause-on-hover: <?php if ( get_sub_field('autoplay_pause_on_hover') ) { echo 'true'; } else { echo 'false'; } ?> ;">

    <ul class="uk-slideshow-items">

        <?php 
        // check if the nested repeater field has rows of data
        if( have_rows('slides') ):

            // loop through the rows of data
            while ( have_rows('slides') ) : the_row();

        ?>

        <li>
            <div class="uk-position-cover <?php if ( get_sub_field('kenburns') ) { echo 'uk-animation-kenburns'; } ?> uk-transform-origin-center">
                <img src="<?php the_sub_field('image'); ?>" alt="" uk-cover>
            </div>
            <!-- <div class="uk-overlay-primary uk-position-cover"></div> -->
            <?php if ( get_sub_field('title') || get_sub_field('content') ) { ?>
            <div class="uk-position-medium <?php the_sub_field('content_text_alignment'); ?> <?php the_sub_field('content_box_position'); ?> uk-overlay uk-overlay-primary">
                <?php if ( get_sub_field('title') ) { ?>
                <h3 class="uk-margin-remove"><?php the_sub_field('title'); ?></h3>
                <?php } ?>

                <?php if ( get_sub_field('content') ) { ?>
                <p class="uk-margin-remove"><?php the_sub_field('content'); ?></p>
                <?php } ?>
                
                <?php if ( get_sub_field('button_label') ) { ?>
                <p><a class="uk-button <?php the_sub_field('button_style'); ?>" href="<?php the_sub_field('button_link'); ?>" <?php if ( get_sub_field('link_new_window') ) { echo 'target="_blank"'; } ?> <?php if ( get_sub_field('link_nofollow') ) { echo 'rel="nofollow"'; } ?>><?php the_sub_field('button_label'); ?></a></p>
                <?php } ?>
            </div>
            <?php } ?>
        </li>

        <?php
            endwhile;

        endif;
        ?>

    </ul>
    <?php if ( get_sub_field('arrow_navigation') ) { ?>
    <a class="uk-position-center-left uk-position-small <?php if ( get_sub_field('arrow_visibility') ) { echo 'uk-hidden-hover'; } ?> uk-slidenav-large" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small <?php if ( get_sub_field('arrow_visibility') ) { echo 'uk-hidden-hover'; } ?> uk-slidenav-large" href="#" uk-slidenav-next uk-slideshow-item="next"></a>
    <?php } ?>
</div>