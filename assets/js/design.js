/**
 * Created by WS01 on 2018-04-04.
 */

Design = {
    chatWidth : null,

    dragWindow : function (){
        Design.chatWidth = document.getElementById('chattingBar').width;

    }

};

$(function(){
    $('#canvasWrapper').resizable({handles : 'e'});

});