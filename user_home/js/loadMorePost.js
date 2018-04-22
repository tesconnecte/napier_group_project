$( document ).ready(function() {
    $("#loadMorePosts").click(function (){
        var albumid = $(this).data("albumid");
        var lastpid = $("#loadMorePosts").attr("data-lastpid");
        var nbposts = $(this).data("nbposts");
        var ultimatepid = $(this).data("ultimatepid");

        $.post("../__treatment/load_more_posts.php",{albumid: albumid, lastpid: lastpid, nbposts: nbposts}, function(data){
            var callbackData = JSON.parse(data);
            //console.log(callbackData);
            if(callbackData.hasOwnProperty('link')){
                window.location.replace(callbackData['link']);
            }else{
                var currentPost;
                var currentLink;
                var currentText;
                var tweetHTML;
                var currentPostID;
                for(var i=0;i<callbackData.length;i++){
                    currentPost = callbackData[i];
                   // console.log(currentPost);
                    currentLink = currentPost["link"];
                    currentText = currentPost["text"];
                    currentPostID=currentPost["id"];

                    if(currentLink.includes('facebook')){
                        //console.log("Facebook post");
                        $("#albumposts").append("<div class='gallery-item'></div>");
                        $(".gallery-item:last-child").append("<div id='test' class=\"fb-post\"data-href=\""+ currentLink +" \" data-width=\"350\" data-height=\"350\"></div>");
                    }else if(currentLink.includes('twitter')){
                        //console.log("Twitter post");
                        $.post("../__treatment/curl_tweet_call.php",{link: currentLink}, function(tweet_data){
                            tweetHTML = JSON.parse(tweet_data);
                            tweetHTML = tweetHTML['html'];
                           // console.log(tweetHTML);
                            $("#albumposts").append("<div class='gallery-item'></div>");
                            $(".gallery-item:last-child").append(tweetHTML);
                        });
                    }else if(currentLink.includes('instagram')){
                        instgrm.Embeds.process();
                        $.get("https://api.instagram.com/oembed?url="+currentLink+"&MAXWIDTH=350",function (insta_data) {
                            $("#albumposts").append("<div class='gallery-item'></div>");
                            $(".gallery-item:last-child").append(insta_data['html']);
                            instgrm.Embeds.process();
                        })
                    }else{
                        $("#albumposts").append("<div class='gallery-item'><h3>"+currentText+"</h3><img src='../__website_content/no_image.png'/></div>");
                    }
                }
                FB.XFBML.parse();
                $('#loadMorePosts').attr('data-lastpid', currentPostID);
            }
        });

        lastpid = $("#loadMorePosts").attr("data-lastpid");
        console.log(lastpid);
        if(ultimatepid<=lastpid){
            $("#loadMorePosts").remove();
            $(".loadMore").append("<h3>No more post in this album !</h3>")
        }

    })
});


