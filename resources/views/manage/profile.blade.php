@extends('manage.managecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li class="is-active"><a href="/manage/profile" aria-current="page">Profile</a></li>
    </ul>
</nav>

<h4 class="title is-size-4 force-bold">Profile</h4>
<p class="subtitle is-size-6">Your public profile information.<b class="force-bold"></b></p>
<form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="field">
        <div class="columns">
            <div class="column is-6" style="height: 100%">
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Username</th>
                            <th class="has-text-grey has-text-weight-light">{{$user->name}}</th>
                        </tr>
                        <tr>
                            <th>Registered Email</th>
                            <th class="has-text-grey has-text-weight-light">{{$user->email}}</th>
                        </tr>
                        <tr>
                            <th>Joined Date</th>
                            <th class="has-text-grey has-text-weight-light">{{$user->created_at}}</th>
                        </tr>
                        <tr>
                            <th>Points</th>
                            <th class="has-text-grey has-text-weight-light">{{$user->points_balance}}</th>
                        </tr>
                    </tbody>
                </table>

                <label class="label">Management</label>
                <div class="buttons">
                    <a href="#" class="button is-info is-outlined">Change Password</a>
                    <a href="#" class="button is-danger is-outlined">Delete Account</a>
                </div>

                <label class="label">Avatar</label>
                <form>
                    <div class="field">
                        <div class="file is-small has-name is-fullwidth">
                            <label class="file-label">
                                <input class="file-input" type="file" name="resume">

                                <span class="file-cta">
                                    <span class="file-icon">
                                        <i class="fas fa-upload"></i>
                                    </span>
                                    <span class="file-label">
                                        <p id="upload-header">Upload</p>
                                    </span>
                                </span>
                                <span class="file-name">
                                    <p id="upload-filename">No Select file</p>
                                </span>
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="button is-primary is-outlined">Upload Avatar</button>
                </form>

            </div>
            <div class="column is-6">
                <div class="">
                    <figure class="image is-squared" style="width: 50%">
                        <img class="is-rounded" src="https://pbs.twimg.com/profile_images/1109911712201736192/O65BBJT-_400x400.png">
                    </figure>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
