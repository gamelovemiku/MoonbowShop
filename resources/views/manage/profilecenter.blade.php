<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="theme-color" content="#167DF0">

    <title>Manage Profile</title>
    <link rel="stylesheet" href="https://unpkg.com/buefy/dist/buefy.min.css">
    <link rel="stylesheet" href="/css/self-custom.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Poppins|Pridi:400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css" integrity="sha256-a2tobsqlbgLsWs7ZVUGgP5IvWZsx8bTNQpzsqCSm5mk=" crossorigin="anonymous" />
    <link href="//cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/2.5.94/css/materialdesignicons.min.css">

    <script src="/js/bulma-toast.min.js"></script>
    <script src="/js/bulma.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slideout/1.0.1/slideout.min.js"></script>
    <script src="//cdn.quilljs.com/1.3.6/quill.min.js"></script>

    <script type="text/javascript">

        $(document).ready(function(){
            $('input[type="file"]').change(function(e){

                var fileName = e.target.files[0].name;
                $("#upload-header").text("Selected");
                $("#upload-filename").text(fileName);
            });
        });

    </script>
</head>

    @include('components.navbar')
    <section class="section is-uppercase" style="margin-bottom: 3em; margin-top: 4em;">
        <div class="container">
            <h1 class="title is-size-2 has-text-weight-bold">Profile</h1>
            <p class="subtitle has-text-justified">Your profile and everythings association to you!<b class="force-bold"></b></p>
            <div class="columns">
                <div class="column is-3">
                    <div class="box">
                        @include('components.alert')
                        <aside class="menu">
                            <p class="menu-label">
                                User Profile
                            </p>
                            <ul class="menu-list">
                                <a class="menu-block" href="{{ route("profile.index") }}">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-id-card"></i>
                                    </span>
                                    Profile
                                </a>
                                <a class="menu-block" href="{{ route("profile.changepassword") }}">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-key"></i>
                                    </span>
                                    Change Password
                                </a>
                            </ul>
                            <p class="menu-label">
                                History
                            </p>
                            <ul class="menu-list">
                                <a class="menu-block" href="{{ route("history.index") }}">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-receipt"></i>
                                    </span>
                                    Purchase history
                                </a>
                            </ul>
                            <p class="menu-label">
                                Forums
                            </p>
                            <ul class="menu-list">
                                <a class="menu-block" href="{{ route("topicmanager.index") }}">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-book"></i>
                                    </span>
                                    All Posts
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
<script>
    $('.clickaction').click(function(){
        document.getElementById("submit_button").classList.add('is-loading');
        $("#verifyform").submit();
    });

</script>
</html>
