<?php snippet('header') ?>

    <main class="main" role="main">

        <div class="row">

            <div class="column small-12 medium-4">
                <div class="bio-image">
					<div>
    					<img src="<?php echo kirby()->urls()->assets() ?>/images/square.png" class="square" alt=""/>
					</div>
				</div>
				<br/>
				<div class="css-bounce align-center">
					<h4>
						Click me
					</h4>
				</div>
            </div>

            <div class="column small-12 medium-6 medium-offset-1 content">
                <?php echo $page->text()->kirbytext() ?>
            </div>

        </div>

    </main>

<?php snippet('footer') ?>
