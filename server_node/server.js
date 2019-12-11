const SERVER_PORT = 6001
var io = require('socket.io')(SERVER_PORT)
console.log("Connect"+SERVER_PORT);
var Redis = require('ioredis')
// var redis = new Redis(1000)
var redis  = require('redis')


io.on('connection',function(socket){
	console.log( socket.id);
	var redisClient = redis.createClient(1000,'127.0.0.1')
	redisClient.subscribe('channel-election')
	redisClient.on("channel-election", function(channel, message) {
    console.log("mew message in queue "+ message + "channel");
    socket.emit(channel, message);
  });
})


// io.on('connection',function(socket){
// 	console.log("Co nguoi ket noi" + socket.id);
// 	var redisClient = redis.createClient();
//   redisClient.subscribe('socket-mess');
//    redisClient.on("message", function(channel, message) {
//     console.log("mew message in queue "+ message + "channel");
//     socket.emit(channel, message);
//   });
// })


// redis.psubscribe('*',function(error,count){

// })
// redis.on('pmessage',function(partner,channel,message){
// 	message = JSON.parse(message)
// 	io.emit(channel+":"+message.event,message.data.message)
// 	console.log("Send");
// })
