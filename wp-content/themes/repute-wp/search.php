<?php 
	get_header();

	global $wp_query;

	if( empty( $paged ) )
		$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1; 
?>
	<?php
		$args = array(
			's' => $s,
			'orderby' => 'type',
			'order' => 'DESC',
			'paged' => $paged
		);

		$allsearch = new WP_Query( $args );
		$count = $allsearch->found_posts;
	?>

	<!-- BREADCRUMBS -->
	<div class="page-header">
		<div class="container">
			<h1 class="page-title pull-left"><? echo $count . ' ' . sprintf( __('search result for &#39%s&#39', 'repute'), esc_html($s, 1) ) ?></h1>
			<ol class="breadcrumb">
				<?php 
					if(function_exists( 'bcn_display' )) {
						bcn_display_list();
					}
				?>
			</ol>
		</div>
	</div>
	<!-- END BREADCRUMBS -->

	<!-- PAGE CONTENT -->
	<div class="page-content search-results">
		<div class="container">
			<div class="row">
				<div class="col-md-9">
					<?php if( $allsearch->have_posts() ) : ?>

						<?php while( $allsearch->have_posts() ) : $allsearch->the_post(); ?>
							<?php if( $post->post_type == 'post' ) : ?>
							<!-- BLOG -->
							<div class="blog blog-result">
								<!-- blog post -->
								<article class="entry-post">
									<header class="entry-header">
										<h2 class="entry-title"><a href="<?php get_permalink(); ?>"><?php the_title(); ?></a></h2>
									</header>
									<div class="entry-content clearfix">
										<div class="content">
											<?php the_excerpt(); ?>
											<p class="read-more">
												<a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More <i class="fa fa-long-arrow-right"></i></a>
											</p>
										</div>
									</div>
								</article>
								<!-- end blog post -->
								<hr>
							</div>
							<?php endif; ?>
						<?php endwhile; ?> 
					
					<?php else : ?>

						<p>
							<?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'repute' ); ?>
						</p>

					<?php endif; ?>

					
					<?php
						$max_num_pages = $wp_query->max_num_pages; 
						if( $max_num_pages > 1 ) : 
					?>
					<div class="text-center">
						<ul class="pagination pagination-sm">
						<li <?php echo ( $paged == 1 ) ? 'class="disabled"' : ''; ?>><a href="<?php echo ( $paged > 1 ) ? get_pagenum_link( $paged - 1 ) : '#'; ?>"><i class="fa fa-angle-left"></i><span class="sr-only">Previous</span></a></li>
						<?php 
							for( $i=1; $i <= $max_num_pages; $i++ ) : 
						?>
							<?php if( $i == $paged ) : ?>
								<li class="active"><a href="#"><?php echo $i; ?></a></li>
								<?php else: ?>
								<li><a href="<?php echo get_pagenum_link( $i ); ?>"><?php echo $i; ?></a></li>
							<?php endif; ?>
						<?php endfor; ?>
						<li <?php echo ( $paged == $max_num_pages ) ? 'class="disabled"' : ''; ?>><a href="<?php echo ( $paged < $max_num_pages ) ? get_pagenum_link( $paged + 1 ) : '#'; ?>"><i class="fa fa-angle-right"></i><span class="sr-only">Next</span></a></li>
						</ul>
					</div>
					<?php endif; ?>

					<?php wp_reset_query(); ?>
				</div>
			</div>
		</div>
	</div>
	<!-- END PAGE CONTENT -->

<?php get_footer(); ?>