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

    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/2.5.94/css/materialdesignicons.min.css">


    <script src="/js/bulma-toast.min.js"></script>
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
    <div id="app">
        <section class="section">
            <div class="container">
                @include('components.alert')
                <div class="level">
                    <div class="level-left">
                        เรื่องทั้งหมดที่ถูกโพสต์ใน Forum มีจำนวนทั้งหมด {{ count($topics) }} เรื่อง
                    </div>
                    <div class="level-right">
                        @auth
                        <div class="buttons">
                            <a class="button is-info is-outlined" href="{{ route('topic.create')}}">เพิ่มเรื่องใหม่</a>
                            <a class="button is-black" href=" {{ route('topicmanager.index') }}">โพสต์ทั้งหมดของฉัน</a>
                        </div>
                        @endauth

                        @guest
                        <div class="buttons">
                            <a class="button is-info is-outlined" href="{{ route('topic.create')}}">เพิ่มเรื่องใหม่</a>
                            <a class="button is-black" href=" {{ route('topicmanager.index') }}">โพสต์ทั้งหมดของฉัน</a>
                        </div>
                        @endguest
                    </div>
                </div>
                <div class="columns is-multiline">
                    <div class="column is-10">
                        <b-tabs type="is-toggle">
                            <b-tab-item label="ได้รับความนิยม" icon-pack="fa" icon="rss-square">
                                <b-collapse class="card">
                                    <div
                                        slot="trigger"
                                        slot-scope="props"
                                        class="card-header"
                                        role="button">
                                        <p class="card-header-title has-text-primary">
                                            โพสต์ที่มีคนอ่านมากที่สุด 10 อันดับจากโพสต์ทั้งหมด
                                        </p>
                                        <a class="card-header-icon">
                                            <b-icon
                                                :icon="props.open ? 'menu-down' : 'menu-up'">
                                            </b-icon>
                                        </a>
                                    </div>
                                    <div class="card-content">
                                        <div class="content">
                                            <table class="table is-fullwidth">
                                                <tbody>
                                                    @foreach($mostviews as $key => $topic)
                                                    <tr>
                                                        <th>
                                                            <div class="level">
                                                                <div class="level-left">
                                                                    <div class="level-item">
                                                                        <a class="has-text-dark" href="/forum/topic/{{ $topic->topic_id }}">{{ $topic->topic_title }} @if($key < 3) <small><a style="margin-left: 8px;"class="has-text-danger"><i class="fas fa-fire-alt"></i> นิยม #{{$key+1}}</a> @endif</small></a>
                                                                    </div>
                                                                </div>
                                                                <div class="level-right">
                                                                    <div class="level-item">
                                                                        <div><small>โดย {{ $topic->user->name }} | ดู {{ $topic->topic_views }} ครั้ง |  {{ count($topic->comment) }} ตอบกลับ</small></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </b-collapse>
                            </b-tab-item>
                            <b-tab-item label="มาใหม่ล่าสุด" icon-pack="fa" icon="fire-alt">
                                <b-collapse class="card">
                                    <div
                                        slot="trigger"
                                        slot-scope="props"
                                        class="card-header"
                                        role="button">
                                        <p class="card-header-title has-text-primary">
                                            โพสต์ที่ถูกโพสต์ล่าสุดโดยผู้ใช้
                                        </p>
                                        <a class="card-header-icon">
                                            <b-icon
                                                :icon="props.open ? 'menu-down' : 'menu-up'">
                                            </b-icon>
                                        </a>
                                    </div>
                                    <div class="card-content">
                                        <div class="content">
                                            <table class="table is-fullwidth">
                                                <tbody>
                                                    @foreach($lastest as $key => $topic)
                                                    <tr>
                                                        <th>
                                                            <div class="level">
                                                                <div class="level-left">
                                                                    <div class="level-item">
                                                                    <a class="has-text-dark" href="/forum/topic/{{ $topic->topic_id }}">{{ $topic->topic_title }} @if($key == 0) <small><a style="margin-left: 8px;" class="has-text-info"><i class="far fa-clock"></i> ล่าสุด</a></small> @endif</a>
                                                                    </div>
                                                                </div>
                                                                <div class="level-right">
                                                                    <div class="level-item">
                                                                        <div><small>โดย {{ $topic->user->name }} | ดู {{ $topic->topic_views }} ครั้ง |  {{ count($topic->comment) }} ตอบกลับ</small></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </b-collapse>
                            </b-tab-item>
                            <b-tab-item label="โพสต์ทั้งหมด" icon-pack="fa" icon="globe-asia">
                                <b-collapse class="card">
                                    <div
                                        slot="trigger"
                                        slot-scope="props"
                                        class="card-header"
                                        role="button">
                                        <p class="card-header-title has-text-primary">
                                            โพสต์ทั้งหมดที่ถูกโพสต์ตามลำดับเวลา
                                        </p>
                                        <a class="card-header-icon">
                                            <b-icon
                                                :icon="props.open ? 'menu-down' : 'menu-up'">
                                            </b-icon>
                                        </a>
                                    </div>
                                    <div class="card-content">
                                        <div class="content">
                                            <table class="table is-fullwidth">
                                                <tbody>
                                                    @foreach($topics as $topic)
                                                    <tr>
                                                        <th>
                                                            <div class="level">
                                                                <div class="level-left">
                                                                    <div class="level-item">
                                                                        <a class="has-text-dark" href="/forum/topic/{{ $topic->topic_id }}">{{ $topic->topic_title }}</a>
                                                                    </div>
                                                                </div>
                                                                <div class="level-right">
                                                                    <div class="level-item">
                                                                        <div><small>โดย {{ $topic->user->name }} | ดู {{ $topic->topic_views }} ครั้ง |  {{ count($topic->comment) }} ตอบกลับ</small></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </th>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </b-collapse>
                            </b-tab-item>
                        </b-tabs>
                    </div>
                    <div class="column is-2">
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title has-text-dark">
                                    ตามหมวดหมู่
                                </p>
                                <a href="#" class="card-header-icon has-text-dark" aria-label="more options">
                                <span class="icon">
                                    <i class="fas fa-list-alt" aria-hidden="true"></i>
                                </span>
                                </a>
                            </header>
                            <div class="card-content">
                                <div class="content">
                                    <table class="table is-fullwidth">
                                        <tbody>
                                            @foreach($categories as $category)
                                            <tr>
                                                <th>
                                                    <div class="level">
                                                        <div class="level-left">
                                                            <div class="level-item">
                                                            <a class="has-text-dark" href="{{ route('forumcategory.show', [$category->forum_category_id])  }}"><i class="fas fa-tags fa-xs"></i> {{ $category->forum_category_name }}</a>
                                                            </div>
                                                        </div>
                                                        <div class="level-right">
                                                            <div class="level-item">

                                                            </div>
                                                        </div>
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
                </div>
            </div>
        </section>
    </div>
    @include('components.footer')

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

</body>
</html>
