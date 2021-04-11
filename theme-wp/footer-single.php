    <?php get_template_part('global/footer-content') ?>

    <!-- Placement -->
    <?php if( function_exists('the_ad_placement') ): ?>
    <div style="position: sticky; bottom: 0; margin: 0 auto 0 auto; width: 320px;">
        <?php the_ad_placement('elmanana_all_320x100_mobile_sticky') ?>
    </div>
    <div style="position: sticky; bottom: 0; margin: 0 auto 0 auto; width: 728px;">
        <?php the_ad_placement('elmanana_all_728x90_desktop_sticky') ?>
    </div>
    <?php endif ?>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MFJ7WKK"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

</body>
</html>