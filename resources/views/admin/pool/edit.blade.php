@extends('layouts.master')

@section('content')


    <!-- Main content -->
    <section class="content">

        <div class="row">
            <form role="form" action="{{url('/')}}/pools/{{$pool->id}}" name='user_form' id='user_form' method="post">
                {{ csrf_field() }}
                <input type="hidden" name="_method" value="put">

                <div class="col-md-6">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">General</h3>
                        </div><!-- /.box-header -->

                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="InputTitle">Pool Name</label>
                                        <input type="text" placeholder="Pool name" id="name" name="pool_name"
                                               class="form-control required" value="{{$pool->pool_name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="InputTitle">Pool Type</label>
                                        <select name="pool_type" id="pool_type" class="form-control" required>
                                            <option {{$pool->pool_type == '1'?'selected="selected"':''}} value="1">Buyer
                                                Prefernce
                                            </option>
                                            <option {{$pool->pool_type == '2'?'selected="selected"':''}} value="2">KM
                                            </option>
                                            <option {{$pool->pool_type == '3'?'selected="selected"':''}} value="3">Buyer
                                                Pool
                                            </option>


                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row km_div" style="display: @if($pool->pool_type != '2') none; @endif ">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="InputTitle">Distance</label>

                                        <div class="input-group">
                                            <input type="text" class="form-control intnum" placeholder="1,000"
                                                   name="distance" value="{{$pool->distance}}">
                                            <span class="input-group-addon" id="basic-addon2">
                                               KM
                                             </span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>

@section('js-file')
    <script>
        $(document).ready(function () {


            $("#pool_type").change(function () {
                var p = $(this).val();
                if (p == '2') {
                    $(".km_div").show();
                }
                else {
                    $(".km_div").hide();
                }
            });

        });

    </script>
@endsection

@endsection
