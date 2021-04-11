<?php get_header() ?>

<!-- <div class="container">

    <h1 class="h1-responsive-sm"><?php the_title() ?></h1>
    
    <?php if ( is_active_sidebar( 'elm-widget-ads' ) ) :?>
    <div class="row">
        <div class="col-sm col-sm-8">
            Leftside
        </div>
        <aside class="col-sm">
            <?php dynamic_sidebar('elm-widget-ads')  ?>
        </aside>
    </div>
    <?php else : ?> 
    <?php endif ?>
</div> -->

<?php if( wp_is_mobile() ): ?>
<script type="text/javascript" src="https://www5.smartadserver.com/ac?pgid=592805&insid=8881603&tmstp=[timestamp]&out=js&clcturl=[countgoEncoded]"></script>
<noscript>

</noscript>
<?php endif ?>

<?php get_footer() ?>