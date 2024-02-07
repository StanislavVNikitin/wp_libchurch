<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="description" content="LibChurch Event Template">
    <meta name="keywords" content="event, libChurch, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php $socnet_options = libchurch_socnet_link_options();?>

<?php wp_body_open(); ?>
<?php $libchurch_theme_options = libchurch_theme_options();?>

<div class="top-nav-section hidden-xs">
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-md-3 col-lg-3">
                <div class="social">
                    <?php
                    foreach ($socnet_options as $socnet_item):?>
                        <a href="<?php echo $socnet_item['option_link'];?>"><i class="fa-brands <?php echo $socnet_item['option_select'];?> fa-xl" style="color: #ffffff;"></i></a>
                    <?php endforeach;?>
                </div>
            </div>
            <div class="col-sm-6 col-md-7 col-lg-6">
                <div class="counter-top">
                </div>
            </div>
            <div class="col-sm-3 col-md-2 col-lg-3">
                <div class="user-input">
                    <a href="index.html#">My account <i class="fa fa-angle-down"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>



<header class="header-section">
    <div class="container">
        <a href="<?php echo get_home_url('/');?>">
            <?php if (! empty (get_custom_logo())):?>
                <?php the_custom_logo();?>
            <?php else: ?>
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png">
            <?php endif;?>
        </a>
        <a href="<?php echo get_home_url('/');?>" class="site-btn hidden-xs">send donation</a>

        <div class="nav-switch">
            <i class="fa fa-bars"></i>
        </div>
        <nav class="main-menu">
	        <?php
	        wp_nav_menu(
		        array(
			        'theme_location' => 'top_menu',
			        'menu_id'        => 'top-menu',
                    'container' => false,
                    'menu_class' => '',
                    'walker' => new Libchurch_Walker_menu,
		        )
	        );
	        ?>

<!--            <ul>
                <li class="active"><a href="index.html">Home</a></li>
                <li><a href="about.html">About Us</a></li>
                <li><a href="sermons.html">Sermons</a></li>
                <li><a href="event.html">Event</a></li>
                <li><a href="blog.html">blog</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>-->
        </nav>
    </div>
</header>
