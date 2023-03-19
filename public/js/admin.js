$(document).ready(function () {
    $(document).on("click", ".btn-delete", function (e) {
        e.preventDefault();
        let id = $(this).data("id");
        if (confirm("Are you sure?")) {
            $("#form" + id).submit();
        }
    });

    function addFeature() {
        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).attr("csrf"),
            success: function (data) {
                $(".features-container").append(
                    '<li class="features-item">' +
                        "<span>" +
                        "feature.name" +
                        "</span>" +
                        '<a href="" class="feature-delete-x" onclick="return confirm()">' +
                        '<i class="fa fa-x text-danger"></i>' +
                        "</a>" +
                        "</li>"
                );
            },
        });
    }
});
