@extends('manage.profilecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li class="is-active"><a href="{{ route('history.index')}}" aria-current="page">History</a></li>
    </ul>
</nav>

<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 has-text-weight-bold">ประวัติกิจกรรมบัญชี</h4>
        <p class="subtitle is-size-7">ประวัติการทำรายการทั้งหมดที่คุณซื้อ</p>
    </div>
    <div class="column is-6 has-text-right">

    </div>
</div>
<div id="history">
    <div class="columns">
        <div class="column is-9">
            <template>

                <section>
                    <b-table
                        class="has-text-weight-medium is-size-7"
                        :data="data"

                        :paginated="true"
                        :per-page="10"
                        :pagination-simple="true"

                        :columns="columns"
                        :selected.sync="selected"
                        searchable>
                    </b-table>
                </section>

            </template>
        </div>
        <div class="column is-3">
            <div class="box">
                <div class="title is-6">
                    <div class="block">
                        <b-icon icon="clipboard-list"></b-icon>
                        รายละเอียดเชิงลึก
                    </div>
                </div>
                <div class="subtitle is-size-7">
                    @{{ selected.action_detail }}
                </div>
                <p class="subtitle is-size-7">
                    <b>กระทำโดย</b> {{ Auth::user()->name }} <br>
                    <b>ประเภท</b> @{{ selected.type }} <br>
                    <b>ซื้อเมื่อ</b> @{{ selected.created_at }}
                </p>
            </div>
        </div>
    </div>
</div>

<script src="https://unpkg.com/vue"></script>
<script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>

<script>
    new Vue({
        el: '#history',

        data() {

            return {
                data,
                selected: data[0],
                columns: [
                    {
                        field: 'log_id',
                        label: 'เลขอ้างอิง',
                        centered: true,
                        width: '80',
                        sortable: true,
                    },
                    {
                        field: 'action_detail',
                        label: 'รายละเอียด',
                    },
                    {
                        field: 'created_at',
                        label: 'เวลากำกับ',
                        sortable: true,
                    },
                ],
            }
        }
    })

</script>

@endsection
