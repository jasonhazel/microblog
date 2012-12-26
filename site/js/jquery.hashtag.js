/**
 * a quick and dirty jquery plugin for turning hashtags into links.
 */
(function( $ ){

  $.fn.hashtag = function(options) {

    // $(this) would be the same as $($('#element'));
    return this.each(function(){

        content = $(this);
        content.html(content.html().replace(/#(\S*\b)/g,'<a class="hashtag" href="#" data-hashtag="$1">#$1</a>'));
    });

  };
})( jQuery );