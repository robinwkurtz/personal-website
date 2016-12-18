<?php

$width = 100/count($site->social()->toStructure());
$total = count($site->social()->toStructure()) * 40;
?>
<div class="js-heart-menu heart-menu">
    <ul style="min-width:<?=$total?>px;">
        <?php
        foreach($site->social()->toStructure() as $social) :
            $url = $social->url()->html(); ?>
            <li class="<?php echo $social->class()->html() ?>" style="width:<?=$width?>%">
                <a href="<?php echo $url ?>" title="<?php echo $social->label()->html() ?>"<?php echo (trim($social->popup()->html()) === 'external' ? ' target="_blank"' : ''); ?>>
                    <div class="icon-<?php echo $social->class()->html() ?>"></div>
                </a>
            </li>
        <?php endforeach ?>
    </ul>
</div>
