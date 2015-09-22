<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Styleguide</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="apple-touch-icon" href="apple-touch-icon.png">
        <!-- Place favicon.ico in the root directory -->

        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/SVG-Morpheus/0.1.8/svg-morpheus.js"></script>

        <script type="text/javascript">$("html").toggleClass('no-js js');</script>

        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>
        <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

        <?php echo $content; ?>

    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>