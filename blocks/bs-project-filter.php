<?php 
/**
 * Projects Filter
 */
$section_title  = get_field( 'section_title' );
$section_description  = get_field( 'section_description' );
$paged = get_query_var( 'paged' ) ? get_query_var( 'paged' ) : 1;
$args = array(
    'post_type' => 'bs-projects',
    'post_status' => 'publish',
    'ignore_sticky_posts' => 1,
    'paged' => $paged,
    'posts_per_page' => '12'
);
    
// The Query
$the_query = new WP_Query( $args );

$terms = get_terms( array(
    'taxonomy'   => 'pfs-category',
    'hide_empty' => false,
) );

?>
<section class="projects-filter section-bg">
    <div class="container">
        <div class="structure">
            <h2 class="pfs_title"><?php echo esc_html( $section_title ); ?></h2>
            <p class="pfs_desc"><?php echo wp_kses_post( $section_description ); ?>
            </p>
        </div>
        <div class="select-wrapper">
            <select name="filter-project-cats" id="filter_by_project_cats">
                <option value="">Filter by category</option>
                <?php foreach( $terms as $term ) :
                    echo '<option value="' . $term->id . '">' . $term->name . '</option>';
                endforeach; ?>

            </select>
        </div>
        <?php if ( $the_query->have_posts() ) : ?>
            <div class="pfs-card-grid col-4">
                <?php while ( $the_query->have_posts() ) :
                    $the_query->the_post(); ?>
                    <div class="col">
                        <?php the_post_thumbnail( 'full', array( 'class' => 'pfs__image', 'alt' => 'pfs-image', 'loading' => 'lazy' ) ); ?>
                        <?php $pcats = get_the_terms( get_the_ID(), 'pfs-category' ); ?>
                        <div class="text">
                            <?php if( $pcats[0] ) :
                                echo '<span class="text-12">' . $pcats[0]->name . '</span>';
                            endif; ?>
                            <h3>
                                <?php the_title(); ?>
                            </h3>
                            <a href="<?php the_permalink(); ?>" class="primary-color">
                                Learn more
                            </a>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php wp_reset_postdata(); endif; ?>
    </div>
</section>