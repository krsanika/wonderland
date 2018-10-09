/**
 * Created by Krsanika on 2018-03-14.
 */
Chat = {

    userdata : null,
    teamdata : null,
    settings : null,
    contacts : null,

    writeMessage: function (type, name, message) {

        var printName = name + ' : ';
        //개행처리


        var messageDiv = $('<div>').addClass('j-message').html(printName + message.replace(/\n/g, "<br/>"));
/*
        if (type === 'me') {
            printName = name + ' : ';
        }
*/

//        messageDiv = html.replace('{MESSAGE}', printName + message);

//        $(messageDiv).appendTo($('#message'));
        $('#message').append(messageDiv);
        $('body').stop();
        $('body').animate({scrollTop: $('body').height()}, 500);

    },

    sender: function (text) {

        Chat.socket.emit('user', {
            name: Chat.userdata.name,
            message: text
        });

        Chat.writeMessage('me', Chat.userdata.name, text);
    },

};


$(function(){

    Chat.userdata = userdata;
    Chat.teamdata = teamdata;
    Chat.settings = settings;

    Chat.socket = io.connect(Chat.userdata.server_url);

    Chat.socket.on('connection', function(data) {
        console.log('connect');
        if(data.type === 'connected') {
            Chat.socket.emit('connection', {
                type : 'join',
                name : Chat.userdata.name,
                room : Chat.teamdata.idRoom,
            });
        }
    });

    Chat.socket.on('system', function(data) {
        Chat.writeMessage('system', 'system', data.message);
    });

    Chat.socket.on('message', function(data) {
        console.log(data);
        Chat.writeMessage('other', data.name, data.message);
    });

    Chat.socket .on('connect_error', function(err){

//        console.log(err);

    });

    $('#message-input').on('keypress', function(e) {

        if(e.shiftKey && e.keyCode === 13){
        }else if(e.keyCode === 13) {
            var $input = $('#message-input');
            var msg = $input.val();
            if(!Dice.isDice(msg)) Chat.sender(msg);
            else Dice.roll(msg);
            $input.val('');
            $input.focus();
            return false;
        }
    });


});
