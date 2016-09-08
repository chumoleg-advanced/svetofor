<?php
/* @var CategoryController $this */
?>
<div class="container">
    <div class="four columns">
        <!-- Categories -->
        <div class="widget margin-top-0">
            <h3 class="headline">Категория</h3><span class="line"></span>

            <div class="clearfix"></div>

            <ul id="categories">
                <?php
                $selectedSubCategory = MyArray::get($_GET, 'subCategory');
                if (empty($selectedSubCategory) && isset($_GET['Product'])) {
                    $selectedSubCategory = MyArray::get($_GET['Product'], 'subCategoryId');
                }
                ?>

                <li>
                    <?php $class = !empty($selectedSubCategory) ? '' : 'active'; ?>
                    <a href="/category/view?id=<?php echo $this->model->id; ?>"
                       class="selectCategory <?php echo $class; ?>">Все категории</a>
                </li>

                <?php foreach ($this->model->subCategories as $subCategory) : ?>
                    <li>
                        <?php
                        $class = '';
                        if ($subCategory->id == $selectedSubCategory) {
                            $class = 'active';
                        }
                        ?>

                        <a href="/category/view?id=<?php echo $this->model->id; ?>&subCategory=<?php echo $subCategory->id; ?>"
                           class="selectCategory <?php echo $class; ?>">
                            <?php echo $subCategory->name; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <div class="clearfix"></div>
        </div>
    </div>

    <!-- Products -->
    <div class="twelve columns products">
        <?php $this->renderPartial('//product/productList',
            array(
                'data'        => $this->productsData,
                'model'       => $model,
                'category'    => $this->model->id,
                'subCategory' => $selectedSubCategory,
                'producer'    => $producer
            )); ?>
        <div class="clearfix"></div>
    </div>
</div>

<div class="margin-top-15"></div>

<script>
    $(document).ready(function () {
        $('a.selectCategory').on('click', function () {
            var href = $(this).attr('href');
            if (href != '#') {
                document.location.href = href;
            }

            return false;
        });
    });
</script>