<?php

namespace Gcd\Payments\TestHarness\UI\Menu;

use Rhubarb\Leaf\Views\View;

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

}
