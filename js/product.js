var productObj = {
    getSubCategory: function(data){
        $.post('/product/getSubCategoryByCategory', {categoryId: data.val()}, function (data) {
            $('#subCategories').html(data.htmlSub).trigger("liszt:updated").trigger('chosen:updated');
            $('#Product_producer_id').html(data.htmlProducer).trigger("liszt:updated").trigger('chosen:updated');
        }, 'json');
    }
};

var producerObj = {
    getSubCategory: function(data){
        $.post('/siteAdmin/producer/getSubCategoryByCategory', {categoryId: data.val()}, function (data) {
            $('#Producer_subCategories').html(data.htmlSub).trigger("liszt:updated").trigger('chosen:updated');
        }, 'json');
    }
};