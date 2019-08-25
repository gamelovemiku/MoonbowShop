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

    <p style="margin-bottom: 24px">Your server is <b class="has-text-success">playmc.gamelovemiku.com:25565</b></p>
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
                        <button type="submit" class="button is-black">
                            Send
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="column is-6">
            <div class="notification is-light">
                <p class="content">
                    <b>Placeholder</b>
                    <ul>
                        <li><b>%player</b> - Replace to your username.</li>
                        <li><b>;</b> - For send more command at one time.<br></li>
                    </ul>
                    <p>
                        Sample: <code>say Hello World; give %player 264 1</code>
                    </p>
                </p>
            </div>
        </div>
    </div>
@endsection
