<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Paypal</title>
    <link rel="stylesheet" href="/css/bulma/bulma.min.css"/>
    <link rel="stylesheet" href="/css/self-custom.css"/>
    <script src="/js/bulma.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Pridi&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
    <script src="https://www.paypal.com/sdk/js?client-id=AVXryUcNd6hdPCIA9Nk5CrPS6Hc-laYQjzi4K-lESiRTAgB2-Ut1JjKP7Ouz_Xea8RDyvWQt6Q7TSWA_"></script>
</head>

<body>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>

    <script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '0.01'
                        }
                    }]
                });
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                    return 
                });
            }


        }).render('#paypal-button-container');
    </script>
</body>
</html>