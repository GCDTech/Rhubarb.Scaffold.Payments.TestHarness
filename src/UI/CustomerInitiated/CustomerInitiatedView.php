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
        <p>Test Cards:</p>
        <a href="https://stripe.com/docs/testing">All Test Cards</a>
        <ul>
            <li>4242424242424242  No 3D secure required - success</li>
            <li>4000000000000002  No 3D secure required - declined</li>
            <li>4000002500003155  Requires 3D secure</li>
            <li>4000008400001629  Requires 3D secure but confirmation will be declined</li>
        </ul>
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
