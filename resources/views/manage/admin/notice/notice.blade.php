@extends('manage.admin.controlpanel')

@section('breadcrumb')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
        <li class="is-active"><a href="{{ route("notice.index")}}">Notice</a></li>
    </ul>
</nav>

@endsection

@section('content')

<div id="itemshop">
    <div class="columns">
        <div class="column is-6">
            <h4 class="title is-size-4">ประกาศและข่าวสาร</h4>
            <p class="subtitle is-size-7">จัดการข้อมูลผู้เล่นที่อยู่บนระบบทั้งหมดรวมถึงผู้ดูแลระบบ<b class="force-bold"></b></p>
        </div>
        <div class="column is-6 has-text-right">
            <a class="button is-small is-white is-shadow" @click="isCardModalActive = true">
                <b-icon icon="newspaper" size="is-small"></b-icon>
                <span>สร้างข่าวใหม่ (โหมดละเอียด)</span>
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
                                <b-table-column field="notice_id" label="เลขอ้างอิง" width="90" sortable centered>
                                    @{{ props.row.notice_id }}
                                </b-table-column>

                                <b-table-column field="notice_title" label="หัวข้อ">
                                    @{{ props.row.notice_title }}
                                </b-table-column>

                                <b-table-column field="notice_content" label="แสดงในร้านค้า" centered>
                                    @{{ booleanToText(props.row.notice_show_on_store) }}
                                </b-table-column>

                                <b-table-column field="notice_views" label="อ่าน (ครั้ง)" sortable centered>
                                    @{{ props.row.notice_views }}
                                </b-table-column>

                            </template>

                        </b-table>
                        <div class="has-text-weight-medium is-size-7" style="margin-top: -1.75rem" v-if="selected != null">

                            <b-tabs size="is-small" class="block">
                                <b-tab-item label="แก้ไข" icon="pencil-box-outline">

                                    <div class="level">
                                        <div class="level-left">
                                            <div>
                                                <h6 class="title is-size-6">แก้ไขประกาศ @{{ selected.notice_title }}</h6>
                                                <p class="subtitle is-size-7">ผลของการแก้ไขจะเปลี่ยนแปลงเมื่อกดปุ่มบันทึก<b class="force-bold"></b></p>
                                            </div>
                                        </div>
                                        <div class="level-right has-text-right">
                                            <form method="POST" action="{{ route('notice.internalDelete') }}">
                                                @csrf
                                                <input type="hidden" name="id" v-bind:value="selected.notice_id">
                                                <button type="submit" class="button is-small is-outlined is-danger">ลบประกาศที่ #@{{ selected.notice_id || "" }}</buttontype="hidden">
                                            </form>
                                        </div>
                                    </div>

                                    <section>

                                        <form method="POST" action="{{ route('notice.internalUpdate') }}" enctype="multipart/form-data">

                                            @csrf

                                            <input type="hidden" name="id" v-bind:value="selected.notice_id">

                                            <b-field label="หัวข้อ" horizontal>
                                                <b-input type="text" size="is-small" placeholder="หัวข้อ" name="title" v-bind:value="selected.notice_title"></b-input>
                                            </b-field>

                                            <b-field label="เนื้อหา" horizontal>
                                                <b-input type="textarea" rows="8" size="is-small" placeholder="เนื้อหา" name="content" v-bind:value="selected.notice_content"></b-input>
                                            </b-field>


                                            <b-field label="แท็ก" horizontal>
                                                <b-input type="text" size="is-small" placeholder="แท็ก" name="tag" v-bind:value="selected.notice_tag"></b-input>
                                            </b-field>

                                            <b-field label="ตัวเลือกพิเศษ" horizontal>
                                                <!--b-checkbox v-model="seeonstore" true-value="true" false-value="No" v-bind:value="booleanConvert(selected.notice_show_on_store)" name="qwerty" >แสดงบนหน้าร้านค้า @{{ booleanConvert(selected.notice_show_on_store) }} / @{{ seeonstore }}</b-checkbox-->
                                                <b-checkbox v-bind:value="booleanConvert(selected.notice_show_on_store)" native-value="on" name="seeinstore">
                                                    แสดงในหน้าร้านค้า @{{ seeinstore }}
                                                </b-checkbox>
                                            </b-field>

                                            <div class="buttons">
                                                <b-button type="is-primary" native-type="submit" size="is-small">แก้ไขประกาศ #@{{ selected.notice_id || "" }}</b-button>
                                            </div>

                                        </form>

                                    </section>
                                </b-tab-item>
                            </b-tabs>
                        </div>

                        <b-modal :active.sync="isCardModalActive" :width="480" scroll="keep">
                            <div class="box is-shadowless is-modal">
                                <div class="topic has-text-centered" style="padding: 1.75rem;">
                                    <h4 class="title">สร้างประกาศ / ข่าวใหม่</h4>
                                    <p class="subtitle is-6">โหมดละเอียด</p>
                                </div>

                                <form method="post" action="{{ route('notice.store') }}">

                                    @csrf

                                    <b-steps size="is-small" v-model="activePage" :has-navigation="false">

                                        <b-step-item label="เนื้อหา" icon="account">
                                            <div style="padding: 1rem 1rem;">

                                                <b-field label="หัวข้อ" horizontal>
                                                    <b-input v-model="notice.title" type="text" placeholder="หัวข้อ" name="title"></b-input>
                                                </b-field>

                                                <b-field label="เนื้อหา" horizontal>
                                                    <b-input v-model="notice.content" type="textarea" rows="8" placeholder="เนื้อหา" name="content"></b-input>
                                                </b-field>

                                                <div class="level" style="margin-top: 3rem">
                                                    <div class="level-left">
                                                        <div class="buttons is-left">
                                                            <b-button type="is-primary is-outlined" disabled @click="activePage--">กลับ</b-button>
                                                        </div>
                                                    </div>
                                                    <div class="level-right">
                                                        <div class="buttons is-right">
                                                            <b-button type="is-primary is-outlined" icon-right="arrow-right-bold" @click="activePage++">ต่อไป</b-button>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </b-step-item>

                                        <b-step-item label="ตัวเลือก" icon="cash-usd">
                                            <div style="padding: 3rem 3rem;">

                                                <b-field label="แท็ก" horizontal>
                                                    <b-input v-model="notice.tag" type="text" placeholder="แท็ก" name="tag"></b-input>
                                                </b-field>

                                                <b-field label="ตัวเลือกพิเศษ" horizontal>
                                                    <!--b-checkbox v-model="seeonstore" true-value="true" false-value="No" v-bind:value="booleanConvert(selected.notice_show_on_store)" name="qwerty" >แสดงบนหน้าร้านค้า @{{ booleanConvert(selected.notice_show_on_store) }} / @{{ seeonstore }}</b-checkbox-->
                                                    <b-checkbox native-value="on" name="seeinstore">
                                                        แสดงในหน้าร้านค้า @{{ seeinstore }}
                                                    </b-checkbox>
                                                </b-field>

                                                <div class="level" style="margin-top: 3rem">
                                                    <div class="level-left">
                                                        <div class="buttons is-left">
                                                            <b-button type="is-primary is-outlined" icon-left="arrow-left-bold" @click="activePage--">กลับ</b-button>
                                                        </div>
                                                    </div>
                                                    <div class="level-right">
                                                        <div class="buttons is-right">
                                                            <b-button type="is-primary is-outlined" icon-right="arrow-right-bold" @click="activePage++">ต่อไป</b-button>
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
                                                            <td>หัวเรื่อง</td>
                                                            <td>
                                                                @{{ notice.title || "ยังไม่ระบุ"}}
                                                                <a class="is-size-7 is-text has-text-danger" v-if="notice.title == null" @click="activePage = 0">กลับไปแก้ไข</a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>เนื้อหา</td>
                                                            <td>
                                                                @{{ notice.content || "ยังไม่ระบุ"}}
                                                                <a class="is-size-7 is-text has-text-danger" v-if="notice.content == null" @click="activePage = 0">กลับไปแก้ไข</a>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <td>แท็ก</td>
                                                            <td>
                                                                @{{ notice.tag || "ยังไม่ระบุ"}}
                                                                <a class="is-size-7 is-text has-text-danger" v-if="notice.tag == null" @click="activePage = 2">กลับไปแก้ไข</a>
                                                            </td>
                                                        </tr>

                                                    </tbody>
                                                </table>

                                            </div>

                                            <div class="buttons">
                                                <b-button native-type="submit" type="is-primary is-outlined is-fullwidth" icon-left="account-check">สร้างประกาศ</b-button>
                                                <b-button type="is-primary is-outlined is-fullwidth" icon-left="arrow-left-bold" @click="activePage--">กลับ</b-button>
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
            booleanToText: function(id) {
                switch(id) {
                    case 1:
                        return 'ใช่'
                    default:
                        return 'ไม่'
                }
            },
            booleanConvert: function(id) {
                switch(id) {
                    case 0:
                        return false
                    case 1:
                        return true
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

                for( let i=0; i < 8; i++ ) {
                    password += chars.charAt(Math.floor(Math.random() * chars.length))
                }

                this.notice.password = password
            },
        },
        computed: {
            showRoleInText: function() {
                switch(this.notice.role) {
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
                activePage: 0,
                notice: {
                    title: null,
                    content: null,
                    tag: null,
                },
            }
        }
    })

</script>
@endsection
