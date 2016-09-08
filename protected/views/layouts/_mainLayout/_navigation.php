<div class="sixteen columns">
    <a href="#menu" class="menu-trigger"><i class="fa fa-bars"></i> Меню</a>

    <nav id="navigation">
        <ul class="menu" id="responsive">

            <li><a href="/" class="current homepage" id="current">Главная</a></li>

            <li class="dropdown">
                <a href="#">Подбор товара</a>
                <ul>
                    <?php foreach (Category::model()->getListWithSubCategory() as $categoryObj) : ?>
                        <li>
                            <a href="/product/index?Product[category_id]=<?php echo $categoryObj->id; ?>">
                                <?php echo $categoryObj->name; ?></a>
                            <?php if (!empty($categoryObj->subCategories)) : ?>
                                <ul>
                                    <?php foreach ($categoryObj->subCategories as $subCategory) : ?>
                                        <li>
                                            <a href="/product/index?Product[category_id]=<?php echo $categoryObj->id; ?>&Product[subCategoryId]=<?php echo $subCategory->id; ?>">
                                                <?php echo $subCategory->name; ?></a></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </li>

            <?php if (Yii::app()->user->isAdminOrGross) : ?>
                <li class="demo-button">
                    <a href="/site/offlineOrder">Оффлайн-заказ</a>
                </li>
            <?php endif; ?>

            <li class="demo-button">
                <a href="/site/catalog">Каталоги</a>
            </li>

            <li class="demo-button">
                <a href="/site/delivery">Доставка</a>
            </li>

            <li class="demo-button">
                <a href="/site/aboutCompany">О компании</a>
            </li>
        </ul>
    </nav>
</div>

<div class="clearfix"></div>

