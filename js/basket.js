var basketObj = {
    addToBasket: function (obj) {
        var productId = obj.data('productid');
        var price = obj.data('price');
        if (!productId || !price) {
            return;
        }

        $.post('/basket/addProduct', {productId: productId, price: price}, function (data) {
            updateCounter(data);
            obj.text('В корзине!');
        }, 'json');
    },
    deleteFromBasket: function (obj) {
        if (!confirm('Вы уверены, что хотите удалить товар из корзины?')) {
            return;
        }

        var id = obj.data('id');
        var objRow = obj.parent().parent();
        $.post('/basket/delete', {id: id}, function (data) {
            reloadPage(data);
            objRow.fadeOut(600, function () {
                objRow.remove();
                updateCounter(data);
            });
        }, 'json');
    },
    changeCount: function (obj) {
        var id = obj.data('id');
        var count = obj.val();
        $.post('/basket/changeCount', {id: id, count: count}, function (data) {
            reloadPage(data);
            updateCounter(data);
            obj.parent().next('td').text(data.singleSum);
        }, 'json');
    }
};

function reloadPage(data) {
    if (data.count == 0) {
        window.location.reload();
    }
}

function updateCounter(data) {
    if (!data) {
        return;
    }

    $('.cart-sum').text(data.sum);
    $('.counterCart').html(data.count);
}