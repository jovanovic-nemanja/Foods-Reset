@extends('layouts.frontendLayout')

@section('css-file')
@endsection

@section('content')
	<?php
	use App\Libraries\ZnUtilities;
	?>
	<div class="container offering-page">
        <div class="row">
            <div class="col-sm-12">
				<p>
					Food Suppliers lack an efficient mechanism to address surplus & code-dated products.
					<br>
					<br>
					Resetfoods provides a disruptive B2B channel that connects commercial Suppliers to Buyers of surplus & code-dated products. We provide a safe trusted online marketplace for users to buy and sell diverse food products with time-limited best before dates.  We've created a closed network of vetted buyers and suppliers, escrow payment services and time released payments.   Secured payments means allowing users to directly push transactions through their home banks which adds to a faster and safer experience
					<br>
					<br>
					How it works:
				</p>
				<div class="text-center">
                    <img src="{{ asset('img/offer_img.jpg')}}" alt="" title="">
                </div>
			</div>
		</div>
	</div>
@endsection
@section('js-file')
@endsection
