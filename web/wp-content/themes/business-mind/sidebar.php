		  <div class="col-md-4" id="sidebar">
			<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>
			<div class="pre-widget">
				<h3><?php _e('Widgetized Sidebar', 'businessmind'); ?></h3>
				<p><?php _e('This panel is active and ready for you to add some widgets via the WP Admin', 'businessmind'); ?></p>
			</div>
			<?php endif; ?>
		  </div>