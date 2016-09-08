<div class="container">
    <!-- Slider
    ================================================== -->
    <div class="eight columns">
        <div class="slider-padding">
            <div id="product-slider">
                <?php
                if (!empty($this->model->picture)) {
                    $image = Yii::app()->request->baseUrl
                        . ImageHelper::thumb(560, 632, $this->model->picture);
                } else {
                    $image = Yii::app()->request->baseUrl
                        . ImageHelper::thumb(560, 632, '/images/product_item_01a.jpg');
                }
                ?>

                <img class="rsImg" src="<?php echo $image; ?>" alt=""/>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>

    <!-- Content
    ================================================== -->
    <div class="eight columns">
        <div class="product-page">
            <!-- Headline -->
            <section class="title">
                <h2><?php echo $this->model->name; ?></h2>
                <span class="product-price"><?php echo $this->model->getPrice(); ?> руб.</span>
            </section>

            <!-- Text Parapgraph -->
            <section>
                <p class="margin-reset"><?php echo $this->model->description; ?></p>

                <div class="clearfix"></div>
            </section>

            <?php $basketProducts = Basket::model()->getMyBasketProducts(); ?>
            <div class="text-align-right margin-top-20">
                    <a class="button adc" data-productid="<?php echo $this->model->id; ?>"
                       data-price="<?php echo $this->model->getPrice(); ?>"
                       href="javascript:;" onclick="basketObj.addToBasket($(this));">
                        <?= in_array($this->model->id, $basketProducts) ? 'В корзине' : 'Добавить в корзину'; ?></a>

                    <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<?php $relatedProducts = Product::model()->getRelatedProducts($this->model); ?>
<?php if (!empty($relatedProducts)) : ?>
    <div class="container margin-top-5">
        <div class="sixteen columns">
            <h3 class="headline">Похожие товары</h3>
            <span class="line margin-bottom-0"></span>
        </div>

        <div class="products">
            <?php foreach ($relatedProducts as $product) : ?>
                <div class="four columns">
                    <figure class="product">
                        <div class="mediaholder">
                            <?php
                            if (!empty($product->picture)) {
                                $image = CHtml::image(Yii::app()->request->baseUrl
                                    . ImageHelper::thumb(350, 400, $product->picture));
                            } else {
                                $image = CHtml::image(Yii::app()->request->baseUrl
                                    . ImageHelper::thumb(350, 400, '/images/shop_item_01.jpg'));
                            }
                            ?>

                            <a href="/product/view/<?php echo $product->id; ?>">
                                <?php echo $image; ?>
                                <div class="cover">
                                    <?php echo $image; ?>
                                </div>
                            </a>

                            <?php echo $product->getLinkBasket(); ?>
                        </div>

                        <a href="/product/view/<?php echo $product->id; ?>">
                            <section>
                                <span class="product-category"><?php echo CHtml::value($product, 'category.name'); ?></span>
                                <h5><?php echo $product->name; ?></h5>
                                <span class="product-price"><?php echo $product->getPrice(); ?></span>
                            </section>
                        </a>
                    </figure>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>

<div class="margin-top-15"></div>