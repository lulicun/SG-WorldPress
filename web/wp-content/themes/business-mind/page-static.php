	<?php
	/*
	Template Name: Static
	*/
	get_header(); ?>
	<div class="container" id="kt-static">
		<div class="row">
			  <div class="col-md-4">
			  <?php if ( ! dynamic_sidebar( 'homewidgetleft' ) ) : ?>
                <div class="pre-widget">
                    <h3><?php _e('Widgetized Sidebar', 'businessmind'); ?></h3>
                    <p><?php _e('This panel is active and ready for you to add 
                    some widgets via the WP Admin', 'businessmind'); ?></p>
                </div>
              <?php endif; ?>
			  </div>
			  <div class="col-md-4">
			  <?php if ( ! dynamic_sidebar( 'homewidgetcenter' ) ) : ?>
                <div class="pre-widget">
                    <h3><?php _e('Widgetized Sidebar', 'businessmind'); ?></h3>
                    <p><?php _e('This panel is active and ready for you to add 
                    some widgets via the WP Admin', 'businessmind'); ?></p>
                </div>
              <?php endif; ?>
			  </div>
			  <div class="col-md-4">
			  <?php if ( ! dynamic_sidebar( 'homewidgetright' ) ) : ?>
                <div class="pre-widget">
                    <h3><?php _e('Widgetized Sidebar', 'businessmind'); ?></h3>
                    <p><?php _e('This panel is active and ready for you to add 
                    some widgets via the WP Admin', 'businessmind'); ?></p>
                </div>
              <?php endif; ?>
			  </div>
		</div>
	</div>
	<?php get_footer(); ?>   