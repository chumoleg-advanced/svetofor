<div class="container">
    <?php if ($this->showHeader) : ?>
        <div class="five columns">
            <div id="logo">
                <h1>
                    <?php $imageUrl = Yii::app()->request->baseUrl
                        . ImageHelper::thumb(170, 130, "/images/main-logo-first.jpg"); ?>

                    <a href="/"><img src="<?php echo $imageUrl; ?>" alt="Светофор"/></a>
                </h1>
            </div>
        </div>

        <div class="five columns">
            <div id="main-page-phones">
                <?php echo Settings::model()->getText(Settings::PHONES); ?>
            </div>
        </div>

        <!-- Additional Menu -->
        <div class="six columns text-align-right">
            <?php if (Yii::app()->user->isGuest) { ?>
                <h6 class="margin-top-15">Добро пожаловать в интернет-магазин Светофор!</h6>
            <?php } else { ?>
                <h5 class="margin-top-15">Добро пожаловать <?php echo Yii::app()->user->email; ?></h5>
            <?php } ?>

            <div id="additional-menu">
                <ul>
                    <a href="/cabinet/index" class="button color margin-left-0">Личный кабинет</a>
                    <?php if (!Yii::app()->user->isGuest) : ?>
                        <a href="/user/logout" class="button color margin-left-0">Выход</a>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($this->showHeader) : ?>
        <div class="six columns text-align-right">
            <div id="additional-menu">
                <!-- Button -->
                <div class="cart-btn">
                    <?php list($count, $sum) = Basket::model()->getSumAndCount(); ?>
                    <a href="/basket/index" class="button adc cart-sum">
                        <?php echo NumberFormat::get($sum); ?> руб.
                    </a>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>