<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://unpkg.com/buefy/dist/buefy.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Poppins|Pridi:400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css" integrity="sha256-a2tobsqlbgLsWs7ZVUGgP5IvWZsx8bTNQpzsqCSm5mk=" crossorigin="anonymous" />

    <link rel="stylesheet" href="/css/self-custom.css"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/4.4.95/css/materialdesignicons.min.css" integrity="sha256-Oc9/ZPm5B07aJEXLaFs7vkuVzAO1pKJo8EKmiuqG9Qo=" crossorigin="anonymous" />

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="/js/bulma.js"></script>

    <title>แผงควบคุม - Control Panel</title>
</head>

<script type="text/javascript">

    $(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            $("#upload-header").text("Selected");
            $("#upload-filename").text(fileName);
        });
    });

</script>

<body>
    @include('components.navbar')
        <section class="section is-uppercase" style="margin-bottom: 4em; margin-top: 4em">
            <div class="container">
                <div class="columns">
                    <div class="column is-3">
                        @hasSection ('breadcrumb')
                            <div class="subtitle">
                                @yield('breadcrumb')
                            </div>
                        @endif
                        <h1 class="title is-size-1 has-text-weight-bold">แผงควบคุม</h1>
                        <p class="subtitle has-text-justified">ควบคุมส่วนต่างๆ ของเว็บไซต์และระบบ<b class="force-bold"></b></p>
                        <div class="sidemenu">
                            @include('components.alert')
                            <aside class="menu">
                                <p class="menu-label">
                                    ร้านค้าและไอเท็ม
                                </p>
                                <ul class="menu-list">
                                    <a class="menu-block" href="{{ route("item.index") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-shopping-cart"></i>
                                        </span>
                                        ร้านค้า</span>
                                    </a>
                                    <a class="menu-block" href="{{ route('redeem.index')}}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-gifts"></i>
                                        </span>
                                        โค๊ดแลกรางวัล
                                    </a>
                                    <a class="menu-block" href="{{ route('category.index')}}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-question-circle"></i>
                                        </span>
                                        สุ่มรางวัล
                                    </a>
                                </ul>
                                <p class="menu-label">
                                    การควบคุมระบบ
                                </p>
                                <ul class="menu-list">
                                    <a class="menu-block" href="{{ route("dashboard.index") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-file-invoice"></i>
                                        </span>
                                        ภาพรวม
                                    </a>
                                    <a class="menu-block" href="{{ route("usereditor.index") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-user-edit"></i>
                                        </span>
                                        ตัวจัดการผู้ใช้
                                    </a>
                                    <a class="menu-block" href="{{ route("notice.index") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-bullhorn"></i>
                                        </span>
                                        ประกาศ
                                    </a>
                                    <a class="menu-block" href="{{ route("forumcontrol.index") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-comments"></i>
                                        </span>
                                        หมวดหมู่บอร์ด
                                    </a>
                                    <a class="menu-block" href="{{ route("commandsender") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-terminal"></i>
                                        </span>
                                        ตัวส่งคำสั่ง
                                    </a>
                                    <a class="menu-block" href="{{ route("recyclebin.index") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-recycle"></i>
                                        </span>
                                        ถังขยะ
                                    </a>
                                    <p class="menu-label">
                                        ระบบ
                                    </p>
                                    <a class="menu-block" href="{{ route("settings.index") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        ตั้งค่าทั่วไป
                                    </a>
                                    <a class="menu-block" href="{{ route("server.index") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-server"></i>
                                        </span>
                                        ตั้งค่าเซิร์ฟเวอร์เกม
                                    </a>
                                    <a class="menu-block" href="{{ route('paymentplan.index') }}">
                                        <span class="menu-icon icon">
                                            <i class="far fa-credit-card"></i>
                                        </span>
                                        ตั้งค่าการเติมเงิน
                                    </a>
                                    <a class="menu-block" href="{{ route("settings.index") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-plug"></i>
                                        </span>
                                        ส่วนเสริม
                                    </a>
                                </ul><hr/>
                            <a class="button is-danger is-fullwidth" href="{{ route('logout') }}">Sign Out</a>
                            </aside>
                        </div>
                    </div>
                    @hasSection ('quickbar')
                        <div class="column is-6">
                            <div class="box" style="height: 100%">
                                @yield('content')
                            </div>
                        </div>
                        <div class="column is-3">
                            <div class="box" style="height: 100%">
                                @yield('quickbar')
                            </div>
                        </div>
                    @else
                        <div class="column is-9">
                            <div class="box" style="height: 100%">
                                @yield('content')
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </section>
    @include('components.footer')
</body>
</html>
