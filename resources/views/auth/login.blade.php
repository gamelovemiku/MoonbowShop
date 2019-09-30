@extends('layouts.app')

@section('content')
<section class="section" style="margin-bottom: 3em; margin-top: 4em;">
    <div class="container">
        <div class="columns">
            <div class="column is-half is-offset-one-quarter">
                <div class="box">
                    <div id="app">
                        <template>
                            <section>
                                <b-tabs type="is-boxed" v-model="activeTab" expanded>
                                    <b-tab-item label="เข้าสู่ระบบ" icon="login-variant">
                                        <h4 class="title is-size-4 has-text-weight-bold">เข้าสู่ระบบ</h4>
                                        <p class="subtitle is-size-7">มีบัญชีแล้วใช่ไหม เข้าใช้งานเลย</p>
                                        <form method="POST" action="{{ route('login') }}">
                                            @csrf

                                            <b-field label="อีเมล์"
                                                @error('email')
                                                    type="is-danger"
                                                    message="{{ $message }}"
                                                @enderror>
                                                <b-input v-model="email" type="email" v-model="email"
                                                    name="email">
                                                </b-input>
                                            </b-field>

                                            <b-field label="รหัสผ่าน">
                                                <b-input type="password"
                                                    name="password"
                                                    @error('password') message="{{ $message }}" @enderror
                                                    password-reveal>
                                                </b-input>
                                            </b-field>

                                            <hr>

                                            <div class="field">
                                                <b-checkbox v-model="isRemember" name="remember"
                                                    true-value="จำฉันไว้เสมอเมื่อเข้าใช้ครั้งหน้า"
                                                    false-value="ไม่จำฉันเมื่อเข้าสู่ระบบครั้งต่อไป">
                                                    @{{ isRemember }}
                                                </b-checkbox>
                                            </div>
                                            <div class="buttons">
                                                <button type="submit" class="button is-black">
                                                    เข้าสู่ระบบ
                                                </button>

                                                <a class="button" @click="activeTab = 1" outlined>สมัครสมาชิก</a>
                                                <a class="button is-text" @click="activeTab = 2" outlined>ลืมรหัสผ่านหรือเปล่า?</a>
                                            </div>
                                        </form>
                                    </b-tab-item>
                                    <b-tab-item label="สมัครสมาชิกใหม่" icon="account-plus">
                                        <div class="field">
                                            <h4 class="title is-size-4 has-text-weight-bold">สมัครสมาชิก</h4>
                                            <p class="subtitle is-size-7">กรอกข้อมูลเพียงไม่กี่ตัวก็เข้าใช้งานได้แล้ว</p>
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf

                                                <b-field label="ชื่อผู้ใช้งาน">
                                                    <b-input type="text"
                                                        name="name"
                                                        @error('name') message="{{ $message }}" @enderror>
                                                    </b-input>
                                                </b-field>

                                                <b-field label="อีเมล์">
                                                    <b-input type="email"
                                                        name="email"
                                                        v-model="email"
                                                        @error('email') message="{{ $message }}" @enderror>
                                                    </b-input>
                                                </b-field>

                                                <b-field label="รหัสผ่าน">
                                                    <b-input type="password"
                                                        name="password"
                                                        @error('password') message="{{ $message }}" @enderror
                                                        password-reveal>
                                                    </b-input>
                                                </b-field>

                                                <b-field label="ยืนยันรหัสผ่าน">
                                                    <b-input type="password"
                                                        name="password_confirmation"
                                                        @error('password') message="{{ $message }}" @enderror
                                                        >
                                                    </b-input>
                                                </b-field>

                                                <div class="field">
                                                    <div class="control">
                                                        <button type="submit" class="button is-black">
                                                            สมัครสมาชิก
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </b-tab-item>
                                    <b-tab-item label="ลืมรหัสผ่าน" icon="account-alert">
                                        <div class="field">
                                            <h4 class="title is-size-4 has-text-weight-bold">ลืมรหัสผ่าน</h4>
                                            <p class="subtitle is-size-7">กรอกข้อมูลเพียงไม่กี่ตัวก็เข้าใช้งานได้แล้ว</p>
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf

                                                <b-field label="อีเมล์">
                                                    <b-input v-model="email" type="email"
                                                        name="email"
                                                        @error('email') message="{{ $message }}" @enderror>
                                                    </b-input>
                                                </b-field>

                                                <div class="field">
                                                    <div class="control">
                                                        <button type="submit" class="button is-black">
                                                            @{{ 'ส่งรหัสผ่านใหม่ไปยัง ' + email }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </b-tab-item>
                                </b-tabs>
                            </section>
                        </template>
                    </div>

                    <script src="https://unpkg.com/vue"></script>
                    <script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>

                    <script>

                        new Vue({
                            el: '#app',

                            data: {
                                isRemember: "ไม่จำฉันเมื่อเข้าสู่ระบบครั้งต่อไป",
                                email: null,
                                resetemail: null,
                                activeTab: 0,
                            },
                        })

                    </script>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
