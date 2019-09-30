@extends('manage.admin.controlpanel')

@section('breadcrumb')
<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
        <li class="is-active"><a href="/manage/profile">ภาพรวม</a></li>
    </ul>
</nav>
@endsection

@section('content')

<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 force-bold">ภาพรวม</h4>
        <p class="subtitle is-size-7">ข้อมูลโดยรวมของส่วนต่างๆ ของระบบ<b class="force-bold"></b></p>
    </div>
</div>
    <div class="columns is-multiline has-text-right">
        <div class="column is-3">
            <div class="notification is-black" style="height: 100%; background-image: url('/storage/backend/background/dashboard_plain.png');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">ผู้เล่นที่สมัครสมาชิกแล้ว</h6>
                <h1 class="title is-1">{{ count($users) }}</h1>
            </div>
        </div>
        <div class="column is-3">
            <div class="notification is-primary" style="height: 100%; background-image: url('/storage/backend/background/dashboard_market.jpg');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">ไอเท็มบนร้านค้า</h6>
                <h1 class="title is-1">{{ count($items) }}</h1>
            </div>
        </div>
        <div class="column is-3">
            <div class="notification is-black" style="height: 100%; background-image: url('/storage/backend/background/dashboard_dungeons.jpg');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">ประกาศทั้งหมด</h6>
                <h1 class="title is-1">{{ count($notices) }}</h1>
            </div>
        </div>
        <div class="column is-3">
            <div class="notification is-black" style="height: 100%; background-image: url('/storage/backend/background/dashboard_dungeons_gate.png');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">ไอเท็มที่ขายไปแล้ว</h6>
                <p class="title is-1"> {{ $all_sold_items }}</p>
            </div>
        </div>
    </div>

    <hr>

    <h4 class="title is-size-4 force-bold">การกระทำต่างๆ และอื่นๆ</h4>

    <div class="columns is-multiline has-text-right">
        <div class="column is-12">

            <table class="table is-fullwidth">
                <thead>
                    <tr>
                        <th>ชื่อข้อมูล</th>
                        <th>ผลลัพท์</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>รายได้ทั้งหมด</th>
                        <th>฿ {{ number_format($all_payment_amount, 2) }}</th>
                    </tr>
                    <tr>
                        <th>โพสต์ทั้งหมดบนเว็บบอร์ด</th>
                        <th>{{ 2 }}</th>
                    </tr>
                    <tr>
                        <th>สถานะเซิร์ฟเวอร์ - <small>playmc.gamelovemiku.com</small></th>
                        <th class="has-text-success">ออนไลน์ <small class="has-text-dark">(3/5)</small></th>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
