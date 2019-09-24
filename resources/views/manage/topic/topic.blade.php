@extends('manage.profilecenter')

@section('content')

<nav class="breadcrumb is-small" aria-label="breadcrumbs">
    <ul>
        <li><a href="/manage">{{ Auth::user()->name }}</a></li>
        <li class="is-active"><a href="{{ route('profile.index')}}" aria-current="page">Profile</a></li>
    </ul>
</nav>

<h4 class="title is-size-4 has-text-weight-bold">โพสต์โดยคุณ</h4>
<p class="subtitle is-size-7">จัดการโพสต์ของคุณบนเว็บบอร์ด</p>
    <div class="field">
        <div class="columns">
            <div class="column is-12" style="height: 100%">
                <div class="field">
                    <div id="app">
                        <template>
                            <section>
                                <b-tabs type="is-boxed" v-model="activeTab" expanded>
                                    <b-tab-item label="โพสต์ทั้งหมด" icon="file-document-box-outline">
                                        <template slot="header">
                                            <b-icon icon="file-document-box-outline"></b-icon>
                                            <span> โพสต์ทั้งหมด <b-tag type="is-warning" rounded><b>{{ count($topics) }}</b></b-tag> </span>
                                        </template>
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
                                                @forelse ($topics as $topic)
                                                    <tr>
                                                        <th class="has-text-weight-medium">{{ $topic->topic_title }} @if( $topic->role_id == "1") <span class="tag is-danger" style="font-size: 8px;">Administrator</span> @elseif( $topic->role_id == "2") <span class="tag is-primary" style="font-size: 8px;">Player</span>   @endif</th>
                                                        <th class="has-text-weight-medium is-lowercase">{{ $topic->topic_views }}</th>
                                                        <th class="has-text-weight-medium">{{count($topic->comment)}}</th>
                                                        <th>
                                                            <div class="buttons">
                                                                <a href="{{ route('topic.show', [$topic->topic_id])}}" style="margin-right: 8px;" class="button is-black is-small">ไปยังโพสต์</a>

                                                                <form method="POST" action="{{route('topicmanager.destroy', [$topic->topic_id]) }}">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="button is-danger is-small">ย้ายไปถังขยะ</button>
                                                                </form>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="has-text-centered" colspan="4">
                                                        ไม่มีเรื่องใดๆ ให้ดูเลย ลอง <a href="{{ route('topic.create') }}">เขียนเรื่องใหม่ </a>ดูสิ
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </b-tab-item>
                                    <b-tab-item label="โพสต์ที่ถูกลบ" icon="delete-variant">
                                        <template slot="header">
                                            <b-icon icon="delete-variant"></b-icon>
                                            <span> โพสต์ที่ถูกลบ <b-tag type="is-warning" rounded><b>{{ count($deletedtopics) }}</b></b-tag> </span>
                                        </template>
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
                                                @forelse ($deletedtopics as $topic)
                                                    <tr>
                                                        <th class="has-text-weight-medium">{{ $topic->topic_title }}</th>
                                                        <th class="has-text-weight-medium is-lowercase">{{ $topic->topic_views }}</th>
                                                        <th class="has-text-weight-medium">{{ count($topic->comment) }}</th>
                                                        <th>
                                                            <div class="buttons">
                                                                <form action="{{ route('topicmanager.restore', [$topic->topic_id])}}" method="post">
                                                                    @method('post')
                                                                    @csrf
                                                                    <button type="submit" style="margin-right: 8px;" class="button is-info is-small">กู้โพสต์</button>
                                                                </form>

                                                                <form action="{{ route('topicmanager.forcedelete', [$topic->topic_id])}}" method="post">
                                                                    @method('post')
                                                                    @csrf
                                                                    <button type="submit" class="button is-danger is-small">ลบถาวร</button>
                                                                </form>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="has-text-centered" colspan="4">
                                                            ไม่มีโพสต์ใดของคุณ ที่ถูกลบเลย
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </b-tab-item>
                                    {{--
                                    <b-tab-item label="ฉบับร่าง" icon="playlist-edit">
                                        <template slot="header">
                                            <b-icon icon="playlist-edit"></b-icon>
                                            <span> ฉบับร่าง <b-tag type="is-warning" rounded><b>{{ count($deletedtopics) }}</b></b-tag> </span>
                                        </template>
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
                                                @forelse ($topics as $topic)
                                                    <tr>
                                                        <th class="has-text-weight-medium">{{ $topic->topic_title }} @if( $topic->role_id == "1") <span class="tag is-danger" style="font-size: 8px;">Administrator</span> @elseif( $topic->role_id == "2") <span class="tag is-primary" style="font-size: 8px;">Player</span>   @endif</th>
                                                        <th class="has-text-weight-medium is-lowercase">{{ $topic->topic_views }}</th>
                                                        <th class="has-text-weight-medium">{{count($topic->comment)}}</th>
                                                        <th>
                                                            <div class="buttons">
                                                                <a href="{{ route('topic.show', [$topic->topic_id])}}" style="margin-right: 8px;" class="button is-black is-small">Go to topic</a>

                                                                <form method="POST" action="{{route('topicmanager.destroy', [$topic->topic_id]) }}">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button type="submit" class="button is-danger is-small">Move to Bin</button>
                                                                </form>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <td class="has-text-centered" colspan="4">
                                                            ไม่มีเรื่องใดๆ ให้ดูเลย ลอง <a href="{{ route('topic.create') }}">เขียนเรื่องใหม่ </a>ดูสิ
                                                        </td>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </b-tab-item> --}}
                                </b-tabs>
                            </section>
                        </template>
                    </div>
                    <script src="https://unpkg.com/vue"></script>
                    <script src="https://unpkg.com/buefy/dist/buefy.min.js"></script>

                    <script>

                        new Vue({
                            el: '#app',

                            data: {
                                isRemember: "จำฉันไว้เข้าใช้ครั้งหน้าแล้ว",
                                email: null,
                                resetemail: null,
                                activeTab: 0,
                            },
                        })

                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
