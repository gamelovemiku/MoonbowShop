@extends('manage.managecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
    <li><a href="{{route('usereditor.index')}}">User Editor</a></li>
        <li class="is-active"><a href="{{route('usereditor.index')}}">Edit User</a></li>
    </ul>
</nav>

<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 force-bold">Edit User <small class="is-size-6 has-text-weight-normal">{{ '@' . $user->name }}</small></h4>
        <p class="subtitle is-size-7">Edit player profile and settings<b class="force-bold"></b></p>
    </div>
</div>

<form method="post" action="{{ route('usereditor.update', ['id' => $user->id]) }}">
    @method("put")
    @csrf
    <div class="columns">
        <div class="column is-12">

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Email</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input" type="email" name="email" value="{{ $user->email }}">
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Name</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input" type="text" value="{{ $user->name }}">
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Points</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input" type="number" name="points" value="{{ $user->points_balance }}">
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Role</label>
                </div>
                <div class="field-body">
                    <div class="select">
                        <select name="role">
                            @foreach ($roles as $role)
                                <option @if($user->role_id == $role->role_id) selected @endif value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <hr/>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Password</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input" name="password" type="text">
                        </p>
                    </div>
                </div>
            </div>
            <p class="content is-small has-text-right">** If Password is empty, System will ignore the password change by using player's old password.</p>
            <div class="buttons is-right">
                <button type="submit" class="button is-black">
                    Edit User
                </button>
                <button type="reset" class="button is-light">
                    Clear
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
