<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Forum</title>
    <link rel="stylesheet" href="/css/bulma/bulma.css"/>
    <link rel="stylesheet" href="/css/self-custom.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css"/>
    <link href="https://fonts.googleapis.com/css?family=Poppins|Pridi:300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css" integrity="sha256-a2tobsqlbgLsWs7ZVUGgP5IvWZsx8bTNQpzsqCSm5mk=" crossorigin="anonymous" />
    <script src="js/bulma-toast.min.js"></script>
    <script src="/js/bulma.js"></script>
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
                    Moonbow Community
                </h2>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="container is-uppercase">
            <div class="level">
                <div class="level-left">
                    เรื่องทั้งหมดที่ถูกโพสต์ใน Forum มีจำนวนทั้งหมด {{ count($topics) }} เรื่อง
                </div>
                <div class="level-right">
                    <div class="buttons">
                        <a class="button is-light" href="{{ route('topic.create')}}">เพิ่มเรื่องใหม่</a>
                    <a class="button is-light" href=" {{ route('topicmanager.index') }}">โพสต์ทั้งหมดของฉัน</a>
                    </div>
                </div>
            </div>
            <div class="columns is-multiline">
                <div class="column is-8">
                    <h4 class="title is-4">กำลังได้รับความนิยม</h4>
                    <div class="box">
                        <h6 class="title is-6 has-text-weight-bold">Lastest topics</h6>
                        <p class="subtitle is-7 has-text-weight-bold">Moonbow Minecraft Forums</p>
                        <table class="table is-narrow is-fullwidth">
                            <tbody>
                                @foreach($topics as $topic)
                                    <tr>
                                        <th width="60%"><a href="/forum/topic/{{ $topic->topic_id }}">{{ $topic->topic_title }}</a></th>
                                        <th width="13%">by {{ $topic->user->name }}</th>
                                        <th width="13%">{{ $topic->created_at }}</th>
                                        <th width="13%">{{ $topic->topic_views }} <small>Views</small></th>
                                    </tr
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="column is-4">
                    <h4 class="title is-4">เลือกตามหมวดหมู่</h4>
                    <div class="box">
                        <h6 class="title is-6 has-text-weight-bold">Most Views</h6>
                        <p class="subtitle is-7 has-text-weight-bold">Topic on trends all the times</p>
                        <table class="table is-striped is-narrow is-fullwidth">
                            <tbody>
                                @foreach($mostviews as $topic)
                                    <tr>
                                        <th width="75%"><a href="/forum/topic/{{ $topic->topic_id }}">{{ $topic->topic_title }}</a></th>
                                        <th width="25%">{{ $topic->topic_views }} <small>Views</small></th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="column is-4">
                    <h4 class="title is-4">เข้าชมมากที่สุด</h4>
                    <div class="box">
                        <h6 class="title is-6 has-text-weight-bold">Most Views</h6>
                        <p class="subtitle is-7 has-text-weight-bold">Topic on trends all the times</p>
                        <table class="table is-striped is-narrow is-fullwidth">
                            <tbody>
                                @foreach($mostviews as $topic)
                                    <tr>
                                        <th width="75%"><a href="/forum/topic/{{ $topic->topic_id }}">{{ $topic->topic_title }}</a></th>
                                        <th width="25%">{{ $topic->topic_views }} <small>Views</small></th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="column is-8">
                    <h4 class="title is-4">มาใหม่ล่าสุด</h4>
                    <div class="box">
                        <h6 class="title is-6 has-text-weight-bold">Most Views</h6>
                        <p class="subtitle is-7 has-text-weight-bold">Topic on trends all the times</p>
                        <table class="table is-striped is-narrow is-fullwidth">
                            <tbody>
                                @foreach($mostviews as $topic)
                                    <tr>
                                        <th width="75%"><a href="/forum/topic/{{ $topic->topic_id }}">{{ $topic->topic_title }}</a></th>
                                        <th width="25%">{{ $topic->topic_views }} <small>Views</small></th>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('components.footer')
</body>
</html>
