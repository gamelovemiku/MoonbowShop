@extends('manage.admin.controlpanel')

@section('breadcrumb')
<nav class="breadcrumb  is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
        <li class="is-active"><a href="{{ route('settings.index') }}">Settings</a></li>
    </ul>
</nav>
@endsection

@section('content')
<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4">ตั้งค่าทั่วไป</h4>
        <p class="subtitle is-size-7">ตั้งค่าเซิร์ฟเวอร์เกมสำหรับเน็ตเวิร์คหลายการเชื่อมต่อ<b class="force-bold"></b></p>
    </div>
    <div class="column is-6 has-text-right">
        <a class="button is-small is-white is-shadow" @click="isCardModalActive = true">
            <b-icon icon="account-plus" size="is-small"></b-icon>
            <span>เพิ่มเซิร์ฟเวอร์ใหม่</span>
        </a>
    </div>
</div>

<div id="settings">
    <b-tabs size="is-boxed" class="block">
        <b-tab-item label="ข้อมูลและรายละเอียด" icon="information-outline">
            <form action="{{ route('settings.store') }}" method="post">
                @csrf
                <div class="tile is-ancestor">
                    <div class="tile is-vertical is-6">
                        <div class="tile is-parent">
                            <article class="tile is-child">
                                <div class="">
                                    <div class="field">
                                        <label class="label">ชื่อของเว็บไซต์</label>
                                        <div class="control has-icons-left">
                                            <input class="input" type="text" name="website_name" value="{{ $settings->website_name }}">
                                            <span class="icon is-left">
                                                <i class="fas fa-server"></i>
                                            </span>
                                            @error('website_name')
                                                <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">รายละเอียดต่างๆ เกี่ยวกับเซิร์ฟเวอร์</label>
                                        <div class="control has-icons-left">
                                            <textarea class="textarea" rows="12" type="text" name="website_desc">{{ $settings->website_desc }}</textarea>
                                            @error('website_desc')
                                                <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="tile is-vertical is-6">
                        <div class="tile is-parent">
                            <article class="tile is-child">
                                <div class="">
                                    <div class="field">
                                        <label class="label">ชื่อของเว็บไซต์</label>
                                        <div class="control has-icons-left">
                                            <input class="input" type="text" name="website_name" value="{{ $settings->website_name }}">
                                            <span class="icon is-left">
                                                <i class="fas fa-server"></i>
                                            </span>
                                            @error('website_name')
                                                <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="field">
                                        <label class="label">รายละเอียดต่างๆ เกี่ยวกับเซิร์ฟเวอร์</label>
                                        <div class="control has-icons-left">
                                            <textarea class="textarea" rows="12" type="text" name="website_desc">{{ $settings->website_desc }}</textarea>
                                            @error('website_desc')
                                                <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
                <div class="field">
                    <p class="control has-icons-left">
                        <button id="submit_button" class="button is-fullwidth is-link is-outlined clickaction" type="submit">บันทึกการเปลี่ยนแปลง</button>
                    </p>
                </div>
            </form>
        </b-tab-item>
        <b-tab-item label="ธีมและสี" icon="television-guide">
            <div class="tile is-ancestor">
                <div class="tile is-vertical is-6">
                    <div class="tile is-parent">
                        <article class="tile is-child">
                            <div class="field">
                                <h4 class="title is-size-4">Navbar</h4>
                                <p class="subtitle is-6">แถบเมนู</p>

                                <b-field label="สีแถบเมนู" horizontal>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" name="website_name" value="{{ $settings->website_name }}">
                                        <span class="icon is-left">
                                            <i class="fas fa-hashtag"></i>
                                        </span>
                                    </div>
                                </b-field>

                                <hr>
                                <h4 class="title is-size-4">Background</h4>
                                <p class="subtitle is-6">ภาพพื้นหลัง</p>

                                <b-field label="สีแถบเมนู" horizontal>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" name="website_name" value="{{ $settings->website_name }}">
                                        <span class="icon is-left">
                                            <i class="fas fa-hashtag"></i>
                                        </span>
                                    </div>
                                </b-field>
                                <b-field label="สีแถบเมนู" horizontal>
                                    <div class="control has-icons-left">
                                        <input class="input" type="text" name="website_name" value="{{ $settings->website_name }}">
                                        <span class="icon is-left">
                                            <i class="fas fa-hashtag"></i>
                                        </span>
                                    </div>
                                </b-field>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </b-tab-item>
        <b-tab-item label="กำหนดเอง" icon="pencil">
            <b-field label="CSS">
                <div class="control has-icons-left">
                    <b-input rows="24" type="textarea"></b-input>
                    <span class="icon is-left">
                        <i class="fas fa-hashtag"></i>
                    </span>
                </div>
            </b-field>
        </b-tab-item>
    </b-tabs>
</div>
<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>

<script>

    new Vue({
        el: '#settings',

        data: {
            msg: 'ใช้ Hostname เดียวกัน',
            hostname: '{{ $settings->hostname }}',
        },
    })

</script>
@endsection
