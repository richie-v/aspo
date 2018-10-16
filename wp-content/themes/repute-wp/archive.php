<?php get_header(); ?>

    <!-- BREADCRUMBS -->
    <div class="page-header" style="background-color:#eaeaea">
        <div class="container">
            <h1 class="page-title pull-left">
                <?php
                if (is_tag()) {

                    single_tag_title(__('Posts Tagged: ', 'repute'));

                } elseif (is_category()) {

                    single_cat_title(__('', 'repute'));

                } elseif (is_day()) {

                    echo __('Daily Archives: ', 'repute') . get_the_time(get_option('date_format'));

                } elseif (is_month()) {

                    echo __('Monthly Archives: ', 'repute') . get_the_time('F Y');

                } elseif (is_year()) {

                    echo __('Yearly Archives: ', 'repute') . get_the_time('Y');
                }
                ?>
            </h1>
            <ol class="breadcrumb">
                <?php
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
                    <!-- BLOG -->
                    <div class="blog full-thumbnail">

                        <?php if (have_posts()) :
                        while (have_posts()) : the_post(); ?>
                            <p>
                                <a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                            </p>


                            <hr>
                        <?php endwhile; ?>


                    </div>
                    <!-- END BLOG -->

                    <?php else: ?>

                        <p>
                            <?php _e('There are no posts to display. Try using the search.', 'repute'); ?>
                        </p>

                    <?php endif; ?>

                    <?php
                    $prev_link = get_previous_posts_link(__('Newer &rarr;', 'repute'));
                    $next_link = get_next_posts_link(__('&larr; Older', 'repute'));
                    ?>
                    <!-- pagination -->
                    <?php if ($prev_link && $next_link) : ?>
                        <ul class="pager">
                            <?php echo ($prev_link != '') ? '<li class="previous">' . $next_link . '</li>' : ''; ?>
                            <?php echo ($prev_link != '') ? '<li class="next">' . $prev_link . '</li>' : ''; ?>
                        </ul>
                    <?php elseif ($prev_link) : ?>
                        <ul class="pager">
                            <?php echo ($prev_link != '') ? '<li class="next">' . $prev_link . '</li>' : ''; ?>
                        </ul>
                    <?php elseif ($next_link) : ?>
                        <ul class="pager">
                            <?php echo ($next_link != '') ? '<li class="previous">' . $next_link . '</li>' : ''; ?>
                        </ul>
                    <?php endif; ?>
                    <!-- end pagination -->

                    <?php wp_reset_query(); ?>

                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT -->

<? get_footer(); ?>