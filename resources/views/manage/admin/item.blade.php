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
        <li class="is-active"><a href="/manage/itemshop/item">Manage Item</a></li>
        <li><a href="/manage/itemshop/category">Manage Category</a></li>
    </ul>
</div>
<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 force-bold">Manage Item</h4>
        <p class="subtitle is-size-6">Manage item in itemshop<b class="force-bold"></b></p>                
    </div>
    <div class="column is-6 has-text-right">
    <a href="{{ route('item.create')}}" class="button is-small is-light">
            <i class="fas fa-plus fa-xs" style="margin-right: 4px;"></i>Add new items
        </a>                
    </div>
</div>
<div class="field">
    <table class="table is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>ID</th>
                <th>Item Name</th>
                <th>Price</th>
                <th>Command</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($items as $item)
                <tr>
                    <th>{{ $item->item_id }}</th>
                    <th>{{ $item->item_name }} <small>[{{ $item->category_id }}]</small></th>
                    <th>{{ $item->item_price }}</th>
                    <th>{{ $item->item_command }}</th>
                    <th>
                        <div class="buttons">
                            <form action="{{ route('item.edit', [$item->item_id])}}" method="post">
                                @method('get')
                                @csrf
                                <button type="submit" style="margin-right: 8px;" class="button is-link">Edit</button>
                            </form>
                            <form action="{{ route('item.destroy', [$item->item_id])}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="button is-danger">Delete</button>
                            </form>
                        </div>
                    </th>
                </tr>  
            @endforeach
        </tbody>
    </table>
</div>
@endsection