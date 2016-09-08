<?php
$categories = Category::model()->findAll('status = ' . Category::STATUS_ACTIVE);
if (empty($categories)) {
    return;
}
?>

<div class="container">
    <div id="new-arrivals" class="showbiz-container sixteen columns">
        <div class="showbiz" data-left="#showbiz_left_1" data-right="#showbiz_right_1" data-play="#showbiz_play_1">
            <div class="overflowholder">
                <ul>
                    <?php foreach ($categories as $category) : ?>
                        <?php
                        if (!empty($category->picture)){
                            $image = CHtml::image(Yii::app()->request->baseUrl
                                . ImageHelper::thumb(420, 535, $category->picture));
                        } else {
                            $image = CHtml::image(Yii::app()->request->baseUrl
                                . ImageHelper::thumb(420, 535, '/images/shop_item_01.jpg'));
                        }
                        ?>

                        <li>
                            <figure>
                                <div class="mediaholder">
                                    <a href="/category/view?id=<?php echo $category->id; ?>">
                                        <?php echo $image; ?>
                                        <div class="cover"><?php echo $image; ?></div>
                                    </a>
                                </div>

                                <a href="/category/view?id=<?php echo $category->id; ?>">
                                    <section>
                                        <span class="product-category"><?php echo $category->name; ?></span>
                                    </section>
                                </a>
                            </figure>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>