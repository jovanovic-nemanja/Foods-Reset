@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <form role="form" action="{{url('/')}}/producttags" name='user_form' id='user_form' method="post">
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
                                        <label for="InputTitle">Product Tag Name</label>
                                        <input type="text" required placeholder="Product Tag Name" id="name"
                                               name="product_tag_name" class="form-control" required
                                               value="{{old('product_tag_name')}}">
                                    </div>
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="InputTitle">Category</label>
                                        <select name="category_id" id="category_id" class="form-control" required>
                                            <option value="">Please Select</option>
                                            @foreach($category as $c)
                                                <option value="{{$c->id}}">{{$c->category_name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="InputTitle">Product Description</label>
                                        <textarea id="product_des" name="product_des" class="form-control"></textarea>
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
@endsection
