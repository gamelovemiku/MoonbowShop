<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Topup</title>
    <link rel="stylesheet" href="/css/bulma/bulma.min.css"/>
    <link rel="stylesheet" href="/css/self-custom.css"/>
    <script src="/js/bulma.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Pridi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
</head>


<body>
    @include('components.navbar')
    <section class="hero is-black is-fullheight" style="background-image: url('https://www.tokkoro.com/picsup/2906325-minecraft-black-gold___game-wallpapers.jpg'); background-position: center; background-repeat: no-repeat; background-size: cover;">
        <div class="hero-body">
            <div class="container is-uppercase">
                <h1 class="title is-1 force-bold">
                    <i class="fas fa-gamepad"></i> เติมเงิน
                </h1>
                <p class="subtitle">
                    รับพ้อยท์เพิ่มทันทีเพื่อไปใช้ในเว็บไซต์
                </p>
                <div class="columns">
                    <div class="column is-8">
                        <div class="">
                            <div class="title-category">ปลอดภัย. รวดเร็ว. ดีกว่า.
                                <p class="text-category">ระบบรับชำระเงินโดย omise.co</p>
                            </div>
                            <div class="columns is-multiline">
                                @forelse ($plans as $plan)
                                    <div class="column is-4">
                                        <div class="box" style="width: 100%; background-image: linear-gradient(135deg, #fdfcfb 0%, #e2d1c3 100%);">
                                            <h4 class="title is-5 has-text-weight-bold has-text-dark">{{ $plan->plan_title }}</h4>
                                            <div class="subtitle is-6 has-text-dark has-text-weight-bold">{{ $plan->plan_price }} บาท</div>
                                            <div class="content">
                                                <div class="title has-text-dark">{{ number_format($plan->plan_points_amount) }} พ้อยท์</div>
                                                <div class="subtitle has-text-dark is-7">รับทันทีเมื่อเติมเงินสำเร็จ</div>
                                            </div>
                                            <a href="{{ route('topup.show', [$plan->plan_id]) }}" class="button is-dark is-fullwidth is-outlined"><i class="fas fa-credit-card" style="margin-right: 8px;"></i>ซื้อ ({{ $plan->plan_price }} บาท)</a>
                                        </div>
                                    </div>
                                @empty

                                @endforelse
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>
