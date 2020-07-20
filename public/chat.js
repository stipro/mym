const socket = io()

//DOM elements
let message = document.getElementById('message');
let username = document.getElementById('username');
let btn = document.getElementById('send');
let output = document.getElementById('output');
let actions = document.getElementById('actions');

btn.addEventListener('click', function() {
    socket.emit('chat:message', {
        message: message.value,
        username: username.value        
    });
});
message.addEventListener('keypress', function () {
    socket.emit('chat:typing', username.value)
});
socket.on('chat:message', function (data) {
    actions.innerHTML = '';
    //var jrpt = JSON.parse(data);
    output.innerHTML += '<p><strong> ' + data.username + '<strong>:' + data.message + '</p>';
    console.log(data);
});
socket.on('chat:typing', function (data) {
    //actions.innerHTML = '<p><em>' + ${data} + 'is typing a message.</em></p>';
    console.log(data + ' Esta escribiendo');
})