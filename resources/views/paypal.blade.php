<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Payment - pkey_test_5h47rit3tz99ojp7mbj</title>
        <link rel="stylesheet" href="/css/bulma/bulma.css"/>
        <link rel="stylesheet" href="/css/self-custom.css"/>
        <script src="/js/bulma.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Pridi&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
    </head>
<body>

  <div class="form">
    <h1>Example 3: Custom integration</h1>
    <p>Create a checkout button by uses custom integration way to integrate.</p>

    <form name="checkoutForm" method="POST" action="/omise">
        @csrf
      <!-- Create your own button -->
      <button type="submit" class="button is-info is-outlined" id="checkout-button-1">My Checkout Button !</button>
    </form>

  </div>

  <!-- Include card.js library -->
  <script type="text/javascript" src="https://cdn.omise.co/omise.js"></script>

  <!-- Config the card.js library -->
  <script type="text/javascript">
    // Set default parameters
    OmiseCard.configure({
      publicKey: 'pkey_test_5h47rit3tz99ojp7mbj',
      image: 'https://cdn.omise.co/assets/dashboard/images/omise-logo.png',
      amount: 50000
    });
    // Configuring your own custom button
    OmiseCard.configureButton('#checkout-button-1', {
      frameLabel: 'Minecraft by MoonbowMC',
      submitLabel: 'Checkout',
    });
    // Then, attach all of the config and initiate it by 'OmiseCard.attach();' method
    OmiseCard.attach();
  </script>

</body>
</html>
