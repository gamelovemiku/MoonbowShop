@extends('manage.managecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li><a href="/manage/profile">Admin</a></li>
        <li class="is-active"><a href="{{ route('notice.index') }}">Notice</a></li>
    </ul>
</nav>

<div class="columns">
    <div class="column is-6">
        <h4 class="title is-size-4 force-bold">Notice</h4>
        <p class="subtitle is-size-7">Information of your server to let player's known.<b class="force-bold"></b></p>
    </div>
    <div class="column is-6 has-text-right">
        <a href="{{ route('notice.create')}}" class="button is-small is-light">
            <i class="fas fa-plus fa-xs" style="margin-right: 4px;"></i>New Notice
        </a>
    </div>
</div>

<div class="tabs-wrapper">
    <div class="tabs is-boxed">
        <ul>
            <li class="is-active">
                <a>
                    <span class="icon is-small"><i class="far fa-newspaper"></i></span>
                    <span>All Notice</span>
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
                                <th>Tag</th>
                                <th>Title</th>
                                <th>Content</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($notices as $notice)
                            <tr>
                                <th>{{ $notice->notice_id }}</th>
                                <th>{{ $notice->notice_tag }}</th>
                                <th>{{ $notice->notice_title}}</th>
                                <th>{{ $notice->notice_content}}</th>
                                <th>
                                    <div class="buttons">
                                        <form action="{{ route('notice.edit', [$notice->notice_id])}}" method="post">
                                            @method('get')
                                            @csrf
                                            <button type="submit" style="margin-right: 8px;" class="button is-link is-small">Edit</button>
                                        </form>

                                        <form action="{{ route('notice.destroy', [$notice->notice_id])}}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="button is-danger is-small">Delete</button>
                                        </form>
                                    </div>
                                </th>

                            </tr>
                            @empty
                            <tr>
                                <td class="has-text-centered has-text-danger" colspan="5">
                                    Nothing to force delete here!
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
