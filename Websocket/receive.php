<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src='//cdnjs.cloudflare.com/ajax/libs/socket.io/1.7.4/socket.io.min.js'></script>
    
    <script src="server.js"></script>
</head>
<body>

<script>
var socket = io.connect('//127.0.0.1:1337');

socket.on('connect', function () {
    console.log('connected');

    socket.on('broadcast', function (data) {
        //console.log(data);
        //socket.emit("broadcast", data);
        alert(data.text);
    });

    socket.on('disconnect', function () {
        console.log('disconnected');
    });
});
</script>

</body>
</html>