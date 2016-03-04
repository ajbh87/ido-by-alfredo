<div id="sidebar">
    <div class="close">
        <a onclick="sidebar.hideSide()">
            <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 viewBox="0 0 20.6 20.6" style="enable-background:new 0 0 20.6 20.6;" xml:space="preserve">
<g>
	<path d="M5,10.8l9.6,9.6c0.1,0.1,0.3,0.2,0.5,0.2s0.3-0.1,0.5-0.2l0,0c0.1-0.1,0.2-0.3,0.2-0.5v-4.7c0-0.2-0.1-0.3-0.2-0.5
		l-4.5-4.5l4.5-4.5c0.1-0.1,0.2-0.3,0.2-0.5V0.7c0-0.2-0.1-0.3-0.2-0.5l0,0C15.5,0.1,15.3,0,15.1,0c-0.2,0-0.3,0.1-0.5,0.2L5,9.8
		C4.8,10.1,4.8,10.5,5,10.8z"/>
</g>
</svg>
        </a>
    </div>
    <div id="title">
        <h3>Instituto de Ojos</h3>
        <h4>Dr. Miguel Santiago</h4>
    </div>
		<?php if ( ! dynamic_sidebar( 'Sidebar' )) : ?>
    <div class="side-container">
         <ul id="side-list">	
           <li id="sidebar-nav" class="widget menu side">
            <ul>
                <?php if ( is_user_logged_in() ) {
                     wp_nav_menu( array( 'theme_location' => 'logged-in-menu' ) ); /* if the visitor is logged in, this primary navigation will be displayed */
                } else {
                     wp_nav_menu( array( 'theme_location' => 'sidebar-menu' ) ); /* if the visitor is NOT logged in, this primary navigation will be displayed. if a single menu should be displayed for both conditions, set the same menues to be displayed under both conditions through the Wordpress backend */
                } ?>
            </ul>
           </li>
           <li class="side">
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
                        <a class="lang">English</a>
                        <a class="tel" href="tel:+1-787-769-2477">787.769.2477</a>
                    </div>
             </li>
         </ul> 
    </div>
				<?php get_search_form(); /* outputs the default Wordpress search form */ ?>
		<?php endif; ?>
</div><!--sidebar-->
