<div class="container margin-bottom-40">
    <?php echo Settings::model()->getText(Settings::CATALOGS); ?>
</div>

<?php $fileList = glob(Yii::app()->basePath . '/data/catalogs/*', GLOB_BRACE); ?>

<div class="container margin-bottom-20">
    <div class="sixteen columns">
        <h3 class="headline">Каталоги</h3>
        <span class="line margin-bottom-0"></span>
    </div>

    <div class="showbiz-container fourteen carousel columns" id="our-clients">
        <div data-right="#showbiz_right_2" data-left="#showbiz_left_2" class="showbiz our-clients" id="sbiz3451">
            <div class="overflowholder" style="height: 100px;">
                <ul style="transform: translate3d(-420px, 0px, 0px); height: 100px; width: 1490px;">
                    <?php foreach ($fileList as $file) : ?>
                        <?php
                        $tmp = explode('/', $file);
                        $file = end($tmp);
                        $fileHref = '/download/catalog?file=' . base64_encode($file);
                        $href = '/images/small_product_list_01.jpg';
                        $imageSmall = CHtml::image(Yii::app()->request->baseUrl .
                            ImageHelper::thumb(100, 100, $href, array('method' => 'adaptiveResize')));
                        ?>

                        <li style="width: 80px;">
                            <div class="three columns">
                                <figure>
                                    <div class="portfolio-holder">
                                        <a href="<?php echo $fileHref; ?>">
                                            <?php echo $imageSmall; ?>
                                        </a>
                                    </div>

                                    <a href="<?php echo $fileHref; ?>">
                                        <section class="item-description">
                                            <h5><?php echo $file; ?></h5>
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
</div>