@extends('layouts.master')

@section('content')
    <section class="content">
        <form class="form-inline" action="{{url('/')}}/producttag/action" method="post" name="actions_form"
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
                                    <option value="delete">Delete Selected Product Tag</option>
                                </select>
                            </div>
                            &nbsp;
                        </div>
                        <div class="col-md-4">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search"
                                       value="{{isset($search)?$search:''}}" placeholder="Search Product Tag"
                                       aria-describedby="basic-addon2">
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-default btn-flat">Find Product Tag</button>
                            </span>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <a href="{{url('/')}}/producttags/create" class="btn btn-primary btn-flat">Add New Product
                                Tag</a>
                        </div>
                        @if(isset($search))
                            <div class="col-md-2">
                                <a href="{{url('/')}}/producttags" class="btn btn-info btn-flat">Show All Product
                                    Tag</a>
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
                            <th>Tag Name</th>
                            <th>Category name</th>
                            <th>Description</th>
                            <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($product_tags as $c)
                            <tr>
                                <td data-title="Select">
                                    <input type="checkbox" class="check" name="cid[]" value="{{$c->id}}"
                                           id="cid{{$c->id}}"/>
                                </td>

                                <td data-title="User Name">
                                    <a href="{{url('/')}}/producttags/{{$c->id}}/edit" title="Edit">
                                        {{$c->product_name}}
                                    </a>
                                </td>
                                <td>{{isset($c->category->category_name)?$c->category->category_name:''}}</td>
                                <td>{{$c->product_description}}</td>
                                <td>
                                    <a href="{{url('/')}}/producttags/{{$c->id}}/edit" title="Edit"><i
                                                class="fa fa-pencil-square fa-lg"></i>&nbsp;Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $product_tags->render() !!}
                </div>
            </div>
        </form>
    </section>
@endsection
