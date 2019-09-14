@extends('manage.admin.controlpanel')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="{{ route('profile.index') }}">{{ Auth::user()->name }}</a></li>
        <li><a href="{{ route('admin.controlpanel') }}">Admin</a></li>
        <li><a href="{{ route('item.index') }}">Itemshop</a></li>
        <li class="is-active"><a aria-current="page">Item</a></li>
    </ul>
</nav>

<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 has-text-weight-bold">Itemshop</h4>
        <p class="subtitle is-size-7">Manage item in itemshop<b class="force-bold"></b></p>
    </div>
    <div class="column is-6 has-text-right">
        <a href="{{ route('item.create')}}" class="button is-small is-light">
            <i class="fas fa-plus fa-xs" style="margin-right: 4px;"></i>New item
        </a>
        <a href="{{ route('category.index')}}" class="button is-small is-light">
            <i class="fas fa-layer-group" style="margin-right: 4px;"></i>Manage Category
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
                    <th>
                        {{$item->item_command}}
                    </th>
                    <th>
                        <div class="buttons">
                            <form action="{{ route('item.edit', [$item->item_id])}}" method="post">
                                @method('get')
                                @csrf
                                <button type="submit" style="margin-right: 8px;" class="button is-link is-small">Edit</button>
                            </form>
                            <form action="{{ route('item.destroy', [$item->item_id])}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="button is-danger is-small">Move to Bin</button>
                            </form>
                        </div>
                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
