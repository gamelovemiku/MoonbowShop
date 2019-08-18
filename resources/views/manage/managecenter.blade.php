<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Profile</title>
    <link rel="stylesheet" href="/css/bulma/bulma.min.css"/>
    <link rel="stylesheet" href="/css/self-custom.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Poppins|Pridi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css" integrity="sha256-a2tobsqlbgLsWs7ZVUGgP5IvWZsx8bTNQpzsqCSm5mk=" crossorigin="anonymous" />
    <script src="/js/bulma-toast.min.js"></script>
    <script src="/js/bulma.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    
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
    <section class="section is-uppercase" style="margin-bottom: 4em;">
        <div class="container">
            <h1 class="title is-size-2 force-bold">Management Center</h1>
            <p class="subtitle is-size-6">Edit or Manage your profile<b class="force-bold"></b></p>
            <div class="columns">
                <div class="column is-3">
                    <div class="box">
                        @include('components.alert')
                        <aside class="menu">
                            <p class="menu-label">
                                User Profile
                            </p>
                            <ul class="menu-list">
                                <a class="menu-block" href="/manage/profile">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-id-card"></i>
                                    </span>
                                    Profile
                                </a>
                                <a class="menu-block" href="/manage/changepassword">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-key"></i>
                                    </span>
                                    Change Password
                                </a>
                            </ul>
                            <p class="menu-label">
                                Administration
                            </p>
                            <ul class="menu-list">
                                <a class="menu-block" href="#">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-info-circle"></i>
                                    </span>
                                    General Settings
                                </a>
                                <a class="menu-block" href="#">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-user-edit"></i>
                                    </span>
                                    Profile Editor
                                </a>
                                <a class="menu-block" href="#">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-pencil-ruler"></i>
                                    </span>
                                    Roles
                                </a>
                                <a class="menu-block" href="#">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-history"></i>
                                    </span>
                                    Logs
                                </a>
                                <a class="menu-block" href="/manage/itemshop/item">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-shopping-cart"></i>
                                    </span>
                                    Itemshop Management
                                </a>
                                <a class="menu-block" href="/manage/itemshop/item">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-gifts"></i>
                                    </span>
                                    Redeem Code
                                </a>
                            </ul>
                            <p class="menu-label">
                                Analytics
                            </p>
                            <ul class="menu-list">
                                <a class="menu-block" href="/manage/itemshop/item">
                                    <span class="menu-icon icon">
                                        <i class="fas fa-chart-line"></i>
                                    </span>
                                    Global
                                </a>
                                <a class="menu-block" href="/manage/itemshop/item">
                                    <span class="menu-icon icon">
                                            <i class="fas fa-flag-checkered"></i>
                                    </span>
                                    Player Actions
                                </a>
                            </ul>
                        </aside>
                    </div>
                </div>
                <div class="column is-9">
                    <div class="box">
                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </section>
@include('components.footer') 
</body>
</html>