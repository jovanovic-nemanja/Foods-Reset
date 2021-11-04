@extends('layouts.master')

@section('content')
	<?php   $durations = array();
	$durations = App\Models\Setting::where( 'setting_name', 'product_detail' )->first();
	$durations = explode( ',', $durations->duration );
	?>
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <form class="form-inline" action="{{url('/')}}/admin/setting/duration/delete" method="post"
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
                                            <option value="delete">Delete Selected Duration</option>
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
                                    <th>Duration</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($durations as $c)
                                    <tr>
                                        <td data-title="Select">
                                            <input type="checkbox" class="check" name="cid[]" value="{{$c}}"
                                                   id="cid{{$c}}"/>
                                        </td>
                                        <td data-title="User Name">
                                            {{$c}} Hours
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
                <form role="form" action="{{url('/')}}/admin/setting/duration/store" name='user_form' id='user_form'
                      method="post">
                    {{ csrf_field() }}
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header">
                                <h3 class="box-title">Add New Duration</h3>
                            </div><!-- /.box-header -->

                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="InputTitle">Duration</label>
                                            <div class="input-group">
                                                <input type="number" id="name" name="duration" autocomplete="off"
                                                       class="form-control" required value="">
                                                <span class="input-group-addon" id="basic-addon2">Hours</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button class="btn btn-primary" type="submit">Submit</button>
                                <h4 style="text-align: left;"></h4>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
