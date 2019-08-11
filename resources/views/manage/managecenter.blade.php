<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage Profile</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" integrity="sha256-vK3UTo/8wHbaUn+dTQD0X6dzidqc5l7gczvH+Bnowwk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Poppins|Pridi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css" integrity="sha256-a2tobsqlbgLsWs7ZVUGgP5IvWZsx8bTNQpzsqCSm5mk=" crossorigin="anonymous" />
    <script src="js/bulma-toast.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<style>
    html, body, .button {
        font-family: 'Segoe UI' ,'Pridi', serif;
        font-weight: 600;
    }
    textarea {
        font-family: 'Segoe UI' ,'Pridi', serif;
        font-weight: 400;
    }
    .button {
        font-family: 'Segoe UI' ,'Pridi', serif;
        text-transform: uppercase;
    }
    .force-bold{
        font-weight: 800;
    }
    .title-product{
        font-size: 18px;
        font-weight: 800;
    }
    .subtitle-product{
        color: lightgrey;
        font-size: 12px;
        font-weight: 400;
    }
    .pricetag-product{
        color: gray;
        font-size: 16px;
        font-weight: 600;
        text-align: center;
    }
    .button-product{
        margin-top: 8px;
    }
    .small-title{
        font-size: 10px;
        margin: 12px;
    }
    .title-category {
        font-size: 24px;
        font-weight: 800;
        margin-bottom: 12px;
    }
    .text-category {
        color: lightgray;
        font-size: 14px;
        font-weight: 600;
    }
    .box-fullheight {
        height: 100%;
    }
    .title-news {
        font-size: 16px;
        font-weight: 600;
    }
    .text-news {
        color: gray;
        font-size: 12px;
        font-weight: 400;
    }
    .text-stats {
        color: lightgray;
        font-size: 12px;
        font-weight: 600;
    }
    .section {
        margin-top: 64px;

    }
    .swal-button {
        padding: 7px 19px;
        background-color: #0A0A0A;
        font-size: 14px;
        text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
    }
    .button {
        font-family: 'Segoe UI' ,'Pridi', serif;
        text-transform: uppercase;
    }
</style>

    @include('components.navbar')
    <section class="section is-uppercase">
        <div class="container">
            <h1 class="title is-size-1 force-bold">Management Center</h1>
            <p class="subtitle">Edit or Manage your profile<b class="force-bold"></b></p>
            <div class="columns">
                <div class="column is-3">
                    <div class="box">
                        <aside class="menu">
                            <p class="menu-label">
                                User Profile
                            </p>
                            <ul class="menu-list">
                                <li><a href="/manage/profile">Profile</a></li>
                                <li><a href="/manage/changepassword">Change Password</a></li>
                            </ul>
                            <p class="menu-label">
                                Administration
                            </p>
                            <ul class="menu-list">
                                <a>System Config</a>
                                <a>Edit Player Profile</a>
                                <a>Roles</a>
                                <a>Transactions</a>
                                <li>
                                    <a>Itemshop Management</a>
                                    <ul>
                                        <li><a href="/manage/itemshop/item">Add Item</a></li>
                                        <li><a href="/manage/itemshop/category">Add Category</a></li>
                                    </ul>
                                </li>
                                <li><a>Redeem Code</a></li>
                            </ul>
                            <p class="menu-label">
                                Analytics
                            </p>
                            <ul class="menu-list">
                                <li><a>Global Statistics</a></li>
                                <li><a>Itemshop Analytics</a></li>
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