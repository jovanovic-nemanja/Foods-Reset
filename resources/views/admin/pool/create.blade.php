@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <form role="form" action="{{url('/')}}/pools" name='user_form' id='user_form' method="post">
                {{ csrf_field() }}

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
                                        <input type="text" placeholder="Name" id="name" name="pool_name"
                                               class="form-control required" value="{{old('name')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="InputTitle">Pool Type</label>
                                        <select name="pool_type" id="pool_type" class="form-control" required>
                                            <option value="1">Buyer Prefernce</option>
                                            <option value="2">KM</option>
                                            <option value="3">Buyer Pool</option>


                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row km_div" style="display: none;">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="InputTitle">Distance</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control intnum" placeholder="1,000"
                                                   name="distance" value="">
                                            <span class="input-group-addon" id="basic-addon2">
                                               KM
                                             </span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
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
