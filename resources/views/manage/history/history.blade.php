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
        <h4 class="title is-size-4 has-text-weight-bold">History</h4>
        <p class="subtitle is-size-7">All of your payment history.</p>
    </div>
    <div class="column is-8 has-text-right">
        <div class="notification is-danger">
            <button class="delete"></button>
            แจ้งให้ทราบ: เซิร์ฟเวอร์จะ<strong>ไม่เก็บหมายเลขบัตรเครดิตใดๆ</strong> เข้าสู่ระบบทั้งสิ้น เพื่อความปลอดภัย
        </div>
    </div>
</div>

    <div class="field">
        <div class="columns">
            <div class="column is-12" style="height: 100%">
                <div class="field">
                    <table class="table is-fullwidth is-narrow">
                        <thead>
                            <tr>
                                <th>#REF</th>
                                <th>Provider</th>
                                <th>Payer Name</th>
                                <th>Paid Amount (Baht)</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($history as $info)
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
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
