<div class="four shop columns">
    <figure class="product">
        <div class="mediaholder">
            <a href="/product/view/<?php echo $data->id; ?>">
                <?php
                if (!empty($data->picture)) {
                    $image = CHtml::image(Yii::app()->request->baseUrl
                        . ImageHelper::thumb(420, 535, $data->picture));
                } else {
                    $image = CHtml::image(Yii::app()->request->baseUrl
                        . ImageHelper::thumb(420, 535, '/images/shop_item_01.jpg'));
                }
                ?>

                <?php echo $image; ?>
                <div class="cover">
                    <?php echo $image; ?>
                </div>
            </a>

            <?php echo $data->getLinkBasket(); ?>
        </div>

        <a href="/product/view/<?php echo $data->id; ?>">
            <section>
                <h5><?php echo $data->name; ?></h5>
                <span class="product-price"><?php echo $data->getPrice(); ?></span>
            </section>
        </a>
    </figure>
</div>