<?php snippet('header') ?>

    <main class="main" role="main" name="form">

        <div class="row">

            <div class="column content">
                <?php
                if ($form->hasMessage()) : ?>
                    <h2><?php $form->echoMessage() ?></h2>
                <?php
                else :
                    echo $page->text()->kirbytext();
                endif;
                ?>
            </div>

        </div>

        <?php if (!$form->hasMessage()) : ?>

            <form action="<?php echo $page->url() ?>#form" method="post" class="validate">

                <div class="input-wrapper">
                    <div class="column small-12 medium-6">
                        <input<?php e($form->hasError('name'), ' class="erroneous"')?> type="text" name="fname" id="fname" value="<?php $form->echoValue('fname') ?>" placeholder="First name" required/>
                    </div>
                    <div class="column small-12 medium-6">
                        <input type="text" name="lname" id="lname" value="<?php $form->echoValue('lname') ?>" placeholder="Last name"/>
                    </div>
                </div>

                <div class="input-wrapper">
                    <div class="column small-12 medium-6">
                        <input<?php e($form->hasError('_from'), ' class="erroneous"')?> type="email" name="_from" id="email" value="<?php $form->echoValue('_from') ?>" placeholder="Email" required/>
                    </div>
                    <div class="column small-12 medium-6">
                        <input type="text" name="telephone" id="telephone" value="<?php $form->echoValue('telephone') ?>" placeholder="Telephone" />
                    </div>
                </div>

                <div class="input-wrapper">
                    <div class="column small-12">
                        <textarea <?php e($form->hasError('message'), ' class="erroneous"')?> name="message" id="message" placeholder="Message" required><?php $form->echoValue('message') ?></textarea>
                    </div>
                </div>

                <input type="text" name="website" id="website" class="uniform__potty" />

                <div class="input-wrapper">
                    <div class="column small-12">
                        <button type="submit" name="_submit" value="<?php echo $form->token() ?>"<?php e($form->successful(), ' disabled')?>>Submit</button>
                    </div>
                </div>

            </form>

        <?php endif; ?>

    </main>

<?php snippet('footer') ?>
