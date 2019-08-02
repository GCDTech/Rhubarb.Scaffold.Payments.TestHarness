rhubarb.vb.create('CustomerInitiatedViewBridge', function() {
    return {
        attachEvents:function() {
            this.paymentControl = this.findChildViewBridge('Payment');

            this.viewNode.querySelector('.js-paynow').addEventListener('click', (event) => {
                this.paymentControl
                    .attemptPayment(this.model.paymentEntity)
                    .then(function(paymentEntity){
                        alert('Success!');
                    },function(paymentEntity){
                        alert('Failed: ' + paymentEntity.error);
                    });

                event.preventDefault();
            });
        }
    };
})