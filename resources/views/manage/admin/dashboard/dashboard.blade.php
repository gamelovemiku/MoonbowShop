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
            <div class="notification is-black" style="height: 100%; background-image: url('https://i.imgur.com/KayKaQS.png');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">Registered Players</h6>
                <h1 class="title is-1">{{ count($users) }}</h1>
            </div>
        </div>
        <div class="column is-8">
            <div class="notification is-primary" style="height: 100%; background-image: url('https://i.ytimg.com/vi/Y-VManEEcEA/maxresdefault.jpg');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">Items on store</h6>
                <h1 class="title is-1">{{ count($items) }}</h1>
            </div>
        </div>
        <div class="column is-7">
            <div class="notification is-black" style="height: 100%; background-image: url('https://cdn.vox-cdn.com/thumbor/Sk3HT5ZhzRSgISdBGGm49dR947w=/0x0:2532x1333/920x613/filters:focal(1064x465:1468x869):format(webp)/cdn.vox-cdn.com/uploads/chorus_image/image/61584313/MinecraftDungeons.0.jpg');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">All Notices</h6>
                <h1 class="title is-1">{{ count($notices) }}</h1>
            </div>
        </div>
        <div class="column is-5">
            <div class="notification is-black" style="height: 100%; background-image: url('https://www.thesun.co.uk/wp-content/uploads/2019/06/da9fb8e9-de4b-4d7d-9829-d997f1c5ea20-2.jpg?strip=all&w=960');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">All Items Sold</h6>
            <h1 class="title is-1">{{ $all_sold_items }}</h1>
            </div>
        </div>
    </div>

    <h6 class="title is-6 has-text-weight-bold">Income / Actions</h6>

    <div class="columns is-multiline has-text-right">
        <div class="column is-8">
            <div class="notification is-black" style="height: 240px; background-image: url('https://www.thesun.co.uk/wp-content/uploads/2019/06/da9fb8e9-de4b-4d7d-9829-d997f1c5ea20-2.jpg?strip=all&w=960');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">All Times Income</h6>
                <p class="title is-1"><small class="is-size-6">Baht</small> {{ $all_payment_amount }}</p>
                <div class="subtitle is-7 has-text-weight-medium">
                    POWERED BY <b>OMISE.CO</b>
                </div>


            </div>
        </div>
        <div class="column is-4">
            <div class="notification is-primary" style="height: 100%; background-image: url('https://i.ytimg.com/vi/Y-VManEEcEA/maxresdefault.jpg');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">Items Sold</h6>
                <h1 class="title is-1">310</h1>
            </div>
        </div>
    </div>
@endsection
