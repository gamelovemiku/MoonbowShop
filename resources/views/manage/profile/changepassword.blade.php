@extends('manage.profilecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Profile</a></li>
        <li class="is-active"><a href="/manage/changepassword" aria-current="page">Change Password</a></li>
    </ul>
</nav>

<h4 class="title is-size-4 has-text-weight-bold">เปลี่ยนรหัสผ่าน</h4>
<p class="subtitle is-size-7">ตั้งค่ารหัสผ่านใหม่ด้วยตัวเอง<b class="force-bold"></b></p>
<form method="POST" action="{{ route('profile.store') }}">
    @csrf
    <div class="field">
        <div class="columns">
            <div class="column is-6" style="height: 100%">
                <div class="field">
                    <label for="password" class="label">รหัสผ่านใหม่</label>

                    <div class="control">
                        <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password">
                    </div>
                </div>
                <div class="field">
                    <label for="password" class="label">ยืนยันรหัสผ่านใหม่</label>

                    <div class="control">
                        <input id="password" type="password" class="input @error('password') is-danger @enderror" name="password_confirmation">

                        @error('password')
                        <div class="field">
                            <div class="control">
                                <span class="invalid-feedback" role="alert">
                                    <strong class="has-text-danger">{{ $message }}</strong>
                                </span>
                            </div>
                        </div>
                        @enderror
                    </div>
                </div>
                <div class="buttons">
                    <button type="submit" class="button is-black">
                        เปลี่ยนรหัสผ่าน
                    </button>
                </div>
            </div>
            <div class="column is-6">
                <div class="notification content">
                    <button class="delete"></button>
                    รหัสผ่านที่ดีควรจะมีมากกว่า 8 ตัวขึ้นไป
                    <ul>
                        <li>มีอัครพิเศษอย่างน้อย 1 ตัวหรือมากกว่า</li>
                        <li>มีตัวอักษรตัวพิมพ์ใหญ่ 1 ตัว</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
