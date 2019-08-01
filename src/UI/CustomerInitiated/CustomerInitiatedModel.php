<?php

namespace Gcd\Payments\TestHarness\UI\CustomerInitiated;

use Rhubarb\Leaf\Leaves\LeafModel;

class CustomerInitiatedModel extends LeafModel
{
    public $paymentEntity;

    public function __constructor()
    {
        parent::__construct();
    }

    protected function getExposableModelProperties()
    {
        $list = parent::getExposableModelProperties();
        $list[] = "paymentEntity";

        return $list;
    }


}
