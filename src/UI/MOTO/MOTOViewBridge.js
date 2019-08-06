rhubarb.vb.create('MOTOViewBridge', function() {
    return {
        attachEvents:function() {
            this.paymentControl = this.findChildViewBridge('Payment');

            this.viewNode.querySelector('.js-paynow').addEventListener('click', (event) => {

                var paymentEntity = {
                    amount: this.findChildViewBridge('Amount').getValue(),
                    description: 'Pay Balance',
                    currency: 'GBP'
                };

                this.paymentControl
                    .attemptPayment(paymentEntity)
                    .then(function(paymentEntity){
                        alert('Success!');
                    },function(paymentEntity){
                        if (paymentEntity.status === 'Awaiting Authentication'){
                            alert('Sorry, despite being flagged as MOTO, the bank is requesting authentication.');
                        } else {
                            alert('Failed: ' + paymentEntity.error);
                        }
                    });

                event.preventDefault();
            });
        }
    };
})