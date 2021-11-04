@extends('layouts.frontendLayout')

@section('css-file')
@endsection

@section('content')
	<?php
	use App\Libraries\ZnUtilities;
	?>
    <div class="container contact-page">
        <div class="row">
            <div class="col-sm-12">
				<h3>Have some questions for us?</h3>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<p>I'm interested in:</p>
				<div class="form-check">
					<label class="form-check-label">
						<input type="radio" class="form-check-input" name="optradio">Buyer
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label">
						<input type="radio" class="form-check-input" name="optradio">Seller
					</label>
				</div>
				<div class="form-check disabled">
					<label class="form-check-label">
						<input type="radio" class="form-check-input" name="optradio">Both
					</label>
				</div>
				<div class="form-check disabled">
					<label class="form-check-label">
						<input type="radio" class="form-check-input" name="optradio">Other
					</label>
					<div class="d-inline-block ml-3">
					<input type="text" class="form-control" placeholder="Please Specify" />
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<p>I am a (click all the apply)</p>
				<div class="form-check">
					<label class="form-check-label">
						<input type="checkbox" class="form-check-input" value="">Food Producer
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label">
						<input type="checkbox" class="form-check-input" value="">Jobber(?)
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label">
						<input type="checkbox" class="form-check-input" value="">Famar
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label">
						<input type="checkbox" class="form-check-input" value="">Food Processor
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label">
						<input type="checkbox" class="form-check-input" value="">Restauranteur
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label">
						<input type="checkbox" class="form-check-input" value="">Food chain operator
					</label>
				</div>
				<div class="form-check">
					<label class="form-check-label">
						<input type="checkbox" class="form-check-input" value="">Someone with a big family
					</label>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<p>Please call / email me... blah</p>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-envelope"></i></span>
					</div>
					<input type="text" class="form-control" placeholder="Email">
					<input type="text" class="form-control" placeholder="Email again">
				</div>
				<div class="input-group mb-3">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-user"></i></span>
					</div>
					<input type="text" class="form-control" placeholder="First Name">
					<input type="text" class="form-control" placeholder="Last Name">
				</div>
			</div>
			<div class="col-md-6">
				<div class="input-group mb-3 ">
					<div class="input-group-prepend">
						<span class="input-group-text"><i class="fas fa-phone"></i></span>
					</div>
					<input type="text" class="form-control" placeholder="Phone">
				</div>
			</div>
			<div class="col-md-12 mb-3">
				<textarea class="form-control" rows="10" placeholder="Put message here"></textarea>
			</div>
			<div class="col-md-12 mb-3 text-center">
				<button type="button" class="btn btn-primary contact-send-btn">Send</button>
			</div>
		</div>
	</div>
@endsection
@section('js-file')
@endsection
