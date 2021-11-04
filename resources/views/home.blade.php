@extends('layouts.app')

@section('content')
<?php use Illuminate\Support\Facades\Auth;
    $role = 2;
    $role = Auth::user()->user_role;
    $role_name = "";
    if($role == 2)
    {
        $role_name = 'Buyer';
    }
    else if($role == 3)
    {
        $role_name = 'Supplier';
    }
    

?>
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are login as a {{$role_name}}!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
