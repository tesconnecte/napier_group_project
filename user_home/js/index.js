$( document ).ready(function() {

    function getAlbumPost(albumID) {
        $.ajax({
            method:"POST",
            url:"../__treatment/load_more_posts.php",
            data: {albumid: albumID, lastpid: 0, nbposts: 4},
            async: false
        })
            .done(function(posts_data){
                var callbackPostData = JSON.parse(posts_data);
                if(callbackPostData.hasOwnProperty('link')){
                    window.location.replace(callbackPostData['link']);
                }else{
                    var currentPost;
                    var currentLink;
                    var currentText;
                    var tweetHTML;
                    var currentPostID;
                    if(callbackPostData.length<1){
                        $(".userGallery").last().append("<div><h3>No posts in this album</h3></div>");
                    }
                    for(var i=0;i<callbackPostData.length;i++){
                        currentPost = callbackPostData[i];
                       // console.log(currentPost);
                        currentLink = currentPost["link"];
                        currentText = currentPost["text"];
                        currentPostID=currentPost["id"];

                        $(".userGallery:last-child").append("<div class='gallery-item'></div>");

                        if(currentLink.includes('facebook')){
                            //console.log("Facebook post");
                            $(".gallery-item:last-child").append("<div id='test' class=\"fb-post\"data-href=\""+ currentLink +" \" data-width=\"350\" data-height=\"350\"></div>");
                        }else if(currentLink.includes('twitter')){
                            //console.log("Twitter post");
                            $.ajax({
                                method:"POST",
                                url:"../__treatment/curl_tweet_call.php",
                                data: {link: currentLink},
                                async: false
                            })
                                .done(function(tweet_data){
                                    tweetHTML = JSON.parse(tweet_data);
                                    tweetHTML = tweetHTML['html'];
                                    $(".gallery-item:last-child").append(tweetHTML);
                                });
                        }else if(currentLink.includes('instagram')){
                            $.ajax({
                                method:"GET",
                                url:"https://api.instagram.com/oembed",
                                data:{url:currentLink,MAXWIDTH:"350"},
                                async: true
                            })
                                .done(function(insta_data){
                                    console.log("Insta data "+insta_data);
                                    $(".gallery-item:last-child").append(insta_data['html']);
                                    instgrm.Embeds.process();
                                });
                            instgrm.Embeds.process();
                        }else{
                            $(".gallery-item:last-child").append("<h3>"+currentText+"</h3><img src='../__website_content/no_image.png'/>");
                        }
                    }
                    FB.XFBML.parse();
                    btnDEaction();
                }
            });
    }

    function btnDEaction(){
        console.log("triggered");
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
    }

    $("#loadMoreAlbums").click(function (){
        var lastaid = $("#loadMoreAlbums").attr("data-lastaid");
        var nbalbums = $(this).data("nbalbums");
        var ultimateaid = $(this).data("ultimateaid");

        $.post("../__treatment/load_more_albums.php",{ lastaid: lastaid, nbalbums: nbalbums}, function(data){
            var callbackData = JSON.parse(data);
            //console.log(data);
            if(callbackData.hasOwnProperty('link')){
                window.location.replace(callbackData['link']);
            }else{
                var currentAlbum;
                var currentAlbumId;
                var currentAlbumName;
                var currentAlbumPrivacy;
                var currentAlbumPrivacyString;
                for(var i=0;i<callbackData.length;i++){
                    currentAlbum = callbackData[i];
                    currentAlbumId=currentAlbum["id"];
                    currentAlbumName=currentAlbum["name"];
                    currentAlbumPrivacy=currentAlbum["isPublic"];
                    if(currentAlbumPrivacy==true){
                        currentAlbumPrivacyString="Public";
                    }else{
                        currentAlbumPrivacyString="Private";
                    }
                    //console.log(currentAlbumId);
                    $("#albums").append("<div class='userGallery'><h2>"+currentAlbumName+" - "+currentAlbumPrivacyString+"</h2></div>");
                    $(".userGallery:last-child").append("<div class='btnalbumcontrols'  autofocus><a href=\"../user_home/albumView.php?id="+currentAlbumId+ "\" class=\"btn btn-primary btnVA\">View Album</a> <a href=\"../user_home/addPost.php?albumid="+currentAlbumId+ "\" class=\"btn btn-primary btnAP\">Add Post</a><a href=\"../user_home/editAlbum.php?id="+currentAlbumId+ "\" class=\"btn btn-primary btnEA\">Edit Album</a> <a href='javascript: void(0);' data-albumid='"+currentAlbumId+"' data-albumname='"+currentAlbumName +"' class=\"btn btn-primary btnDE\">Delete Album</a></div>");

                    getAlbumPost(currentAlbumId);
                }
                $('#loadMoreAlbums').attr('data-lastaid', currentAlbumId);
            }
        });

        lastaid = $("#loadMoreAlbums").attr("data-lastaid");
       // console.log(lastaid);
        if(ultimateaid<=lastaid){
            $("#loadMoreAlbums").remove();
            $(".loadMore").append("<h3>No more albums !</h3>")
        }

    })

    btnDEaction();
});



