rhubarb.vb.create('OffSessionViewBridge', function() {
    return {
        attachEvents:function() {
            this.paymentControl = this.findChildViewBridge('Payment');

            this.viewNode.querySelector('.js-paynow').addEventListener('click', (event) => {

                this.paymentControl
                    .setupPaymentMethod()
                    .then((setupEntity) => {
                        this.paymentCaptured(setupEntity);
                    }, function (setupEntity) {
                        alert('Failed: ' + setupEntity.error);
                    });

                event.preventDefault();
            });

            this.viewNode.querySelector('.js-takepayment').addEventListener('click', (event) => {

                this.raiseServerEvent('takePayment', this.capturedPaymentMethod, function(result){
                    alert(result);
                });

                event.preventDefault();
            });
        },

        paymentCaptured: function(setupEntity) {
            this.capturedPaymentMethod = setupEntity;
            this.viewNode.querySelector('#capture').style.display = 'none';
            this.viewNode.querySelector('#payment').style.display = 'block';
        }
    };
});