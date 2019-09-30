@extends('manage.admin.controlpanel')

@section('breadcrumb')
<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="{{ route('profile.index') }}">{{ Auth::user()->name }}</a></li>
        <li><a href="{{ route('admin.controlpanel') }}">Admin</a></li>
        <li class="is-active"><a aria-current="page">ร้านค้า</a></li>
    </ul>
</nav>
@endsection

@section('content')
<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 has-text-weight-bold">ร้านค้า</h4>
        <p class="subtitle is-size-7"><b class="force-bold">สำหรับจัดการไอเท็มที่อยู่บนร้านค้า</b></p>
    </div>
    <div class="column is-6 has-text-right">
        <a href="{{ route('item.create')}}" class="button is-small is-white is-shadow">
            <i class="fas fa-plus fa-xs" style="margin-right: 6px;"></i>เพิ่มไอเท็มใหม่
        </a>
        <a href="{{ route('category.index')}}" class="button is-small is-white is-shadow">
            <i class="fas fa-layer-group" style="margin-right: 6px;"></i>จัดการหมวดหมู่ไอเท็ม
        </a>
    </div>
</div>
<div class="field">
    <table class="table is-fullwidth">
        <thead>
            <tr>
                <th>#</th>
                <th>ชื่อไอเท็ม</th>
                <th>ราคา</th>
                <th>คำสั่งภายในเกม</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $key => $item)
                <tr class="has-text-weight-medium is-size-7">
                    <th>{{ $key+1 }}</th>
                    <th>{{ $item->item_name }} <small>({{ $item->category->category_name }})</small></th>
                    <th>{{ $item->item_price }}</th>
                    <th>
                        {{$item->item_command}}
                    </th>
                    <th>
                        <div class="buttons">
                            <form id="edit_{{$item->item_id}}" action="{{ route('item.edit', [$item->item_id])}}" method="post">
                                @method('get')
                                @csrf
                            </form>
                            <form id="delete_{{$item->item_id}}" action="{{ route('item.destroy', [$item->item_id])}}" method="post">
                                @method('delete')
                                @csrf
                            </form>
                            <div class="action-options">
                                <a onclick="document.getElementById('edit_{{$item->item_id}}').submit();" class="has-text-dark"><i class="far fa-edit"></i> แก้ไข</a>
                                <a onclick="document.getElementById('delete_{{$item->item_id}}').submit();" class="has-text-pink"><i class="far fa-trash-alt"></i> ลบ</a>
                            </div>
                        </div>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('quickbar')
<div id="category">
    <h4 class="title is-size-4">หมวดหมู่ไอเท็ม</h4>
    <p class="subtitle is-size-7">ทำให้ไอเท็มของคุณมีการจัดเก็บที่ง่ายต่อการค้นหา<b class="force-bold"></b></p>
    <template>
        <section>
            <b-tabs v-model="activeTab" size="is-small">
                <b-tab-item label="จัดการหมวดหมู่">
                    <div class="field">
                        <div class="columns">
                            <div class="column is-12" style="height: 100%">
                                <form action="{{ route('category.store')}}" method="post">
                                    @method('post')
                                    @csrf
                                    <div class="field has-addons">
                                        <div class="control">
                                            <input class="input is-uppercase is-small" type="text" name="category_name" placeholder="ชื่อหมวดหมู่ใหม่">
                                            @error('category_name')
                                                <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="control has-addon">
                                            <input class="input is-uppercase is-small" type="text" name="category_icon" placeholder="ชื่อของไอคอน">
                                            @error('category_icon')
                                                <p class="help is-danger">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="control">
                                            <button type="submit" class="button is-black is-small is-outlined">
                                                เพิ่ม
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <!--p-- class="is-size-7">ลิงค์สำหรับไอคอน <a href="https://materialdesignicons.com/cdn/2.0.46/" target="_blank">Material Design Icons (MDI)</a> ใส่ชื่อโดยไม่ต้องใส่คำนำหน้า</!--p-->

                                <table class="table is-hoverable is-narrow" style="width: 100%; margin-top: 1em;">
                                    <thead>
                                        <tr class="has-text-weight-medium is-size-7">
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
                </b-tab-item>
            </b-tabs>
        </section>
    </template>
</div>

    <script src="https://unpkg.com/vue"></script>
    <script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>

    <script>

        new Vue({
            el: '#category',

            data: {
                activeTab: 0,
            },
        })

    </script>

@endsection
