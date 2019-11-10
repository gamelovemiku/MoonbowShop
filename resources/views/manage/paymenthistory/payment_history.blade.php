@extends('manage.profilecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li class="is-active"><a href="{{ route('history.index')}}" aria-current="page">History</a></li>
    </ul>
</nav>

<div class="columns">
    <div class="column is-4">
        <h4 class="title is-size-4 has-text-weight-bold">ประวัติการจ่ายเงิน</h4>
        <p class="subtitle is-size-7">ประวัติการทำรายการทั้งหมดที่คุณซื้อ</p>
    </div>
    <div class="column is-8 has-text-right">

    </div>
</div>

    <div class="field">
        <div class="columns">
            <div class="column is-12" style="height: 100%">
                <div class="field">
                    <table class="table is-fullwidth is-narrow">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ผู้ให้บริการ</th>
                                <th>ชื่อผู้ชำระ</th>
                                <th>จำนวนเงินที่จ่าย (บาท)</th>
                                <th>สถานะ</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($history as $info)
                                <tr>
                                    <th class="has-text-weight-medium">{{ $info->payment_id }}</th>
                                    <th class="has-text-weight-medium is-lowercase">{{ $info->payment_provider }}</th>
                                    <th class="has-text-weight-medium">{{$info->payment_payer}}</th>
                                    <th class="has-text-weight-medium">{{$info->payment_amount}}</th>
                                    <th class="has-text-weight-medium">
                                        @if($info->payment_status == 'successful')
                                            <span class="tag is-success">{{$info->payment_status}}</span>
                                        @else
                                            <span class="tag is-danger">{{$info->payment_status}}</span>
                                        @endif
                                    </th>
                                </tr>
                            @empty
                                <tr>
                                    <td class="has-text-centered has-text-danger" colspan="5">
                                        คุณไม่มีประวัติการจ่ายเงินใดๆ เลย
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
