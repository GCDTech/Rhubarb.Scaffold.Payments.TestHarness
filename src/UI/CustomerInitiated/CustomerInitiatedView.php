<?php

namespace Gcd\Payments\TestHarness\UI\CustomerInitiated;

use Gcd\Scaffold\Payments\UI\StripePaymentCaptureControl\StripePaymentCaptureControl;
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
        print $this->leaves["Payment"];
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
