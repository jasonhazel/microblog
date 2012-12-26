$(document).ready(function(){
    var last_postid = '_';

    var loading = $('div#loading').tooltip({track:true});
    var posts = $("div#posts");
    get_posts();


    function reset_posts() {
        loading.detach();
        last_postid = '_';
        posts.html('');
        loading.appendTo(posts);
    }

    function get_tagged(tag) {
        reset_posts();
        loading.detach();
        $.getJSON('http://api.mrhazel.com/tag/' + tag, function(data){
            $.each(data, function(key, val) {
                var post = $("<div class='post'><").data('postid', val['postid']);
                var content = $("<p>")
                                .html(val['content'])
                                .hashtag();
                
                var timestamp = $('<h6>')
                                .attr('title', val['timestamp'])
                                .timeago();

                post.append(content).append(timestamp);
                post.find('a.hashtag').click(function(e){
                    get_tagged($(this).data('hashtag'));
                    e.preventDefault();
                });
                // loading.before(post);
                post.appendTo(posts);
            });
        });        
    }


    function get_posts() {
        $.getJSON('http://api.mrhazel.com/posts/' + last_postid + '/5', function(data){
            $.each(data, function(key, val) {
                var post = $("<div class='post'><").data('postid', val['postid']);
                var content = $("<p>")
                                .html(val['content'])
                                .hashtag();
                
                var timestamp = $('<h6>')
                                .attr('title', val['timestamp'])
                                .timeago();

                post.append(content).append(timestamp);
                post.find('a.hashtag').click(function(e){
                    get_tagged($(this).data('hashtag'));
                    e.preventDefault();
                });
                loading.before(post);
                
                last_postid = val['postid'];
                if (last_postid == 1) loading.hide();
            });
        });

    }




    loading.click(function(){
        loading.tooltip('close');
        get_posts();
        
    });

    $('header img').click(function(){
        reset_posts();
        get_posts();
    });

});