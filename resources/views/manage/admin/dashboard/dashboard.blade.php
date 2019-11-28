@extends('manage.admin.controlpanel')

@section('breadcrumb')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
        <li class="is-active"><a href="/manage/profile">Dashboard</a></li>
    </ul>
</nav>
@endsection


@section('content')

<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4">ภาพรวม</h4>
        <p class="subtitle is-size-7">ภาพรวมของส่วนต่างๆ ที่เกิดขึ้นบนระบบ<b class="force-bold"></b></p>
    </div>
</div>
    <div class="columns is-multiline has-text-right">
        <div class="column is-3">
            <div class="notification is-black" style="height: 100%; background-image: url('/storage/backend/background/dashboard_plain.png');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">ผู้เล่นที่ลงทะเบียน</h6>
                <h1 class="title is-1">{{ count($users) }}</h1>
            </div>
        </div>
        <div class="column is-3">
            <div class="notification is-primary" style="height: 100%; background-image: url('/storage/backend/background/dashboard_market.jpg');background-position: center; background-repeat: no-repeat; background-size: cover;">
                <h6 class="subtitle is-6 has-text-weight-bold">ไอเท็มที่ขายบนร้านค้า</h6>
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

    <div class="column is-12">
        <h6 class="title is-6 has-text-weight-bold">ภาพรวมทั่วไป</h6>

        <table class="table is-small is-narrow is-fullwidth">
            <tbody>
                <tr>
                    <td>รายรับ</td>
                    <td>฿{{ number_format($all_payment_amount, 2) }}</td>
                </tr>
                <tr>
                    <td>กระทู้บนบอร์ด</td>
                    <td>{{ 5 }}</td>
                </tr>
                <tr>
                    <td>ผู้เล่นกำลังเล่นอยู่</td>
                    <td>3/15 <small class="has-text-success">(ออนไลน์)</small></td>
                </tr>
                <tr>
                    <td>กระทู้บนบอร์ด</td>
                    <td>{{ 5 }}</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
