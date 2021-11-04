<html>
<head>
	<?php  $url = env( 'APP_URL', 'url' );
	?>
    <title>Send Bank Detail</title>
</head>
<body>
<p>Dear {{$supplier_info->name}},</p>
<p>Your product posting has been matched with Buyers. Please provide payment details through the link provided.</p>
<p>Please Click This Link</p>
<p><a href='{{$url}}/addbank/detail/{{$supplier_post_info->supplier_post_id}}/{{$allocation->id}}'
      style="display: inline-block;
background: #4F81BD;
text-decoration: none;
color: #fff;
font-weight: normal;
line-height: 1.25;
text-align: center;
white-space: nowrap;
vertical-align: middle;
-webkit-user-select: none;
-moz-user-select: none;
-ms-user-select: none;
user-select: none;
border: 1px solid transparent;
padding: 0.5rem 1rem;
font-size: 1rem;
border-radius: 0.25rem;
-webkit-transition: all 0.2s ease-in-out;
-o-transition: all 0.2s ease-in-out;
transition: all 0.2s ease-in-out;
"
    >Add Bank Detail</a></p>
<p>Thanks</p>
<p>&nbsp;</p>
<p>Regards</p>
<p><a href="">ResetFoods Management</a></p>
</body>

</html>