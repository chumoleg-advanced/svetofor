<?php
$lastProducts = Product::model()->getLastProducts();
if (empty($lastProducts)) {
    return;
}
?>

<!-- Container -->
<div class="container margin-bottom-20">
    <div class="sixteen columns">
        <h3 class="headline">Новинки</h3>
        <span class="line margin-bottom-10"></span>
    </div>

    <div class="portfolio-wrapper products">
        <?php foreach ($lastProducts as $product) : ?>
            <div class="one-third column portfolio-item clothing other">
                <figure class="product">
                    <div class="portfolio-holder">
                        <?php
                        if (!empty($product->picture)){
                            $image = CHtml::image(Yii::app()->request->baseUrl
                                . ImageHelper::thumb(420, 300, $product->picture));
                        } else {
                            $image = CHtml::image(Yii::app()->request->baseUrl
                                . ImageHelper::thumb(420, 300, '/images/portfolio/portfolio-01.jpg'));
                        }
                        ?>

                        <a href="/product/view/<?php echo $product->id; ?>">
                            <?php echo $image; ?>
                        </a>

                        <?php echo $product->getLinkBasket(); ?>
                    </div>

                    <a href="/product/view/<?php echo $product->id; ?>">
                        <section class="item-description">
                            <span><?php echo $product->category->name; ?></span>
                            <h5><?php echo $product->name; ?></h5>
                        </section>
                    </a>
                </figure>
            </div>
        <?php endforeach; ?>
    </div>
</div>