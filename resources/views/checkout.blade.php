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
    }
    .section {
        margin-top: 64px;
    }

</style>

<script>
    class App extends Component {
        constructor(props) {
            constructor(){
                
            }
            
        }
        render() {
            
            return (
                <div>Test</div>
            )
        }
    }
</script>

<body>
    @include('components.navbar')
    <section class="section">
        <div class="container is-uppercase">
            <h1 class="title is-size-1 force-bold">Check out: Confirmation</h1>
            <p class="subtitle">Reviews your order information.</b></p>
            <div class="columns">
                <div class="column is-12">
                    <p class="content">
                        <div class="box">
                        <div class="title-category">Description</div>                            
                            <ul>
                                <li>ITEM NAME: {{ $items->item_name }}</li>
                                <li>PRICE: {{ $items->item_price }}</li>
                                <li>CATEGORY: {{ $items->item_category }}</li>
                                <li>ITEM REFERENCE: {{ $items->item_id }}</li>
                                <li>COMMAND: {{ $items->item_command }}</li>
                                <p class="subtitle">The items will send to <b class="force-bold">{{ Auth::user()->name }}</b></p>
                            </ul>
                            <img src="{{ "/assets/image/store/" . $items->item_image_path }}" alt="Order Picture"/>
                        </div>
                    </p>
                    <div class="buttons is-right">
                        <div id="root"></div>
                        <a class="button is-black" href={{route('comfirmed_buy', ['id' => $items->item_id, 'playername' => Auth::user()->name])}}>Confirm then send to {{ Auth::user()->name }}</a>
                        <a href="/store" class="button is-danger">Cancel</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>