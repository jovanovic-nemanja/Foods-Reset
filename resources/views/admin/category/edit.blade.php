@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <form role="form" action="{{url('/')}}/categories/{{$category->id}}" name='user_form' id='user_form'
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
                                        <label for="InputTitle">Category Name</label>
                                        <input type="text" placeholder="Category name" id="name" name="category_name"
                                               class="form-control required" value="{{$category->category_name}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="InputTitle">Category Description</label>
                                        <textarea id="category_des" name="category_des"
                                                  class="form-control">{{$category->category_description}}</textarea>
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
