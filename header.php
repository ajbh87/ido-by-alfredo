<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<title><?php if ( is_category() ) {
		echo 'Category Archive for &quot;'; single_cat_title(); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_tag() ) {
		echo 'Tag Archive for &quot;'; single_tag_title(); echo '&quot; | '; bloginfo( 'name' );
	} elseif ( is_archive() ) {
		wp_title(''); echo ' Archive | '; bloginfo( 'name' );
	} elseif ( is_search() ) {
		echo 'Search for &quot;'.wp_specialchars($s).'&quot; | '; bloginfo( 'name' );
	} elseif ( is_home() ) {
		bloginfo( 'name' ); echo ' | '; bloginfo( 'description' );
	}  elseif ( is_404() ) {
		echo 'Error 404 Not Found | '; bloginfo( 'name' );
	} elseif ( is_single() ) {
		wp_title('');
	} else {
		echo wp_title(''); echo ' | '; bloginfo( 'name' );
	} ?></title>
	<meta name="description" content="<?php wp_title(''); echo ' | '; bloginfo( 'description' ); ?>" />
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<meta name="viewport" content="width=device-width; initial-scale=1"/><?php /* Add "maximum-scale=1" to fix the Mobile Safari auto-zoom bug on orientation changes, but keep in mind that it will disable user-zooming completely. Bad for accessibility. */ ?>
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/whiteboard_favicon.ico" type="image/x-icon" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="alternate" type="application/atom+xml" title="<?php bloginfo( 'name' ); ?>" href="<?php bloginfo( 'atom_url' ); ?>" />
	<?php wp_enqueue_script("jquery"); /* Loads jQuery if it hasn't been loaded already */ ?>
	<?php /* The HTML5 Shim is required for older browsers, mainly older versions IE */ ?>
	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?> <?php /* this is used by many Wordpress features and for plugins to work proporly */ ?>
	<?php /* Remove the Less Framework CSS line to not include the CSS Reset, basic styles/positioning, and Less Framework itself */?>
	<script src="https://use.typekit.net/wpg1oxz.js"></script>
	<script>try{Typekit.load({ async: true });}catch(e){}</script>
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

</head>

<body <?php body_class(); ?>>
    <?php
        if (is_page("gracias")) { ?>
            <script type='text/javascript'>
            var ebRand = Math.random()+'';
            ebRand = ebRand * 1000000;
            document.write('<scr'+'ipt src="HTTP://bs.serving-sys.com/Serving/ActivityServer.bs?cn=as&amp;ActivityID=749861&amp;rnd=' + ebRand + '"></scr' + 'ipt>');
            </script>
            <noscript>
            <img width="1" height="1" style="border:0" src="HTTP://bs.serving-sys.com/Serving/ActivityServer.bs?cn=as&amp;ActivityID=749861&amp;ns=1"/>
            </noscript>
        <?php } ?>
<div class="none">
	<p><a href="#content"><?php _e('Skip to Content'); ?></a></p><?php /* used for accessibility, particularly for screen reader applications */ ?>
</div><!--.none-->
<div id="main"><!-- this encompasses the entire Web site -->
	<div id="header"><header>
		<div class="container">
      <button id="menu-button" onclick="sidebar.showSide()">
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 92.8 92.8" style="enable-background:new 0 0 92.8 92.8;" xml:space="preserve">
<g>
	<g>
		<path d="M89.8,1.8H3c-1.7,0-3,1.3-3,3v13.3c0,1.7,1.3,3,3,3h86.8c1.7,0,3-1.3,3-3V4.8C92.8,3.1,91.5,1.8,89.8,1.8z"/>
		<path d="M89.8,36.8H3c-1.7,0-3,1.3-3,3v13.3c0,1.7,1.3,3,3,3h86.8c1.7,0,3-1.3,3-3V39.8C92.8,38.1,91.5,36.8,89.8,36.8z"/>
		<path d="M89.8,71.8H3c-1.7,0-3,1.3-3,3v13.3c0,1.7,1.3,3,3,3h86.8c1.7,0,3-1.3,3-3V74.8C92.8,73.1,91.5,71.8,89.8,71.8z"/>
	</g>
