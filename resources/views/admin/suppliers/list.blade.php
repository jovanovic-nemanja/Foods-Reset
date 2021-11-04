@extends('layouts.master')

@section('content')
    <section class="content">
        <form class="form-inline" action="{{url('/')}}/users/action" method="post" name="actions_form"
              id="actions_form">
            <div class="box box-danger">


            <!--    <div class="box-body">
         <div class="row">

             <div class="col-md-4">
                     Actions
                     <div class="form-group">
                        <select id="bulk_action" name="bulk_action" class="form-control" placeholder="Select Action"  >
                            <option value="">Select An Action</option>
                            <option value="blocked">Block Selected User</option>
                            <option value="active">Activate Selected User</option>
                            <option value="delete">Delete Selected User</option>
                        </select>
                     </div>

             </div>


                <div class="col-md-4">

                        <input type="hidden" name="_token" value="{{csrf_token()}}">


                        <div class="input-group">
                            <input type="text" class="form-control"  name="search" value="{{isset($search)?$search:''}}" placeholder="Search User" aria-describedby="basic-addon2">
                            <span class="input-group-btn">
                                <button type="submit" class="btn btn-default btn-flat">Find User</button>
                            </span>
                        </div>

                </div>

                <div class="col-md-2">
                    <a href="{{url('/')}}/users/create" class="btn btn-primary btn-flat">Add New User</a>
                </div>
             @if(isset($search))
                <div class="col-md-2">
                    <a href="{{url('/')}}/users" class="btn btn-info btn-flat">Show All User</a>
                </div>  
                 @endif
                    </div>
            </div>    -->

                <div class='clearfix'>&nbsp;</div>


                <div class='table-responsive'>
                    <table class="table table-hover table-bordered pull-left table-striped table-condensed admin-user-table">
                        <thead>
                        <tr>
                            <!--            <th>Id</th>-->
                            <th>First Name</th>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Address</th>
                            <th>Contact Number</th>
                            <th>Action</th>


                        </tr>
                        </thead>
                        <tbody>
                        @foreach($suppliers as $ta)
                            <tr>
                            <!--                        <td>{{$ta->id}}</td>-->
                                <td>
                                    <a href="{{url('/')}}/admin/supplier/post/{{$ta->id}}">
                                        {{$ta->name}}
                                    </a>
                                </td>
                                <td>{{$ta->company_name}}</td>
                                <td>{{$ta->email}}</td>
                                <td>{{$ta->address}}</td>
                                <td>{{$ta->mobile}}</td>
                                <td><a href="{{url('/')}}/admin/supplier/post/{{$ta->id}}">View Post</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </form>
    </section>
@endsection
