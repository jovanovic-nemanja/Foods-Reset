<html>
<head>
	<?php  $url = env( 'APP_URL', 'url' );
	?>
    <title>New ReAllocation</title>
</head>
<body>
<p>Dear {{$user_info->name}},</p>
<p>We have allocated some products</p>
<p>ReAllocation Detail</p>
<table border='1'>
    <tr>
        <th>Posted date</th>
        <th>Category/ Product</th>
        <th>Your Quantity</th>
        <th>Allocation</th>
        <th>ReAllocation</th>
        <th>Status</th>
        <th>Your Price</th>
        <th>Total Price</th>
        <th>Expiry</th>
        <th>Duration</th>
    </tr>
    <tr>
        <td>{{date("d M/Y", strtotime($buyer_post_info->created_at))}}</td>
        <td>{{isset($buyer_post_info->category->category_name)?$buyer_post_info->category->category_name:''}}
            /{{$product_name}}</td>
        <td>{{$allocation->requried_quantity}} lb</td>
        <td>{{$allocation->allocation}} lb</td>
        <td>{{$allocation->reallocation}} lb</td>
        <td>{{$allocation->status}}</td>
        <td>{{number_format($buyer_post_info->price,2)}}</td>
        <td>{{number_format($buyer_post_info->price * $allocation->reallocation,2)}}</td>
        <td>{{$buyer_post_info->expiry2}}</td>
        <td>{{$buyer_post_info->duration}}</td>
    </tr>
</table>

<p>Thanks</p>
<p>&nbsp;</p>
<p>Regards</p>
<p><a href="">ResetFoods Management</a></p>
</body>

</html>