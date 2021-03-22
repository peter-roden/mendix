<?php 
/**
 * Globally Hide Admin Meta Boxes 
 */
function hide_meta_boxes() {
     remove_meta_box( 'commentstatusdiv', ['page', 'post'],'normal'); 
     remove_meta_box( 'slugdiv', ['page', 'post'], 'normal' ); 
     remove_meta_box( 'commentsdiv',['page', 'post'], 'normal' ); 
     remove_meta_box( 'authordiv',['page', 'post'], 'normal' ); 
     remove_meta_box( 'trackbacksdiv',['page', 'post'], 'normal' ); 
}

add_action('add_meta_boxes', 'hide_meta_boxes');