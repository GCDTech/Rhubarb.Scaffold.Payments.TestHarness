<?php

namespace Gcd\Payments\TestHarness\UI\MOTO;

use Gcd\Payments\TestHarness\UI\CustomerInitiated\CustomerInitiated;
use Gcd\Scaffold\Payments\Stripe\UI\StripePaymentCaptureControl\StripePaymentCaptureControl;
use Rhubarb\Leaf\Controls\Common\Text\NumericTextBox;
use Rhubarb\Leaf\Views\View;
use Rhubarb\Leaf\Leaves\LeafDeploymentPackage;

class MOTOView extends View
{
    /** @var MOTOModel $model **/
    protected $model;

    protected function createSubLeaves()
    {
        $this->registerSubLeaf(
            new StripePaymentCaptureControl("Payment", false),
            new NumericTextBox("Amount")
        );

        parent::createSubLeaves();
    }

    protected function printViewContent()
    {
        ?>
        <h2>Merchant initiated MOTO journey</h2>
        <p>This page simulates taking money when the customer is on the phone.</p>
        <h2>Pay Account Balance Online</h2>
        <p>Your balance is <strong>&pound;<?=MOTO::BALANCE;?></strong></p>
        <?php

        print $this->leaves["Amount"];
        print $this->leaves["Payment"];

        ?><button class="js-paynow">Pay Now!</button><?php
    }

    public function getDeploymentPackage()
    {
        return new LeafDeploymentPackage(__DIR__ . '/MOTOViewBridge.js');
    }

    protected function getViewBridgeName()
    {
        return 'MOTOViewBridge';
    }
}
