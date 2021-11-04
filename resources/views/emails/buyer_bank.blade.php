<html>
<head>
	<?php  $url = env( 'APP_URL', 'url' );
	?>
	<?php
	if($type == 'accept')
	{
	?>
    <title>Allocation & Bank Detail</title>
	<?php } else { ?>
    <title>Allocation Request {{$type}}</title>
	<?php } ?>
</head>
<body>
<p>Dear {{$buyer_user->name}},</p>
<p>Your winning Bid was accepted</p>
<table border='1'>
    <tr>
        <th>Posted date</th>
        <th>SKU</th>
        <th>Quantity</th>
        <th>Expiry</th>
        <th>Status</th>
        <th>Buyer Bid</th>
    </tr>
    <tr>
        <td>{{date("d M/Y", strtotime($buyer_post->created_at))}}</td>
        <td>{{$supplier_post->sku}}</td>
        <td>{{$allocation->allocation}} lb</td>
        <td>{{$buyer_post->expiry2}}</td>
        <td>{{$allocation->status}}</td>
        <td>{{number_format($buyer_post->buyer_bid,2)}}</td>
    </tr>
</table>
<?php
if($type == 'accepted')
{
?>
<p>Please forward payment,by next day,to: - Identify Supplier bank details.</p>

<h5><?php echo nl2br( $bank_detail ); ?></h5>

<?php  } ?>
<p>Thanks</p>

<p>&nbsp;</p>
<p>Regards</p>
<p><a href="{{$url}}">ResetFoodv5</a></p>
</body>

</html>