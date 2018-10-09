/**
 * Created by Krsanika on 2018-04-13.
 */

Scene = {
    lastStand : 0,
    maxStand : 2,
    npcs : [],

    setBg : function(bg){
        $('#Bg').style('background-image', bg);
    },

    setStand : function(stand, nextPos){
        if(nextPos == 0) nextPos = Scene.maxStand;

    },

    openToolWindow : function(name){
        $('.window').hide();
        $('#'+name+'Selector').show(200);
    },


    hideToolWindow : function(){
        $('.window').hide();
    }
};




$(function(){


});