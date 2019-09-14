@extends('manage.admin.controlpanel')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
        <li class="is-active"><a href="/manage/profile">Dashboard</a></li>
    </ul>
</nav>

<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 force-bold">Dashboard</h4>
        <p class="subtitle is-size-7">Send game commands directly to the server<b class="force-bold"></b></p>
    </div>
</div>

    <h6 class="title is-6 has-text-weight-bold">Overviews</h6>
    <div class="columns is-multiline has-text-right">
        <div class="column is-4">
            <div class="notification is-black" style="height: 100%; background-image: url('/storage/backend/background/dashboard_plain.png');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">Registered Players</h6>
                <h1 class="title is-1">{{ count($users) }}</h1>
            </div>
        </div>
        <div class="column is-8">
            <div class="notification is-primary" style="height: 100%; background-image: url('/storage/backend/background/dashboard_market.jpg');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">Items on store</h6>
                <h1 class="title is-1">{{ count($items) }}</h1>
            </div>
        </div>
        <div class="column is-7">
            <div class="notification is-black" style="height: 100%; background-image: url('/storage/backend/background/dashboard_dungeons.jpg');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">All Notices</h6>
                <h1 class="title is-1">{{ count($notices) }}</h1>
            </div>
        </div>
        <div class="column is-5">
            <div class="notification is-black" style="height: 100%; background-image: url('/storage/backend/background/dashboard_dungeons_gate.png');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">All Items Sold</h6>
                <p class="title is-1"> {{ $all_sold_items }}</p>
            </div>
        </div>
    </div>

    <h6 class="title is-6 has-text-weight-bold">Income / Actions</h6>

    <div class="columns is-multiline has-text-right">
        <div class="column is-8">
            <div class="notification is-black" style="height: 240px; background-image: url('/storage/backend/background/dashboard_dungeons_gate.png');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">All Times Income</h6>
                <p class="title is-1"><small class="is-size-6 has-text-weight-medium">฿</small> {{ number_format($all_payment_amount, 2) }}</p>
                <div class="subtitle is-7 has-text-weight-medium">
                    POWERED BY <b>OMISE.CO</b>
                </div>


            </div>
        </div>
        <div class="column is-4">
            <div class="notification is-primary" style="height: 240px; background-image: url('/storage/backend/background/dashboard_market.jpg');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">Forum Posts</h6>
                <h1 class="title is-1">{{ 5 }}</h1>
            </div>
        </div>
    </div>
@endsection
