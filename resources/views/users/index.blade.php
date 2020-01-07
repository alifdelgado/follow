@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center display-4">Users</h1>
        </div>
        <div class="col-md-8 mx-auto">
            <div class="card-columns">
                @include('users.cards-users', ['users' => $users])
            </div>
        </div>
    </div>
</div>
@stop
