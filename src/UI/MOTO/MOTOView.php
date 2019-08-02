<?php

namespace Gcd\Payments\TestHarness\UI\MOTO;

use Rhubarb\Leaf\Views\View;
use Rhubarb\Leaf\Leaves\LeafDeploymentPackage;

class MOTOView extends View
{
    /** @var MOTOModel $model **/
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
        return new LeafDeploymentPackage(__DIR__ . '/MOTOViewBridge.js');
    }

    protected function getViewBridgeName()
    {
        return 'MOTOViewBridge';
    }
}
