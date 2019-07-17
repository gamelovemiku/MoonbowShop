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
    <script crossorigin src="https://unpkg.com/react@16/umd/react.development.js"></script>
    <script crossorigin src="https://unpkg.com/react-dom@16/umd/react-dom.development.js"></script>
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
        text-align: right;
    }

</style>

<script>
    class App extends Component {
        constructor(props) {

        }
        render() {
            return (

            )
        }
    }
</script>

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
                        <i class="fas fa-shopping-bag" style="margin-right: 8px;"></i> STORE
                    </a>
                
                    <a class="navbar-item">
                        <i class="fas fa-boxes" style="margin-right: 8px;"></i>  REDEEM
                    </a>

                    <a class="navbar-item">
                        <i class="fas fa-diagnoses" style="margin-right: 8px;"></i> STATISTICS
                    </a>

                    <a class="navbar-item">
                        <i class="fab fa-discord" style="margin-right: 8px;"></i> FORUM
                    </a>
                </div>
            </div>
                <div class="navbar-end">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            GameLovemiku <i class="fas fa-user" style="margin-left: 8px;"></i>
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
            <div class="columns">
                <div class="column is-8">
                    <div class="box" style="width: 100%">
                        <div class="title-category">ORES
                            <p class="text-category">Make your new equipment for supporters!</p>
                        </div>
                        <div class="columns is-multiline">
                            @for ($i = 0; $i < 1; $i++)
                                <div class="column is-3">
                                    <div class="box box-fullheight">
                                        <div class="title-product">Diamond
                                            <p class="subtitle-product">It's a powerful ores!</p>
                                            <img width="100%"src="./assets/image/diamond.png" alt="product">
                                            <p class="pricetag-product">1.99 USD | 64 Units</p>
                                            <div class="buttons is-centered button-product">
                                                <button class="button" disabled="disabled">Buy</button>
                                                <button class="button" disabled="disabled">Redeem</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                                
                            <div class="column is-3">
                                <div class="box box-fullheight">
                                    <div class="title-product">Gold Ingot
                                        <p class="subtitle-product">Potion is God!</p>
                                        <img width="100%"src="./assets/image/gold.png" alt="product">
                                        <p class="pricetag-product">1.99 USD | 64 Units</p>
                                        <div class="buttons is-centered button-product">
                                            <button class="button" disabled="disabled">Buy</button>
                                            <button class="button" disabled="disabled">Redeem</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-3">
                                <div class="box box-fullheight">
                                    <div class="title-product">Iron Ingot
                                        <p class="subtitle-product">Cheap but powerful!</p>
                                        <img width="100%"src="./assets/image/iron.png" alt="product">
                                        <p class="pricetag-product">1.99 USD | 64 Units</p>
                                        <div class="buttons is-centered button-product">
                                            <button class="button" disabled="disabled">Buy</button>
                                            <button class="button" disabled="disabled">Redeem</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-3">
                                <div class="box box-fullheight">
                                    <div class="title-product">Redstone
                                        <p class="subtitle-product">Make a Logic!</p>
                                        <img width="100%"src="./assets/image/redstone.png" alt="product">
                                        <p class="pricetag-product">1.99 USD | 64 Units</p>
                                        <div class="buttons is-centered button-product">
                                            <button class="button" disabled="disabled">Buy</button>
                                            <button class="button" disabled="disabled">Redeem</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="column is-3">
                                <div class="box box-fullheight">
                                    <div class="title-product">Charcoal
                                        <p class="subtitle-product">Burn any things!</p>
                                        <img width="100%"src="./assets/image/charcoal.png" alt="product">
                                        <p class="pricetag-product">1.99 USD | 64 Units</p>
                                        <div class="buttons is-centered button-product">
                                            <button class="button" disabled="disabled">Buy</button>
                                            <button class="button" disabled="disabled">Redeem</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="box" style="width: 100%">
                        <div class="columns">
                            <div class="column">
                                <div class="title-category">Notice
                                    <p class="text-category">Information from admin to let you know.</p>
                                </div>
                                <div class="box">
                                    <div class="title-news">Summers Sale!</div>
                                    <p class="text-news">Stay focus, We are offer you to buy any item in store with discount up to 60% from normal price!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box" style="width: 100%">
                        <div class="columns">
                            <div class="column">
                                <div class="title-category">Server Status
                                    <p class="text-category">Hope it always online.</p>
                                </div>
                                <progress class="progress is-link" value="30" max="100">30%</progress>
                                <p class="text-stats">playmc.gamelovemiku.com<br/>5/20 playing now</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>