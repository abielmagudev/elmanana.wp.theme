<!-- Post 1 -->
<?php if( isset($content[0]->post) ): ?>
<div class="card rounded-0 bg-transparent text-white" style="background: rgba(0,0,0,0.8) !important">
    <a href="<?= $content[0]->post_url ?>">
        <img src="<?= get_the_post_thumbnail_url($content[0]->post->ID, 'medium_large') ?>" alt="<?= $content[0]->post->post_title ?>" class="card-img-top rounded-0" style="min-height:175px">
    </a>
    <div class="card-body">
        <p class="m-0">
            <small>
                <span class="badge badge-pill"><?= get_the_category($content[0]->post->ID)[0]->name ?></span>
                <span><?= get_the_date('', $content[0]->post->ID) ?></span>
            </small>
        </p>
        <a href="<?= $content[0]->post_url ?>" class="h2 text-white">
            <?= $content[0]->post->post_title ?>
        </a>
        <p><?= $content[0]->post->post_excerpt ?></p>
    </div>
    <div class="card-footer"></div>
</div>
<?php endif ?>
<br>

<div class="row">

    <?php for($i = 1; $i <= 3; $i++): ?>
    <!-- Post <?= $i + 1 ?> -->
    <?php if( isset($content[$i]->post) ): ?>
    <div class="col-sm">
        <div class="card rounded-0 bg-transparent text-white h-100" style="background: rgba(0,0,0,0.8) !important">
            <a href="<?= $content[$i]->post_url ?>">
                <img src="<?= get_the_post_thumbnail_url($content[$i]->post->ID, 'medium_large') ?>" alt="<?= $content[$i]->post->post_title ?>" class="card-img-top rounded-0" style="min-height:30vh">
            </a>
            <div class="card-body">
                <p class="m-0">
                    <small>
                        <span class="badge badge-pill"><?= get_the_category($content[$i]->post->ID)[0]->name ?></span>
                        <span><?= get_the_date('', $content[$i]->post->ID) ?></span>
                    </small>
                </p>
                <a href="<?= $content[$i]->post_url ?>" class="h2 text-white">
                    <?= $content[$i]->post->post_title ?>
                </a>
                <p><?= $content[$i]->post->post_excerpt ?></p>
            </div>
            <div class="card-footer"></div>
        </div>
    </div>
    <?php endif ?>
    <?php endfor ?>

</div>
<br>
