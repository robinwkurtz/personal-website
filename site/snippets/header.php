<!doctype html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">

    <title><?php echo $site->title()->html() ?> | <?php echo $page->title()->html() ?></title>
    <meta name="description" content="<?php echo $site->description()->html() ?>">
    <meta name="keywords" content="<?php echo $site->keywords()->html() ?>">

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <?php echo js('assets/scripts/vendor/jquery.placeholders.min.js') ?>
    <?php echo js('assets/scripts/vendor/jquery.validate.min.js') ?>

    <?php echo js('assets/scripts/main.min.js') ?>

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900|Montserrat:400,700" rel="stylesheet">
    <?php echo css('assets/css/style.min.css') ?>

    <script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
			(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-31515020-1', 'auto');
		ga('send', 'pageview');
	</script>


  <!----------------------
    .______   ____    ____
    |   _  \  \   \  /   /
    |  |_)  |  \   \/   /
    |   _  <    \_    _/
    |  |_)  |     |  |
    |______/      |__|

    .______        ______   .______    __  .__   __.
    |   _  \      /  __  \  |   _  \  |  | |  \ |  |
    |  |_)  |    |  |  |  | |  |_)  | |  | |   \|  |
    |      /     |  |  |  | |   _  <  |  | |  . `  |
    |  |\  \----.|  `--'  | |  |_)  | |  | |  |\   |
    | _| `._____| \______/  |______/  |__| |__| \__|

     __  ___  __    __  .______     .___________.________
    |  |/  / |  |  |  | |   _  \    |           |       /
    |  '  /  |  |  |  | |  |_)  |   `---|  |----`---/  /
    |    <   |  |  |  | |      /        |  |       /  /
    |  .  \  |  `--'  | |  |\  \----.   |  |      /  /----.
    |__|\__\  \______/  | _| `._____|   |__|     /________|

    -------------------------------------------------------->

</head>
<body>

    <div class="site">

        <header class="header">
            <div class="row full flush">
                <div class="column float">
                    <a class="logo" href="<?php echo url() ?>">
                        <div class="show-for-medium-up">
                            <?php echo $site->title()->html() ?>
                        </div>
                        <div class="show-for-small-only">
                            <?php echo $site->initial()->html() ?>
                        </div>
                    </a>
                </div>
                <div class="column float">
                    <a href="#" class="js-menu-button menu-button">
                        <div class="burger">
                            <div class="icon-burger">&nbsp;</div>
                        </div>
                    </a>
                </div>
                <div class="column float">
                    <a href="#" class="js-heart-menu-button heart-menu-button" style="float: right;">
                        <div class="icon-heart css-bounce"></div>
                    </a>
                    <?php snippet('heart-menu'); ?>
                </div>
            </div>
            <div class="js-menu menu">
                <?php snippet('menu') ?>
                <div class="copyright">
                    <?php echo $site->copyright()->kirbytext() ?>
                </div>
            </div>
        </header>
