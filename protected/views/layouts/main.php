<!DOCTYPE html>
<!--[if IE 8 ]>
<html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <title>Интернет магазин "Светофор"</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/colors/green.css" id="colors">

    <!--[if lt IE 9]>
    <script src="/js/html5shiv.js"></script>
    <![endif]-->

    <!-- Java Script
    ================================================== -->
    <?php Yii::app()->clientScript->registerCoreScript('jquery'); ?>
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

    <script src="/js/user.js"></script>
    <script src="/js/basket.js"></script>
</head>

<body class="boxed">
<div id="wrapper">
    <?php
    $this->renderPartial('//layouts/_mainLayout/_header');
    $this->renderPartial('//layouts/_mainLayout/_navigation');

    if ($this->showMainSlider) {
        $this->renderPartial('//layouts/_mainLayout/_slider');
    }

    echo $content;

//    if ($this->showCategories) {
//        $this->renderPartial('//layouts/_mainLayout/_categories');
//    }

    if ($this->showLastProducts) {
        $this->renderPartial('//layouts/_mainLayout/_lastProducts');
    }

    if ($this->showRecommendedProducts) {
        $this->renderPartial('//layouts/_mainLayout/_recommendedProducts');
    }

    $this->renderPartial('//layouts/_mainLayout/_footer');
    ?>
</div>
</body>
</html>