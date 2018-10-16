<?php get_header(); ?>

    <!-- BREADCRUMBS -->
    <div class="page-header">
        <div class="container">
            <?php
            $title = get_the_title();
            if (strlen($title) > 37) {
                $sub_title = substr($title, 0, 36) . '..';
            } else {
                $sub_title = $title;
            }
            ?>

            <h2 class="page-title pull-left"><?php echo $sub_title ?></h2>
            <ol class="breadcrumb">
                <?php
                $categories = get_the_category();
                $category_id = $categories[0]->cat_ID;
                if (function_exists('bcn_display')) {
                    bcn_display_list();
                }
                ?>
            </ol>
        </div>
    </div>
    <!-- END BREADCRUMBS -->

    <!-- PAGE CONTENT -->
    <div class="page-content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <!-- BLOG SINGLE -->
                        <div class="blog single full-thumbnail">
                            <!-- blog post -->
                            <article class="entry-post">
                                <header class="entry-header">
                                    <h1 class="entry-title">
                                        <?php the_title(); ?>
                                    </h1>
                                </header>
                                <div class="entry-content clearfix">
                                    <!--								<figure class="featured-image">-->
                                    <!--									--><?php
                                    //										$date = get_the_date( 'M,d,Y' );
                                    //										$arr_date = explode( ',', $date );
                                    //									?>
                                    <!--									--><?php //if ( has_post_thumbnail() ) {
                                    //											$thumb_id = get_post_thumbnail_id( $post->ID );
                                    //											$thumb_img = wp_get_attachment_image_src( $thumb_id , 'large' );
                                    //										}
                                    //									?>
                                    <!--									<img src="-->
                                    <?php //echo $thumb_img[0]; ?><!--" class="img-responsive" alt="-->
                                    <?php //the_title() ?><!--">-->
                                    <!--								</figure>-->
                                    <div class="content">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </article>
                            <!-- end blog post -->
                            <hr>

                            <?php
                            $tags = wp_get_post_tags($post->ID);
                            $tag_ids = array();

                            if ($tags) {
                                foreach ($tags as $item_tag)
                                    $tag_ids[] = $item_tag->term_id;
                            }

                            $args = array(
                                'tag__in' => $tag_ids,
                                'post__not_in' => array($post->ID),
                                'posts_per_page' => 3
                            );

                            $query = new WP_Query($args);
                            ?>

                        </div>
                        <!-- END BLOG SINGLE -->
                    <?php endwhile; else: ?>
                        <p>
                            <?php _e('There are no posts to display. Try using the search.', 'repute'); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->

<?php get_footer(); ?>