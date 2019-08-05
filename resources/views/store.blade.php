<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Store</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" integrity="sha256-vK3UTo/8wHbaUn+dTQD0X6dzidqc5l7gczvH+Bnowwk=" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css?family=Poppins|Pridi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.css" integrity="sha256-a2tobsqlbgLsWs7ZVUGgP5IvWZsx8bTNQpzsqCSm5mk=" crossorigin="anonymous" />
    <script src="js/bulma-toast.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<style>
    html, body{
        font-family: 'Segoe UI' ,'Pridi', serif;
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
    .swal-button {
        padding: 7px 19px;
        background-color: #0A0A0A;
        font-size: 14px;
        text-shadow: 0px -1px 0px rgba(0, 0, 0, 0.3);
    }

</style>
<body>
    @include('components.navbar')
    <section class="section">
        <div class="container is-uppercase">
            <h1 class="title is-size-1 force-bold">Store</h1>
            <p class="subtitle">Buy your item, to make your gameplay better.</p>
            <div class="columns">
                <div class="column is-8">
                    <div class="box" style="width: 100%">
                        @if (session()->has('moneyNotEnough'))
                            <script>
                                swal("ผิดพลาด: มีเงินไม่พอ", "คุณไม่สามารถซื้อสินค้านี้ได้ เนื่องจากมี Points ไม่เพียงพอ!", "warning");
                                bulmaToast.toast({ 
                                    message: "คุณมีจำนวน Point ไม่เพียงพอในการซื้อสินค้านี้",
                                    type: "is-warning has-text-left",
                                    dismissible: true,
                                    duration: 5000,
                                    animate: { in: "fadeInUp", out: "fadeOutRight" }
                                });
                            </script>
                        @endif
                        @if (session()->has('store_alert'))
                            <script>
                                swal("สั่งซื้อสำเร็จ!", "ระบบทำการจัดส่งสินค้าให้คุณแล้ว!", "success");
                                bulmaToast.toast({ 
                                    message: "สั่งซื้อสำเร็จ! ระบบทำการจัดส่งสินค้าให้คุณแล้ว",
                                    type: "is-success has-text-left",
                                    dismissible: true,
                                    duration: 5000,
                                    animate: { in: "fadeInUp", out: "fadeOutRight" }
                                    });
                            </script>
                        @endif
                        @if (session()->has('error_alert'))
                            <script>
                                swal("มีบางอย่างไม่ถูกต้อง!", "ดูเหมือนว่าจะมีการกระทำบางอย่างทำให้การสั่งซื้อไม่สำเร็จ!", "warning");
                                bulmaToast.toast({ 
                                    message: "มีบางอย่างไม่ถูกต้อง! ดูเหมือนว่าจะมีการกระทำบางอย่างทำให้การสั่งซื้อไม่สำเร็จ",
                                    type: "is-warning has-text-left",
                                    dismissible: true,
                                    duration: 5000,
                                    animate: { in: "fadeInUp", out: "fadeOutRight" }
                                    });
                            </script>
                        @endif
                        <div class="title-category">On sale now for limited time!
                            <p class="text-category">Make your new equipment for supporters!</p>
                        </div>
                        <div class="columns is-multiline">
                            @forelse ($items as $item)
                                    <div class="column is-3">
                                        <div class="box box-fullheight">
                                            <div class="title-product">{{ $item->item_name }}
                                                <p class="subtitle-product">{{ $item->item_desc }}</p>
                                                <img width="100%" src="{{ "./assets/image/store/" . $item->item_image_path }}" alt="product">
                                                <p class="pricetag-product">{{ $item->item_price }} Points / 1 Pcs</p>
                                                <div class="buttons is-centered button-product">
                                                    <a href="/checkout/{{ $item->item_id }}" class="button is-black is-outlined">Buy</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @empty
                                <div class="column is-12">
                                    <p class="is-size-6 has-text-centered has-text-danger" style="margin: 25%">There are no items available for sale.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="column is-4">
                    <div class="box" style="width: 100%">
                        <div class="columns">
                            <div class="column">
                                <div class="title-category">Accounts
                                    <p class="text-category">Your personal status.</p>
                                </div>
                                <span class="tag is-black is-large">{{ $balance }} Points</span>
                            </div>
                        </div>
                    </div>
                    <div class="box" style="width: 100%">
                        <div class="title-category">Redeem
                            <p class="text-category">Have any redeem code? REDEEM IT and GET PRIZE!</p>
                        </div>
                        <form action="{{ action('RedeemController@redeem') }}" method="post">
                            @csrf
                            <div class="field">
                                <input class="input" type="text" name="redeemcode">
                            </div>
                            <div class="buttons">
                                <button class="button" type="submit">Redeem</button>
                            </div>                            
                        </form>
                    </div>
                    @include('components.serverstatus') 
                </div>
            </div>
        </div>
    </section>
    @include('components.footer') 
</body>
</html>