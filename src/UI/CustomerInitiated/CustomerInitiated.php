<?php

namespace Gcd\Payments\TestHarness\UI\CustomerInitiated;

use Rhubarb\Leaf\Leaves\Leaf;

class CustomerInitiated extends Leaf
{
    const BASKET_PRICE = 12.22;

    /** @var CustomerInitiatedModel $model **/
    protected $model;

    protected function getViewClass()
    {
        return CustomerInitiatedView::class;
    }

    protected function createModel()
    {
        return new CustomerInitiatedModel();
    }
}
