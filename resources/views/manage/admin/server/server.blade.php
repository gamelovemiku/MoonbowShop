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

<div id="server">
    <div class="columns">
        <div class="column is-6">
            <h4 class="title is-size-4">เซิร์ฟเวอร์เกม</h4>
            <p class="subtitle is-size-7">ตั้งค่าเซิร์ฟเวอร์เกมสำหรับเน็ตเวิร์คหลายการเชื่อมต่อ<b class="force-bold"></b></p>
        </div>
        <div class="column is-6 has-text-right">
            <a class="button is-small is-white is-shadow" @click="isCardModalActive = true">
                <b-icon icon="account-plus" size="is-small"></b-icon>
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
                            :per-page="10"

                            :pagination-simple="true"
                            :selected.sync="selected"
                            :mobile-cards="false"

                            >

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

                            </template>

                        </b-table>
                        <div class="has-text-weight-medium is-size-7" style="margin-top: -1.75rem" v-if="selected != null">

                            <b-tabs size="is-small" class="block">
                                <b-tab-item label="แก้ไข" icon="pencil-box-outline">

                                    <div class="level">
                                        <div class="level-left">
                                            <div>
                                                <h6 class="title is-size-6">แก้ไขเซิร์ฟเวอร์ @{{ selected.server_name }} | @{{ serverstatus }}</h6>
                                                <p class="subtitle is-size-7">ผลของการแก้ไขจะเปลี่ยนแปลงเมื่อกดปุ่มบันทึก<b class="force-bold"></b></p>
                                            </div>
                                        </div>
                                        <div class="level-right has-text-right bottons">

                                            <form method="POST" action="{{ route('server.internalDelete') }}">
                                                @csrf
                                                <input type="hidden" name="id" v-bind:value="selected.server_id" />

                                                <div class="buttons">
                                                    <b-button class="button is-small is-info" v-on:click="getServer(selected)">
                                                        <b-icon icon="arrange-send-to-back" size="is-small"></b-icon>
                                                        <span>ทดสอบการเชื่อมต่อไปที่ @{{ selected.hostname }}</span>
                                                    </b-button>
                                                    <button type="submit" class="button is-small is-outlined is-danger">
                                                        <b-icon icon="delete" size="is-small"></b-icon>
                                                        <span>ลบเซิร์ฟเวอร์ @{{ selected.server_name || "" }}</span>
                                                    </button>
                                                </div>


                                            </form>

                                        </div>
                                    </div>

                                    <section>

                                        <form method="POST" action="{{ route('server.internalUpdate') }}" enctype="multipart/form-data">

                                            @csrf

                                            <div class="columns">
                                                <div class="column is-5">

                                                <input type="hidden" name="id" v-bind:value="selected.server_id">

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
                                                <b-button type="is-primary" native-type="submit" size="is-small">สร้างเซิร์ฟเวอร์ @{{ selected.server_name || null }}</b-button>
                                            </div>

                                        </form>

                                    </section>
                                </b-tab-item>
                            </b-tabs>
                        </div>

                        <b-modal :active.sync="isCardModalActive" :width="720" scroll="keep">
                            <div class="box is-shadowless is-modal">

                                <form method="POST" action="{{ route('server.store') }}">

                                    @csrf

                                    <div class="topic has-text-centered" style="padding: 1.75rem;">
                                        <h4 class="title">เพิ่มเซิร์ฟเวอร์ใหม่</h4>
                                        <p class="subtitle is-6">โหมดละเอียด</p>
                                    </div>

                                    <b-steps size="is-small" v-model="activePage" :has-navigation="false">
                                        <b-step-item label="ทั่วไป" icon="account">
                                            <div style="padding: 3rem 3rem;">

                                                <b-field label="ชื่อของเซิร์ฟเวอร์">
                                                    <b-input v-model="newserver.name"  name="server_name"></b-input>
                                                </b-field>

                                                <b-field label="ที่อยู่ของเซิร์ฟเวอร์">
                                                    <b-input v-model="newserver.hostname"  name="hostname"></b-input>
                                                </b-field>

                                                <b-field label="พอร์ทของเซิร์ฟเวอร์">
                                                    <b-input v-model="newserver.port"  name="hostname_port"></b-input>
                                                </b-field>

                                                <b-field label="พอร์ท Query ของเซิร์ฟเวอร์">
                                                    <b-input v-model="newserver.query_port"  name="hostname_query_port"></b-input>
                                                </b-field>

                                            </div>

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

                                        </b-step-item>
                                        <b-step-item label="การเชื่อมต่อ RCON" icon="settings">
                                            <div style="padding: 3rem 3rem;">

                                                <b-field label="พอร์ท Rcon">
                                                    <b-input v-model="newserver.rcon.port" name="rcon_port"></b-input>
                                                </b-field>

                                                <b-field label="รหัสผ่าน Rcon">
                                                    <b-input v-model="newserver.rcon.password" name="rcon_password"></b-input>
                                                </b-field>

                                            </div>

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

                                        </b-step-item>
                                        <b-step-item label="การเชื่อมต่อ WebSender" icon="settings">
                                            <div style="padding: 3rem 3rem;">

                                                <b-field label="พอร์ท WebSender">
                                                    <b-input v-model="newserver.websender.port" name="websender_port"></b-input>
                                                </b-field>

                                                <b-field label="รหัสผ่าน WebSender">
                                                    <b-input v-model="newserver.websender.password" name="websender_password"></b-input>
                                                </b-field>

                                            </div>

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
                                        </b-step-item>
                                        <b-step-item label="ตรวจสอบ" icon="check">

                                            <div class="box overview">

                                                <h4 class="title is-4">ตรวจสอบข้อมูล</h4>
                                                <p class="subtitle is-6">ข้อมูลดังต่อไปนี้จะถูกเพิ่มเข้าสู่ระบบ</p>

                                                <table class="table is-bordered is-fullwidth">
                                                    <tbody>
                                                        <tr>
                                                            <td>ชื่อเซิร์ฟเวอร์</td>
                                                            <td>
                                                                @{{ newserver.name || "ยังไม่ระบุ"}}
                                                                <a class="is-size-7 is-text has-text-danger"
                                                                    v-if="newserver.name == null"
                                                                    @click="activePage = 0">กลับไปแก้ไข</a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>พอร์ท</td>
                                                            <td>
                                                                @{{ newserver.port || "ยังไม่ระบุ"}}
                                                                <a class="is-size-7 is-text has-text-danger"
                                                                    v-if="newserver.port == null"
                                                                    @click="activePage = 0">กลับไปแก้ไข</a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>พอร์ท Rcon</td>
                                                            <td>
                                                                @{{ newserver.rcon.port || "ยังไม่ระบุ"}}
                                                                <a class="is-size-7 is-text has-text-danger"
                                                                    v-if="newserver.rcon.port == null"
                                                                    @click="activePage = 1">กลับไปแก้ไข</a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>รหัสผ่าน Rcon</td>
                                                            <td>
                                                                @{{ newserver.rcon.password || "ยังไม่ระบุ"}}
                                                                <a class="is-size-7 is-text has-text-danger"
                                                                    v-if="newserver.rcon.password == null"
                                                                    @click="activePage = 1">กลับไปแก้ไข</a>
                                                            </td>

                                                        </tr>

                                                        <tr>
                                                            <td>พอร์ท WebSender</td>
                                                            <td>
                                                                @{{ newserver.websender.port }}
                                                                <a class="is-size-7 is-text has-text-danger"
                                                                    v-if="newserver.websender.port == null"
                                                                    @click="activePage = 2">กลับไปแก้ไข</a>
                                                            </td>
                                                        </tr>


                                                        <tr>
                                                            <td>รหัสผ่าน WebSender</td>
                                                            <td>
                                                                @{{ newserver.websender.password }}
                                                                <a class="is-size-7 is-text has-text-danger"
                                                                    v-if="newserver.websender.password == null"
                                                                    @click="activePage = 2">กลับไปแก้ไข</a>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>

                                            </div>

                                            <div class="buttons">
                                                <b-button native-type="submit"
                                                    type="is-primary is-outlined is-fullwidth"
                                                    icon-left="account-check">สร้างเซิร์ฟเวอร์ @{{ newserver.name }}</b-button>
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
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>

    new Vue({
        el: '#server',
        methods: {
            cardModal() {
                this.$buefy.modal.open({
                    parent: this,
                    component: ModalForm,
                    hasModalCard: true,
                    customClass: 'custom-class custom-class-2'
                })
            },
            getServer: function(server) {

                this.serverstatus = "กำลังทดสอบเชื่อมต่อ.."
                this.actionMessage('กำลังทดสอบเชื่อมต่อ..');

                axios.get('/api/connectserver/' + server.server_id).then(response => {
                    if(response.data == true) {
                        console.log(response.data)

                        this.serverstatus = response.data
                        this.showServerResult('is-success', 'เชื่อมต่อไปยังเซิร์ฟเวอร์สำเร็จ!' + '<br>' + server.server_name + '<br>' + server.hostname + ' สามารถเชื่อมต่อได้');

                        return response.data
                    } else {

                        this.showServerResult('is-warning', 'ไม่สามารถเชื่อมต่อไปยังเซิร์ฟเวอร์ได้' + '<br>' + server.server_name + '<br>' + server.hostname);
                        this.serverstatus = "เชื่อมต่อไม่ได้"
                        return false

                    }
                })

            },
            showServerResult: function(style, msg) {
                this.$buefy.notification.open({
                    duration: 4000,
                    message: msg,
                    position: 'is-top-right',
                    type: style,
                    hasIcon: true
                })
            },
            actionMessage(msg) {
                this.$buefy.toast.open(msg)
            },
        },
        computed: {
            updateStatus: function() {
                this.getServer(selected.data)
            },
            displayServer: function () {
                return this.selected.data.server_id + ' ## '
            },
        },
        data() {
            return {
                data,
                selected: null,
                isCardModalActive: false,
                newserver: {
                    name: '',
                    hostname: null,
                    port: null,
                    query_port: null,
                    rcon: {
                        port: null,
                        password: null,
                    },
                    websender: {
                        port: null,
                        password: null,
                    }
                },
                activePage: 0,
                serverstatus: false,
                loadingButton: false,
            }
        }
    })

</script>
@endsection
