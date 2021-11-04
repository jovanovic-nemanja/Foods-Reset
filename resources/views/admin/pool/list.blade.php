@extends('layouts.master')

@section('content')
    <section class="content">
        <form class="form-inline" action="{{url('/')}}/pool/action" method="post" name="actions_form" id="actions_form">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            Actions
                            <div class="form-group">
                                <select id="bulk_action" name="bulk_action" class="form-control"
                                        placeholder="Select Action">
                                    <option value="">Select An Action</option>
                                    <option value="delete">Delete Selected Pool</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search"
                                       value="{{isset($search)?$search:''}}" placeholder="Search Pool"
                                       aria-describedby="basic-addon2">
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-default btn-flat">Find Pool</button>
                            </span>
                            </div>

                        </div>

                        <div class="col-md-2">
                            <a href="{{url('/')}}/pools/create" class="btn btn-primary btn-flat">Add New Pool</a>
                        </div>
                        @if(isset($search))
                            <div class="col-md-2">
                                <a href="{{url('/')}}/pools" class="btn btn-info btn-flat">Show All Pool</a>
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
                            <th>Pool Name</th>
                            <th>Pool Type</th>
                            <th>Distance</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($pool as $c)
                            <tr>
                                <td data-title="Select">
                                    <input type="checkbox" class="check" name="cid[]" value="{{$c->id}}"
                                           id="cid{{$c->id}}"/>
                                </td>

                                <td data-title="User Name">
                                    <a href="{{url('/')}}/pools/{{$c->id}}/edit" title="Edit">
                                        {{$c->pool_name}}
                                    </a>
                                </td>
                                <td data-title="Email">
                                    @if($c->pool_type == '1')
                                        Buyer Prefernce
                                    @elseif($c->pool_type == '2')
                                        KM
                                    @else
                                        Buyer Pool
                                    @endif
                                </td>
                                <td data-title="Email">
                                    @if($c->pool_type == '2')

                                        {{$c->distance}} KM
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('/')}}/pools/{{$c->id}}/edit" title="Edit">
                                        <i class="fa fa-pencil-square fa-lg"></i>&nbsp;Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $pool->links() }}
            </div>
        </form>
    </section>

@endsection
