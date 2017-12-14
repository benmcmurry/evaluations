$(document).ready(function() {
    // fields = [];
    fields = '';
    // set year for copyright update
    var d = new Date();
    var n = d.getFullYear();
    $("span#year").text(n);
    $(".table h3").on("click", function() {
        $(this).next().slideToggle();
    });
    $("a#generate").on("click", function() {
        generateReport();
    }); //event listener for report generation

    $("#selected_fields, .field_list").sortable({ //drag and drop
        connectWith: ".field_list",
        stop: function(event, ui) {
            addToReport();

        }
    }).disableSelection();
    //gets the value for hiding the BYU bar
    reportsConstructorStart = $("#reports_constructor").position();
    aboveHeight = $("header").outerHeight();


    //scrolling function
    $(window).scroll(function() {
        $("#placeholder").show();
        if ($(window).scrollTop() > aboveHeight) {
            var newAboveHeight = 0;
            $("#reports_constructor").css({ "position": "fixed", "top": newAboveHeight });

        } else {
            $("#reports_constructor").css({ "position": "absolute", "top": reportsConstructorStart.top });
        }

    });
});

function addToReport() {
    // fields = [];
    // $("#selected_fields").find("li").each(function() { fields.push(this.id); });
    fields = '';
    $("#selected_fields").find("li").each(function() { fields += this.id + ","; });
    console.log(fields);
}

function generateReport() {
    fields = '';
    $("#selected_fields").find("li").each(function() { fields += this.id + ","; });
    console.log(fields);

    window.location.href = "customReport.php?fields=" + fields;
    // $.ajax({
    //     type: "POST",
    //     url: "customReport.php",
    //     data: { fields: fields }
    // }).done(function(phpfile) {
    //     var win = window.open();
    //     win.document.write(phpfile);
    // });
}