// $('#name,#email,#password,#password_old').on('focus', function() {
//     this.removeAttribute('readonly');
// });
// $('#name,#email,#password,#password_old').focusout(function() {
//     this.prop('readonly', true);
// });
// $('#name,#email,#password,#password_old').attr('readonly', 'true');

//menu button control
users = $('#userContainer');
courseContainer = $('courseContainer');
operationBtnForm = $('#operationBtn');
var btnName;
operationBtnForm.children().children().click(
    function(e) {
        e.preventDefault();
        console.log('form clicked');
        console.log($(this).text());
        //sset name of btn
        btnName = $(this).text();
        // append and submit
        submitInput = $('<input>').attr({
            type: "hidden",
            name: btnName,
            value: btnName
        });
        console.log(submitInput.attr('name'));
        operationBtnForm.append(
            submitInput
        ).submit();
    }
);

//ajax functions for right div display.