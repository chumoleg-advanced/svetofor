var orderObj = {
    changeProdCount: function (obj) {
        var id = obj.data('id');
        var count = parseInt(obj.val());

        if (isNaN(count) || count <= 0) {
            alert('Кол-во указано неверно!');
            return false;
        }

        if (!id) {
            return false;
        }

        var params = {count: count, id: id};
        $.post('/siteAdmin/order/changeCount', params, function (data) {
            $('#tableProducts').html(data.html);
        }, 'json');
    },
    deleteProduct: function (obj) {
        if (!confirm('Вы уверены, что хотите удалить товар из заказа?')){
            return false;
        }

        var id = obj.data('id');
        $.post('/siteAdmin/order/deleteProduct', {id: id}, function (data) {
            $('#tableProducts').html(data.html);
        }, 'json');
    },
    addProduct: function (obj) {
        var productId = $('#addProduct').val();
        var price = $('#price').val();
        var orderId = $('#orderId').val();
        if (!productId || !price) {
            alert('Выберите товар и цену!');
            return false;
        }

        var params = {productId: productId, price: price, orderId: orderId};
        $.post('/siteAdmin/order/addProduct', params, function (data) {
            $('#tableProducts').html(data.html);
        }, 'json');
    },
    getPrices: function (obj) {
        var productId = obj.val();
        $.post('/siteAdmin/order/getPrice', {productId: productId}, function (data) {
            $('#price').html(data.html);
        }, 'json');
    }
};