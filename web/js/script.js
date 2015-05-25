function setLang(lang) {
    var old_href = location.href;
    old_href = old_href.replace(/lang=.{2}/, '');
    old_href = old_href.replace(/\?$|&$|\?#$|&#|#/, '');
    location.href = old_href + getPrefix(old_href) + 'lang=' + lang;
}

function getPrefix(href)
{
    if ( /\?/.test(href) ) {
        return '&';
    }
    
    return '?';
}

function signin()
{
    $('#emess').hide();
    
    var data = {
        login: $('#login').val(),
        password: $('#password').val()
    };
    
    if ( data.login == '' || data.password == '' ) {
        showError(emess.login);
        return false;
    }
    
    $.post('/', data, function(res){
        if( res.status == 'OK' ) {
            location.href = '/';
        } else {
            showError(res.error);
        }
    }, "json");
    
    return false;
}

function reg()
{
    $('#emess').hide();
    
    var login = $('#login').val();
    var password = $('#password').val();
    var c_password = $('#c_password').val();
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var photo = $('#photo').val();
    
    // логин
    if ( login == '' ) {
        showError(emess.reg_login_r);
        return false;
    }
    
    if ( !/[a-z0-9]/.test(login) ) {
        showError(emess.reg_login_s);
        return false;
    }
    
    if ( login.length > 10 ) {
        showError(emess.reg_login_l);
        return false;
    }
    
    // пароль
    if ( password == '' ) {
        showError(emess.reg_pass_r);
        return false;
    }
    
    if ( password != c_password ) {
        showError(emess.reg_c_pass);
        return false;
    }
    
    // имя
    if ( firstname == '' ) {
        showError(emess.reg_fname_r);
        return false;
    }
    
    if ( firstname.length > 30 ) {
        showError(emess.reg_fname_l);
        return false;
    }
    
    // фамилия
    if ( lastname == '' ) {
        showError(emess.reg_lname_r);
        return false;
    }
    
    if ( lastname.length > 30 ) {
        showError(emess.reg_lname_l);
        return false;
    }
    
    // фото
    if ( photo == '' ) {
        showError(emess.reg_photo_r);
        return false;
    }
    
    $('#reg_form').submit();
}

function showError(mess)
{
    $('#emess .message').html(mess);
    $('#emess').show();
}