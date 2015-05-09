	<?php get_header();?>   
    <div class="container" id="ktMain">
		<div class="row">
		  <p id="kt-latest"><?php _e('View Latest ', 'businessmind'); ?></p>
		  <?php get_sidebar(); ?>
		  <div class="col-md-8">
			
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="kt-article">
			  <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if(has_post_thumbnail()) { ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('', array("class" => "thumbnail"));  ?></a>
				<div class="kt-divider clearfix"></div>
				<?php } ?>				
				<h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php 
						$thetitle = get_the_title($post->ID);
						$origpostdate = get_the_date('M d, Y', $post->post_parent);
						
						$dateline = $origpostdate.' ';
						//var_dump($thetitle);
						if($thetitle==null){echo $dateline;}else{
						the_title();                     
						}
				?></a></h1>
				<?php the_excerpt(); ?>
				<div class="kt-more"><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php _e('Read More...', 'businessmind'); ?></a></div>
				<div class="clearfix"></div>
			  </div>
			</div>
			<div class="clearfix"></div>
			<?php endwhile; else: ?>
			<div class="row kt-article">
			  <div class="col-md-12">
				<h1><?php _e('Sorry, no posts matched your criteria.', 'businessmind'); ?></h1>
			  </div>
			</div>
			<?php endif; ?>
			<!-- FIX NAV TRANSLATION -->
			<div id="kt-pagination">
				<div class="alignleft"><?php previous_posts_link(__( '&laquo; Newer posts', 'businessmind' )) ?></div>
				<div class="alignright"><?php next_posts_link(__( 'Older posts &raquo;', 'businessmind' )) ?></div>
			</div>
		  </div>
         
		  
		</div>
	</div>
    
	<?php get_footer(); ?>   