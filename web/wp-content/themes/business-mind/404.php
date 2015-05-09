	<?php get_header(); ?>
	<div class="container" id="kt-main">
		<div class="row">
		  <div class="col-md-8">
			<div class="row">
			  <div class="col-md-12" id="kt-article">
				<h1><?php _e('404 ERROR!', 'businessmind' ); ?></h1>
				<h2><?php _e( 'It seems we can&rsquo;t find what you&rsquo;re looking for, search something else', 'businessmind' ); ?></h2>
				<?php get_search_form(); ?>
				
				</div>
			</div>
		  </div>
		  <?php get_sidebar(); ?>
		</div>
	</div>
	<?php get_footer(); ?>   