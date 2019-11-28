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
            <p class="subtitle is-size-7">จัดการข้อมูลผู้เล่นที่อยู่บนระบบทั้งหมดรวมถึงผู้ดูแลระบบ<b class="force-bold"></b></p>
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
                        <b-table
                            class="has-text-weight-medium is-size-7"
                            type="is-small"

                            :data="data"
                            :paginated="true"
                            :per-page="15"

                            :pagination-simple="true"
                            :selected.sync="selected"
                            :mobile-cards="false">

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
                                    @{{ props.row.email }}
                                </b-table-column>

                                <b-table-column field="points_balance" label="พ้อยท์" width="50" sortable centered>
                                    @{{ props.row.points_balance }}
                                </b-table-column>

                                <b-table-column field="item_sold" label="สมัครเมื่อ" centered>
                                    @{{ props.row.created_at || "ไม่ทราบ" }}
                                </b-table-column>
                            </template>

                        </b-table>
                        <div class="has-text-weight-medium is-size-7" style="margin-top: -1.75rem" v-if="selected != null">

                            <b-tabs size="is-small" class="block">
                                <b-tab-item label="แก้ไข" icon="pencil-box-outline">

                                    <div class="level">
                                        <div class="level-left">
                                            <div>
                                                <h6 class="title is-size-6">แก้ไขข้อมูลของ @{{ selected.name }}</h6>
                                                <p class="subtitle is-size-7">ผลของการแก้ไขจะเปลี่ยนแปลงเมื่อกดปุ่มบันทึก<b class="force-bold"></b></p>
                                            </div>
                                        </div>
                                        <div class="level-right has-text-right">
                                            <form method="POST" action="{{ route('usereditor.internalDelete') }}">
                                                @csrf
                                                <input type="hidden" name="id" v-bind:value="selected.id">
                                                <button type="submit" class="button is-small is-outlined is-danger">ลบผู้ใช้ @{{ selected.name || "" }}</buttontype="hidden">
                                            </form>
                                        </div>
                                    </div>

                                    <section>

                                        <form method="POST" action="{{ route('usereditor.internalUpdate') }}" enctype="multipart/form-data">

                                            @csrf

                                            <input type="hidden" name="id" v-bind:value="selected.id">

                                            <b-field label="ชื่อผู้ใช้" horizontal>
                                                <b-input type="text" size="is-small" placeholder="ชื่อผู้ใช้" name="name" v-bind:value="selected.name"></b-input>
                                            </b-field>

                                            <b-field label="อีเมล" horizontal>
                                                <b-input type="text" size="is-small" placeholder="อีเมล" name="email" v-bind:value="selected.email"></b-input>
                                            </b-field>

                                            <b-field label="สิทธิ์" horizontal>
                                                <b-select placeholder="ระดับสิทธิ์การใช้งาน" size="is-small" name="role" v-model="selected.role_id" expanded>
                                                    @foreach ($rolelist as $key => $role)
                                                        <option value="{{ $role->role_id }}">{{ ucwords($role->role_name) }}</option>
                                                    @endforeach
                                                </b-select>
                                            </b-field>

                                            <b-field label="พ้อยท์" horizontal>
                                                <b-numberinput size="is-small" name="points_balance" v-bind:value="selected.points_balance"></b-numberinput>
                                            </b-field>

                                            <div class="buttons">
                                                <b-button type="is-primary" native-type="submit" size="is-small">แก้ไขข้อมูลของ @{{ selected.name || null }}</b-button>
                                            </div>

                                        </form>

                                    </section>
                                </b-tab-item>
                            </b-tabs>
                        </div>

                        <b-modal :active.sync="isCardModalActive" :width="720" scroll="keep">
                            <div class="box is-shadowless is-modal">
                                <div class="topic has-text-centered" style="padding: 1.75rem;">
                                    <h4 class="title">เพิ่มผู้ใช้ใหม่</h4>
                                    <p class="subtitle is-6">โหมดละเอียด</p>
                                </div>

                                <b-steps size="is-small">
                                    <b-step-item label="รายละเอียดผู้ใช้" icon="account">
                                        <div style="padding: 3rem 3rem;">
                                            <b-field label="ชื่อผู้ใช้">
                                                <b-input placeholder=""></b-input>
                                            </b-field>
                                            <b-field label="อีเมล">
                                                <b-input placeholder=""></b-input>
                                            </b-field>

                                            <b-field label="ภาพโปรไฟล์">
                                                <b-upload v-model="file">
                                                    <a class="button is-primary">
                                                        <b-icon icon="upload"></b-icon>
                                                        <span>Click to upload</span>
                                                    </a>
                                                </b-upload>
                                                <span class="file-name" v-if="file">
                                                    @{{ file.name }}
                                                </span>
                                            </b-field>

                                            <div class="buttons is-right">
                                                <b-button type="is-primary is-outlined">ต่อไป</b-button>
                                            </div>
                                        </div>
                                    </b-step-item>
                                    <b-step-item label="พ้อยท์และเงิน" icon="cash-usd">
                                        <div style="padding: 3rem 3rem;">
                                            <b-field label="พ้อยท์เริ่มต้น">
                                                <b-input placeholder=""></b-input>
                                            </b-field>
                                            <b-field label="เงินในเกมเริ่มต้น">
                                                <b-input placeholder=""></b-input>
                                            </b-field>

                                            <div class="buttons is-right">
                                                <b-button type="is-primary is-outlined">ต่อไป</b-button>
                                            </div>
                                        </div>
                                    </b-step-item>
                                    <b-step-item label="ตั้งค่าพิเศษ" icon="settings"></b-step-item>
                                    <b-step-item label="ตรวจสอบ" icon="check"></b-step-item>
                                </b-steps>
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
            roleIdToText: function(id) {
                switch(id) {
                    case 1:
                        return 'ผู้ดูแล'
                    case 2:
                        return 'ผู้เล่นทั่วไป'
                    default:
                        return 'ไม่ทราบ'
                }
            },
            cardModal() {
                this.$buefy.modal.open({
                    parent: this,
                    component: ModalForm,
                    hasModalCard: true,
                    customClass: 'custom-class custom-class-2'
                })
            },
        },
        computed: {

        },
        data() {
            return {
                data,
                selected: data[-1],
                columns: [
                    {
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
            }
        }
    })

</script>
@endsection
