$('#name,#email,#password').on('focus', function() {
    this.removeAttribute('readonly');
});

$('#name,#email,#password').focusout(function() {
    this.prop('readonly', true);
});

$('#name,#email,#password').attr('readonly', 'true');