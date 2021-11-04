@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <form role="form" action="{{url('/')}}/preference/{{$preference->id}}" name='user_form' id='user_form'
                  method="post">
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
                                        <label for="InputTitle">Preference Name</label>
                                        <input type="text" id="name" name="preference" class="form-control required"
                                               value="{{$preference->name}}">
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
@endsection


