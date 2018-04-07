$('#name,#email,#password,#password_old').on('focus', function() {
    this.removeAttribute('readonly');
});

$('#name,#email,#password,#password_old').focusout(function() {
    this.prop('readonly', true);
});

$('#name,#email,#password,#password_old').attr('readonly', 'true');