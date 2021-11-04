<html>
<head>
	<?php  $url = env( 'APP_URL', 'url' );
	?>
    <title>Allocation Request</title>
</head>
<body>
<p>Dear {{$supplier_user->name}},</p>
<p>{{$buyer_user->name}} (Buyer) Request allocated some products</p>
<table border='1'>
    <tr>
        <th>Posted date</th>
        <th>SKU</th>
        <th>Allocation</th>
        <th>Status</th>
        <th>Price</th>
        <th>Total Price</th>
        <th>Expiry</th>

    </tr>
    <tr>
        <td>{{date("d M/Y", strtotime($buyer_post->created_at))}}</td>
        <td>{{$supplier_post->sku}}</td>
        <td>{{$allocation->allocation}} lb</td>
        <td>{{$allocation->status}}</td>
        <td>{{number_format($supplier_post->price,2)}}</td>
        <td>{{number_format($supplier_post->price * $allocation->allocation,2)}}</td>
        <td>{{$buyer_post->expiry2}}</td>

    </tr>

</table>


<p>Please Accept or Reject The Allocation.</p>
<p><a href="{{$url}}/buyer/allocation/accept/{{$allocation->id}}" target="_blank" style="display: inline-block;
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
">Accept</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <a href="{{$url}}/buyer/allocation/reject/{{$allocation->id}}" target="_blank" style="display: inline-block;
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
">Reject</a>
</p>
<p>Thanks</p>

<p>&nbsp;</p>
<p>Regards</p>
<p><a href="{{$url}}">ResetFoods Management</a></p>
</body>

</html>