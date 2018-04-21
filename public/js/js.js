// $('#name,#email,#password,#password_old').on('focus', function() {
//     this.removeAttribute('readonly');
// });
// $('#name,#email,#password,#password_old').focusout(function() {
//     this.prop('readonly', true);
// });
// $('#name,#email,#password,#password_old').attr('readonly', 'true');

//menu button control
BtnForm = $('#operationBtn');
//user/student/course list display
listContainer = $('#listContainer');
//display info of clicked in listcontainer
display = $('#display');
var btnName;
BtnForm.children().children().click(
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
        BtnForm.append(
            submitInput
        ).submit();
    }
);

//ajax functions for right div display.
listContainer.children().click(
    function(e) {
        //get id of clicked
        idClicked = $(this).attr('id');
        //get table name
        type = $(this).attr('elType');
        console.log($(this).attr('id'), $(this).attr('elType'));
        $.get(type + 's' + "/" + idClicked).done(function(data) {
            display.html(data);
        });
    }
);