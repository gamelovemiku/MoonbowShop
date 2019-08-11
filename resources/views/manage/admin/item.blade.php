@extends('manage.managecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
        <li><a href="/manage/profile">Itemshop</a></li>
        <li class="is-active"><a href="/manage/changepassword" aria-current="page">Manage Item</a></li>
    </ul>
</nav>
<div class="tabs is-small">
    <ul>
        <li><a>Overview</a></li>
        <li class="is-active"><a href="/manage/itemshop/additem">Manage Item</a></li>
        <li><a href="/manage/itemshop/category">Manage Category</a></li>
    </ul>
</div>
<h4 class="title is-size-4 force-bold">Manage Item</h4>
<p class="subtitle is-size-6">Manage item in itemshop<b class="force-bold"></b></p>
<form method="POST" action="{{ route('item.store') }}"> <!--<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<<-->
    @csrf
    <div class="field">
        <div class="columns">
            <div class="column is-4" style="height: 100%">
                <div class="field">
                    <label for="item_name" class="label">Item name</label>

                    <div class="control">
                        <input id="item_name" type="text" class="input @error('itemname') is-danger @enderror" name="item_name">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="field">
                    <label for="item_desc" class="label">Item Description</label>

                    <div class="control">
                        <textarea id="item_desc" type="text" class="input @error('itemdesc') is-danger @enderror" name="item_desc"></textarea>
                    </div>
                </div>

                <div class="columns">
                    <div class="column is-6" style="height: 100%">
                        <label for="category" class="label">Item Category</label>
                        <div class="control">
                            <div class="select">
                                <select id="category" name="category">
                                    <option>--- None ---</option>
                                    <option value="1">Ores</option>
                                    <option value="2">Rank</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="column is-6" style="height: 100%">
                        <label for="item_price" class="label">Price</label>
                        <div class="control">
                            <input id="item_price" class="input" name="item_price">
                        </div>
                    </div>
                </div>

                <div class="field">
                    <label for="command" class="label">Server Command</label>

                    <div class="control">
                        <textarea id="command" type="text" class="input @error('itemdesc') is-danger @enderror" name="item_command"></textarea>
                    </div>
                </div>

                <div class="buttons">
                    <button type="submit" class="button is-light">
                        Add item
                    </button>
                </div>
            </div>
            <div class="column is-8">
                <table class="table is-hoverable is-bordered is-fullwidth">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Category</th>
                            <th>Item Name</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($items as $item)
                            <tr>
                                <th>{{ $item->item_id }}</th>
                                <th>-</th>
                                <th>{{ $item->item_name }}</th>
                                <th>{{ $item->item_price }}</th>
                                <th>
                                    <div class="buttons">
                                        <a class="button is-link">Edit</a>
                                        <a class="button is-danger">Remove</a>
                                    </div>
                                </th>
                            </tr>  
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</form>
@endsection