
    document.getElementById('paymentForm').addEventListener("submit", function(e) {
        e.preventDefault(); // Prevent form submission

        // Your Paystack initialization code here
        let handler = PaystackPop.setup({
            key: 'pk_test_d19b75766790acc8c1c19aa8d6f28cbbbab0e1bf', 
            email: document.getElementById("email-address").value,
            amount: document.getElementById("amount").value * 100,
            ref: 'RUBY' + Math.floor((Math.random() * 1000000000) + 1),
            onClose: function () {
                window.location = "http://localhost:60/localserver/gm-talent/dashboard/";
                alert('Transaction Cancelled.');
            },
            callback: function (response) {
                window.location = "verifyPayment.php?ref="+response.reference;

            }
        });

        handler.openIframe();
    });
