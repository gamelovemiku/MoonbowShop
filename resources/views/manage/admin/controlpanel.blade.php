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
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>

    <script src="/js/bulma.js"></script>

    <title>Manage Profile</title>
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
                <h1 class="title is-size-2 has-text-weight-bold">Control Panel</h1>
                <p class="subtitle has-text-justified">Manage & Control anything on system<b class="force-bold"></b></p>
                <div class="columns">
                    <div class="column is-3">
                        <div class="box">
                            @include('components.alert')
                            <aside class="menu">
                                <p class="menu-label">
                                    Store
                                </p>
                                <ul class="menu-list">
                                    <a class="menu-block" href="{{ route("item.index") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-shopping-cart"></i>
                                        </span>
                                        Itemshop
                                    </a>
                                </ul>
                                <p class="menu-label">
                                    Administration
                                </p>
                                <ul class="menu-list">
                                    <a class="menu-block" href="{{ route("dashboard.index") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-file-invoice"></i>
                                        </span>
                                        Dashboard
                                    </a>
                                    <a class="menu-block" href="{{ route("usereditor.index") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-user-edit"></i>
                                        </span>
                                        User Editor
                                    </a>
                                    <a class="menu-block" href="{{ route("notice.index") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-bullhorn"></i>
                                        </span>
                                        Notice
                                    </a>
                                    <a class="menu-block" href="{{ route("forumcontrol.index") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-comments"></i>
                                        </span>
                                        Forum Category
                                    </a>
                                    <a class="menu-block" href="{{ route("commandsender") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-terminal"></i>
                                        </span>
                                        Command Sender
                                    </a>
                                    <a class="menu-block" href="{{ route("recyclebin.index") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-recycle"></i>
                                        </span>
                                        Recycle Bin
                                    </a>
                                    <p class="menu-label">
                                        Systems
                                    </p>
                                    <a class="menu-block" href="{{ route("settings.index") }}">
                                        <span class="menu-icon icon">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        General Settings
                                    </a>
                                    <a class="menu-block" href="{{ route('paymentplan.index') }}">
                                        <span class="menu-icon icon">
                                            <i class="far fa-credit-card"></i>
                                        </span>
                                        Payment Plans
                                    </a>
                                </ul><hr/>
                            <a class="button is-danger is-fullwidth" href="{{ route('logout') }}">Sign Out</a>
                            </aside>
                        </div>
                    </div>
                    <div class="column is-9">
                        <div class="box" style="height: auto">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @include('components.footer')
</body>
</html>
