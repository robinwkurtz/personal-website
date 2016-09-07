<?php snippet('header') ?>

    <main class="main" role="main">

        <div class="row">

            <div class="column small-12 medium-6 content">
                <?php echo $page->col1()->kirbytext() ?>
            </div>

            <div class="column small-12 medium-6 content">
                <?php echo $page->col2()->kirbytext() ?>
            </div>

        </div>

        <div class="row">

            <div class="column small-12 content">
                <?php echo $page->text()->kirbytext() ?>
            </div>

        </div>

    </main>

<?php snippet('footer') ?>
