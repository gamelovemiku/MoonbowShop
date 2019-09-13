@extends('manage.profilecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li class="is-active"><a href="/manage/profile" aria-current="page">Profile</a></li>
    </ul>
</nav>

<h4 class="title is-size-4 has-text-weight-bold">Edit Profile</h4>
<p class="subtitle is-size-7">Edit your profile by yourself<b class="force-bold"></b></p>

<form method="post" action="{{ route('profile.updateprofile') }}">
    @csrf
    <div class="columns">
        <div class="column is-8">

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Email</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input is-white" type="email" name="email" value="{{ $user->email }}" readonly>
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
                            <input class="input" type="text" name="name" value="{{ $user->name }}">
                        </p>
                    </div>
                </div>
            </div>

            <div class="buttons is-right">
                <button type="submit" class="button is-primary is-outlined">
                    Save Settings
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
