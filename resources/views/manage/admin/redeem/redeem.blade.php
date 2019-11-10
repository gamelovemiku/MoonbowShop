@extends('manage.admin.controlpanel')

@section('breadcrumb')
<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="{{ route('profile.index') }}">{{ Auth::user()->name }}</a></li>
        <li><a href="{{ route('admin.controlpanel') }}">Admin</a></li>
        <li class="is-active"><a href="/manage/changepassword" aria-current="page">Category</a></li>
    </ul>
</nav>
@endsection

@section('content')

<div id="redeem">
    <div class="columns">
        <div class="column is-6">
            <h4 class="title is-size-4">โค๊ดแลกรางวัล</h4>
            <p class="subtitle is-size-7">สำหรับการให้เป็นรางวัล หรือสำหรับโอกาสต่างๆ<b class="force-bold"></b></p>
        </div>
        <div class="column is-6 has-text-right">
            <a class="button is-small is-white is-shadow" @click="selected = null">
                <b-icon icon="gift" size="is-small"></b-icon>
                <span>เพิ่มโค๊ดใหม่</span>
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
                            :selected.sync="selected"
                            :mobile-cards="false">

                            <template slot-scope="props">
                                <b-table-column field="redeem_id" label="เลขอ้างอิง" width="80" sortable centered>
                                    @{{ props.row.redeem_id }}
                                </b-table-column>

                                <b-table-column field="redeem_code" label="รหัสแลก">
                                    @{{ props.row.redeem_code }}
                                </b-table-column>

                                <b-table-column field="redeem_desc" label="ชื่อ / รายละเอียด">
                                    @{{ props.row.redeem_desc }}
                                </b-table-column>

                                <b-table-column field="redeem_count" label="แลกไปแล้ว" centered>
                                    @{{ props.row.redeem_count }}
                                </b-table-column>

                                <b-table-column field="redeem_limit" label="การจำกัด" centered>
                                    @{{ props.row.redeem_limit || "ไม่จำกัด" }}
                                </b-table-column>
                            </template>

                        </b-table>
                        <div class="has-text-weight-medium is-size-7" style="margin-top: 3rem" v-if="selected != null">

                            <b-tabs size="is-small" class="block">
                                <b-tab-item label="แก้ไข" icon="pencil-box-outline">

                                    <div class="level">
                                        <div class="level-left">
                                            <div>
                                                <h6 class="title is-size-6">แก้ไขโค๊ด @{{ selected.redeem_code }}</h6>
                                                <p class="subtitle is-size-7">ผลของการแก้ไขจะเปลี่ยนแปลงเมื่อกดปุ่มบันทึก<b class="force-bold"></b></p>
                                            </div>
                                        </div>
                                        <div class="level-right has-text-right">
                                            <div>
                                                <a class="button is-small is-outlined is-danger">ลบโค๊ด @{{ selected.redeem_code || "" }}</a>
                                            </div>
                                        </div>
                                    </div>

                                    <section>
                                        <form method="POST" action="{{ route('redeem.internalUpdate') }}">

                                            @csrf

                                            <input type="hidden" name="id" v-bind:value="selected.redeem_id">

                                            <b-field type="is-small">
                                                <b-input type="text" placeholder="โค๊ดไอเท็ม" name="code" v-bind:value="selected.redeem_code">
                                                </b-input>
                                            </b-field>

                                            <b-field type="is-small">
                                                <b-input type="textarea" placeholder="ชื่อ / รายละเอียด การแลก" name="desc" v-bind:value="selected.redeem_desc">
                                                </b-input>
                                            </b-field>

                                            <b-field class="is-small" label="จำนวนครั้งที่แลกได้" v-if="selected.redeem_limit > 0" horizontal>
                                                <b-numberinput size="is-small" name="limit" v-bind:value="selected.redeem_limit"></b-numberinput>
                                            </b-field>

                                            <b-field class="is-small" label="สถิติการแลก" horizontal>
                                                <div>
                                                    <b-progress v-if="selected.redeem_limit === 0" v-bind:value="selected.redeem_count" v-bind:max="selected.redeem_limit" show-value>
                                                        <p>โค๊ดนี้สามารถแลกได้ไม่จำกัด</p>
                                                    </b-progress>
                                                    <b-progress v-else-if="selected.redeem_limit === selected.redeem_count" type="is-danger" v-bind:value="selected.redeem_count" v-bind:max="selected.redeem_limit" show-value>
                                                        <p>เต็มแล้ว</p>
                                                    </b-progress>
                                                    <b-progress v-else-if="selected.redeem_limit > 0" type="is-info" v-bind:value="selected.redeem_count" v-bind:max="selected.redeem_limit" show-value>
                                                        ใช้ไปแล้ว @{{ selected.redeem_count }} จากทั้งหมด @{{ selected.redeem_limit }}
                                                    </b-progress>
                                                </div>

                                            </b-field>

                                            <b-tabs size="is-small" class="block">

                                                <b-tab-item label="คำสั่งของรางวัล" icon="code-braces">
                                                    <b-input size="is-small" type="textarea" name="cmd" placeholder="คำสั่งของรางวัลที่จะได้รับเมื่อแลก" rows="4" v-model="selected.redeem_reward_command"></b-input>
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

                                            <div class="buttons">
                                                <b-button type="is-primary" native-type="submit" size="is-small">บันทึกการแก้ไข</b-button>
                                            </div>

                                        </form>

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
        el: '#redeem',
        data: {
            code: '',
            desc: '',
            commands: '',
            isAmount: 'unlimited',
            number: 1,
        },
        data() {
            return {
                data,
                selected: data[-1],
                columns: [
                    {
                        field: 'redeem_id',
                        label: '#',
                    },
                    {
                        field: 'redeem_code',
                        label: 'โค๊ด',
                    },
                    {
                        field: 'redeem_desc',
                        label: 'รายละเอียด',
                    },
                    {
                        field: 'redeem_count',
                        label: 'แลกไปแล้ว',
                        centered: true
                    },
                    {
                        field: 'redeem_limit',
                        label: 'จำกัดการแลก',
                        centered: true
                    }
                ]
            }
        },
        methods: {
            amountHandle: function () {
                if(isAmount === 'limited') {

                }
            },
        }
    })

