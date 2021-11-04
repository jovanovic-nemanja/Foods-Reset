@extends('layouts.master')

@section('content')
    <section class="content">
        <form class="form-inline" action="{{url('/')}}/warehouse1/action" method="post" name="actions_form"
              id="actions_form">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            Actions
                            <div class="form-group">
                                <select id="bulk_action" name="bulk_action" class="form-control"
                                        placeholder="Select Action">
                                    <option value="">Select An Action</option>
                                    <option value="delete">Delete Selected WareHouse</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search"
                                       value="{{isset($search)?$search:''}}" placeholder="Search WareHouse"
                                       aria-describedby="basic-addon2">
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-default btn-flat">Find WareHouse</button>
                            </span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a href="{{url('/')}}/warehouse/create" class="btn btn-primary btn-flat">Add WareHouse</a>
                        </div>
                        @if(isset($search))
                            <div class="col-md-2">
                                <a href="{{url('/')}}/warehouse" class="btn btn-info btn-flat">Show All WareHouse</a>
                            </div>
                        @endif
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
                            <th>Address</th>
                            <th>Company Name</th>
                            <th>Latitude</th>
                            <th>Longitude</th>
                            <th>Contact Name</th>
                            <th>Email</th>
                            <th>Pool</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($warehouse as $c)
							<?php $pool_ids = explode( ',', $c->pool );
							$pool = App\Models\Pool::whereIn( 'id', $pool_ids )->get()->pluck( 'pool_name' )->toArray();
							?>
                            <tr>
                                <td data-title="Select">
                                    <input type="checkbox" class="check" name="cid[]" value="{{$c->id}}"
                                           id="cid{{$c->id}}"/>
                                </td>
                                <td data-title="User Name">
                                    <a href="{{url('/')}}/warehouse/{{$c->id}}/edit" title="Edit">
                                        {{$c->address}}
                                    </a>
                                </td>
                                <td data-title="Email">{{$c->company_name}}</td>
                                <td data-title="Email">{{$c->lat}}</td>
                                <td data-title="Email">{{$c->lng}}</td>
                                <td data-title="Email">{{$c->name}}</td>
                                <td data-title="Email">{{$c->email}}</td>
                                <td data-title="Email">{{implode(',',$pool)}}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                            Action
                                            <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <a href="{{ url("admin/supplier/post/{$c->id}") }}"><i class="fa fa-eye"></i>View Post
                                                </a>
                                            </li>
                                            <li><a href="{{ route('warehouse.edit', $c->id) }}"><i class="fa fa-pencil"></i>Edit</a></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </section>
@endsection
