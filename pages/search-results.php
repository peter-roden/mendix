<?php
/**
 * Template Name: Search Results
 */
?>

<?php get_header(); ?>


<style>
    #search-results {
        margin-top: 100px;
        margin-bottom: 50px;
    } 
    #search-results h2.search-count{
        margin-bottom: 50px;
    }  
    #search-results ul.results li {
        padding-top: 10px;
        padding-bottom: 10px;
        margin-top: 10px;
        margin-bottom: 10px;
    }
    #search-results ul.results li:hover {
        background-color: #F0F0F0;
    }
    #search-results ul.results li a {
        text-decoration: none;
    }
    #search-results ul.results li a .post-title {
        font-size: 18px;
        font-weight: 600;
        line-height: 22px;
    }
    #search-results ul.results li a .post-excerpt {
        color: #000000;
        font-weight: 500;
    }
    #search-results ul.results li a .post-date {
        font-size: 14px;
        text-transform: capitalize; 
        color: #808080;
        font-weight: 500;
    }
    #search-results .pagination {
        text-align: center;
        margin: 0 auto;
        padding-top: 30px;
        padding-bottom: 60px;
    }
    #search-results .pagination a {
        text-align: left;
        padding: 5px 10px 5px 10px;
        border: 1px solid grey;
        color: #000000;
    }
    #search-results .pagination a:hover {
        color: #FFFFFF;
        background-color: #0CABF9;
        text-decoration: none;
    }
    #search-results .pagination a.prev {
        width: auto;
    }
    #search-results .pagination a.next {
        width: auto;
    }
    #search-results .pagination span {
        text-align: left;
        padding: 5px 10px 5px 10px;
        border: 1px solid grey;
        color: #000000;
    }
    #search-results .pagination span.current {
        color: #ffffff;
        background-color: #171F30;
    }
</style>

<div id="search-results">
    <div class="grid-x grid-container collapse align-middle">
        <div class="cell large-12">

        <h2 class="search-count heading medium-heading2"> 
            <?php echo $wp_query->found_posts; ?>
            <?php _e( 'Search Results Found For', 'locale' ); ?> "<?php the_search_query(); ?>" 
        </h2>

        <?php if ( have_posts() ) { ?>

            <ul class="results">
            
                <?php while ( have_posts() ) { the_post(); ?>
    
                    <li>
                        <a href="<?php echo get_the_permalink(); ?>" target="_blank">
                            <div class="result">
                                <div class="post-title"><?php echo get_the_title(); ?></div>
                                <div class="post-excerpt"><?php echo get_the_excerpt(); ?></div>
                                <div class="post-date"><?php echo get_the_date(); ?></div>
                            </div>
                        </a>
                    </li>
    
                <?php } ?>
            
            </ul>

           <div class="pagination">
           <?php echo paginate_links( array(
               'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
               'current'      => max( 1, get_query_var( 'paged' ) ),
               'format'       => '?paged=%#%',
               'show_all'     => false,
               'type'         => 'plain',
               'end_size'     => 2,
               'mid_size'     => 1,
               'prev_next'    => true,
               'prev_text'    => sprintf( '<i></i> %1$s', __( '&#xab; Prev', 'text-domain' ) ),
               'next_text'    => sprintf( '%1$s <i></i>', __( 'Next &#xbb;', 'text-domain' ) ),
           ) ); ?>
           </div>

        <?php } ?>

    </div>
  </div>
</div>

<?php get_footer(); ?>
