<html>
    <head>
        <title>New Registration</title>
    </head>
    <body>
         <?php  $url =  env('APP_URL', 'url'); 
   ?>
        <p>Dear {{$user->name}},</p>
        <p>Your account has been created in Resetfoodv5 as Buyer.</p>
        <p>Your Login Detail:</p>
        <p>UserName:- {{$user->email}}</p>
        <p>Password:- {{$pass}}</p>
        <p>&nbsp;</p>
        <p>Regards</p>
        <p><a href="{{$url}}">ResetfoodV5</a></p>
    </body>
    
</html>