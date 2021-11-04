<html>
<head>
	<?php  $url = env( 'APP_URL', 'url' );
	?>
    <title>New Allocation</title>
</head>
<body>
<p>Dear {{$user_info->name}},</p>
<p>Buyer Change The Allocation Status</p>
<p>Allocation Detail</p>
<table border='1'>
    <tr>
        <th>Product Name</th>
        <th>Your Quantity</th>
        <th>Allocation</th>
        <th>Status</th>
    </tr>
    <tr>
        <td>{{$product_name}}</td>
        <td>{{$allocation->requried_quantity}} lb</td>
        <td>{{$allocation->allocation}} lb</td>
        <td>{{$allocation->status}}</td>
    </tr>
</table>
<p>Thanks</p>
<p>&nbsp;</p>
<p>Regards</p>
<p><a href="">BBH Management</a></p>
</body>

</html>