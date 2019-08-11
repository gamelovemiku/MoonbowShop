@extends('manage.managecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
        <li><a href="/manage/profile">Itemshop</a></li>
        <li class="is-active"><a href="/manage/changepassword" aria-current="page">Manage Category</a></li>
    </ul>
</nav>
<div class="tabs is-small">
    <ul>
        <li><a>Overview</a></li>
        <li><a href="/manage/itemshop/additem">Manage Item</a></li>
        <li class="is-active" href="/manage/itemshop/category"><a>Manage Category</a></li>
    </ul>
</div>
<h4 class="title is-size-4 force-bold">Category</h4>
<p class="subtitle is-size-6">Group up your item<b class="force-bold"></b></p>
<form method="POST" action="{{ route('login') }}"> <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    @csrf
    <div class="field">
        <div class="columns">
            <div class="column is-12" style="height: 100%">

                <label for="itemname" class="label">Item name</label>
                <div class="field has-addons">
                    <div class="control">
                        <input class="input" type="text" placeholder="New category">
                    </div>
                    <div class="control">
                        <a class="button is-info">
                            Add
                        </a>
                    </div>
                </div>

                <table class="table is-hoverable" style="width: 100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th>0</th>
                            <th>Ores</th>
                            <th>
                                <div class="buttons">
                                    <a class="button is-light">Edit Name</a>
                                    <a class="button is-danger">Remove</a>
                                </div>
                            </th>
                        </tr>
                        <tr>
                            <th>1</th>
                            <th>Rank</th>
                            <th>
                                <div class="buttons">
                                    <a class="button is-light">Edit Name</a>
                                    <a class="button is-danger">Remove</a>
                                </div>
                            </th>
                        </tr>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</form>
@endsection