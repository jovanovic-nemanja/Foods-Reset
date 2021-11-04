@extends('layouts.frontendLayout')

@section('css-file')
@endsection

@section('content')
	<?php
	use App\Libraries\ZnUtilities;
	?>
    <div class="container marketplace-page">
        <div class="row">
            <div class="col-sm-12">
                <p>Resetfoods is a B2B  marketplace for suppliers, buyers, liquidators and traders of surplus and code dated food existing at all points along the value chain. This is good food that would normally go to waste.   From our high capacity cloud based platform, farmers to CPGs connect & transact, directly through their banks, using cost effective and secure Wire Transfers and EFT's. Confidence is further enhanced by connecting payment release only upon successful product receipt. Excess food is moved faster,   channels enhanced and food waste is minimized.</p>
                <div class="text-center">
                    <img src="{{ asset('img/resetfood_img.jpg')}}" alt="" title="">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-file')
@endsection
