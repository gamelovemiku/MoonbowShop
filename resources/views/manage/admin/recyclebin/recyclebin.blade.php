@extends('manage.managecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
        <li class="is-active"><a href="/manage/user">User</a></li>
    </ul>
</nav>

<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 force-bold">Recycle Bin</h4>
        <p class="subtitle is-size-7">Recovery your entity that you deleted<b class="force-bold"></b></p>
    </div>
</div>
<div class="tabs-wrapper">
    <div class="tabs is-boxed">
        <ul>
            <li class="is-active">
                <a>
                    <span class="icon is-small"><i class="fas fa-user"></i></span>
                    <span>Users</span>
                </a>
            </li>
            <li>
                <a>
                    <span class="icon is-small"><i class="fas fa-store"></i></span>
                    <span>Itemshop</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="tabs-content">
        <ul>
            <li class="is-active">
                <div class="field">
                    <table class="table is-hoverable is-fullwidth">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Deleted Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($usertrashs as $usertrash)
                                <tr>
                                    <th>{{ $usertrash->id }}</th>
                                    <th>{{ $usertrash->name }}</th>
                                    <th>{{ $usertrash->email }}</th>
                                    <th>{{ $usertrash->deleted_at }}</th>
                                    <th>
                                        <div class="buttons">
                                            <form action="{{ route('recyclebin.rollbackUser', [$usertrash->id])}}" method="post">
                                                @method('post')
                                                @csrf
                                                <button type="submit" style="margin-right: 8px;" class="button is-link is-small">Restore</button>
                                            </form>

                                            <form action="{{ route('recyclebin.forcedeleteUser', [$usertrash->id])}}" method="post">
                                                @method('post')
                                                @csrf
                                                <button type="submit" class="button is-danger is-small">Delete Forever</button>
                                            </form>
                                        </div>
                                    </th>
                                </tr>
                                @empty
                                <tr>
                                    <td class="has-text-centered has-text-danger" colspan="5">
                                        Nothing in recycle for this category.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </li>
            <li>
                <div class="field">
                    <table class="table is-hoverable is-fullwidth">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Item Name</th>
                                <th>Description</th>
                                <th>Deleted Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($itemtrashs as $itemtrash)
                                <tr>
                                    <th>{{ $itemtrash->item_id }}</th>
                                    <th>{{ $itemtrash->item_name }}</th>
                                    <th>{{ $itemtrash->item_desc }}</th>
                                    <th>{{ $itemtrash->deleted_at }}</th>
                                    <th>
                                        <div class="buttons">
                                            <form action="{{ route('recyclebin.rollbackItemshop', [$itemtrash->item_id])}}" method="post">
                                                @method('post')
                                                @csrf
                                                <button type="submit" style="margin-right: 8px;" class="button is-link is-small">Restore</button>
                                            </form>

                                            <form action="{{ route('recyclebin.forcedeleteItemshop', [$itemtrash->item_id])}}" method="post">
                                                @method('post')
                                                @csrf
                                                <button type="submit" class="button is-danger is-small">Delete Forever</button>
                                            </form>
                                        </div>
                                    </th>
                                </tr>
                            @empty
                                <tr>
                                    <td class="has-text-centered has-text-danger" colspan="5">
                                        Nothing in recycle for this category.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </li>
        </ul>
    </div>
</div>
@endsection
