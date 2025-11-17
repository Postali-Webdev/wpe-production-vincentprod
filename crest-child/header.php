<?php
/**
 * Theme header.
 *
 * @package Postali Crest Controller Theme
 * @author Postali LLC
**/

// get silo
if ( is_tree('1676') ) {
    $location = 'columbus';
}

?><!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WKF4Z6G3');</script>
<!-- End Google Tag Manager -->

<!-- Add JSON Schema here -->
<?php 
// Global Schema
$global_schema = get_field('global_schema', 'options');
if ( !empty($global_schema) ) :
    echo '<script type="application/ld+json">' . $global_schema . '</script>';
endif;

// Single Page Schema
$single_schema = get_field('single_schema');
if ( !empty($single_schema) ) :
    echo '<script type="application/ld+json">' . $single_schema . '</script>';
endif; ?>

<meta http-equiv="Content-Type" content="text/html; charset=<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php wp_head(); ?>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700&family=EB+Garamond:ital,wght@0,400..800;1,400..800&family=Funnel+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

<?php if( is_single() ) : ?>
    <meta name="author" content="Dr. Gregory J. Vincent" class="postali-seo-meta-tag">
<?php endif; ?>
</head>

<a class="skip-link" href='#main-content'>Skip to Main Content</a>

<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WKF4Z6G3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

	<header>
		<div id="header-top" class="container">
			<div id="header-top_left">
				<?php the_custom_logo(); ?>
			</div>
			
			<div id="header-top_right">
				<div id="header-top_right_menu">
                    <div class="nav-container">
                        <nav role="navigation">
                        <?php
                            $args = array(
                                'container' => false,
                                'theme_location' => 'header-nav-about'
                            );
                            wp_nav_menu( $args );
                        ?>
                        <?php if (!empty($location)) { 
                            $args = array(
                                'container' => false,
                                'theme_location' => 'header-nav-services-'. $location .''
                            );
                            wp_nav_menu( $args );
                        } else {
                            $args = array(
                                'container' => false,
                                'theme_location' => 'header-nav-services-global'
                            );
                            wp_nav_menu( $args );
                        } ?>
                        <?php
                            $args = array(
                                'container' => false,
                                'theme_location' => 'header-nav-rest'
                            );
                            wp_nav_menu( $args );
                        ?>
                        </nav>
                        <ul class="menu">
                            <li>
                                <?php if (!empty($location)) {  ?>
                                <a href="/<?php echo $location; ?>/contact/">Contact</a>
                                <?php } else { ?>
                                <a href="/contact/">Contact</a>
                                <?php } ?>
                            </li>
                            <li class="nav-phone"><a href="tel:<?php the_field('global_phone','options') ?>"><?php the_field('global_phone','options'); ?></a></li>
                            <li class="menu-item menu-item-search search-holder">
                                <form class="navbar-form-search" role="search" method="get" action="/">
                                    <div class="search-form-container hdn" id="search-input-container">
                                        <div class="search-input-group">
                                            <div class="form-group">
                                                <input type="text" name="s" placeholder="Search for..." id="search-input-5cab7fd94d469" value="" class="form-control">
                                                <label for="s">search for... </label>
                                            </div>
                                        </div>
                                    </div>
                                    <button title="search the site" type="submit" class="btn btn-search" id="search-button"><span class="icon-icon-search" aria-hidden="true"></span></button>
                                </form>	
                            </li>
                        </ul>
                    </div>		
					<div id="header-top_mobile">
						<div id="menu-icon" class="toggle-nav">
							<span class="line line-1"></span>
							<span class="line line-2"></span>
							<span class="line line-3"></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header> 

    <span id="main-content"></span>

    <!-- Single Page Schema -->
    <?php
    $single_page_schema = get_field('single_page_schema');
    if ( !empty($single_page_schema) ) :
        echo '<script type="application/ld+json">' . strip_tags($single_page_schema) . '</script>';
    endif; ?>

