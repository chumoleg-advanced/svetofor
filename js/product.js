var productObj = {
    getSubCategory: function (data) {
        $.post('/product/getSubCategoryByCategory', {categoryId: data.val()}, function (data) {
            $('#subCategories').html(data.htmlSub).trigger("liszt:updated").trigger('chosen:updated');
            $('#Product_producer_id').html(data.htmlProducer).trigger("liszt:updated").trigger('chosen:updated');
        }, 'json');
    }
};

var producerObj = {
    getSubCategory: function (data) {
        $.post('/siteAdmin/producer/getSubCategoryByCategory', {categoryId: data.val()}, function (data) {
            $('#Producer_subCategories').html(data.htmlSub).trigger("liszt:updated").trigger('chosen:updated');
        }, 'json');
    }
};

$(document).ready(function () {
    $(document).on('change', '.bindImageToProduct', function () {
        if (!confirm('Вы уверены в выборе?')) {
            $(this).val('');
            return false;
        }

        var product = $(this).val();
        var fileName = $(this).data('file-name');
        preLoaderShow();
        $.post('/siteAdmin/productImage/bind', {product: product, fileName: fileName}, function (answer) {
            if (!checkJsonAnswer(answer)) {
                return false;
            }

            window.location.reload();
        }, 'json');
    });
});