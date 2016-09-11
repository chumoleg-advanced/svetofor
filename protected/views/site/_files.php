<div class="showbiz-container fourteen carousel columns" id="our-clients">
    <div data-right="#showbiz_right_2" data-left="#showbiz_left_2" class="showbiz our-clients" id="sbiz3451">
        <div class="overflowholder" style="height: 100px;">
            <ul style="transform: translate3d(-420px, 0px, 0px); height: 100px; width: 1490px;">
                <?php foreach ($fileList as $file) : ?>
                    <?php
                    $tmp = explode('/', $file);
                    $file = end($tmp);
                    $fileHref = '/download/file?file=' . base64_encode($file) . '&folder=' . $folder;

                    $imageSmall = CHtml::image(Yii::app()->request->baseUrl .
                        ImageHelper::thumb(150, 150, $image, array('method' => 'adaptiveResize')));
                    ?>

                    <li style="width: 100px;">
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