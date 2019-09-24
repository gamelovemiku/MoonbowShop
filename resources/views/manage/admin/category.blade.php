@extends('manage.admin.controlpanel')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="{{ route('profile.index') }}">{{ Auth::user()->name }}</a></li>
        <li><a href="{{ route('admin.controlpanel') }}">Admin</a></li>
        <li><a href="{{ route('item.index') }}">Itemshop</a></li>
        <li class="is-active"><a href="/manage/changepassword" aria-current="page">Category</a></li>
    </ul>
</nav>

<h4 class="title is-size-4 force-bold">Category</h4>
<p class="subtitle is-size-7">Group up your item<b class="force-bold"></b></p>
<div class="field">
    <div class="columns">
        <div class="column is-12" style="height: 100%">

            <form action="{{ route('category.store')}}" method="post">
                @method('post')
                @csrf
                <div class="field has-addons">
                    <div class="control">
                        <input class="input is-uppercase" type="text" name="category_name" placeholder="Category Name">
                            @error('category_name')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="control">
                        <input class="input is-uppercase" type="text" name="category_icon" placeholder="MDI Icon">
                            @error('category_icon')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                    </div>
                    <div class="control">
                        <button type="submit" class="button is-black">
                            Add
                        </button>
                    </div>
                </div>
            </form>

            <small class="is-size-7">Shortcut: <a href="https://materialdesignicons.com/cdn/2.0.46/" target="_blank">Material Design Icons (MDI)</a> put by without prefix.</small>

            <table class="table is-hoverable" style="width: 100%; margin-top: 1em;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Category Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorys as $category)
                    @if ($category->category_id == 1)
                        <tr>
                            <th>#{{ $category->category_id }}</th>
                            <th>{{ $category->category_name }}</th>
                            <th>
                                <div class="buttons">
                                    <form action="{{ route('category.destroy', [$category->category_id])}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="button is-warning" value="Delete" disabled>Reserved</button>
                                    </form>
                                </div>
                            </th>
                        </tr>
                    @else
                        <tr>
                            <th>{{ $category->category_id }}</th>
                            <th><span class="mdi mdi-{{ $category->category_icon }}"></span> {{ $category->category_name }}</th>
                            <th>
                                <div class="buttons">
                                    <form action="{{ route('category.destroy', [$category->category_id])}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" class="button is-danger" value="Delete">Delete</button>
                                    </form>
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
