function reload_js(src) {
    $('script[src="' + src + '"]').remove();
    $('<script>').attr('src', src).appendTo('head');
}


$(document).ready(function () {
  $("#local_div").toggle();
  $("#desc_field").prop('required',false);
  $("#photo_field").prop('required',false);
  $("#url_field").prop('required',true);
  $('input:radio[name=postType]').change(function () {
    if (this.value == 'local') {
      $("#local_div").toggle();
      $("#desc_field").prop('required',true);
      $("#photo_field").prop('required',true);
      $("#url_field").prop('required',false);
      $("#url_field").toggle();
    }
    else if (this.value == 'existing'){
      $("#local_div").toggle();
      $("#desc_field").prop('required',false);
      $("#photo_field").prop('required',false);
      $("#url_field").prop('required',true);
      $("#url_field").toggle();
    }
  });
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
        $("#preview").load("../user_home/displayEmbed.php", {url : url, social : selected});
        reload_js('https://connect.facebook.net/en_US/sdk.js#xfbml=1&amp;version=v2.5');
        break;
      default:

    }

  });
});
