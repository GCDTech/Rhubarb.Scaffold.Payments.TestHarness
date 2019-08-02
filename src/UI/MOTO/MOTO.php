<?php

namespace Gcd\Payments\TestHarness\UI\MOTO;

use Rhubarb\Leaf\Leaves\Leaf;

class MOTO extends Leaf
{
    /** @var MOTOModel $model **/
    protected $model;

    protected function getViewClass()
    {
        return MOTOView::class;
    }

    protected function createModel()
    {
        return new MOTOModel();
    }
}
