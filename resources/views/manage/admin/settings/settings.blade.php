@extends('manage.managecenter')

@section('content')
<nav class="breadcrumb  is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
        <li class="is-active"><a href="{{ route('settings.index') }}">Settings</a></li>
    </ul>
</nav>

<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 has-text-weight-bold">Settings</h4>
        <p class="subtitle is-size-7">Edit your system settings from here<b class="force-bold"></b></p>
    </div>
</div>

<form action="{{ route('settings.store') }}" method="post">
    @csrf
    <div class="tile is-ancestor">
        <div class="tile is-vertical is-4">
            <div class="tile is-parent">
                <article class="tile is-child">
                    <div class="box">
                        <div class="field">
                            <label class="label">Hostname</label>
                            <p class="control has-icons-left">
                                <input class="input" type="text" name="hostname" value="{{ $settings->hostname }}">
                                <span class="icon is-left">
                                    <i class="fas fa-server"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label">Port</label>
                            <p class="control has-icons-left">
                                <input class="input" type="text" name="hostname_port" value="{{ $settings->hostname_port }}">
                                <span class="icon is-left">
                                    <i class="fas fa-network-wired"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label">RCON Port</label>
                            <p class="control has-icons-left">
                                <input class="input" type="text" name="rcon_port" value="{{ $settings->rcon_port }}">
                                <span class="icon is-left">
                                    <i class="fas fa-file-import"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label">RCON Password</label>
                            <p class="control has-icons-left">
                                <input class="input" type="text" name="rcon_password" value="{{$settings->rcon_password }}">
                                <span class="icon is-left">
                                    <i class="fas fa-key"></i>
                                </span>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
        <div class="tile is-vertical is-8">
            <div class="tile is-parent">
                <article class="tile is-child">
                    <div class="box">
                        <div class="field">
                            <label class="label">Website Name</label>
                            <p class="control has-icons-left">
                                <input class="input" type="text" name="website_name" value="{{ $settings->website_name }}">
                                <span class="icon is-left">
                                    <i class="fas fa-server"></i>
                                </span>
                            </p>
                        </div>
                        <div class="field">
                            <label class="label">Website Description</label>
                            <p class="control has-icons-left">
                                <textarea class="textarea" rows="7"type="text" name="website_desc">{{ $settings->website_desc }}</textarea>
                            </p>
                        </div>
                    </div>
                </article>
            </div>
        </div>
    </div>
    <div class="field">
        <p class="control has-icons-left">
            <button id="submit_button" class="button is-fullwidth is-link is-outlined clickaction" type="submit">Save Settings</button>
        </p>
    </div>
</form>
@endsection
