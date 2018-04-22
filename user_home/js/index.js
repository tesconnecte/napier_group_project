$( document ).ready(function() {
    $(".btnDE").click(function (){
        var albumname = $(this).data("albumname");
        var albumid = $(this).data("albumid");
        parentElement =$(this).parent().parent();
        //console.log(parentElement);

        $(this).text("\""+albumname+"\" album and its posts are going to be deleted. Are you sure ?");

        $(this).dialog({
            resizable: false,
            height: "auto",
            width: "auto",
            dialogClass: "no-close",
            modal: true,
            title:"Confirm album deletion?",
           position: { my: "center center", at: "center top", of: parentElement},
            buttons: {
                "Yes, delete": function() {
                    $( this ).dialog( "close" );
                    $.post("../__treatment/delete_album.php",{albumid: albumid}, function(data){
                        window.location.replace(data);
                    });
                },
                Cancel: function() {
                    $( this ).dialog( "close" );
                    location.reload();
                }
            }
        });

        //$(this).focus();
    })
});



