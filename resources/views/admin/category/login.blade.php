@extends('layouts.frontendTemplate')

@section('content')
    <header role="mast-head" class="py-4">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 text-left">
                    <a href=""><img src="{{url('/')}}/public/img/logo.jpg" alt=""/></a>
                </div>
                <div class="col-sm-6 text-left align-self-center" style="font-size:12px;">
                    <form class="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" autocomplete="off" required class="form-control" name="email" placeholder="Jane Doe"/>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" autocomplete="off" required name="password" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="Password"/>
                            </div>
                            <div class="col-sm-12">
                                <label class="custom-control custom-checkbox mt-2 mb-0">
                                    <input type="checkbox" class="custom-control-input">
                                    <span class="custom-control-indicator"></span>
                                    <span class="custom-control-description">Stay signed in (Uncheck if you’re on a shared Computer)</span>
                                </label>
                                <p class="mb-0">
                                    <button type="submit" class="btn btn-blue">Sign in</button>
                                    <a href="{{url('/register')}}" class="btn btn-grey">Register</a>
                                </p>
                                <p class="forgetpass">I forget my <a href="">User ID</a> or <a href="">Password</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>
    <main role="main-wrapper">
        <section role="home-page" class="">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="select-holder text-center">
                            <select class="custom-select">
                                <option>Are you a Supply or Buyer?</option>
                            </select>
                            <select class="custom-select">
                                <option>Category or Product</option>
                            </select>
                            <button type="submit" class="btn btn-blue">Search</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Category/ Product</th>
                                <th>Expiry - Min Days remaining</th>
                                <th>Quantity</th>
                                <th> Price/Unit</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Chicken Legs</td>
                                <td>15</td>
                                <td>5,000 lbs</td>
                                <td>$2.50/ lb</td>
                            </tr>
                            <tr>
                                <td>Chicken Legs</td>
                                <td>15</td>
                                <td>5,000 lbs</td>
                                <td>$2.50/ lb</td>
                            </tr>
                            <tr>
                                <td>Chicken Legs</td>
                                <td>15</td>
                                <td>5,000 lbs</td>
                                <td>$2.50/ lb</td>
                            </tr>
                            <tr>
                                <td>Chicken Legs</td>
                                <td>15</td>
                                <td>5,000 lbs</td>
                                <td>$2.50/ lb</td>
                            </tr>
                            <tr>
                                <td>Chicken Legs</td>
                                <td>15</td>
                                <td>5,000 lbs</td>
                                <td>$2.50/ lb</td>
                            </tr>
                            <tr>
                                <td>Chicken Legs</td>
                                <td>15</td>
                                <td>5,000 lbs</td>
                                <td>$2.50/ lb</td>
                            </tr>
                            <tr>
                                <td>Chicken Legs</td>
                                <td>15</td>
                                <td>5,000 lbs</td>
                                <td>$2.50/ lb</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection