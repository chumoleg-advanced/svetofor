<?php
$recommended = Product::model()->getRecommendedProducts();
if (empty($recommended)) {
    return;
}
?>

<div class="container margin-bottom-20">
    <!-- Headline -->
    <div class="sixteen columns">
        <h3 class="headline">Рекомендуемые товары</h3>
        <span class="line margin-bottom-0"></span>
    </div>

    <!-- Navigation / Left -->
    <div class="one carousel column">
        <div class="sb-navigation-left-2" id="showbiz_left_2"><i class="fa fa-angle-left"></i></div>
    </div>

    <!-- ShowBiz Carousel -->
    <div class="showbiz-container fourteen carousel columns" id="our-clients">
        <div data-right="#showbiz_right_2" data-left="#showbiz_left_2" class="showbiz our-clients" id="sbiz3451">
            <div class="overflowholder" style="height: 100px;">
                <ul style="transform: translate3d(-420px, 0px, 0px); height: 100px; width: 1490px;">
                    <?php foreach ($recommended as $product) : ?>
                        <li style="width: 190px;">
                            <div class="three columns">
                                <figure>
                                    <div class="portfolio-holder">
                                        <a href="/product/view/<?php echo $product->id; ?>">
                                            <?php
                                            if (!empty($product->picture)){
                                                $image = CHtml::image(Yii::app()->request->baseUrl
                                                    . ImageHelper::thumb(420, 300, $product->picture));
                                            } else {
                                                $image = CHtml::image(Yii::app()->request->baseUrl
                                                    . ImageHelper::thumb(420, 300, '/images/portfolio/portfolio-01.jpg'));
                                            }
                                            ?>

                                           <?php echo $image; ?>

                                            <div class="hover-cover"></div>
                                            <div class="hover-icon"></div>
                                        </a>
                                    </div>

                                    <a href="/product/view/<?php echo $product->id; ?>">
                                        <section class="item-description">
                                            <span><?php echo $product->name; ?></span>
                                            <h5><?php echo $product->getPrice(); ?></h5>
                                        </section>
                                    </a>
                                </figure>
                            </div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <!-- Navigation / Right -->
    <div class="one carousel column">
        <div class="sb-navigation-right-2 notclickable" id="showbiz_right_2"><i class="fa fa-angle-right"></i></div>
    </div>
</div>