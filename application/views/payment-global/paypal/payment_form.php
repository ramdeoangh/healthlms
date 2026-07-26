<?php
  //start common code of all payment gateway
  if($payment_details['is_instructor_payout_user_id'] > 0){
      $instructor_details = $this->user_model->get_all_user($payment_details['is_instructor_payout_user_id'])->row_array();
      $keys = json_decode($instructor_details['payment_keys'], true);
      $keys = $keys[$payment_gateway['identifier']];
  }else{
      $keys = json_decode($payment_gateway['keys'], true);
  }
  $test_mode = $payment_gateway['enabled_test_mode'];
  //ended common code of all payment gateway

  if($test_mode == 1){
    $paypalURL       = 'https://api.sandbox.paypal.com/v1/';
    $paypalClientID = $keys['sandbox_client_id'];
  } else {
    $paypalURL       = 'https://api.paypal.com/v1/';
    $paypalClientID = $keys['production_client_id'];
  }
?>




<div class="gateway <?php echo $payment_gateway['identifier']; ?>-gateway text-end mt-3 py-3" id="paypal-button-container"></div>
<script src="https://www.paypal.com/sdk/js?client-id=<?php echo $paypalClientID; ?>&enable-funding=venmo,card&currency=<?php echo $payment_gateway['currency']; ?>" data-sdk-integration-source="button-factory"></script>

<script>
    "use strict";

    function initPayPalButton() {
        paypal.Buttons({
            env: '<?php echo ($test_mode == 0) ? 'production':'sandbox';?>',
            style: {
                layout: 'vertical',  // Set to vertical layout
                label: 'paypal',
                size: 'large',      // small | medium | large | responsive
                shape: 'rect',      // pill | rect
                color: 'blue'       // gold | blue | silver | black
            },
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '<?php echo $payment_details['total_payable_amount'];?>',
                            currency_code: '<?php echo $payment_gateway['currency']; ?>'
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    console.log(data);
                    window.location = "<?php echo $payment_details['success_url']. '/' .$payment_gateway['identifier']; ?>" + "?payment_id=" + data.orderID + "&payer_id=" + details.payer.payer_id;
                });
            },
            onError: function(err) {
                console.error(err);
            }
        }).render('#paypal-button-container');
    }

    $(function() {
        const initPaypal = setInterval(function() {
            if (typeof paypal !== 'undefined') {
                initPayPalButton();
                clearInterval(initPaypal);
            }
        }, 500);
    });
</script>


