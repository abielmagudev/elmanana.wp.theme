<?php get_header() ?>

<?php 
if( have_posts() ): the_post();
    $columnist = elm_cpt_opinions_get_columnist_post( get_the_ID() );
?>

<div style="background-color:transparent">
    <br>
    <div class="container">
        <div class="row">

            <!-- Current opinion -->
            <section class="col-sm">
                <article class="">
                    <header class="row align-items-center text-center text-md-left">
                        <div class="col-sm">
                            <img class="img-thumbnail rounded-circle" style="width:224px;height:224px" src="<?= $columnist->image ?>" alt="<?= $columnist->name ?>">
                        </div>
                        <div class="col-sm col-sm-8">
                            <header>
                                <p class="text-uppercase m-0">
                                    <small><?= implode(', ', $columnist->sections) ?: 'Opinión' ?></small>
                                </p>
                                <p class="font-georgia" style="color:<?= elm_cpt_opinions_color('dark') ?>"><?= $columnist->name ?></p>
                                <small class="text-capitalize text-muted"><?php the_date() ?></small>
                                <h1 class="h2 font-georgia"><?php the_title() ?></h1>
                            </header>
                        </div>
                    </header>
                    <br>
                    <br>
                    <div class="content">
                        <?php the_content() ?>
                    </div>
                </article>
            </section>

            <!-- More opinions -->
            <section class="col-sm col-sm-3">
                <?php get_sidebar('opinions-post')  ?>
            </section>
        </div>
    </div>
    <br>
</div>
<?php endif ?>

<?php get_footer() ?>