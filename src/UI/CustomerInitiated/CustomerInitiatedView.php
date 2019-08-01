<?php

namespace Gcd\Payments\TestHarness\UI\CustomerInitiated;

use Rhubarb\Leaf\Views\View;
use Rhubarb\Leaf\Leaves\LeafDeploymentPackage;

class CustomerInitiatedView extends View
{
    /** @var CustomerInitiatedModel $model **/
    protected $model;

    protected function createSubLeaves()
    {
        parent::createSubLeaves();
    }

    protected function printViewContent()
    {
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
