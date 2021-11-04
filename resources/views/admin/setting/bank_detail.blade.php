@extends('layouts.master')

@section('content')
	<?php
	$bank = App\Models\Setting::where( 'setting_name', 'product_detail' )->first();
	?>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <form role="form" action="{{url('/')}}/admin/setting/bankdetail/store" name='user_form' id='user_form'
                      method="post">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Add or Update Bank Detail</h3>
                            </div><!-- /.box-header -->

                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="InputTitle">Bank Detail</label>
                                            <textarea rows="7" placeholder="Enter Bank Detail" id="name"
                                                      name="bank_detail" class="form-control" required
                                                      value="{{old('bank_detail')}}">{{isset($bank->bank_detail)?$bank->bank_detail:''}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
