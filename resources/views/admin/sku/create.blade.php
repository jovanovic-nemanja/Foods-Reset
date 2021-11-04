@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <form role="form" action="{{url('/')}}/sku" name='user_form' id='user_form' method="post">
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
                                        <label for="InputTitle">Sku Name</label>
                                        <input type="text" required placeholder="Sku name" id="name" name="sku"
                                               class="form-control required" value="{{old('name')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row"></div>
                        </div><!-- /.box-body -->
                        <div class="box-footer">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
