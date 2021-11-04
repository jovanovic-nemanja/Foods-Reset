<html>
<head>
    <title>
        sender
    </title>
</head>
<body>
<!-- <form action="/testchat/public/sender" method="post">
    <input type="text" name="message">
    <input type="submit">
    {{ csrf_field() }}
</form> -->
<button onClick="send_data()">Send</button>
</body>
<script>
    console.log("test");

    function send_data(){
        console.log("adfs");
        temp={"message":"data1"};
        $.ajax({
                url: "/resetfoodv5/api/sender",
                type: "POST",
                data: temp,
                dataType:'json',
                success: function (response){
                    //console.log(response);
                    var temp_item=[];
                    temp_item = JSON.parse(response);
                    console.log("sfdas");
                }
            });
    }
</script>
<script src="https://js.pusher.com/4.4/pusher.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</html>


