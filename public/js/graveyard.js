 UpdName = $('<input>', {
     type: "text",
     name: "name",
     value: String(data.name)
 });
 console.log(UpdName);
 $('#detailsDisplay').html([
     createInput("name", String(data.name), 'text'),
     createInput("phone", String(data.phone), 'number')
 ]);
 $('#UpDelBtns').html(
     $('<button>', {
         id: data.id,
         name: type,
         value: "update",
         class: "btn btn-warning",
         text: "Submit",
     })
 );