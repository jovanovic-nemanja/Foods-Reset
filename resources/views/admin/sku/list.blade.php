@extends('layouts.master')

@section('content')
    <section class="content">
        <form class="form-inline" action="{{url('/')}}/sku/action" method="post" name="actions_form" id="actions_form">
            <div class="box box-danger">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            Actions
                            <div class="form-group">
                                <select id="bulk_action" name="bulk_action" class="form-control"
                                        placeholder="Select Action">
                                    <option value="">Select An Action</option>
                                    <option value="delete">Delete Selected Sku</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search"
                                       value="{{isset($search)?$search:''}}" placeholder="Search Sku"
                                       aria-describedby="basic-addon2">
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-default btn-flat">Find Sku</button>
                            </span>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <a href="{{url('/')}}/sku/create" class="btn btn-primary btn-flat">Add New Sku</a>
                        </div>
                        @if(isset($search))
                            <div class="col-md-2">
                                <a href="{{url('/')}}/sku" class="btn btn-info btn-flat">Show All Sku</a>
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
                            <th>Name</th>
                            <th>Satus</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($sku as $c)
                            <tr>
                                <td data-title="Select">
                                    <input type="checkbox" class="check" name="cid[]" value="{{$c->id}}"
                                           id="cid{{$c->id}}"/>
                                </td>
                                <td data-title="User Name">
                                    <a href="{{url('/')}}/sku/{{$c->id}}/edit" title="Edit">
                                        {{$c->sku}}
                                    </a>
                                </td>
                                <td>
                                    @if($c->is_use == 1)
                                        <span style="color:red;">Used</span>
                                    @else
                                        <span style="color:green;">Not Used</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{url('/')}}/sku/{{$c->id}}/edit" title="Edit">
                                        <i class="fa fa-pencil-square fa-lg"></i>&nbsp;Edit
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{ $sku->links() }}
            </div>
        </form>
    </section>
@endsection
