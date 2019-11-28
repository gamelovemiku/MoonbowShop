@extends('manage.profilecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li class="is-active"><a href="/manage/profile" aria-current="page">Profile</a></li>
    </ul>
</nav>

<h4 class="title is-size-4 has-text-weight-bold">โปรไฟล์</h4>
<p class="subtitle is-size-7">รายละเอียดโปรไฟล์สาธารณะของคุณ<b class="force-bold"></b></p>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="field">
        <div class="columns">
            <div class="column is-8">
                <table class="table is-fullwidth">
                    <tbody>
                        <tr>
                            <th>ชื่อผู้ใช้</th>
                            <th class="has-text-grey has-text-weight-light">{{$user->name}}</th>
                        </tr>
                        <tr>
                            <th>อีเมลที่ลงทะเบียน</th>
                            <th class="has-text-grey has-text-weight-light">{{$user->email}}</th>
                        </tr>
                        <tr>
                            <th>วันที่เข้าร่วม</th>
                            <th class="has-text-grey has-text-weight-light">@if($user->created_at == null) ไม่ทราบ @else {{$user->created_at}} @endif</th>
                        </tr>
                        <tr>
                            <th>พ้อยท์</th>
                            <th class="has-text-grey has-text-weight-light">{{$user->points_balance}}</th>
                        </tr>
                        <tr>
                            <th>ที่อยู่ไคลเอนท์</th>
                            <th class="has-text-grey has-text-weight-light">{{$user->ip}}</th>
                        </tr>
                        <tr>
                            <th>สถานะ</th>
                            <th class="has-text-grey has-text-weight-light">@if($user->isLogged == 1) <p class="has-text-success">กำลังเล่นอยู่</p> @else ไม่ได้เล่นอยู่ @endif</th>
                        </tr>
                    </tbody>
                </table>

                <label class="label">การจัดการบัญชี</label>
                <div class="buttons">
                    <a href="{{ route('profile.changepassword') }}" class="button is-info is-small is-outlined">เปลี่ยนรหัสผ่าน</a>
                    <a href="{{ route('profile.editprofile') }}" class="button is-primary is-small is-outlined">แก้ไขโปรไฟล์</a></a>
                </div>
            </div>
            <div class="column is-4">
                <div class="">
                    <figure class="image is-squared" style="width: 50%">
                        <img loading="lazy" src="/storage/avatar/{{  $user->profile_image_path }}" alt="Avatar">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
