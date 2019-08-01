rhubarb.vb.create('CustomerInitiatedViewBridge', function() {
    return {
        attachEvents:function() {
            this.paymentControl = this.findChildViewBridge('Payment');

            this.viewNode.querySelector('.js-paynow').addEventListener('click', (event) => {
                this.paymentControl
                    .confirmPayment()
                    .then(function(){
                        alert('Success!');
                    });

                event.preventDefault();
            });
        }
    };
})