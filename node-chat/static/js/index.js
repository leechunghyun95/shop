var socket = io()

/* 접속 되었을 때 실행 */
socket.on('connect', function() {
  
  
  /* 서버에 새로운 유저가 왔다고 알림 */
  socket.emit('newUser')
})

/* 서버로부터 데이터 받은 경우 */
socket.on('update', function(data) {

  var chatHeader = document.getElementById('chatHeader');

  console.log('룸 받았다');

  var chat = document.getElementById('chat')

  var message = document.createElement('div')
  var node = document.createTextNode(`${data.name}: ${data.message}`)
  var className = ''

  // 타입에 따라 적용할 클래스를 다르게 지정
  switch(data.type) {
    case 'message':
      className = 'other'
      break

    case 'connect':
      className = 'connect'
      break

    case 'disconnect':
      className = 'disconnect'
      break
  }

  message.classList.add(className)
  message.appendChild(node)
  chat.appendChild(message)
})

/* 메시지 전송 함수 */
function send() {
  // 입력되어있는 데이터 가져오기
  var message = document.getElementById('test').value
  
  // 가져왔으니 데이터 빈칸으로 변경
  document.getElementById('test').value = ''

  // 내가 전송할 메시지 클라이언트에게 표시
  var chat = document.getElementById('chat')
  var msg = document.createElement('div')
  var node = document.createTextNode(message)
  msg.classList.add('me')
  msg.appendChild(node)
  chat.appendChild(msg)

  // 서버로 message 이벤트 전달 + 데이터와 함께
  socket.emit('message', {type: 'message', message: message})
}

// 서버에서 이전 대화 불러오기
socket.on('store',(data,myName) => {
  console.log(data[0]);
  console.log(myName);

  
 
  

  for(i = 0; i < data.length; i++){
    console.log(i + "번 반복");

    var chat = document.getElementById('chat')

    var message = document.createElement('div')
    var className = ''
  
  if(data[i].name == myName){//메시지보낸이에 따라 클래스명 변경
    className = 'me'
    var node = document.createTextNode(`${data[i].message}`)
  }else{
    className = 'other'
    var node = document.createTextNode(`${data[i].name}: ${data[i].message}`)
  }


  message.classList.add(className)
  message.appendChild(node)
  chat.appendChild(message)
}
})

