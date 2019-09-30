@extends('manage.admin.controlpanel')

@section('breadcrumb')
<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
        <li class="is-active"><a href="/manage/user">ตัวจัดการผู้ใช้</a></li>
    </ul>
</nav>
@endsection

@section('content')

<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 has-text-weight-bold">ตัวจัดการผู้ใช้</h4>
        <p class="subtitle is-size-7">สำหรับแก้ไขและควบคุมบัญชีผู้เล่น<b class="force-bold"></b></p>
    </div>
    <div class="column is-6 has-text-right">

        <a href="{{ route('usereditor.create')}}" class="button is-small is-white is-shadow">
            <i class="fas fa-plus fa-xs" style="margin-right: 4px;"></i>เพิ่มสมาชิก
        </a>

    </div>
</div>
<div class="field">
    <div class="box is-bordered">
        <p class="box-title">
            <span class="tag is-danger">ผู้ดูแลระบบ</span>
        </p>
        <table class="table is-fullwidth is-narrow">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ชื่อผู้ใช้</th>
                    <th>อีเมล</th>
                    <th>พ้อยท์</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($adminuser as $user)
                <tr class="has-text-weight-medium is-size-7">
                    <th>{{ $user->id }}</th>
                    <th class="has-text-weight-medium">{{ $user->name }}</th>
                    <th class="has-text-weight-medium is-lowercase">{{ $user->email }}</th>
                    <th class="has-text-weight-medium">{{ number_format($user->points_balance)}}</th>
                    <th>
                        @if (Auth::user()->id != $user->id)
                            <form id="edit_{{$user->id}}" action="{{ route('usereditor.edit', [$user->id])}}" method="post">
                                @method('get')
                                @csrf
                            </form>

                            <form id="delete_{{$user->id}}" action="{{ route('usereditor.destroy', [$user->id])}}" method="post">
                                @method('delete')
                                @csrf
                            </form>
                        <div class="action-options">
                            <a onclick="document.getElementById('edit_{{$user->id}}').submit();" class="has-text-black"><i class="far fa-edit"></i> แก้ไข</a>
                            <a onclick="document.getElementById('delete_{{$user->id}}').submit();" class="has-text-pink"><i class="far fa-trash-alt"></i> ลบ</a>
                        </div>
                        @else
                            <form id="edit_{{$user->id}}" action="{{ route('usereditor.edit', [$user->id])}}" method="post">
                                @method('get')
                                @csrf
                            </form>
                            <div class="action-options">
                                <a onclick="document.getElementById('edit_{{$user->id}}').submit();" class="has-text-black"><i class="far fa-edit"></i> แก้ไข</a>
                            </div>
                        @endif
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>

        <hr>

        <p class="box-title">
            <span class="tag is-primary">ผู้เล่นทั่วไป</span>
        </p>
        <table class="table is-fullwidth is-narrow">
            <thead>
                <tr>
                    <th>#</th>
                    <th>ชื่อผู้ใช้</th>
                    <th>อีเมล</th>
                    <th>พ้อยท์</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr class="has-text-weight-medium is-size-7">
                    <th>{{ $user->id }}</th>
                    <th class="has-text-weight-medium">{{ $user->name }}</th>
                    <th class="has-text-weight-medium is-lowercase">{{ $user->email }}</th>
                    <th class="has-text-weight-medium">{{ number_format($user->points_balance)}}</th>
                    <th>
                        @if (Auth::user()->id != $user->id)
                            <form id="edit_{{$user->id}}" action="{{ route('usereditor.edit', [$user->id])}}" method="post">
                                @method('get')
                                @csrf
                            </form>

                            <form id="delete_{{$user->id}}" action="{{ route('usereditor.destroy', [$user->id])}}" method="post">
                                @method('delete')
                                @csrf
                            </form>
                        <div class="action-options">
                            <a onclick="document.getElementById('edit_{{$user->id}}').submit();" class="has-text-black"><i class="far fa-edit"></i> แก้ไข</a>
                            <a onclick="document.getElementById('delete_{{$user->id}}').submit();" class="has-text-pink"><i class="far fa-trash-alt"></i> ลบ</a>
                        </div>
                        @else
                            <form id="edit_{{$user->id}}" action="{{ route('usereditor.edit', [$user->id])}}" method="post">
                                @method('get')
                                @csrf
                            </form>
                            <div class="action-options">
                                <a onclick="document.getElementById('edit_{{$user->id}}').submit();" class="has-text-black"><i class="far fa-edit"></i> แก้ไข</a>
                            </div>
                        @endif
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
