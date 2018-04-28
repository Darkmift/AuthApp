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
        display.children[0].innerHTML = "<h4>" + $(this).attr('elType') + " info:</h4><hr>";
        mngBtn.css('visibility', 'visible');
        $.get(type + "/" + idClicked).done(function(data) {
            table = type;
            info = data;
            showEntry(data, type);
        }).done(
            function(data) {
                setBtns(data, table);
                $('#UpDelBtns').click(
                    function(e) {
                        var BtnClicked = event.target;
                        console.log('BtnClicked id: ' + BtnClicked.id);
                        console.log('BtnClicked type: ' + BtnClicked.name);
                        console.log('BtnClicked do: ', BtnClicked.value);
                        updateEntry(BtnClicked.name, BtnClicked.id, BtnClicked.value);
                        window.location.replace("/AuthApp/public/");
                    }
                );
            }
        );
    }
);

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
        ).appendTo(container);
    } else {
        $('<ul>').append(
            $('<li>').html('<b>Course Name</b>:<br>' + data.name),
            $('<li>').html('<b>Course duration</b>:<br>' + data.start_date + " until" + data.end_date),
            $('<li>').append(
                $('<b>').html('<b>Description</b> :<br>'),
                $('<div>').css({
                    height: "100px",
                    backgroundColor: "#e8e8e8",
                    border: "1px solid #ddd",
                    padding: "2px",
                    overflow: "scroll"
                }).addClass('pre-scrollableXXX').html(data.description)),
        ).appendTo(container);
    }
    return container;
}

function setBtns(info, type) {
    container = $('#UpDelBtns');
    data = JSON.parse(info);
    console.log(data, table);
    if (table == "users") {
        if (data[0].id === data[1].logged) {
            console.log('not allowed');
            $('[name="users"]').css("display", "none");
        } else {
            data = JSON.parse(info);
            // console.log(data);
            data = data[0];
            container.html([
                $('<button>', {
                    id: data.id,
                    name: type,
                    value: "update",
                    class: "btn btn-warning",
                    text: "Update",
                }),
                $('<button>', {
                    id: data.id,
                    name: type,
                    value: "del",
                    class: "btn btn-danger",
                    text: "Delete",
                }),
            ]);
        }
    }
}


function updateEntry(type, id, action) {
    csrfName = $('[name="csrf_name"]');
    csrfValue = $('[name="csrf_value"]');
    // console.log(csrfName.val(), csrfValue.val());
    // console.log(type, id, action);
    $.ajax({
        type: 'POST',
        url: "updateEntry",
        data: JSON.stringify({
            type: type,
            id: id,
            action: action,
            "csrf_name": csrfName.val(),
            "csrf_value": csrfValue.val()
        }),
        error: function(e) {
            console.log(e);
        },
        success: function(data, status) {
            console.log(data, status)
        },
        dataType: "json",
        contentType: "application/json"
    });
}