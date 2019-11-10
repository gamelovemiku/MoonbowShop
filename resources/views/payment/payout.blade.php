<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Payout - {{ $plan->plan_price }} Baht via Credit Card</title>
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
            <h1 class="title is-size-1 force-bold has-text-centered">ยืนยันการเติมเงิน</h1>
            <p class="subtitle has-text-centered">ตรวจสอบการเติมเงินที่กำลังดำเนินการ</b></p>
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <p class="content">
                        <div class="box">
                            <div class="columns">
                                <div class="column is-12">
                                    <div class="title-category">รายละเอียด</small></div>
                                    <table class="table table is-narrow is-fullwidth">
                                        <tbody>
                                            <tr>
                                                <th>ผู้เติมเงิน</th>
                                                <th>{{ Auth::user()->name }}</th>
                                            </tr>
                                            <tr>
                                                <th>ผู้ให้บริการ</th>
                                                <th>{{ $plan->plan_provider }}</th>
                                            </tr>
                                             <tr>
                                                <th>ราคาที่เลือกจ่าย</th>
                                                <th>{{ $plan->plan_price }} บาท</th>
                                            </tr>
                                            <tr>
                                                <th>พ้อยท์ที่จะได้รับ</th>
                                                <th>{{ $plan->plan_points_amount }} พ้อยท์</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <form name="checkoutForm" method="POST" action="{{ route('paymentgateway.omise') }}">
                                @csrf
                                <input type="hidden" value="{{ $plan->plan_id }}" name="plan_id">
                                <div class="buttons is-right">
                                    <button type="submit" class="button is-info is-fullwidth clickaction" id="checkout-button-1"><i class="fas fa-credit-card" style="margin-right: 8px;"></i>ซื้อตอนนี้โดยใช้บัตรธนาคาร ({{ $plan->plan_price }} บาท)</button>
                                    <a id="backstore" href="/store" class="button is-primary is-fullwidth">กลับไปหน้าเลือกรายการเติมเงิน</a>
                                </div>
                                <div id="reloadmsg" style="display: none;">
                                    ** รีโหลดหน้านี้ใหม่ ถ้าคุณได้กดออกมาจากหน้าต่างของ Omise
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
        //document.getElementById("checkout-button-1").classList.add('is-loading');
        $("#verifyform").submit();
        $("#checkout-button-1").html('<i class="fas fa-stroopwafel fa-spin" style="margin-right: 8px;"></i> Processing Transaction...').prop('disabled', true);
        $("#backstore").hide();
        $("#reloadmsg").css('display', 'flex');
    });
</script>

<script type="text/javascript" src="https://cdn.omise.co/omise.js"></script>

<!-- Config the card.js library -->
    <script type="text/javascript">
        // Set default parameters
        OmiseCard.configure({
            publicKey: 'pkey_test_5h47rit3tz99ojp7mbj',
            image: 'https://cdn.omise.co/assets/dashboard/images/omise-logo.png',
            amount: {{$plan->plan_price*100}}
        });
        // Configuring your own custom button
        OmiseCard.configureButton('#checkout-button-1', {
            frameLabel: 'Minecraft by MoonbowMC',
            submitLabel: 'ซื้อ',
        });
        // Then, attach all of the config and initiate it by 'OmiseCard.attach();' method
        OmiseCard.attach();
    </script>

</html>
