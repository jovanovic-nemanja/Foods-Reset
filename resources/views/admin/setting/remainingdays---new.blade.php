@extends('layouts.master')

@section('content')
	<?php
    $remainingdayss = array();
	$remainingdayss = App\Models\Expiry::where( 'expiry_value', '!=', '' )->get();
	?>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <form class="form-inline" action="{{url('/')}}/admin/setting/remainingdays/delete" method="post"
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
                                            <option value="delete">Delete Selected Remaining Days</option>
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
                                    <th>Remaining Days</th>
                                    <th>Days Count</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($remainingdayss as $c)
                                    <tr>
                                        <td data-title="Select">
                                            <input type="checkbox" class="check" name="cid[]" value="{{$c->id}}"
                                                   id="cid{{$c->id}}"/>
                                        </td>
                                        <td data-title="User Name">
                                            {{$c->expiry}}
                                        </td>
                                        <td data-title="User Name">
                                            {{$c->expiry_value}}
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
                <form role="form" action="{{url('/')}}/admin/setting/remainingdays/store" name='user_form'
                      id='user_form' method="post">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Add New Day</h3>
                            </div><!-- /.box-header -->

                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="InputTitle">Expiry</label>
                                            <input type="text" placeholder="Enter Remaining Days" id="name"
                                                   name="expiry" class="form-control required"
                                                   value="{{old('expiry')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="InputTitle">Expiry Value</label>
                                            <input type="text" placeholder="Enter Days value" id="name"
                                                   name="expiry_value" class="form-control required"
                                                   value="{{old('expiry_value')}}">
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