</script>
@endsection

@section('quickbar')

<h4 class="title is-size-4">สร้างโค๊ดใหม่</h4>
<p class="subtitle is-size-7">สร้างการแลกใหม่อย่างรวดเร็ว<b class="force-bold"></b></p>

<div id="redeem-quickbar">
    <template>
        <section>

            <form method="POST" action="{{ route('redeem.store') }}">
                @csrf
                <b-field type="is-small">
                    <b-input type="text" placeholder="โค๊ดไอเท็ม" name="code" v-model="code">
                    </b-input>
                </b-field>

                <b-field type="is-small">
                    <b-input type="textarea" placeholder="ชื่อ / รายละเอียด การแลก" name="desc" v-model="desc">
                    </b-input>
                </b-field>

                <b-field type="is-small">
                    <b-radio v-model="isAmount" size="is-small" native-value='unlimited'>
                        แลกได้ไม่จำกัด
                    </b-radio>

                    <b-radio v-model="isAmount" size="is-small" native-value='limited'>
                        จำกัดจำนวน
                    </b-radio>
                </b-field>

                <b-field native-value="on-border" v-if="isAmount === 'limited'">
                    <b-numberinput size="is-small" name="limit" v-model="number"></b-numberinput>
                </b-field>

                <b-tabs size="is-small" class="block">

                    <b-tab-item label="คำสั่งของรางวัล" icon="code-braces">
                        <b-input size="is-small" type="textarea" name="cmd" placeholder="คำสั่งของรางวัลที่จะได้รับเมื่อแลก" rows="4" v-model="commands"></b-input>
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

                <div class="buttons">
                    <b-button type="is-primary" native-type="submit" size="is-small">สร้างโค๊ด @{{ code || null }}</b-button>

                    <b-button type="is-light" native-type="submit" size="is-small">ล้างข้อมูล</b-button>
                </div>

            </form>

        </section>
    </template>
</div>

<script>

    new Vue({
        el: '#redeem-quickbar',

        data: {
            code: '',
            desc: '',
            commands: '',
            isAmount: 'unlimited',
            number: 1,
        },
        methods: {
            amountHandle: function () {
                if(isAmount === 'limited') {

                }
            },
        }
    })

</script>

@endsection
