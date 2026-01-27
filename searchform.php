<form method="get" class="search-holder" action="<?php echo esc_url(home_url('/')); ?>" style="position:relative;">
    <div class="search-box">
        <input class="search-txt" type="search" name="s"
            placeholder="<?php echo esc_attr_x('Type to Search', 'placeholder', 'd-theme'); ?>"
            value="<?php echo esc_attr(get_search_query()); ?>">
        <button type="submit" class="search-btn" aria-label="<?php echo esc_attr_x('Search', 'submit', 'd-theme'); ?>">
            <i class="fas fa-search"></i>
        </button>
    </div>
</form>