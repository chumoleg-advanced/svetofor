<div class="container fullwidth-element home-slider">
    <div class="tp-banner-container">
        <div class="tp-banner">
            <ul>
                <?php
                $directory = Yii::app()->getBasePath() . DIRECTORY_SEPARATOR . '..'
                    . DIRECTORY_SEPARATOR . 'images' . DIRECTORY_SEPARATOR
                    . 'slider' . DIRECTORY_SEPARATOR;
                $fileList = glob($directory . "*.jpg");
                ?>

                <?php foreach ($fileList as $file) : ?>
                    <?php
                    $tmp = explode(DIRECTORY_SEPARATOR, $file);
                    $file = end($tmp);
                    ?>
                    <li data-transition="fade" data-slotamount="7" data-masterspeed="100">
                        <img src="/images/slider/<?php echo $file; ?>" alt="" data-bgfit="cover"
                             data-bgposition="left top" data-bgrepeat="no-repeat">

                        <div class="caption sfb fadeout" data-x="145" data-y="170" data-speed="400"
                             data-start="800" data-easing="Power4.easeOut"></div>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>