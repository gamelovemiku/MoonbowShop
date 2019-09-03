@extends('manage.managecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
        <li class="is-active"><a href="/manage/profile">Command Sender</a></li>
    </ul>
</nav>

<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 force-bold">Command Sender</h4>
        <p class="subtitle is-size-7">Send game commands directly to the server<b class="force-bold"></b></p>
    </div>
</div>

    <p style="margin-bottom: 24px">Your server is <b class="has-text-success">{{ $settings->hostname }}</b> with rcon port <b class="has-text-success">{{ $settings->rcon_port }}</b></p>
    <div class="columns">
        <div class="column is-6">
            <form action="{{ route("commandsender") }}" method="post">
                @csrf
                <label class="label">Commands</label>
                <div class="field has-addons">
                    <div class="control is-expanded">
                        <input class="input is-black" type="text" name="command">
                    </div>

                    <div class="control">
                        <button type="submit" id="submit_button" class="button is-black clickaction">
                            Send
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="column is-6">
            <div class="notification is-light">
                <div class="is-size-6 has-text-weight-bold">Placeholder</div>
                <p class="content is-small">
                    <b>%player</b> Replace to your username.<br/>
                    <b>;</b> For send more command at one time.
                </p>
                <div class="is-size-6 has-text-weight-bold">Sample</div>
                <p class="content">
                    <code>say Hello World; give %player 264 1</code>
                </p>
            </div>
        </div>
    </div>
@endsection
