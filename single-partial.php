<?php
/**
*/
get_header(); ?>

<?php include locate_partial_template( get_the_ID() ); ?>


<?php if (!$GLOBALS['skip_footer']) { get_footer(); } ?>