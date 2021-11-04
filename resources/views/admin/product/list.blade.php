@extends('layouts.master')

@section('content')
    <section class="content">
        <form class="form-inline" action="{{url('/')}}/product/action" method="post" name="actions_form"
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
                                    <!--                            <option value="blocked">Block Selected Product</option>
                                                                <option value="active">Activate Selected Product</option>-->
                                    <option value="delete">Delete Selected Product</option>
                                </select>
                            </div>
                            &nbsp;
                        </div>
                        <div class="col-md-4">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search"
                                       value="{{isset($search)?$search:''}}" placeholder="Search Product"
                                       aria-describedby="basic-addon2">
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-default btn-flat">Find Product</button>
                                </span>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <a href="{{url('/')}}/products/create" class="btn btn-primary btn-flat">Add New Product</a>
                        </div>
                        @if(isset($search))
                            <div class="col-md-2">
                                <a href="{{url('/')}}/products" class="btn btn-info btn-flat">Show All Product</a>
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
                            <th>Category</th>
                            <th>Description</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product as $c)
                            <tr>
                                <td data-title="Select">
                                    <input type="checkbox" class="check" name="cid[]" value="{{$c->id}}"
                                           id="cid{{$c->id}}"/>
                                </td>

                                <td data-title="User Name">
                                    <a href="{{url('/')}}/products/{{$c->id}}/edit" title="Edit">
                                        {{$c->product_name}}
                                    </a>
                                </td>
                                <td data-title="Email">{{isset($c->category->category_name)?$c->category->category_name:''}}</td>
                                <td data-title="Email">{{$c->product_description}}</td>
                                <td>
                                    <a href="{{url('/')}}/products/{{$c->id}}/edit" title="Edit"><i
                                                class="fa fa-pencil-square fa-lg"></i>&nbsp;Edit</a>
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
