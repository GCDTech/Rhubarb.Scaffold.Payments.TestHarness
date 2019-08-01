<?php

namespace Gcd\Payments\TestHarness\UI\Menu;

use Rhubarb\Leaf\Leaves\Leaf;

class CustomerInitiated extends Leaf
{
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
