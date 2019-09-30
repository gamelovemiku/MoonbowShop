<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $topic->topic_title }} - MoonbowMC Forum</title>
    <link rel="stylesheet" href="/css/bulma/bulma.css"/>
    <link rel="stylesheet" href="/css/self-custom.css"/>
    <link rel="stylesheet" href="/css/summernote-lite.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins|Pridi:300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css" integrity="sha256-a2tobsqlbgLsWs7ZVUGgP5IvWZsx8bTNQpzsqCSm5mk=" crossorigin="anonymous" />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="/js/bulma-toast.min.js"></script>
    <script src="/js/bulma.js"></script>
    <script src="/js/summernote-lite.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    @include('components.navbar')
    <section class="hero is-info is-small space-for-navbar" style="background-image: url('https://i.imgur.com/piFsBod.png'); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="hero-body">
            <div class="container is-uppercase">
                <h4 class="title is-4 force-bold">
                    Forums
                </h1>
                <h6 class="subtitle is-6">
                    พื้นที่พูดคุยแลกเปลี่ยนความคิดเห็นของเซิร์ฟเวอร์
                </h2>
            </div>
        </div>
    </section>

    <section class="section" style="margin-bottom: 4em;">
        <div class="container">
            @include('components.alert')
            <div class="columns is-multiline">
                <div class="column is-three-fifths is-offset-one-fifth">
                    <div class="post">
                        <div class="tags">
                            @if ($topic->topic_is_published == 1)
                                <span class="tag is-success">Published</span>
                            @endif
                            <span class="tag is-link">{{ $topic->topic_views }} Views</span>
                            <span class="tag is-info">{{ $topic->category->forum_category_name }}</span>
                        </div>

                        <h4 class="title is-4 has-text-weight-bold is-uppercase">{{ $topic->topic_title }}</h4>
                        <div class="level subtitle">
                            <div class="level-left">
                                <h6 class="subtitle is-6"><small>เขียนโดย</small> <b class="has-text-info">{{ $topic->user->name }}</b> <small>โพสต์เมื่อ</small> <b class="has-text-info">{{ $topic->created_at }}</b></h6>
                            </div>
                            <div class="level-right">
                                <h6 class="subtitle is-6">
                                    @auth
                                        @if(Auth::user()->id == $topic->topic_author_id )
                                            <form id="delete-post" method="POST" action="{{route('topic.destroy', [$topic->topic_id]) }}">
                                                @csrf
                                                @method('delete')
                                            </form>

                                            <small style="margin-right: 8px;"><a href="{{ route('topic.edit', [$topic->topic_id]) }}" class="has-text-pink"><i class="far fa-edit"></i> แก้ไขเรื่อง</a></small>
                                            <small><a onclick="document.getElementById('delete-post').submit()" class="has-text-pink"><i class="far fa-trash-alt"></i> ย้ายไปถังขยะ</a></small>
                                        @endif
                                    @endauth
                                </h6>
                            </div>
                        </div>

                        <div class="content has-text-weight-medium">
                            {!! $topic->topic_content !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="column is-three-fifths is-offset-one-fifth">
                <h5 class="subtitle is-5">ความคิดเห็น ({{count($topic->comment)}})</h5>
            </div>
            <div class="column is-three-fifths is-offset-one-fifth">
                @forelse ($topic->comment as $key => $comment)
                    <div class="card">
                        <div class="card-content">
                            <div class="level">
                                <div class="level-left">
                                    <p class="subtitle is-7 has-text-weight-bold">
                                        ความคิดเห็นที่ {{ $key+1 }}
                                        @auth
                                            @if(Auth::user()->id == $comment->user->id)
                                            <small><a onclick="document.getElementById('delete{{ $comment->comment_id }}').submit();" class="has-text-danger">
                                                <i class="far fa-trash-alt"></i> ลบ</a>@endif
                                            </small>
                                        @endauth
                                    </p>
                                </div>
                                <div class="level-right">
                                    <p class="subtitle is-7 has-text-weight-bold">
                                        @if($topic->user->id == $comment->user->id)
                                            <small class="has-text-warning"><i class="fas fa-crown"></i></small>
                                        @endif {{$comment->user->name}} ({{ $comment->created_at }})
                                    </p>
                                </div>
                            </div>
                            <h4 class="content">{!! $comment->comment_content !!}</h4>
                        </div>
                    </div>
                    <form id="delete{{ $comment->comment_id }}" action="{{ route('comment.destroy', [$comment->comment_id]) }}" method="POST">
                        @csrf
                        @method('delete')
                    </form>
                @empty
                    <p class="content has-text-medium has-text-centered">-- ดูเหมือนไม่มีใครมาให้คำตอบไว้เลย --</p>
                @endforelse
            </div>
            @auth
                <div class="column is-three-fifths is-offset-one-fifth">
                    <div class="box is-alone">
                        <div class="level">
                            <div class="level-left">
                                <div class="level-item">
                                    <h5 class="title is-5">แสดงความคิดเห็น</h5>
                                </div>
                            </div>
                        </div>
                    <form method="post" action="{{ route('comment.store') }}" id="formwitheditor">
                            @csrf

                            <div class="field">
                                <textarea name="content" class="textarea" style="daisplay:none"></textarea>
                            </div>

                            <div class="field">
                                <input type="hidden" value="{{ $topic->topic_id }}" name="topic_id">
                            </div>

                            <div class="buttons is-right">
                                <button type="submit" class="button is-black">แสดงความคิดเห็น</button>
                            </div>
                        </form>
                    </div>
                </div>
            @else
            <p style="margin-top: 3rem; margin-bottom: 6rem" class="content has-text-medium has-text-centered"><a href="{{ route('login') }}">เข้าสู่ระบบ</a> เพื่อแสดงความคิดเห็น</p>
            @endauth
        </div>

    </section>
    @include('components.footer')
</body>
</html>
