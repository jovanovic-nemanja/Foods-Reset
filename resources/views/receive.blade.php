<!DOCTYPE html>
<html>
<head>
  <title>Pusher Test</title>
  <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('f005256181befa3e4c05', {
      cluster: 'us2',
      forceTLS: true
    });

    var channel = pusher.subscribe('chatbox');
    channel.bind('messagesend', function(data) {
      alert(JSON.stringify(data));
    });


  </script>
</head>
<body>
  <h1>Pusher Test</h1>
  <p>
    Try publishing an event to channel <code>chatbox</code>
    with event name <code>chatbox</code>.
  </p>
</body>
</html>
