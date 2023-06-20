<?php $pager->setSurroundCount(3); ?>
<nav class="text-center">
    <ul class="pagination justify-content-center">
        <?php if ($pager->hasPrevious()) { ?>
            <li class="page-item">
                <a href="<?= $pager->getFirst() ?>" aria-label="Primeiro" class="page-link">
                    <span aria-hidden="true">Primeiro</span>
                </a>
            </li>
            <li class="page-item">
                <a href="<?= $pager->getPrevious() ?>" class="page-link" aria-label="Anterior">
                    <span>&laquo;</span>
                </a>
            </li>
        <?php } ?>

        <?php
        foreach ($pager->links() as $link) {
            $activeclass = $link['active'] ? 'active' : '';
        ?>
            <li class="page-item <?= $activeclass ?>">
                <a href="<?= $link['uri'] ?>" class="page-link">
                    <?= $link['title'] ?>
                </a>
            </li>
        <?php } ?>

        <?php if ($pager->hasNext()) { ?>
            <li class="page-item">
                <a href="<?= $pager->getNext() ?>" aria-label="Próximo" class="page-link">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
            <li class="page-item">
                <a href="<?= $pager->getLast() ?>" aria-label="Último" class="page-link">
                    <span aria-hidden="true">Último</span>
                </a>
            </li>
        <?php } ?>
    </ul>
</nav>