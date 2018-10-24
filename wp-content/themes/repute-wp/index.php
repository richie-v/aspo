<?php get_header(); ?>

	<!-- BREADCRUMBS -->
<div class="page-header">
		<div class="container">
			<h1 class="page-title pull-left"><?php $currentlang = get_bloginfo('language'); if($currentlang==='nl'): ?>Nieuws<?php else: ?>News<?php endif; ?></h1>
			<ol class="breadcrumb">
				<?php 
					if(function_exists('bcn_display')) {
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
					<?php
                    $wpb_all_query = new WP_Query(array('post_type'=>'post', 'post_status'=>'publish', 'posts_per_page'=>-1)); 
                    if( $wpb_all_query->have_posts() ) : while( $wpb_all_query->have_posts() ) : the_post(); ?>
                        <?php if (in_category(69) || in_category(71)) { ?>
						<!-- blog post -->
						<article class="entry-post">
							<header class="entry-header">
								<h2 class="entry-title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h2>
							</header>
							<div class="entry-content clearfix">
								<div class="content">
									<?php the_excerpt(); ?>
									<p class="read-more">
										<a href="<?php the_permalink(); ?>" class="btn btn-primary"><?php $currentlang = get_bloginfo('language'); if($currentlang==='nl'): ?>LEES MEER<?php else: ?>READ MORE<?php endif ?> <i class="fa fa-long-arrow-right"></i></a>
									</p>
								</div>
							</div>
						</article>
						<!-- end blog post -->
                            <hr>
                        <?php } ?>
					<?php endwhile; ?>
					
					</div>
					<!-- END BLOG -->
					
					<?php else: ?>
					
						<p>
							<?php _e( 'There are no posts to display. Try using the search.', 'repute' ); ?>
						</p>
					
					<?php endif; ?>

					<?php
						$prev_link = get_previous_posts_link( __( 'Newer &rarr;', 'repute' ) );
						$next_link = get_next_posts_link( __( '&larr; Older', 'repute' ) );
					?>
					<!-- pagination -->
					<?php if( $prev_link && $next_link ) : ?>
					<ul class="pager">
						<?php echo ( $prev_link != '' ) ? '<li class="previous">' . $next_link . '</li>' : ''; ?>
						<?php echo ( $prev_link != '' ) ? '<li class="next">' . $prev_link . '</li>' : ''; ?>
					</ul>
					<?php elseif ( $prev_link ) : ?>
					<ul class="pager">
						<?php echo ( $prev_link != '' ) ? '<li class="next">' . $prev_link . '</li>' : ''; ?>
					</ul>
					<?php elseif ( $next_link ) : ?>
					<ul class="pager">
						<?php echo ( $next_link != '' ) ? '<li class="previous">' . $next_link . '</li>' : ''; ?>
					</ul>
					<?php endif; ?>
					<!-- end pagination -->
				</div>
				<!--<div class="col-md-3">
					<!-- SIDEBAR -->
					<?php
/*						if( function_exists( 'dynamic_sidebar' ) ){
							if ( !dynamic_sidebar( 'tdv-page' ) && current_user_can('edit_theme_options') ) :
								printf( __( 'Your theme supports sidebar, please go to Appearance &raquo <a href="%s">Widgets</a> in admin area.' ), admin_url('widgets.php') );
							endif;
						}
					*/?>
					<!-- END SIDEBAR -->
				</div>
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT -->

<?php get_footer(); ?>
