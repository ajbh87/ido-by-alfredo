<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
    <label>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Buscar …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
    </label>
    <label>
	       <input type="submit" class="search-submit" value="" />
        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
              viewBox="0 0 477.9 477.9" style="enable-background:new 0 0 477.9 477.9;" xml:space="preserve">
            <circle class="st0" cx="239" cy="239" r="239"/>
            <path d="M292,148.9c-38.2-38.2-100.2-38.2-138.4,0c-38.2,38.2-38.2,100.2,0,138.4c38.2,38.2,100.2,38.2,138.4,0
             C330.2,249.1,330.2,187,292,148.9z"/>
            <path d="M239,0C107,0,0,107,0,239s107,239,239,239c132,0,239-107,239-239S370.9,0,239,0z M387,382.2c-6.5,6.5-17,6.5-23.4,0
             L314.3,333c0,0,0,0,0,0l-20.8-20.8c-46.1,34.7-112,31-154-10.9c-45.9-45.9-45.9-120.6,0-166.5c45.9-45.9,120.6-45.9,166.5,0
             c41.9,41.9,45.6,107.9,10.9,154l20.8,20.8c0,0,0,0,0,0l49.3,49.3C393.5,365.3,393.5,375.8,387,382.2z"/>
        </svg>
    </label>
</form>