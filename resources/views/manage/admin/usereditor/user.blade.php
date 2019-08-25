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
        <h4 class="title is-size-4 force-bold">User Editor</h4>
        <p class="subtitle is-size-7">Edit and control member profile<b class="force-bold"></b></p>
    </div>
    <div class="column is-6 has-text-right">

        <a href="{{ route('usereditor.create')}}" class="button is-small is-light">
            <i class="fas fa-plus fa-xs" style="margin-right: 4px;"></i>New User
        </a>

        <a href="{{ route('usereditor.index')}}" class="button is-small is-light">
            <i class="fas fa-layer-group" style="margin-right: 4px;"></i>Role & Permission
        </a>

    </div>
</div>
<div class="field">
    <table class="table is-hoverable is-fullwidth">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Points</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <th>{{ $user->id }}</th>
                    <th>{{ $user->name }}</th>
                    <th>{{ $user->email }}</th>
                    <th>{{$user->points_balance}}</th>
                    <th>
                        @if (Auth::user()->name != $user->name)
                            <div class="buttons">
                                <form action="{{ route('usereditor.edit', [$user->id])}}" method="post">
                                    @method('get')
                                    @csrf
                                    <button type="submit" style="margin-right: 8px;" class="button is-link is-small">Edit</button>
                                </form>

                                <form action="{{ route('usereditor.destroy', [$user->id])}}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="button is-danger is-small">Move to Bin</button>
                                </form>
                            </div>
                        @else
                            <form action="{{ route('usereditor.edit', [$user->id])}}" method="post">
                                @method('get')
                                @csrf
                                <button type="submit" style="margin-right: 8px;" class="button is-link is-small">Edit</button>
                            </form>
                        @endif

                    </th>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection