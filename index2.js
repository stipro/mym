const path = require('path');
const express = require('express');
const app = express();

//settings
app.set('port', process.env.PORT || 3000);

//static file
app.use(express.static(path.join(__dirname, 'public')));

//start on server
const server = app.listen(app.get('port'), () => {
    console.log('server on porte', app.get('port'));
});
const SocketIO = require('socket.io');
const io = SocketIO(server);

//websockets
io.on('connection', (socket) => {
    console.log('nueva conexion', socket.id);

    socket.on('chat:message', (data) => {
        //envia los datos
        io.emit('chat:message', data);
    });
    socket.on('chat:typing', (data) => {
        //envia los datos
        socket.broadcast.emit('chat:typing', data);
    });

});

