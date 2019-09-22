@extends('manage.admin.controlpanel')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
    <li><a href="{{route('notice.index')}}">Notice</a></li>
        <li class="is-active"><a href="{{route('notice.index')}}">Edit Notice</a></li>
    </ul>
</nav>

<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 has-text-weight-bold">Edit Notice</h4>
        <p class="subtitle is-size-7">Register new player and assign settings<b class="force-bold"></b></p>
    </div>
</div>

<form method="post" action="{{ route('notice.update', ['id' => $notice->notice_id]) }}">
    @method("put")
    @csrf
    <div class="columns">
        <div class="column is-12">
            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Title</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input" type="text" name="title" value="{{ $notice->notice_title }}">
                            @error('title')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Content</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <textarea class="textarea" name="content" rows="8">{{ $notice->notice_content }}</textarea>
                            @error('content')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label">Tag</label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                            <input class="input" type="text" name="tag" value="{{ $notice->notice_tag }}">
                            @error('tag')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="field is-horizontal">
                <div class="field-label is-normal">
                    <label class="label"></label>
                </div>
                <div class="field-body">
                    <div class="field">
                        <div class="control">
                        <label class="checkbox">
                            <input id="text-instore" class="is-checkradio is-block is-danger" type="checkbox" name="seeinstore" @if($notice->notice_show_on_store == 1) checked @endif>
                            <label for="text-instore">Show in Store page</label>
                        </label>
                            @error('seeinstore')
                                <p class="help is-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="buttons is-right">
                <button type="submit" class="button is-black">
                    Edit Notice
                </button>
                <button type="reset" class="button is-light">
                    Clear
                </button>
            </div>
        </div>
    </div>
</form>
@endsection
