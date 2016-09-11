<!DOCTYPE html>
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Администрирование</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/colors/dark.css" id="colors">

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Java Script
    ================================================== -->
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
    <?php Yii::app()->clientScript->registerCoreScript('jquery-ui'); ?>
    <script src="/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="/js/jquery.jpanelmenu.js"></script>
    <script src="/js/jquery.themepunch.plugins.min.js"></script>
    <script src="/js/jquery.themepunch.revolution.min.js"></script>
    <script src="/js/jquery.themepunch.showbizpro.min.js"></script>
    <script src="/js/jquery.magnific-popup.min.js"></script>
    <script src="/js/hoverIntent.js"></script>
    <script src="/js/superfish.js"></script>
    <script src="/js/jquery.pureparallax.js"></script>
    <script src="/js/jquery.pricefilter.js"></script>
    <script src="/js/jquery.selectric.min.js"></script>
    <script src="/js/jquery.royalslider.min.js"></script>
    <script src="/js/SelectBox.js"></script>
    <script src="/js/modernizr.custom.js"></script>
    <script src="/js/waypoints.min.js"></script>
    <script src="/js/jquery.flexslider-min.js"></script>
    <script src="/js/jquery.counterup.min.js"></script>
    <script src="/js/jquery.tooltips.min.js"></script>
    <script src="/js/jquery.isotope.min.js"></script>
    <script src="/js/puregrid.js"></script>
    <script src="/js/stacktable.js"></script>
    <script src="/js/custom.js"></script>

    <script src="/js/product.js"></script>
    <script src="/js/user.js"></script>
</head>

<body class="boxed">
<div id="wrapper">
    <?php
    $this->renderPartial('//layouts/_mainLayout/_header');
    $this->renderPartial('//layouts/_mainLayout/_adminNavigation');
    ?>

    <div class="container">
        <div class="sixteen columns">
            <h3 class="headline"><?php echo $this->pageTitle; ?></h3>
            <span class="line"></span>
        </div>

        <?php echo $content; ?>
        <div class="clearfix">&nbsp;</div>

        <div id="bigPreLoader">
            <img src="/images/bigPreLoader.gif" alt="Пожалуйста, подождите..."/>
        </div>
    </div>
</div>
</body>
</html>