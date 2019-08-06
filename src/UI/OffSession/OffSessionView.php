<?php

namespace Gcd\Payments\TestHarness\UI\OffSession;

use Gcd\Payments\TestHarness\UI\MOTO\MOTO;
use Gcd\Scaffold\Payments\Stripe\UI\StripePaymentCaptureControl\StripePaymentCaptureControl;
use Rhubarb\Leaf\Controls\Common\Text\NumericTextBox;
use Rhubarb\Leaf\Views\View;
use Rhubarb\Leaf\Leaves\LeafDeploymentPackage;

class OffSessionView extends View
{
    /** @var OffSessionModel $model **/
    protected $model;

    protected function createSubLeaves()
    {
        $this->registerSubLeaf(
            new StripePaymentCaptureControl("Payment")
        );

        parent::createSubLeaves();
    }

    protected function printViewContent()
    {
        ?>
        <h2>Merchant initiated Off Session Against Saved Card</h2>
        <p>This page simulates when a merchant tries to confirm a payment against a stored payment
            method that will require SCA authentication.</p>

        <p>The first step is to capture card details below and then the interface for confirming
        a payment will be revealed.</p>

        <div id="capture">
            <h2>Capture card details</h2>
            <?php

            print $this->leaves["Payment"];

            ?><button class="js-paynow">Capture Details</button>
        </div>
        <div id="payment" style="display:none">
            <button class="js-takepayment">Take a payment</button>
        </div>
        <?php
    }

    public function getDeploymentPackage()
    {
        return new LeafDeploymentPackage(__DIR__ . '/OffSessionViewBridge.js');
    }

    protected function getViewBridgeName()
    {
        return 'OffSessionViewBridge';
    }
}
