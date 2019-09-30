@extends('manage.admin.controlpanel')

@section('breadcrumb')
<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
        <li class="is-active"><a href="{{ route('notice.index') }}">ประกาศ</a></li>
    </ul>
</nav>
@endsection

@section('content')
<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 force-bold">ประกาศ</h4>
        <p class="subtitle is-size-7">ข้อมูลหรือข่าวสารที่คุณอยากจะให้ผู้เล่นเห็น<b class="force-bold"></b></p>
    </div>
    <div class="column is-6 has-text-right">
        <a href="{{ route('notice.create')}}" class="button is-small is-white is-shadow">
            <i class="fas fa-plus fa-xs" style="margin-right: 4px;"></i>เพิ่มประกาศใหม่
        </a>
    </div>
</div>

<table class="table is-fullwidth">
    <thead>
        <tr>
            <th>#</th>
            <th>แท็ก</th>
            <th>หัวเรื่อง</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @forelse ($notices as $key => $notice)
        <tr class="has-text-weight-medium is-size-7">
            <th>{{ $key+1 }}</th>
            <th>{{ $notice->notice_tag }}</th>
            <th width="48%">{{ $notice->notice_title}} @if( $notice->notice_show_on_store == 1) <span class="tag is-info" style="font-size: 8px;">#store</span> @endif</th>
            <th>
                <form id="edit_{{$notice->notice_id}}" action="{{ route('notice.edit', [$notice->notice_id])}}" method="post">
                    @method('get')
                    @csrf
                </form>

                <form id="delete_{{$notice->notice_id}}" action="{{ route('notice.destroy', [$notice->notice_id])}}" method="post">
                    @method('delete')
                    @csrf
                </form>

                <div class="action-options">
                    <a onclick="document.getElementById('edit_{{$notice->notice_id}}').submit();" class="has-text-black"><i class="far fa-edit"></i> แก้ไข</a>
                    <a onclick="document.getElementById('delete_{{$notice->notice_id}}').submit();" class="has-text-pink"><i class="far fa-trash-alt"></i> ลบ</a>
                </div>

            </th>

        </tr>
        @empty
        <tr>
            <td class="has-text-centered has-text-danger" style="padding: 3rem;" colspan="5">
                คุณยังไม่มีประกาศใดๆ เลย
            </td>
        </tr>
    @endforelse
    </tbody>
</table>
@endsection

@section('quickbar')
    <h4 class="title is-size-4 force-bold">การเข้าถึงประกาศ</h4>
    <p class="subtitle is-size-7">สถิติการเข้าชมในแต่ละประกาศที่ประกาศไปแล้ว<b class="force-bold"></b></p>
    <canvas id="myChart" width="100%" height="100%"></canvas>

    <script>
            var ctx = document.getElementById('myChart');
            var myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                    datasets: [{
                        label: 'การเข้าถึงข่าวสาร',
                        data: [12, 19, 3, 5, 2, 3],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
            </script>

@endsection
