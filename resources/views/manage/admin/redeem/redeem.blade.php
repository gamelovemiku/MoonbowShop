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
<h4 class="title is-size-4">โค๊ดแลกรางวัล</h4>
<p class="subtitle is-size-7">ทำให้ไอเท็มของคุณมีการจัดเก็บที่ง่ายต่อการค้นหา<b class="force-bold"></b></p>
<div class="field">
    <div class="columns">
        <div class="column is-12" style="height: 100%">
            <form action="{{ route('category.store')}}" method="post">
                @method('post')
                @csrf
                <div class="field has-addons">
                    <div class="control">
                        <input class="input is-uppercase" type="text" name="category_name" placeholder="ชื่อหมวดหมู่ใหม่">
                            @error('category_name')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="control">
                        <input class="input is-uppercase" type="text" name="category_icon" placeholder="ชื่อของไอคอน">
                            @error('category_icon')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="control">
                        <button type="submit" class="button is-black">
                            เพิ่ม
                        </button>
                    </div>
                </div>
            </form>

            <small class="is-size-7">ลิงค์สำหรับไอคอน <a href="https://materialdesignicons.com/cdn/2.0.46/" target="_blank">Material Design Icons (MDI)</a> ใส่ชื่อโดยไม่ต้องใส่คำนำหน้า</small>

            <table class="table is-hoverable is-narrow" style="width: 100%; margin-top: 1em;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ชื่อหมวดหมู่</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorys as $category)
                    @if ($category->category_id == 1)
                        <tr class="has-text-weight-medium is-size-7">
                            <th>{{ $category->category_id }}</th>
                            <th><span class="mdi mdi-{{ $category->category_icon }}"></span> {{ $category->category_name }}</th>
                            <th>
                                <div class="buttons">
                                    <a class="has-text-dark" disabled>ถูกป้องกัน</a>
                                </div>
                            </th>
                        </tr>
                    @else
                        <tr class="has-text-weight-medium is-size-7">
                            <th>{{ $category->category_id }}</th>
                            <th><span class="mdi mdi-{{ $category->category_icon }}"></span> {{ $category->category_name }}</th>
                            <th>
                                <div class="buttons">
                                    <form id="delete_{{$category->category_id}}" action="{{ route('category.destroy', [$category->category_id])}}" method="post">
                                        @method('delete')
                                        @csrf
                                    </form>
                                    <div class="action-options">
                                        <a onclick="document.getElementById('delete_{{$category->category_id}}').submit();" class="has-text-pink"><i class="far fa-trash-alt"></i> ลบ</a>
                                    </div>
                                </div>
                            </th>
                        </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
