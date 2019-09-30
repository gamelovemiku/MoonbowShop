@extends('manage.admin.controlpanel')

@section('breadcrumb')
<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="{{ route('profile.index') }}">{{ Auth::user()->name }}</a></li>
        <li><a href="{{ route('admin.controlpanel') }}">Admin</a></li>
        <li class="is-active"><a href="{{ route('forumcontrol.index') }}" aria-current="page">หมวดหมู่โพสต์</a></li>
    </ul>
</nav>
@endsection

@section('content')
<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 has-text-weight-bold">หมวดหมู่โพสต์</h4>
        <p class="subtitle is-size-7">สำหรับสร้างหมวดหมู่เพิ่มเติมในเว็บบอร์ด<b class="force-bold"></b></p>
    </div>
    <div class="column is-6 has-text-right">

        <a href="{{ route('forumcontrol.create')}}" class="button is-small is-white is-shadow">
            <i class="fas fa-plus fa-xs" style="margin-right: 4px;"></i>เพิ่มหมวดใหม่
        </a>

    </div>
</div>
<div class="columns">
    <div class="column is-12">
        <table class="table is-narrow is-fullwidth">
            <thead>
                <tr>
                    <th>ชื่อหมวดหมู่</th>
                    <th>รายละเอียด</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr class="has-text-weight-medium is-size-7">
                        <th>{{ $category->forum_category_name }}</th>
                        <th>{{ $category->forum_category_description }}</th>
                        <th>
                            <div class="buttons">
                                <div class="buttons">
                                    <form id="edit_{{$category->forum_category_id}}" action="{{ route('forumcontrol.destroy', [$category->forum_category_id])}}" method="post">
                                        @method('delete')
                                        @csrf
                                    </form>

                                    <div class="action-options">
                                        <a href="{{ route('forumcontrol.edit', [$category->forum_category_id])}}" class="has-text-black"><i class="far fa-edit"></i> แก้ไข</a>
                                        <a onclick="document.getElementById('delete_{{$category->forum_category_id}}').submit();" class="has-text-pink"><i class="far fa-trash-alt"></i> ลบ</a>
                                    </div>
                                </div>
                            </div>
                        </th>
                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
@endsection
