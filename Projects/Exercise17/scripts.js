$("#uploadedFile").on("change", function (event) {
    let filename = $("#uploadedFile").val().substring(12);
    $("#label").html(filename);
})

