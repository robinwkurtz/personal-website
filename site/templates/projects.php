<?php snippet('header') ?>

<main class="main" role="main">

    <div class="row">
        <div class="column content">
            <?php echo $page->text()->kirbytext();
            if ($site->user()) : ?>
                <a href="<?php echo $site->url() ?>/assets/scripts/behance/behance-api.php" target="_blank" class="btn">
                    Fetch Projects
                </a>
            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="column">
            <?php snippet('behance') ?>
        </div>
    </div>

</main>

<?php snippet('footer') ?>
