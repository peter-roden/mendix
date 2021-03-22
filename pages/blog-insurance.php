<?php
/**
 * Template Name: Blog Insurance
 */
?>

<?php get_header(); ?>
  
<?php if ($overlay_opacity = get_field('overlay_opacity')) {
    echo '<style>',
        '.post-hero-background::before {
            content: "";
            display: block;
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: black;
            mix-blend-mode: multiply;
            opacity: ' . ($overlay_opacity/100) . 
        '}',
    '</style>';
} ?>  


<?php $header_posts = new WP_Query([
    'post_type' => 'post',
    'order' => 'DESC',
    'orderby' => 'post_date',
    'post_status' =>  array('publish'),
    'posts_per_page' => 3,
    'tax_query' => array (
        array(
            'taxonomy' => 'post_tag',
            'field'    => 'slug',
            'terms'    => array('insurance','featured')
        )
    )
]); 

echo '<ul id="industry-hero">';
    while ($header_posts->have_posts()) : $header_posts->the_post();
 
        $background_style = 'style="background-image: url(' . get_the_post_thumbnail_url(get_the_ID(),'full') .  ');';
        echo '<li class="post-hero-' . get_row_index() .  ' post-hero-background section-padding cover relative " ' . $background_style . '">';
            echo '<div class="grid-container grid-x grid-padding-x collapse align-middle">';
                echo '<h1 class="hero-intro-copy uppercase">Insurance Blog</h1>';
                echo '<div class="ruler"><hr></div>';
                echo '<div class="post-info">';
                    echo '<div class="hero-headline">' . get_the_title() . '</div>';
                    echo '<div class="content-subheadline">' . get_the_excerpt() . '</div>';
                    echo '<a class="btn-primary" href="' .  get_the_permalink() . '">Read The Story</a>';
                echo '</div>';
            echo '</div>';
        echo '</li>';
        
    endwhile;
    wp_reset_query();
echo '</ul>';
echo '<div class="industry-hero-carousel-dots white relative"></div>';
?>

<script>
    $(document).ready(function(){
        $('#industry-hero').slick({
            dots: true,
            appendDots: $('.industry-hero-carousel-dots'),
            arrows: false,           
            slidesToShow: 1,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 5000
        });
    });
</script>

<section id="blog-landing">
    
    <div class="grid-container grid-x grid-padding-x collapse align-middle">

    <?php $blog_posts = new WP_Query([
        'post_type' => 'post',
        'order' => 'DESC',
        'orderby' => 'post_date',
        'paged' => get_query_var( 'paged' ) ?: 1,
        'post_status' =>  array('publish'),
        'posts_per_page' => 8,
        'tax_query' => array (
            array(
                'taxonomy' => 'post_tag',
                'field'    => 'name',
                'terms'    => 'Insurance'
            )
        )
    ]); 
    ?>

    <div class="pt3">  

        <div class="grid-container">
            <div class="back-container"><a class="back" href="<?= get_site_url(); ?>/blog/">< Back to Main Blog</a></div>
            <h2 class="heading2 mt2 mb2">Recent Posts</h2>
            
            <ul class="featured-blog grid-x grid-padding-x">

                <?php while ($blog_posts->have_posts()) : $blog_posts->the_post();

                    //inject a more a "Further reading" card into the 3 grid position
                    if ($blog_posts->current_post == 2) {
                        echo '<aside id="post-featured" class="cell medium-6 large-4post type-post">';
                            echo '<h3 class="heading3 mb1">Further Reading</h3>';
                            echo '<ul>';
                                while (have_rows('blog_more_reading_repeater', 61668)): the_row(); 
                                    echo '<li class="mb1">';
                                    $link = get_sub_field('more_reading_link');
                                    echo '<a class="normal5 sidebarArticles__link" href="' . $link['url'] .'">' . $link['title'] .'</a>'; 
                                    echo '</li>';
                                endwhile;       
                            echo '</ul>';
                        echo '</aside>';
                    }

                    //otherwise out put a blog card
                    get_template_part( 'content', get_post_format() );
                    
                endwhile; ?>
            </ul>
            
            <?php
            echo '<div class="pagination">';
                echo paginate_links( array(
                    'base'         => str_replace( 999999999, '%#%', esc_url( get_pagenum_link( 999999999 ) ) ),
                    'total'        => $blog_posts->max_num_pages,
                    'current'      => max( 1, get_query_var( 'paged' ) ),
                    'format'       => '?paged=%#%',
                    'show_all'     => false,
                    'type'         => 'plain',
                    'end_size'     => 2,
                    'mid_size'     => 1,
                    'prev_next'    => true,
                    'prev_text'    => sprintf( '<i></i> %1$s', __( '&#xab; Prev', 'text-domain' ) ),
                    'next_text'    => sprintf( '%1$s <i></i>', __( 'Next &#xbb;', 'text-domain' ) ),
                ) );
            echo '</div>';
            ?>

        </div>
    </div>

    <?php wp_reset_query(); ?>

</section>

<?php get_footer(); ?>