$( document ).ready(function() {
    $("#bdate").datepicker({
        dateFormat: "dd-mm-yy",
        yearRange:"1900:"+new Date().getFullYear(),
        maxDate: new Date(),
        changeMonth: true,
        changeYear: true,
    });
    $("#bdate").css("background-color", "white");
});