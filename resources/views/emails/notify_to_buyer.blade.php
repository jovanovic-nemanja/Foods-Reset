<html>
<head>
	<?php  $url = env( 'APP_URL', 'url' );
	$user_id = base64_encode( $user_info->id );
	?>
    <title>Opportunity to post bid Price</title>
</head>
<body>
<p>Dear {{$user_info->name}},</p>
<p>Opportunity to post bid price</p>
<table border='1'>
    <tr>
        <th>Posted date</th>
        <th>SKU</th>
        <th>Quantity</th>
        <th>Expiry</th>
        <th>Price</th>
    </tr>
	<?php foreach($supplier_post as $s)
	{
	?>
    <tr>
        <td>{{date("d M/Y", strtotime($s->created_at))}}</td>
        <td>{{$s->skuInfo->sku}}</td>
        <td>{{$s->quantity}} lb</td>
        <td>{{$s->expiry2}}</td>
        <td>{{number_format($s->price,2)}}</td>
    </tr>
	<?php } ?>
</table>
<p>Thanks</p>
<p>&nbsp;</p>
<p>Regards</p>
<p><a href="{{$url}}/buyerlogin/{{$user_id}}">ResetFoodv5</a></p>
</body>

</html>