/**
 * Created by Krsanika on 2018-03-20.
 */

//주사위관련
Dice = {
    buttonpool : {},

    isDice : function(msg) {
        if (msg.search('/dice') !== -1 || msg.search('/d') !== -1 || msg.search('/ㅇ') !== -1)
            return true;
        else return false;
/*        ------------------------LEGACY CODE-------------------
        if (msg.search(/[^0-9\.]+/g) !== -1 && msg.search("d") !== -1) {
            var decompos = msg.split('d');
            var n = decompos[0].replace(/[^0-9\.]+/g, "");
            var add = 0;
            if(!Dice.isNumber(n)) return false;


            if (decompos[1].search( /\+/) !== -1) {
                var d_after = decompos[1].split('+');
                console.log(d_after);
                var x = d_after[0].replace(/[^0-9\.]+/g, "");
                if(!Dice.isNumber(x)) return false;
                var add = d_after[1].replace(/[^0-9\.]+/g, "");
                if(!Dice.isNumber(add)) add = 0;
            } else var x = decompos[1].replace(/[^0-9\.]+/g, "");

            if(!Dice.isNumber(x)) return false;

            Dice.roll(parseInt(n), parseInt(x), parseInt(add));
            return true;
        }else return false;
*/
    },

    roll : function(msg){
        var dicepool = {plus : {}, minus : {}};
        var system = null;
        var add = [];
        var requestStr = msg.replace('/dice ', "").replace('/d ', "").replace('/ㅇ ', "");
        requestStr = "+"+requestStr;

        //시스템, 난이도 서치
        if(requestStr.search('coc') !== -1){
            system = 'coc';
        }else if(requestStr.search('wod') !== -1){
            system = 'wod';
        }else if(requestStr.search('dnd') !== -1){
            system = 'dnd'
        }else system = 'dnd';

        var decomposer = requestStr;
        var diceStrPlus = decomposer.match(/\+\d{1,}d\d{1,}/g);
        for(i in diceStrPlus){
            decomposer = decomposer.replace(diceStrPlus[i], '');
            var die = diceStrPlus[i].split('d');
            die[0] = parseInt(die[0].replace(/[^0-9\.]+/g, ""));
            die[1] = parseInt(die[1].replace(/[^0-9\.]+/g, ""));
            if(!(die[1] in dicepool.plus)) dicepool.plus[die[1]] = 0;
            dicepool.plus[die[1]] += die[0];
        }

        var diceStrMinus = decomposer.match(/\-\d{1,}d\d{1,}/g);
        for(h in diceStrMinus){
            decomposer = decomposer.replace(diceStrMinus[h], '');
            var die = diceStrMinus[h].split('d');
            die[0] = parseInt(die[0].replace(/[^0-9\.]+/g, ""));
            die[1] = parseInt(die[1].replace(/[^0-9\.]+/g, ""));
            if(!(die[1] in dicepool.minus)) dicepool.minus[die[1]] = 0;
            dicepool.minus[die[1]] += die[0];
        }


        var pluses = decomposer.match(/\+\d{1,}/g);
        var minuses = decomposer.match(/\-\d{1,}/g);
        for(k in pluses){
            add.push(parseInt(pluses[k]));
        }
        for(j in minuses){
            add.push(parseInt(minuses[j]));
        }


        //표시부. 나중에 그림같은걸로 바꿔야함
        Chat.writeMessage('dice', null, Chat.name+"가 "+msg+"를 굴렸습니다.");

        Chat.socket.emit('dice', {
            name : Chat.name,
            system : system,
            req : requestStr,
            dicepool : dicepool,
            add : add,
        });

    },

    setDice : function(x){

        $('#finalDice')
    },




}

$(function(){

    Chat.socket.on('roll', function(data){
        var msg = data.roller + "의 결과값은 " + data.sum + "입니다. ( ";
        console.log(data.value);
        for(var v in data.value.plus){
            msg += data.value.plus[v] + " +";
        }

        msg += ")";
        Chat.writeMessage('other', data.roller+"가 "+data.req+"를 굴렸습니다.");
        Chat.writeMessage('other', [data.roller], msg);
    });

});