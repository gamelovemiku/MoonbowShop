@extends('manage.admin.controlpanel')

@section('breadcrumb')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
        <li class="is-active"><a href="/manage/user">User</a></li>
    </ul>
</nav>

@endsection

@section('content')

<div id="itemshop">
    <div class="columns">
        <div class="column is-6">
            <h4 class="title is-size-4">ตัวจัดการผู้ใช้</h4>
            <p class="subtitle is-size-7">จัดการข้อมูลผู้เล่นที่อยู่บนระบบทั้งหมดรวมถึงผู้ดูแลระบบ<b
                    class="force-bold"></b></p>
        </div>
        <div class="column is-6 has-text-right">
            <a class="button is-small is-white is-shadow" @click="isCardModalActive = true">
                <b-icon icon="account-plus" size="is-small"></b-icon>
                <span>เพิ่มผู้เล่นใหม่ (โหมดละเอียด)</span>
            </a>
        </div>
    </div>

    <div class="field">
        <div class="columns">
            <div class="column is-12" style="height: 100%">
                <template>
                    <section>
                        <b-table class="has-text-weight-medium is-size-7" type="is-small" :data="data" :paginated="true"
                            :per-page="15" :pagination-simple="true" :selected.sync="selected" :mobile-cards="false">

                            <template slot-scope="props">
                                <b-table-column field="id" label="เลขอ้างอิง" width="90" sortable centered>
                                    @{{ props.row.id }}
                                </b-table-column>

                                <b-table-column field="role_id" label="สิทธิ์" width="90" sortable>
                                    @{{ roleIdToText(props.row.role_id) }}
                                </b-table-column>

                                <b-table-column field="name" label="ชื่อผู้ใช้">
                                    @{{ props.row.name }}
                                </b-table-column>

                                <b-table-column field="email" label="อีเมล">
                                    @{{ props.row.email || "ยังไม่ลงทะเบียน" }}
                                </b-table-column>

                                <b-table-column field="points_balance" label="พ้อยท์" width="50" sortable centered>
                                    @{{ props.row.points_balance }}
                                </b-table-column>

                                <b-table-column field="item_sold" label="สมัครเมื่อ" centered>
                                    @{{ props.row.created_at || "ไม่ทราบ" }}
                                </b-table-column>
                            </template>

                        </b-table>
                        <div class="has-text-weight-medium is-size-7" style="margin-top: -1.75rem"
                            v-if="selected != null">

                            <b-tabs size="is-small" class="block">
                                <b-tab-item label="แก้ไข" icon="pencil-box-outline">

                                    <div class="level">
                                        <div class="level-left">
                                            <div>
                                                <h6 class="title is-size-6">แก้ไขข้อมูลของ @{{ selected.name }}</h6>
                                                <p class="subtitle is-size-7">
                                                    ผลของการแก้ไขจะเปลี่ยนแปลงเมื่อกดปุ่มบันทึก<b
                                                        class="force-bold"></b></p>
                                            </div>
                                        </div>
                                        <div class="level-right has-text-right">
                                            <form method="POST" action="{{ route('usereditor.internalDelete') }}">
                                                @csrf
                                                <input type="hidden" name="id" v-bind:value="selected.id">
                                                <button type="submit"
                                                    class="button is-small is-outlined is-danger">ลบผู้ใช้
                                                    @{{ selected.name || "" }}</buttontype="hidden">
                                            </form>
                                        </div>
                                    </div>

                                    <section>

                                        <form method="POST" action="{{ route('usereditor.internalUpdate') }}"
                                            enctype="multipart/form-data">

                                            @csrf

                                            <input type="hidden" name="id" v-bind:value="selected.id">

                                            <b-field label="ชื่อผู้ใช้" horizontal>
                                                <b-input type="text" size="is-small" placeholder="ชื่อผู้ใช้"
                                                    name="name" v-bind:value="selected.name"></b-input>
                                            </b-field>

                                            <b-field label="อีเมล" horizontal>
                                                <b-input type="text" size="is-small" placeholder="อีเมล" name="email"
                                                    v-bind:value="selected.email"></b-input>
                                            </b-field>

                                            <b-field label="สิทธิ์" horizontal>
                                                <b-select placeholder="ระดับสิทธิ์การใช้งาน" size="is-small" name="role"
                                                    v-model.number="selected.role_id" expanded>
                                                    @foreach ($rolelist as $key => $role)
                                                    <option value="{{ $role->role_id }}">{{ ucwords($role->role_name) }}
                                                    </option>
                                                    @endforeach
                                                </b-select>
                                            </b-field>

                                            <b-field label="พ้อยท์" horizontal>
                                                <b-numberinput size="is-small" name="points_balance"
                                                    v-bind:value="selected.points_balance"></b-numberinput>
                                            </b-field>

                                            <div class="buttons">
                                                <b-button type="is-primary" native-type="submit" size="is-small">
                                                    แก้ไขข้อมูลของ @{{ selected.name || null }}</b-button>
                                            </div>

                                        </form>

                                    </section>
                                </b-tab-item>
                            </b-tabs>
                        </div>

                        <b-modal :active.sync="isCardModalActive" :width="480" scroll="keep">
                            <div class="box is-shadowless is-modal">
                                <div class="topic has-text-centered" style="padding: 1.75rem;">
                                    <h4 class="title">เพิ่มผู้ใช้ใหม่</h4>
                                    <p class="subtitle is-6">โหมดละเอียด</p>
                                </div>

                                <form method="post" action="{{ route('usereditor.store') }}">

                                    @csrf

                                    <b-steps size="is-small" v-model="activePage" :has-navigation="false">

                                        <b-step-item label="รายละเอียดผู้ใช้" icon="account">
                                            <div style="padding: 3rem 3rem;">
                                                <b-field label="ชื่อผู้ใช้">
                                                    <b-input v-model="newuser.name" type="text" name="name"></b-input>
                                                </b-field>
                                                <b-field label="อีเมล">
                                                    <b-input v-model="newuser.email" type="email" name="email">
                                                    </b-input>
                                                </b-field>


                                                <b-field label="สิทธิ์">
                                                    <b-select v-model.number="newuser.role"
                                                        placeholder="ระดับสิทธิ์การใช้งาน" name="role" expanded>
                                                        @foreach ($rolelist as $key => $role)
                                                        <option value="{{ $role->role_id }}">
                                                            {{ ucwords($role->role_name) }}</option>
                                                        @endforeach
                                                    </b-select>
                                                </b-field>

                                                {{-- <b-field label="ภาพโปรไฟล์">
                                                    <b-upload v-model="file">
                                                        <a class="button is-primary">
                                                            <b-icon icon="upload"></b-icon>
                                                            <span>อัพโหลด</span>
                                                        </a>
                                                    </b-upload>
                                                    <span class="file-name" v-if="file">
                                                        @{{ file.name }}
                                                </span>
                                                </b-field> --}}

                                                <div class="level" style="margin-top: 3rem">
                                                    <div class="level-left">
                                                        <div class="buttons is-left">
                                                            <b-button type="is-primary is-outlined" disabled
                                                                @click="activePage--">กลับ</b-button>
                                                        </div>
                                                    </div>
                                                    <div class="level-right">
                                                        <div class="buttons is-right">
                                                            <b-button type="is-primary is-outlined"
                                                                icon-right="arrow-right-bold" @click="activePage++">
                                                                ต่อไป</b-button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </b-step-item>

                                        <b-step-item label="ตัวสร้างรหัสผ่าน" icon="shield-lock">
                                            <div style="padding: 3rem 3rem;">

                                                <b-field label="รหัสผ่าน">
                                                    <b-input v-model="newuser.password" name="password"></b-input>
                                                </b-field>

                                                <b-button type="is-primary is-outlined is-fullwidth" icon-left="key"
                                                    @click="generateRandomPassword()">สุ่มรหัสผ่าน</b-button>

                                                <div class="level" style="margin-top: 3rem">
                                                    <div class="level-left">
                                                        <div class="buttons is-left">
                                                            <b-button type="is-primary is-outlined"
                                                                icon-left="arrow-left-bold" @click="activePage--">กลับ
                                                            </b-button>
                                                        </div>
                                                    </div>
                                                    <div class="level-right">
                                                        <div class="buttons is-right">
                                                            <b-button type="is-primary is-outlined"
                                                                icon-right="arrow-right-bold" @click="activePage++">
                                                                ต่อไป</b-button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                        </b-step-item>

                                        <b-step-item label="พ้อยท์และเงิน" icon="cash-usd">
                                            <div style="padding: 3rem 3rem;">

                                                <b-field label="พ้อยท์เริ่มต้น">
                                                    <b-input v-model="newuser.point" type="number" name="points">
                                                    </b-input>
                                                </b-field>

                                                <div class="level" style="margin-top: 3rem">
                                                    <div class="level-left">
                                                        <div class="buttons is-left">
                                                            <b-button type="is-primary is-outlined"
                                                                icon-left="arrow-left-bold" @click="activePage--">กลับ
                                                            </b-button>
                                                        </div>
                                                    </div>
                                                    <div class="level-right">
                                                        <div class="buttons is-right">
                                                            <b-button type="is-primary is-outlined"
                                                                icon-right="arrow-right-bold" @click="activePage++">
                                                                ต่อไป</b-button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </b-step-item>

                                        <b-step-item label="ตรวจสอบ" icon="check">

                                            <div class="box overview">

                                                <h4 class="title is-4">ตรวจสอบข้อมูล</h4>
                                                <p class="subtitle is-6">ข้อมูลดังต่อไปนี้จะถูกเพิ่มเข้าสู่ระบบ</p>

                                                <table class="table is-bordered is-fullwidth">
                                                    <tbody>
                                                        <tr>
                                                            <td>ชื่อผู้ใช้</td>
                                                            <td>
                                                                @{{ newuser.name || "ยังไม่ระบุ"}}
                                                                <a class="is-size-7 is-text has-text-danger"
                                                                    v-if="newuser.name == null"
                                                                    @click="activePage = 0">กลับไปแก้ไข</a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>อีเมล</td>
                                                            <td>
                                                                @{{ newuser.email || "ยังไม่ระบุ"}}
                                                                <a class="is-size-7 is-text has-text-danger"
                                                                    v-if="newuser.email == null"
                                                                    @click="activePage = 0">กลับไปแก้ไข</a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>รหัสผ่าน</td>
                                                            <td>
                                                                @{{ newuser.password || "ยังไม่ระบุ"}}
                                                                <a class="is-size-7 is-text has-text-danger"
                                                                    v-if="newuser.password == null"
                                                                    @click="activePage = 1">กลับไปแก้ไข</a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>สิทธิ์</td>
                                                            <td>
                                                                @{{ showRoleInText || "ยังไม่ระบุ"}}
                                                                <a class="is-size-7 is-text has-text-danger"
                                                                    v-if="newuser.role == null"
                                                                    @click="activePage = 0">กลับไปแก้ไข</a>
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td>พ้อยเริ่มต้น</td>
                                                            <td>
                                                                @{{ newuser.point }}
                                                                <a class="is-size-7 is-text has-text-danger"
                                                                    v-if="newuser.point == null"
                                                                    @click="activePage = 2">กลับไปแก้ไข</a>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>

                                            </div>

                                            <div class="buttons">
                                                <b-button native-type="submit"
                                                    type="is-primary is-outlined is-fullwidth"
                                                    icon-left="account-check">สร้างผู้ใช้ @{{ newuser.name }}</b-button>
                                                <b-button type="is-primary is-outlined is-fullwidth"
                                                    icon-left="arrow-left-bold" @click="activePage--">กลับ</b-button>
                                            </div>

                                        </b-step-item>
                                    </b-steps>
                                </form>
                            </div>
                        </b-modal>

                    </section>
                </template>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>

