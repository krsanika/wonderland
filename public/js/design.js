/**
 * Created by Krsanika on 2018-04-04.
 */

Design = {
    chatWidth : null,
    resizeTimer : null,

    removeloading : function(){
        $('#loading').hide(500);
    },

    refixingWindow: function(){
        var messageH = $('#chattingBar').height() - $('#chatfooter').height();
        $('#message').css('height', messageH + "px");
    }
};


$(function(){
    $('#chattingBar').resizable({handles : 'w'});

    //켜면 한번함
    Design.refixingWindow();
    $('#'+Chat.userdata.rule+"Box").show();


    //리사이징후에도 함
    $(window).on('resize', function() {
        clearTimeout(Design.resizeTimer);
        Design.resizeTimer = setTimeout(function() {
            // リサイズ完了後の処理
            /*
            var winWidth = $(window).width();
            var winHeight = $(window).height();
            console.log('幅:' + winWidth + '__高さ:' + winHeight);
            */
            Design.refixingWindow();
        }, 200);
    });

// スクロールを無効にする
    $(window).on('touchmove.noScroll', function(e) {
        e.preventDefault();
    });


});