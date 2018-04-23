function loadInstaPost(link,instadivID) {
    $.get("https://api.instagram.com/oembed?url="+link+"&MAXWIDTH=350",function (insta_data) {
        $("#insta-"+instadivID).append(insta_data['html']);
        instgrm.Embeds.process();
    })

}