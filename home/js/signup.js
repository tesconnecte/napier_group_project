$( document ).ready(function() {
    $("#ubday").datepicker({
        dateFormat: "dd-mm-yy",
        yearRange:"1900:"+new Date().getFullYear(),
        maxDate: new Date(),
        changeMonth: true,
        changeYear: true,
    });
    $("#ubday").css("background-color", "white");
});
