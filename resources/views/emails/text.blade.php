<html>
<head>
	<?php  $url = env( 'APP_URL', 'url' );
	?>
    <title>New Allocation</title>
</head>
<body>
<p>Dear {{$user_info}},</p>
<p>We have allocated some products</p>
<p>Allocation Detail</p>
<table border='1'>
    <tr>
        <th>Product Name</th>
        <th>Your Quantity</th>
        <th>Allocation</th>
        <th>Status</th>
        <th>Your Price</th>
        <th>Total Price</th>
        <th>Expiry</th>
    </tr>
    <tr>
        <td>{{$product_name}}</td>
        <td>{{$allocation->requried_quantity}} lb</td>
        <td>{{$allocation->allocation}} lb</td>
        <td>{{$allocation->status}}</td>
        <td>{{number_format($buyer_post_info->price,2)}}</td>
        <td>{{number_format($buyer_post_info->price * $allocation->allocation,2)}}</td>
        <td>{{$buyer_post_info->expiry2}}</td>
    </tr>
</table>
<p>Thanks</p>

<p>&nbsp;</p>
<p>Regards</p>
<p><a href="{{$url}}">BBH Management</a></p>
</body>

</html>