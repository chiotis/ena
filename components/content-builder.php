<?php
// check if the flexible content field has rows of data
if( have_rows('content_builder') ):

     // loop through the rows of data
    while ( have_rows('content_builder') ) : the_row();

        if( get_row_layout() == 'alert' ):

        	require get_template_directory() . '/components/content-builder/alert.php';

        elseif( get_row_layout() == 'card' ): 

        	require get_template_directory() . '/components/content-builder/card.php';

        elseif( get_row_layout() == 'slideshow' ): 

        	require get_template_directory() . '/components/content-builder/slideshow.php';

        endif;

    endwhile;

else :

    // no layouts found

endif;