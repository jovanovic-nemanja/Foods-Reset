@extends('layouts.master')

@section('content')
    <section class="content">
        <form class="form-inline" action="{{url('/')}}/category/action" method="post" name="actions_form"
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
                                    <!--                            <option value="blocked">Block Selected Category</option>
                                                                <option value="active">Activate Selected Category</option>-->
                                    <option value="delete">Delete Selected Category</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="input-group">
                                <input type="text" class="form-control" name="search"
                                       value="{{isset($search)?$search:''}}" placeholder="Search Category"
                                       aria-describedby="basic-addon2">
                                <span class="input-group-btn">
                                <button type="submit" class="btn btn-default btn-flat">Find Category</button>
                            </span>
                            </div>

                        </div>

                        <div class="col-md-2">
                            <a href="{{url('/')}}/categories/create" class="btn btn-primary btn-flat">Add New
                                Category</a>
                        </div>
                        @if(isset($search))
                            <div class="col-md-2">
                                <a href="{{url('/')}}/categories" class="btn btn-info btn-flat">Show All Category</a>
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
                                <!-- <button id="checkall" class="btn-info">Toggle</button>-->
                                <input type="checkbox" id="checkall" class="check" value=""/>
                            </th>
                            <th>Name</th>
                            <th>Description</th>

                            <th>&nbsp;</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($category as $c)
                            <tr>
                                <td data-title="Select">
                                    <input type="checkbox" class="check" name="cid[]" value="{{$c->id}}"
                                           id="cid{{$c->id}}"/>
                                </td>

                                <td data-title="User Name">
                                    <a href="{{url('/')}}/categories/{{$c->id}}/edit" title="Edit">
                                        {{$c->category_name}}
                                    </a>
                                </td>
                                <td data-title="Email">{{$c->category_description}}</td>


                                <td>
                                    <a href="{{url('/')}}/categories/{{$c->id}}/edit" title="Edit"><i
                                                class="fa fa-pencil-square fa-lg"></i>&nbsp;Edit</a>

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {!! $category->render() !!}
                </div>
            </div>
        </form>
    </section>
@endsection
