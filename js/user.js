var userObj = {
    register: function(){
        alert('Register');
    },
    login: function(){
        $('.text-error').html('').hide();
        $.post('/user/login', $('#loginForm').serialize(), function(data){
            if (!data || data.status == 'ok'){
                window.location.reload();
            } else {
                $('.text-error').html(data.msg).show();
            }

            return false;
        }, 'json');
    }
};