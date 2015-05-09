<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
     <?php if(businessmind_get_options('favicon',THEMEPREFIX.'_general','')):?>
    <link rel="icon" href="<?php echo esc_url(businessmind_get_options('favicon',THEMEPREFIX.'_general','')); ?>" type="image/x-icon">
    <?php endif; ?> 
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="kt-header-wrapper">
	<div class="container" id="kt-logo">
		<div class="row">
			<div class="col-md-12"> 
				<h1><a href="<?php echo home_url(); ?>">
				<?php echo get_bloginfo('name'); ?>
				</a></h1>
				<h2><?php bloginfo('description'); ?></h2>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	<div id="kt-main-nav">
		<div class="container">
            <div class="row">
                <div class="col-md-12">
                
                <?php
                wp_nav_menu( array(
                'theme_location'    => 'primary',
                'depth'             => 3,
                'container'         => false,
                'container_class'   => false,
                'fallback_cb'       =>'businessmind_fallback',
                'menu_class'        => 'main-menu')
                );
                ?>
                  
                </div>
            </div>  
		</div>
	</div>

<?php if (get_header_image() != '') {	?>
<div id="kt-header-image">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<img class="img-responsive"  src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" />
			</div>
		</div>
	</div>
</div>
<?php } ?>
</div>