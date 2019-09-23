<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Checkout - {{ $items->item_name }}</title>
    <link rel="stylesheet" href="/css/bulma/bulma.css"/>
    <link rel="stylesheet" href="/css/self-custom.css"/>
    <script src="/js/bulma.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Pridi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
</head>

<body>
    @include('components.navbar')
    <section class="section" style="margin-bottom: 3em; margin-top: 6em;">
        <div class="container is-uppercase">
            <h1 class="title is-size-1 force-bold has-text-centered">ยืนยันคำสั่งซื้อ</h1>
            <p class="subtitle has-text-centered">ตรวจสอบคำสั่งซื้ออีกครั้ง</b></p>
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <p class="content">
                        <div class="box">
                            <div class="columns">
                                <div class="column is-12">
                                    <div class="title-category">ข้อมูล</small></div>
                                    <table class="table table is-narrow is-fullwidth">
                                        <tbody>
                                            <tr>
                                                <th>ภาพ</th>
                                                <th><img src="{{ "/storage/itemshop/cover/" . $items->item_image_path }}" alt="Order Picture"/></th>
                                            </tr>
                                            <tr>
                                                <th>ผู้สั่งซื้อ</th>
                                                <th>{{ Auth::user()->name }}</th>
                                            </tr>
                                            <tr>
                                                <th>ชื่อสินค้า</th>
                                                <th>{{ $items->item_name }}</th>
                                            </tr>
                                             <tr>
                                                <th>ราคา (พ้อยท์)</th>
                                                <th>
                                                    @if ($items->item_discount_price != null)
                                                        <del>{{ $items->item_price }} Points</del> >
                                                        <a class="has-text-danger">{{ $items->item_discount_price }} พ้อยท์</a>
                                                    @else
                                                        {{ $items->item_price }} พ้อยท์
                                                    @endif
                                                </th>
                                            </tr>
                                            <tr>
                                                <th>หมวดหมู่</th>
                                                <th>{{ $items->category->category_name }}</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        <form action="{{ action('CheckoutController@verifiedbuy') }}" method="post" id="verifyform">
                            @csrf
                            <input type="hidden" name="id" value="{{ $items->item_id}}">
                            <div class="buttons is-right">
                                <button type="submit" id="submit_button" class="button is-black is-fullwidth clickaction has-text-weight-medium">ยืนยันคำสั่งซื้อในราคา {{ $items->item_discount_price ?? $items->item_price }} พ้อยท์</button>
                                <a href="{{route('store')}}" class="button is-info is-fullwidth has-text-weight-medium">กลับไปที่ร้านค้า</a>
                            </div>
                        </form>
                        </div>
                    </p>
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
