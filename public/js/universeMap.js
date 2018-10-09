/**
 * Created by Gato on 2018-06-06.
 */

var getBackgroundImageSize = function(el) {
    var imageUrl = $(el).css('background-image').match(/^url\(["']?(.+?)["']?\)$/);
    var dfd = new $.Deferred();

    if (imageUrl) {
        var image = new Image();
        image.onload = dfd.resolve;
        image.onerror = dfd.reject;
        image.src = imageUrl[1];
    } else {
        dfd.reject();
    }

    return dfd.then(function() {
//                return { width: this.width, height: this.height };
        return { width: this.naturalWidth, height: this.naturalHeight };
    });
};


function closeLayer( obj ) {
    $(obj).parent().parent().hide();
    $('.icon_select').hide();
}

var selectIconLeft = null;
var selectIconTop = null;


function viewInfo()
{
    event.stopPropagation();
    var idString= event.target.id;
    var idNum = Number(idString.split('_')[1]);
    $("#title_text").text(markersInfo[idNum]["title"]);
    $("#info_text").text(markersInfo[idNum]["explain"]);
    $('#inputLayer').hide();
    $('#infoLayer').css({
        "top": Number( markersInfo[idNum]["positionY"]) +46+"px",
        "left":Number( markersInfo[idNum]["positionX"]) +46+"px",
        "position": "absolute"
    }).show();
}

$(function(){

    /* 클릭시 클릭을 클릭한 위치 근처에 레이어가 나타난다. */
    $('#editMap').click(function(e)
    {
        var sWidth = window.innerWidth;
        var sHeight = window.innerHeight;

        var oWidth = $('#inputLayer').width();
        var oHeight = $('#inputLayer').height();

        // 레이어가 나타날 위치를 셋팅한다.
        var divLeft = e.pageX + 46;
        var divTop = e.pageY + 46;


        selectIconLeft = e.pageX -46;
        selectIconTop = e.pageY -46;

        // 레이어가 화면 크기를 벗어나면 위치를 바꾸어 배치한다.
        if( divLeft + oWidth > sWidth +  $(window).scrollLeft()) divLeft -= oWidth;
        if( divTop + oHeight > sHeight +  $(window).scrollTop() ) divTop -= (oHeight);

        // 레이어 위치를 바꾸었더니 상단기준점(0,0) 밖으로 벗어난다면 상단기준점(0,0)에 배치하자.
        if( divLeft < 0 ) divLeft = 0;
        if( divTop < 0 ) divTop = 0;
        $('#infoLayer').hide();
        $('#inputLayer').css({
            "top": divTop,
            "left": divLeft,
            "position": "absolute"
        }).show();

        $('.icon_select').css({
            "top": selectIconTop,
            "left": selectIconLeft,
            "position": "absolute"
        }).show();
    });
});
