<?php snippet('header') ?>

<?php
$json = $site->url() . '/assets/scripts/behance/behance-api.json';
$behance_json = json_decode(file_get_contents($json));
$project_count = count($behance_json[1]);

?>

<main class="main" role="main">

    <div class="row">
        <div class="column content">
            <?php echo ($project_count > 0) ? $page->text()->kirbytext() : $page->error()->kirbytext();
            if ($site->user()) : ?>
                <a href="<?php echo $site->url() ?>/assets/scripts/behance/behance-api.php" target="_blank" class="btn">
                    Fetch Projects
                </a>
            <?php endif; ?>
        </div>
    </div>

    <?php if ($project_count > 0) : ?>
        <div class="row">
            <div class="column">
                <?php snippet('behance') ?>
            </div>
        </div>
    <?php endif; ?>

</main>

<?php snippet('footer') ?>
