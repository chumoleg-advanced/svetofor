<div id="footer">

    <!-- Container -->
    <div class="container">
        <div class="four columns">
            <!-- Headline -->
            <h3 class="headline footer">Карта сайта</h3>
            <span class="line"></span>

            <div class="clearfix"></div>

            <ul class="footer-links">
                <li><a href="/product/index?Product[category_id]=1">Автозапчасти</a></li>
                <li><a href="/product/index?Product[category_id]=2">Автосвет</a></li>
                <li><a href="/site/offlineOrder">Оффлайн-заказ</a></li>
                <li><a href="/site/catalog">Каталоги</a></li>
                <li><a href="/site/delivery">Доставка</a></li>
            </ul>
        </div>

        <div class="six columns">
            <!-- Headline -->
            <h3 class="headline footer">Наш офис</h3>
            <span class="line"></span>
            <div class="clearfix"></div>
           <?php echo Settings::model()->getText(Settings::OUR_ADDRESS); ?>
        </div>

        <div class="six columns">
            <!-- Headline -->
            <h3 class="headline footer">Новости</h3>
            <span class="line"></span>

            <div class="clearfix"></div>

            <form action="#" method="get">
                <button class="newsletter-btn" type="submit">Подписаться</button>
                <input class="newsletter" type="text" placeholder="mail@example.com" value=""/>
            </form>
        </div>
    </div>
    <!-- Container / End -->
</div>