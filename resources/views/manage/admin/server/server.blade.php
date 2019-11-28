@extends('manage.admin.controlpanel')

@section('breadcrumb')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="{{ route('profile.index') }}">{{ Auth::user()->name }}</a></li>
        <li><a href="{{ route('admin.controlpanel') }}">Admin</a></li>
        <li class="is-active"><a aria-current="page">Itemshop</a></li>
    </ul>
</nav>
@endsection

@section('content')

<div id="itemshop">
    <div class="columns">
        <div class="column is-6">
            <h4 class="title is-size-4">เซิร์ฟเวอร์เกม</h4>
            <p class="subtitle is-size-7">ตั้งค่าเซิร์ฟเวอร์เกมสำหรับเน็ตเวิร์คหลายการเชื่อมต่อ<b class="force-bold"></b></p>
        </div>
        <div class="column is-6 has-text-right">
            <a class="button is-small is-white is-shadow" @click="isCardModalActive = true">
                <b-icon icon="gift" size="is-small"></b-icon>
                <span>เพิ่มเซิร์ฟเวอร์ใหม่</span>
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
                            :per-page="5"

                            :pagination-simple="true"
                            :selected.sync="selected"
                            :mobile-cards="false">

                            <template slot-scope="props">
                                <b-table-column field="server_id" label="เลขอ้างอิง" width="80" sortable centered>
                                    @{{ props.row.server_id }}
                                </b-table-column>

                                <b-table-column field="server_name" label="ชื่อเซิร์ฟเวอร์">
                                    @{{ props.row.server_name }}
                                </b-table-column>

                                <b-table-column field="hostname" label="ที่อยู่เซิร์ฟเวอร์">
                                    @{{ props.row.hostname }}
                                </b-table-column>

                                <b-table-column field="hostname_port" label="พอร์ท" centered>
                                    @{{ props.row.hostname_port }}
                                </b-table-column>

                                <b-table-column field="hostname_query_port" label="พอร์ทคิวรี่" centered>
                                    @{{ props.row.hostname_query_port }}
                                </b-table-column>

                                <b-table-column field="rcon_port" label="พอร์ทส่งคำสั่งหลัก" centered>
                                    @{{ props.row.rcon_port }}
                                </b-table-column>

                                <b-table-column field="websender_port" label="พอร์ทเว็บเซ็นเดอร์" centered>
                                    @{{ props.row.websender_port }}
                                </b-table-column>

                                <b-table-column field="status" label="สถานะเซิร์ฟเวอร์" centered>
                                    ออนไลน์
                                </b-table-column>

                            </template>

                        </b-table>
                        <div class="has-text-weight-medium is-size-7" style="margin-top: -1.75rem" v-if="selected != null">
                            <b-tabs size="is-small" class="block">
                                <b-tab-item label="แก้ไข" icon="pencil-box-outline">

                                    <div class="level">
                                        <div class="level-left">
                                            <div>
                                                <h6 class="title is-size-6">แก้ไขเซิร์ฟเวอร์ @{{ selected.server_name }}</h6>
                                                <p class="subtitle is-size-7">ผลของการแก้ไขจะเปลี่ยนแปลงเมื่อกดปุ่มบันทึก<b class="force-bold"></b></p>
                                            </div>
                                        </div>
                                        <div class="level-right has-text-right">
                                            <form method="POST" action="{{ route('redeem.internalDelete') }}">
                                                @csrf
                                                <input type="hidden" name="id" v-bind:value="selected.redeem_id">
                                                <button type="submit" class="button is-small is-outlined is-danger">ลบเซิร์ฟเวอร์ @{{ selected.server_name || "" }}</buttontype="hidden">
                                            </form>
                                        </div>
                                    </div>

                                    <section>
                                        <form method="POST" action="{{ route('itemshop.internalUpdate') }}" enctype="multipart/form-data">

                                            @csrf
                                            <div class="columns">
                                                <div class="column is-5">

                                                <input type="hidden" name="id" v-bind:value="selected.redeem_id">

                                                    <b-field type="is-small" label="เซิร์ฟเวอร์" horizontal>
                                                        <b-input type="text" placeholder="เซิร์ฟเวอร์" name="server_name" v-bind:value="selected.server_name"></b-input>
                                                    </b-field>

                                                    <b-field type="is-small" label="ที่อยู่" horizontal>
                                                        <b-input type="input" placeholder="รายละเอียดโดยย่อ" name="hostname" v-bind:value="selected.hostname"></b-input>
                                                    </b-field>

                                                    <b-field type="is-small" label="พอร์ท" horizontal>
                                                        <b-input type="input" size="is-small" name="hostname_port" v-bind:value="selected.hostname_port" min="0" step="15"></b-input>
                                                    </b-field>

                                                    <b-field type="is-small" label="พอร์ทคิวรี่" horizontal>
                                                        <b-input type="input" size="is-small" name="hostname_query_port" v-bind:value="selected.hostname_query_port" min="0" step="15"></b-input>
                                                    </b-field>

                                                </div>
                                                <div class="column is-7">
                                                    <b-field type="is-small" label="พอร์ทส่งคำสั่งหลัก" horizontal>
                                                        <b-input type="input" size="is-small" name="rcon_port" v-bind:value="selected.rcon_port" min="0" step="15"></b-input>
                                                    </b-field>

                                                    <b-field type="is-small" label="พอร์ทเว็บเซ็นเดอร์" horizontal>
                                                        <b-input type="input" size="is-small" name="websender_port" v-bind:value="selected.websender_port" min="0" step="15"></b-input>
                                                    </b-field>

                                                </div>
                                            </div>




                                                <b-tabs size="is-small" class="block">

                                                    <b-tab-item label="คำสั่งของรางวัล" icon="code-braces">
                                                        <b-input size="is-small" type="textarea" name="item_command" placeholder="คำสั่งของรางวัลที่จะได้รับเมื่อแลก" rows="4" v-model="commands"></b-input>
                                                    </b-tab-item>

                                                    <b-tab-item label="วิธีการใช้" icon="comment-question-outline">
                                                        <b-message title="รูปแบบวิธีการใช้คำสั่ง" size="is-small">
                                                            <p>
                                                                <table class="table is-fullwidth">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th width="40%"><b>cmd: <คำสั่ง></b></th>
                                                                            <th>ใช้ส่งคำสั่งไปเซิร์ฟเวอร์</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th width="40%"><b>%player</b></th>
                                                                            <th>ใช้แทนชื่อคนแลกในคำสั่ง</th>
                                                                        </tr>
                                                                        <tr>
                                                                            <th width="40%"><b>points: <พ้อย></b></th>
                                                                            <th>ให้ Point บนเว็บ</th>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                                <b class="force-bold has-text-primary">EXAMPLE: </b>ให้เพชรและให้ 25 Point <br>
                                                                <b>cmd:give %player diamond 64;point:25</b>
                                                            </p>
                                                        </b-message>
                                                    </b-tab-item>
                                                </b-tabs>

                                                <div class="content">
                                                    <li v-if="file === null" class="is-size-7 has-text-danger">ต้องอัพโหลดภาพก่อน</li>
                                                </div>

                                                <div class="buttons">
                                                    <b-button v-if="file === null" type="is-primary" size="is-small" disabled>สร้างเซิร์ฟเวอร์ @{{ name || null }}</b-button>
                                                    <b-button v-if="file != null" type="is-primary" native-type="submit" size="is-small">สร้างเซิร์ฟเวอร์ @{{ name || null }}</b-button>
                                                </div>

                                            </form>

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

                                </b-tab-item>
                            </b-tabs>
                        </div>
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
            isAlreadyDiscont: function(value) {
                if(value > 0) {
                    return true
                }else {
                    return false
                }
            },
            setNullImage: function() {
                this.file = null
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
        data() {
            return {
                data,
                selected: data[-1],
                columns: [
                    {
                        field: 'server_id',
                        label: 'เลขอ้างอิง',
                    },
                    {
                        field: 'server_name',
                        label: 'ชื่อเซิร์ฟเวอร์',
                    },
                    {
                        field: 'hostname',
                        label: 'รายละเอียดโดยย่อ',
                    },
                    {
                        field: 'hostname_port',
                        label: 'ราคา',
                    },
                    {
                        field: 'hostname_query_port',
                        label: 'ขายไปแล้ว',
                        centered: true
                    }
                ],
                file: null,
                name: null,
                desc: null,
                price: 0,
                discountprice: 0,
                commands: null,
                isDiscont: false,
            }
        }
    })

</script>

@endsection
