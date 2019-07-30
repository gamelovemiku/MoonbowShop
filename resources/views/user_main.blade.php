<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Authentication</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" integrity="sha256-vK3UTo/8wHbaUn+dTQD0X6dzidqc5l7gczvH+Bnowwk=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Pridi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
</head>

<style>
    html, body{
        /*font-family: 'Pridi', serif;*/
        font-weight: 600;
    }
    .force-bold{
        font-weight: 800;
    }
    .title-product{
        font-size: : 60px;
        font-weight: 800;
    }
</style>
<body>
    <nav class="navbar is-black" role="navigation" aria-label="main navigation">
        <div class="container is-uppercase">
            <div class="navbar-brand">
                <a class="navbar-item">
                    <div><small style="font-size: 12px;">MOONBOWMC</small><br/><b>CONTROL PANEL</b></div>
                </a>
            
                <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                </a>
            </div>
            
            <div id="navbarBasicExample" class="navbar-menu">
                <div class="navbar-start">
                    <a class="navbar-item">
                        <i class="fas fa-shopping-bag"></i> STORE
                    </a>
                
                    <a class="navbar-item">
                        <i class="fas fa-boxes"></i>  REDEEM
                    </a>

                    <a class="navbar-item">
                        <i class="fas fa-diagnoses"></i> STATISTICS
                    </a>

                    <a class="navbar-item">
                        <i class="fab fa-discord"></i> FORUM
                    </a>
                </div>
            </div>
                <div class="navbar-end">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            <i class="fas fa-users-cog"></i> GameLovemiku
                        </a>
                    <div class="navbar-dropdown">
                        <a class="navbar-item">
                            Free daily item
                        </a>
                        <a class="navbar-item">
                            Topup
                        </a>
                        <a class="navbar-item">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <section class="section">
        <div class="container is-uppercase">
            <h1 class="title is-size-1 force-bold">Store</h1>
            <p class="subtitle">Buy your item, to make your gameplay better.</p>
            <div class="box" style="width: 100%">
                <div class="columns">
                    <div class="column">
                        <div class="box">
                            <div class="title-product">Diamond</div>
                        </div>
                    </div>
                    <div class="column">
                        <div class="box">
                            <h4>Gold</h4>
                        </div>
                    </div>
                    <div class="column">
                        <div class="box">
                            <h4>Cobblestone</h4>
                        </div>
                    </div>
                    <div class="column">
                        <div class="box">
                            <h4>Redstone</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>