var mode = "existing";

$(document).ready(function () {
  $("#local_div").toggle();
  $("#desc_field").prop('required',false);
  $("#photo_field").prop('required',false);
  $("#url_field").prop('required',true);

  //switch between local and existing posts mode
  $('input:radio[name=postType]').change(function () {
    mode = this.value;
    if (mode == 'local') {
      $("#local_div").toggle();
      $("#desc_field").prop('required',true);
      $("#photo_field").prop('required',true);
      $("#url_field").prop('required',false);
      $("#url_field").toggle();
      $("#preview").toggle();
    }
    else if (mode == 'existing'){
      $("#local_div").toggle();
      $("#desc_field").prop('required',false);
      $("#photo_field").prop('required',false);
      $("#url_field").prop('required',true);
      $("#url_field").toggle();
      $("#preview").toggle();
    }
  });

  //updating the preview of the post based on the link
  $("#url_field").change(function() {
    var url = $("#url_field").val();
    var words = url.split(".");
    var names = ["facebook","twitter","instagram"];
    var selected = "";
    var i =0;
    while (i < words.length && selected == "") {
      if(jQuery.inArray(words[i],words)){
        selected = words[i];
      }
      i++;
    }
    switch (selected) {
      case "facebook":
        $("#preview").load("../user_home/displayEmbed.php", {url:url, social:selected}, function(){
          alert($("#preview p").length);
        });
        break;
      default:

    }

    $("#testButton").click( function(){
      if (mode == "existing") {
        alert($("#preview:first-child").length);
      }
    });
  });
});
