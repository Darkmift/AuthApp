//maindisplay
mainDisplay = $('#mainDisplay');
//menu button control
BtnForm = $('#operationBtn');
//user/student/course list display
listContainer = $('#listContainer');
if (listContainer.html().trim().length === 0) {
    //on initial load of page
    mainDisplay.css('display', 'none');
} else {
    mainDisplay.css('display', 'visible');
}
//display info of clicked in listcontainer
detailsDisplay = $('#detailsDisplay');
//buttons in display
mngBtn = $('#mngBtn');
//init global for use in scope
var btnName;
//csrf
var csrfName = $('[name="csrf_name"]');
var csrfValue = $('[name="csrf_value"]');

BtnForm.children().children().click(
    function(e) {
        e.preventDefault();
        mngBtn.css('visibility', 'none');
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
var table;
//ajax functions for right div display.
listContainer.children().click(
    function(e) {
        //get id of clicked
        idClicked = $(this).attr('id');
        //get table name
        type = $(this).attr('elType') + 's';
        //student/course/user info header
        display.children[0].innerHTML = "<h4>" + $(this).attr('elType') + " info:</h4><hr>";
        mngBtn.css('visibility', 'visible');
        $.get(type + "/" + idClicked).done(function(data) {
            table = type;
            //console.log(data);
            showEntry(data, type);
        }).done(
            function(data) {
                setBtns(data, table);
                $('#UpDelBtns').click(
                    function(e) {
                        var BtnClicked = event.target;
                        // console.log('BtnClicked id: ' + BtnClicked.id);
                        // console.log('BtnClicked type: ' + BtnClicked.name);
                        // console.log('BtnClicked do: ', BtnClicked.value);
                        //console.log(data);
                        dataParsed = JSON.parse(data);
                        dataParsed = dataParsed[0];
                        if (BtnClicked.value == "del") {
                            editEntry(dataParsed, BtnClicked.name, BtnClicked.id, BtnClicked.value);
                            $('#' + BtnClicked.id).remove();
                            $('#detailsDisplay').html($('<div>', {
                                class: "alert alert-success",
                                text: "Entry Deletion succesful!"
                            }));
                            $('#UpDelBtns').empty();
                        }
                        if (BtnClicked.value == "update") {
                            console.log("update: ", dataParsed.id, 'do:' + BtnClicked.value, 'table: ' + BtnClicked.name);
                            var url;
                            switch (BtnClicked.name) {
                                case "users":
                                case "students":
                                    url = "user_update";
                                    break;
                                case "courses":
                                    url = "course_update";
                                    break;
                            }
                            csrfName = $('[name="csrf_name"]');
                            csrfValue = $('[name="csrf_value"]');
                            var form = $('<form action="' + url + '" method="post">' +
                                '<input type="text" name="id" value="' + String(dataParsed.id) + '" />' +
                                '<input type="text" name="type" value="' + BtnClicked.name + '" />' +
                                '<input type="text" name="csrf_name" value="' + csrfName.val() + '" />' +
                                '<input type="text" name="csrf_value" value="' + csrfValue.val() + '" />' +
                                '</form>');
                            //console.log(form);
                            $('body').append(form);
                            form.submit();
                            //graveyard chunk 01 here
                        }
                        if (BtnClicked.value == "enroll") {
                            //console.log('editentryenroll:', data, BtnClicked.name, BtnClicked.id, BtnClicked.value);
                            editEntry(dataParsed, BtnClicked.name, BtnClicked.id, BtnClicked.value);
                            // $('#detailsDisplay').append($('<div>', {
                            //     class: "alert alert-success",
                            //     text: "Enrollment succesful!"
                            // }));
                        }
                    }
                );
            }
        );
    }
);
//build info panel of clicked on left panel
function showEntry(data, type) {
    container = detailsDisplay;
    data = JSON.parse(data);
    data = data[0];
    //console.log(data);
    container.html($('<p>').append(
        $('<img>', {
            src: "images/" + type + "/" + data.id + ".jpg",
            alt: type + '#' + data.id + 'image',
        }).addClass('img-responsive img-circle').css('border', '2px solid #e8e8e8').css({
            width: '8vw',
        })
    ));
    if (data.email) {
        $('<ul>').append(
            $('<li>').text(type + ' name:' + data.name),
            $('<li>').text('Email : ' + data.email),
            $('<li>').text('Phone : ' + data.phone),
            $('<li>').attr('id', 'enrollmentsTabe'),
        ).appendTo(container);
    } else {
        $('<ul>').append(
            $('<li>').html('<b>Course Name</b>:<br>' + data.name),
            $('<li>').html('<b>Course duration</b>:<br>' + data.start_date + " until: " + data.end_date),
            $('<li>').append(
                $('<b>').html('<b>Description</b> :<br>'),
                $('<div>').css({
                    height: "100px",
                    backgroundColor: "#e8e8e8",
                    border: "1px solid #ddd",
                    padding: "2px",
                    overflow: "scroll"
                }).html(data.description)
            ),
            $('<li>').attr('id', 'enrollmentsTable'),
        ).appendTo(container);
    }
    return container;
}
//set functions of update/delete buttons
function setBtns(info, type) {
    container = $('#UpDelBtns');
    data = JSON.parse(info);
    data = data[0];
    logged = JSON.parse(info);
    //console.log(data);
    if (table === "students" || table === "courses") {
        container.html([
            makeBtn(data.id, type, "enroll", "btn btn-default", "Enroll"),
            makeBtn(data.id, type, "update", "btn btn-warning", "Update"),
            makeBtn(data.id, type, "del", "btn btn-danger", "Delete"),
        ]);
    }
    if (table == "users") {
        container.html([
            makeBtn(data.id, type, "update", "btn btn-warning", "Update"),
            makeBtn(data.id, type, "del", "btn btn-danger", "Delete"),
        ]);
        //hide buttons if user viewing themselves
        if (data.id === logged[1].logged) {
            //console.log('not allowed');
            $('[name="users"]').css("display", "none");
        }
    }
}
//global alert remover
setInterval(function() {
    if ('.alert') {
        setTimeout(() => {
            $('.alert').slideUp();
            setTimeout(() => {
                $('.alert').remove();
            }, 1000);
        }, 4000);
    }
}, 500);

function makeBtn(btnId, btnType, btnValue, btnClassName, btnText) {
    return $('<button>', {
        id: btnId,
        name: btnType,
        value: btnValue,
        class: btnClassName,
        text: btnText,
    })
}

//send delete request
function editEntry(info, type, id, action) {
    if (action === "del") {
        urlStr = "updateEntry";
        methodType = "GET";
        info = JSON.stringify({
            type: type,
            id: id,
            action: action,
            "csrf_name": csrfName.val(),
            "csrf_value": csrfValue.val()
        });
    }
    if (action === "enroll") {
        urlStr = "getEnrollments";
        methodType = "GET";
        info = {
            type: type,
            id: id,
            action: action,
        };
    }

    $.ajax({
        type: methodType,
        url: urlStr,
        data: info,
        error: function(e) {
            console.log(e, status);
        },
        success: function(data, status) {
            //console.log(data, status);
            //console.log('enrollments:', data.length);
            container = $('div');
            ul = $('<ul>');
            data.forEach(entry => {
                ul.append(
                    $('li').text(entry[2]),
                );
                //console.log(entry[0], entry[1], entry[2]);
            });
            container.append(ul);
            container.appendTo($('#enrollmentsTable'));
            //$('#enrollmentsTable').append(container);
            // csrfVals = data['csrf'];
            // console.log(csrfVals.csrf_name_value, csrfVals.csrf_value_value);
            // csrfName.val(csrfVals.csrf_name_value);
            // csrfValue.val(csrfVals.csrf_value_value);
        },
        dataType: "json",
        contentType: "application/json"
    });
}
//graveeyard chunk 2