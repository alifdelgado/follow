@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center display-4">{{ $user->name }}</h1>
        </div>
        <div class="col-md-8 mx-auto">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="followers-tab" data-toggle="tab" href="#followers" role="tab" aria-controls="followers" aria-selected="true">Followers {{ $user->followers()->get()->count() }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="following-tab" data-toggle="tab" href="#following" role="tab" aria-controls="following" aria-selected="false">Following {{ $user->followings()->get()->count() }}</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="followers" role="tabpanel" aria-labelledby="followers-tab">
                    <div class="card-columns">
                        @include('users.cards-users', ['users' => $user->followers()->get()])
                    </div>
                </div>
                <div class="tab-pane fade" id="following" role="tabpanel" aria-labelledby="following-tab">
                    <div class="card-columns">
                        @include('users.cards-users', ['users' => $user->followings()->get()])
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop
