@extends('layouts.master')

@section('content')
    <section class="content">
        <div class="row">
            <form role="form" action="{{url('/')}}/products/{{$product->id}}" name='user_form' id='user_form'
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
                                        <label for="InputTitle">Product Name</label>
                                        <input type="text" id="name" name="product_name" class="form-control required"
                                               value="{{$product->product_name}}">
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
                                                <option {{$product->category_id == $c->id?'selected="selected"':''}} value="{{$c->id}}">{{$c->category_name}} </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label for="InputTitle">Product Description</label>
                                        <textarea id="category_des" name="product_des"
                                                  class="form-control">{{$product->product_description}}</textarea>
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

<script>
    var tagtag = "{{$product->product_tags}}"
</script>
