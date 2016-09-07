<div class="js-heart-menu heart-menu">
    <ul>
        <?php foreach($site->social()->toStructure() as $social) :
            $url = $social->url()->html(); ?>
            <li class="<?php echo $social->class()->html() ?>">
                <a href="<?php echo $url ?>" title="<?php echo $social->label()->html() ?>" target="_blank">
                    <div class="icon-<?php echo $social->class()->html() ?>"></div>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</div>
