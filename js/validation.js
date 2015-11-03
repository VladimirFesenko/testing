function validation_reg(){

    var count=$('form input').length;

    for(var i=0; i<count; i++){
        if($('form input').eq(i).val()==''){
            $('#err_msg').text('Пожайлуста заполните все объязательные поля');
            $('#err_msg').removeClass();
            $('#err_msg').addClass('alert alert-warning');
            return false;
        }
    }
    var regex_name=/^\D[a-zA-Z0-9а-яА-Я]{4,19}$/;
    if(!regex_name.test($('form #name').val())){
        $('form #name').next().text('Недопустимое имя');
        $('#gr_name').removeClass('has-success');
        $('#gr_name').addClass('has-error');
        return false;
    }else{
        $('form #name').next().text('');
        $('#gr_name').removeClass('has-error');
        $('#gr_name').addClass('has-success');
    }

    var regex_login=/^\D[a-zA-Z0-9]{4,19}$/;
    if(!regex_login.test($('form #login').val())){
        $('form #login').next().text('Недопустимый логин');
        $('#gr_login').removeClass('has-success');
        $('#gr_login').addClass('has-error');
        return false;
    }else{
        $('form #login').next().text('');
        $('#gr_login').removeClass('has-error');
        $('#gr_login').addClass('has-success');
    }

    var regex_email=/^\D[a-z0-9-]+@{1}[a-z0-9]+\.[a-z]+$/;
    if(!regex_email.test($('form #email').val())){
        $('form #email').next().text('Недопустимый email');
        $('#gr_email').removeClass('has-success');
        $('#gr_email').addClass('has-error');
        return false;
    }else{
        $('form #email').next().text('');
        $('#gr_email').removeClass('has-error');
        $('#gr_email').addClass('has-success');
    }
}
