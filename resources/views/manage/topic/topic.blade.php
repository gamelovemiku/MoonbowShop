@extends('manage.profilecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li class="is-active"><a href="{{ route('profile.index')}}" aria-current="page">Profile</a></li>
    </ul>
</nav>

<h4 class="title is-size-4 has-text-weight-bold">Topics by you</h4>
<p class="subtitle is-size-7">Manage your forum information</p>
    <div class="field">
        <div class="columns">
            <div class="column is-12" style="height: 100%">
                <div class="field">
                    <table class="table is-fullwidth is-narrow">
                        <thead>
                            <tr>
                                <th>Topic</th>
                                <th>Views</th>
                                <th>Comments</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($topics as $topic)
                                <tr>
                                    <th class="has-text-weight-medium">{{ $topic->topic_title }} @if( $topic->role_id == "1") <span class="tag is-danger" style="font-size: 8px;">Administrator</span> @elseif( $topic->role_id == "2") <span class="tag is-primary" style="font-size: 8px;">Player</span>   @endif</th>
                                    <th class="has-text-weight-medium is-lowercase">{{ $topic->topic_views }}</th>
                                    <th class="has-text-weight-medium">{{count($topic->comment)}}</th>
                                    <th>
                                        <div class="buttons">
                                            <a href="{{ route('topic.show', [$topic->topic_id])}}" style="margin-right: 8px;" class="button is-black is-small">Go to topic</a>

                                            <form action="{{ route('topicmanager.destroy', [$topic->id])}}" method="post">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="button is-danger is-small">Move to Bin</button>
                                            </form>
                                        </div>
                                    </th>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
