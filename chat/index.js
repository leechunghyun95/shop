const { send } = require('process');

const app = require('express')();
const http = require('http').createServer(app);
const io = require('socket.io')(http);//소켓-서버 연결

var mysql = require('mysql');

var connection = mysql.createConnection({
    host     : 'localhost',
    user     : 'root',
    password : '1234',
    database : 'shop'
});

connection.connect();

//메시지 수신자, 발신자, 상품번호 저장할 변수
var sender='';
var receiver='';
var item_no='';
var nickname ='';


app.get('/', (req,res) => {
    res.sendFile(__dirname + '/index.html');


    //메시지 수신자 , 발신자 이메일, 상품번호 get방식으로 가져오기
    sender = req.query.sender;
    receiver = req.query.receiver;
    item_no = req.query.item_no;

    nickname = req.query.nickname;
    console.log(nickname);

});

io.on('connection', (socket) => {// 소켓 접속
    console.log('a user connected'); 
    console.log('sender: ' + sender);
    console.log('receiver: ' + receiver);
    console.log('item_no: ' + item_no);

    // 채팅방 이름 생성
    var roomName = item_no+sender; 
    console.log('room: ' + roomName);
    
    // 테스트 하려고 잠깐 주석처리해논거 다시 풀어야댐
    connection.query("SELECT * FROM chat_room WHERE roomName=?",[roomName],function(error,chat_room,field){
        console.log("chat_room: " + chat_room);


        

        if(chat_room == ''){
            console.log('채팅방 새로 만들기');
            connection.query("INSERT INTO chat_room (sender,receiver,goods,roomName) values (?,?,?,?)",[sender,receiver,item_no,roomName],function(error,createRoom,field){
            console.log(createRoom);
            })
        }else{
            console.log('채팅방 존재');
        }
    });

    socket.join(room)
    


    //서버에서 메시지 받았을때
    socket.on('send message' ,(msg) => {
        // 보낸사람을 제외하고 뿌려줘
        io.to(room).broadcast('receive message',(nickname + ':' + msg));
        console.log('msg: ' + msg)
    });

    

    // connection.end();


    // 유저 연결 끊어짐
    socket.on('disconnect',() => {
        console.log('user disconneccted');
    });

});

http.listen(3000, () => {
    console.log('listening on *:3000');
});

