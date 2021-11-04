@extends('layouts.master')

@section('content')
	<?php   $prices = array();
	$prices = App\Models\Setting::where( 'setting_name', 'product_detail' )->first();
	$prices = explode( ',', $prices->price );
	?>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <form class="form-inline" action="{{url('/')}}/admin/setting/price/delete" method="post"
                      name="actions_form" id="actions_form">
                    {{ csrf_field() }}
                    <div class="box box-danger">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    Actions
                                    <div class="form-group">
                                        <select id="bulk_action" name="bulk_action" class="form-control"
                                                placeholder="Select Action">
                                            <option value="">Select An Action</option>
                                            <option value="delete">Delete Selected Price</option>
                                        </select>
                                    </div>
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                        <div class='clearfix'>&nbsp;</div>
                        <div class='table-responsive'>
                            <table class="table table-hover table-bordered pull-left table-striped table-condensed admin-user-table">
                                <thead>
                                <tr>
                                    <th>
                                        <input type="checkbox" id="checkall" class="check" value=""/>
                                    </th>
                                    <th>Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($prices as $c)
                                    <tr>
                                        <td data-title="Select">
                                            <input type="checkbox" class="check" name="cid[]" value="{{$c}}"
                                                   id="cid{{$c}}"/>
                                        </td>
                                        <td data-title="User Name">
                                            {{$c}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-md-6">
                <form role="form" action="{{url('/')}}/admin/setting/price/store" name='user_form' id='user_form'
                      method="post">

                    {{ csrf_field() }}

                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Add New Price</h3>
                            </div><!-- /.box-header -->

                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="InputTitle">Price</label>
                                            <input type="text" placeholder="Enter Price" id="name" name="price"
                                                   class="form-control required" value="{{old('price')}}">
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
