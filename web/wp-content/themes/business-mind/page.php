	<?php get_header(); ?>
	<div class="container" id="ktMain">
		<div class="row">
		  <div class="col-md-8">
			<div class="row">
			  <div class="col-md-12" id="ktArticle">
			  <?php while ( have_posts() ) : the_post(); ?>
				<h1><?php 
						$thetitle = get_the_title($post->ID);
						$origpostdate = get_the_date('M d, Y', $post->post_parent);
						$dateline = $origpostdate.' ';
						//var_dump($thetitle);
						if($thetitle==null){echo $dateline;}else{
						the_title();                     
						}
					?></h1>
					
					<div class="kt-divider"></div>
					<?php the_content(); ?>					
					<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'businessmind' ) . '</span>', 'after' => '</div>' ) ); ?>
					<div class="kt-divider clearfix"></div>
                    <?php comments_template( '', true ); ?>
				<?php endwhile; ?>
			  </div>
			</div>
		  </div>
		  <?php get_sidebar(); ?>
		</div>
	</div>
	<?php get_footer(); ?>   