<script>
    new Vue({
        el: '#itemshop',
        methods: {
            roleIdToText: function (id) {
                switch (id) {
                    case 1:
                        return 'ผู้ดูแล'
                    case 2:
                        return 'ผู้เล่นทั่วไป'
                    default:
                        return 'มีการแก้ไข'
                }
            },
            cardModal() {
                this.$buefy.modal.open({
                    parent: this,
                    component: ModalForm,
                    hasModalCard: true,
                })
            },
            generateRandomPassword() {
                let password = ""
                let chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!@#$%^&*()_+/\|{}<>?"

                for (let i = 0; i < 8; i++) {
                    password += chars.charAt(Math.floor(Math.random() * chars.length))
                }

                this.newuser.password = password
            },
        },
        computed: {
            showRoleInText: function () {
                switch (this.newuser.role) {
                    case 1:
                        return 'ผู้ดูแล'
                    case 2:
                        return 'ผู้เล่นทั่วไป'
                    default:
                        return 'ยังไม่ได้เลือก'
                }
            },
        },
        data() {
            return {
                data,
                selected: data[-1],
                columns: [{
                        field: 'item_id',
                        label: 'เลขอ้างอิง',
                    },
                    {
                        field: 'item_name',
                        label: 'ชื่อไอเท็ม',
                    },
                    {
                        field: 'item_desc',
                        label: 'รายละเอียดโดยย่อ',
                    },
                    {
                        field: 'item_price',
                        label: 'ราคา',
                    },
                    {
                        field: 'item_sold',
                        label: 'ขายไปแล้ว',
                        centered: true
                    }
                ],
                name: null,
                price: 0,
                isImageModalActive: false,
                isCardModalActive: false,
                activePage: 0,
                newuser: {
                    name: null,
                    email: null,
                    password: null,
                    role: null,
                    point: 0,
                }
            }
        }
    })

</script>
@endsection
