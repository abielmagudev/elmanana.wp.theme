<?php if( $pagination_items = elm_get_pagination_items() ): ?>
<nav class="my-5">
    <ul class="pagination">
    <?php foreach($pagination_items as $item): ?>
        <?php
        $link   = str_replace('page-numbers', 'page-numbers page-link', $item);    
        $active = strpos($item, 'current') ? 'active' : '';    
        ?>
        <li class="page-item <?= $active ?>"><?= $link ?></li>
    <?php endforeach ?>
    </ul>
</nav>
<?php endif ?>