</g>
</svg>
      </button>
			<div id="title">
				<?php if( is_front_page() || is_home() || is_404() ) { ?>
					<a id="logo" href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><h1><?php bloginfo('name'); ?></h1></a>
					<h2 id="tagline"><?php bloginfo('description'); ?></h2>
				<?php } else { ?>
					<a id="logo" href="<?php bloginfo('url'); ?>/" title="<?php bloginfo('description'); ?>"><h2><?php bloginfo('name'); ?></h2></a>
					<h3 id="tagline"><?php bloginfo('description'); ?></h3>
				<?php } ?>
			</div><!--#title-->
            <div id="lang-container">
                <?php 
                    if ( is_user_logged_in() ) {
                        global $current_user;
                        get_currentuserinfo();
                ?>
                        <div id="user-logged-in">
                            Hola <?php echo $current_user->user_firstname;?>. <a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
                        </div>
                    <?php } ?>
                     <div class="social">
        <a id="facebook" href="https://www.facebook.com/institutoojospr/">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" x="0px" y="0px" viewBox="0 0 486.392 486.392" style="enable-background:new 0 0 486.392 486.392;" xml:space="preserve">
                        <g>
                    <circle cx="243" cy="243" r="240" fill="white" />
                </g>
                    <g>
                    <g>
                        <g>
                            <path d="M243.196,0C108.891,0,0,108.891,0,243.196s108.891,243.196,243.196,243.196
                                s243.196-108.891,243.196-243.196C486.392,108.861,377.501,0,243.196,0z M306.062,243.165l-39.854,0.03l-0.03,145.917h-54.689
                                V243.196H175.01v-50.281l36.479-0.03l-0.061-29.609c0-41.039,11.126-65.997,59.431-65.997h40.249v50.311h-25.171
                                c-18.817,0-19.729,7.022-19.729,20.124l-0.061,25.171h45.234L306.062,243.165z"/>
                        </g>
                    </g>
                </g>
                </svg></a>
                <a id="youtube" href="https://www.youtube.com/channel/UCQgVDzo8hhR8Wsgqi2vaqWg">
                    <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30" height="30" x="0px" y="0px" viewBox="0 0 486.392 486.392" style="enable-background:new 0 0 486.392 486.392;" xml:space="preserve">
                        <g>
                            <circle cx="243" cy="243" r="240" fill="white" />
                        </g>
                        <g>
                            <g>
                                <g>
                                    <g>
                                    <path d="M243.196,0C108.891,0,0,108.891,0,243.196s108.891,243.196,243.196,243.196
                                        s243.196-108.891,243.196-243.196C486.392,108.861,377.501,0,243.196,0z M392.609,297.641
                                        c-1.642,20.246-17.024,46.086-38.516,49.825c-68.855,5.35-150.447,4.682-221.764,0c-22.252-2.797-36.875-29.609-38.516-49.825
                                        c-3.466-42.498-3.466-66.696,0-109.195c1.642-20.216,16.629-46.876,38.516-49.308c70.496-5.928,152.545-4.651,221.764,0
                                        c24.745,0.912,36.875,26.417,38.516,46.663C396.014,228.3,396.014,255.143,392.609,297.641z"/>
                                    <polygon points="212.796,303.995 303.995,243.196 212.796,182.397 				"/>
                        </g>
                                </g>
                            </g>
                        </g>
                    </svg>
                </a>
     </div>
                <a class="lang">English</a>
            </div>
			<div id="nav-primary" class="nav"><nav>
				<?php if ( is_user_logged_in() ) {
				     wp_nav_menu( array( 'theme_location' => 'logged-in-menu' ) ); /* if the visitor is logged in, this primary navigation will be displayed */
				} else {
				     wp_nav_menu( array( 'theme_location' => 'header-menu' ) ); /* if the visitor is NOT logged in, this primary navigation will be displayed. if a single menu should be displayed for both conditions, set the same menues to be displayed under both conditions through the Wordpress backend */
				} ?>
			</nav></div><!--#nav-primary-->
			<div class="clear"></div>
		</div><!--.container-->
	</header></div><!--#header-->
	<div id="content-container" class="container">