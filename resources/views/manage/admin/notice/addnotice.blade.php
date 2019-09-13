@extends('manage.admin.controlpanel')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
    <li><a href="{{route('notice.index')}}">Notice</a></li>
        <li class="is-active"><a href="{{route('notice.index')}}">Add Notice</a></li>
    </ul>
</nav>

<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 has-text-weight-bold">Add Notice</h4>
        <p class="subtitle is-size-7">Register new player and assign settings<b class="force-bold"></b></p>
    </div>
</div>

<form method="post" action="{{ route('notice.store') }}">
    @method("post")
    @csrf
    <div class="columns">
        <div class="column is-12">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Title</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input" type="text" name="title">
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Content</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <textarea class="textarea" name="content" rows="8"></textarea>
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Tag</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                            <input class="input" type="text" name="tag">
                        </p>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label"></label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <p class="control">
                        <label class="checkbox">
                            <input class="checkbox" type="checkbox" name="seeinstore">
                            Show in Store page
                        </label>
                        </p>
                    </div>
                </div>
            </div>

            <div class="buttons is-right">
                <button type="submit" class="button is-black">
                    Add Notice
                </button>
                <button type="reset" class="button is-light">
                    Clear
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
