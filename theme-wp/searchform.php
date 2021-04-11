<!-- Search form -->
<form role="search" method="get" class="search-form" action="<?= home_url( '/' ); ?>">
    <div class="input-group">
        <input type="search" class="form-control form-control-lg" name="s" placeholder="<?= esc_attr_x( 'Buscar...', 'placeholder' ) ?>" title="<?= esc_attr_x( 'Search for:', 'label' ) ?>" required>
        <div class="input-group-append">
            <button class="btn btn-primary btn-lg" type="submit" id="button-search">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
</form>
    
<?php /*
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
<label>
<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
<input class="search-field" type="search" name="s" value="<?php echo get_search_query() ?>" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
</label>

  <input type="hidden" name="post_type" value="post" />
  <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
</form>
*/ ?>