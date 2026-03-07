$(document).ready(function () {

    $("#addCourse").click(function () {

        var row = $(".course-row").first().clone();

        row.find("input").val("");

        $("#courses").append(row);

    });

    $("#gpaForm").submit(function (e) {

        e.preventDefault();

        $.ajax({

            url: "calculate.php",

            type: "POST",

            data: $(this).serialize(),

            dataType: "json",

            success: function (response) {

                $("#result").html(
                    "<div class='alert alert-info'>" +
                    response.message +
                    "</div>" +
                    response.tableHtml
                );

            }

        });

    });

});
