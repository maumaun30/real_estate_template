$(document).ready(function () {
    $(document).on("click", ".btn-delete", function (e) {
        e.preventDefault();
        let id = $(this).data("id");
        if (confirm("Are you sure?")) {
            $("#form" + id).submit();
        }
    });

    // AJAX Feature Added
    $("#featureForm").submit(function (e) {
        e.preventDefault();

        let url = $(this).data("action");
        let deleteUrl = $(this).data("delete-url");

        $.ajax({
            type: "POST",
            url: url,
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $(".house-features-container").append(
                    '<li class="features-item">' +
                        "<span>" +
                        data.name +
                        "</span>" +
                        '<a href="' +
                        deleteUrl.replace(":id", data.id) +
                        '" class="feature-delete-x" onclick="return confirm(' +
                        "'Are you sure?'" +
                        ')">' +
                        '<i class="fa fa-xmark text-danger"></i>' +
                        "</a>" +
                        "</li >"
                );

                $("#featureForm").trigger("reset");
            },
            error: function (data) {
                console.log(data);
            },
        });
    });
});
