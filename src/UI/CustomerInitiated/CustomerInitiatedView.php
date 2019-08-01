<?php

namespace Gcd\Payments\TestHarness\UI\CustomerInitiated;

use Gcd\Scaffold\Payments\Stripe\UI\StripePaymentCaptureControl\StripePaymentCaptureControl;
use Rhubarb\Leaf\Views\View;
use Rhubarb\Leaf\Leaves\LeafDeploymentPackage;

class CustomerInitiatedView extends View
{
    /** @var CustomerInitiatedModel $model **/
    protected $model;

    protected function createSubLeaves()
    {
        parent::createSubLeaves();

        $this->registerSubLeaf(
            new StripePaymentCaptureControl("Payment")
        );
    }

    protected function printViewContent()
    {
        ?>
        <h2>Customer initiated journey</h2>
        <p>This page simulates the confirm step of a checkout. The 'basket' is only simulated in this example,
            don't forget this library is only about the payment.</p>
        <h2>Your Basket</h2>
        <table>
            <tr>
                <td>One heavy duty ball of yarn</td>
                <td>&pound; <?=CustomerInitiated::BASKET_PRICE;?></td>
            </tr>
            <tr>
                <td>Total Order Value</td>
                <td>&pound; <?=CustomerInitiated::BASKET_PRICE;?></td>
            </tr>
        </table>
        <h2>Your Payment Details</h2>
        <?php
        print $this->leaves["Payment"];

        ?><button class="js-paynow">Pay Now!</button><?php

    }

    public function getDeploymentPackage()
    {
        return new LeafDeploymentPackage(__DIR__ . '/CustomerInitiatedViewBridge.js');
    }

    protected function getViewBridgeName()
    {
        return 'CustomerInitiatedViewBridge';
    }
}
