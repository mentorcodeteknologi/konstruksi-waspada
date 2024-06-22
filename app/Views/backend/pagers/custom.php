<!-- <nav aria-label="...">
    <ul class="pagination justify-content-center mb-0 mt-4">
        <li class="page-item">
            <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center" href="#"><i class="ti ti-chevron-left"></i></a>
        </li>
        <li class="page-item active" aria-current="page">
            <a class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center" href="#">1</a>
        </li>
        <li class="page-item">
            <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">2</a>
        </li>
        <li class="page-item">
            <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">3</a>
        </li>
        <li class="page-item">
            <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">4</a>
        </li>
        <li class="page-item">
            <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">5</a>
        </li>
        <li class="page-item">
            <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">...</a>
        </li>
        <li class="page-item">
            <a class="page-link border-0 rounded-circle text-dark round-32 mx-1 d-flex align-items-center justify-content-center" href="#">10</a>
        </li>
        <li class="page-item">
            <a class="page-link border-0 rounded-circle text-dark round-32 d-flex align-items-center justify-content-center" href="#"><i class="ti ti-chevron-right"></i></a>
        </li>
    </ul>
</nav> -->
<?php $pager->setSurroundCount(2) ?>

<nav aria-label="Page navigation">
    <ul class="pagination justify-content-center mb-0 mt-4">
    <?php if ($pager->hasPrevious()) : ?>
        <li class="page-item">
            <a class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center" href="<?= $pager->getFirst() ?>" aria-label="<?= lang('Pager.first') ?>">
                <span aria-hidden="true"><?= lang('Pager.first') ?></span>
            </a>
        </li>
        <li class="page-item">
            <a class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center" href="<?= $pager->getPrevious() ?>" aria-label="<?= lang('Pager.previous') ?>">
                <span aria-hidden="true"><?= lang('Pager.previous') ?></span>
            </a>
        </li>
    <?php endif ?>

    <?php foreach ($pager->links() as $link): ?>
        <li <?= $link['active'] ? 'class="active"' : '' ?> class="page-item">
            <a class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center" href="<?= $link['uri'] ?>">
                <?= $link['title'] ?>
            </a>
        </li>
    <?php endforeach ?>

    <?php if ($pager->hasNext()) : ?>
        <li class="page-item">
            <a class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center" href="<?= $pager->getNext() ?>" aria-label="<?= lang('Pager.next') ?>">
                <span aria-hidden="true"><?= lang('Pager.next') ?></span>
            </a>
        </li>
        <li class="page-link border-0 rounded-circle round-32 mx-1 d-flex align-items-center justify-content-center" class="page-item">
            <a href="<?= $pager->getLast() ?>" aria-label="<?= lang('Pager.last') ?>">
                <span aria-hidden="true"><?= lang('Pager.last') ?></span>
            </a>
        </li>
    <?php endif ?>
    </ul>
</nav>