@extends('layouts.master')

@section('content')

@section('css-file')
    <link href="{{ asset('css/choosen.css') }}?v={{time()}}" rel="stylesheet">
    <style>
        #instantbookingjt_chosen {
            width: 100% !important;
        }

        .chosen-container-multi .chosen-choices {
            border: 1px solid rgba(0, 0, 0, 0.15);
            border-radius: 0.25rem;
        }
    </style>
@endsection
<section class="content">
    <div class="box box-danger">
        <div class='clearfix'>&nbsp;</div>
        <div class='table-responsive'>
            <table class="table table-hover table-bordered pull-left table-striped table-condensed admin-user-table">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Company Name</th>
                    <th>Address</th>
                    <th>User Role</th>
                    <th>Pool</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $c)
					<?php
					$pool = array();
					$pool_ids = explode( ',', $c->pool );
					$pool = App\Models\Pool::whereIn( 'id', $pool_ids )->get()->pluck( 'pool_name' )->toArray();
					?>
                    <tr>
                        <td data-title="User Name">
                            <a href="{{url('/')}}/users/{{$c->id}}/edit" title="Edit">
                                {{$c->name}}
                            </a>
                        </td>
                        <td data-title="Email">{{$c->email}}</td>
                        <td data-title="Email">{{$c->company_name}}</td>
                        <td style='width: 30px;' data-title="Email">{{$c->address}}</td>
                        <td data-title="Email">
                            @if($c->user_role == 1)
                                {{'Admin'}}
                            @elseif($c->user_role == 2)
                                {{'Buyer'}}
                            @elseif($c->user_role == 3)
                                {{'Supplier'}}
                            @endif
                        </td>
                        <td data-title="Email">@if(count($pool) > 0) {{implode(',',$pool)}} @endif</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-info btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                                    Action
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="javascript:;" data-toggle="modal" data-target="#myModal_{{$c->id}}">
                                            <i class="fa fa-plus"></i>Add Pool
                                        </a>
                                    </li>
                                    <li><a href="{{ route('users.edit', $c->id) }}"><i class="fa fa-pencil"></i>Edit</a></li>
                                    <li><a href="{{"users/delete/{$c->id}"}}"><i class="fa fa-trash"></i>Delete</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $users->render() !!}
        </div>
    </div>
</section>
@foreach($users as $c)
    <div class="modal fade" id="myModal_{{$c->id}}">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add Update Pool</h4>
                </div>
                <form role="form" action="{{url('/')}}/admin/add/pool/{{$c->id}}" name='user_form' id='user_form'
                      method="post">
                    {{ csrf_field() }}
                    <div class="modal-body">
                        <div class='row'>
                            <div class="col-md-10">
                                <label class=""><b>Pool</b></label>
                                <select id="instantbookingjt" data-placeholder="Select one"
                                        class="input form-input chosen-select" name="pool_name[]" multiple>
                                    <option value="">Please Select</option>
									<?php $ser1 = explode( ',', $c->pool ); ?>
                                    @foreach($pools as $p)
                                        <option {{(in_array($p->id,$ser1))?'selected="selected"':''}} value="{{$p->id}}">{{$p->pool_name}} </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@endforeach
@section('js-file')
    <script src="{{ asset('js/chosen.jquery.js') }}?v={{time()}}" type="text/javascript"></script>
    <script type="text/javascript">
        var config = {
            '.chosen-select': {},
            '.chosen-select-deselect': {allow_single_deselect: true},
            '.chosen-select-no-single': {disable_search_threshold: 10},
            '.chosen-select-no-results': {no_results_text: 'Oops, nothing found!'},
            '.chosen-select-width': {width: "100% !important"}
        };
        for (var selector in config) {
            jQuery(selector).chosen(config[selector]);
        }
    </script>
@endsection
@endsection
