/**
 * Created by Gato on 2018-03-14.
 */
var url_string = document.URL;
var url = new URL(url_string);

Chat = {

    serverURL: '1.229.95.13:9003',
    name: url.searchParams.get('name'),
    room: url.searchParams.get('room'),
    socket: null,

    writeMessage: function (type, name, message) {

        var printName = name + ' : ';
        var messageDiv = $('<div>').addClass('j-massage').html(printName + message);
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
            name: Chat.name,
            message: text
        });

        Chat.writeMessage('me', Chat.name, text);
    },

};


$(function(){

    Chat.socket = io.connect(Chat.serverURL);

    Chat.socket.on('connection', function(data) {
        console.log('connect');
        if(data.type === 'connected') {
            Chat.socket.emit('connection', {
                type : 'join',
                name : Chat.name,
                room : Chat.room
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

    $('#message-button').click(function() {

        var $input = $('#message-input');
        var msg = $input.val();
        if(!Dice.isDice(msg)) Chat.sender(msg);
        else Dice.roll(msg);

        $input.val('');
        $input.focus();
    });

    $('#message-input').on('keypress', function(e) {

        if(e.keyCode === 13) {
            var $input = $('#message-input');
            var msg = $input.val();
            if(!Dice.isDice(msg)) Chat.sender(msg);
            else Dice.roll(msg);
            $input.val('');
            $input.focus();
        }
    });


});
