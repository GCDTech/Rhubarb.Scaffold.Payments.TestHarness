<?php

namespace Gcd\Payments\TestHarness\UI\MOTO;

use Rhubarb\Leaf\Leaves\Leaf;

class MOTO extends Leaf
{
    const BALANCE = 130.22;


    /** @var MOTOModel $model **/
    protected $model;

    protected function onModelCreated()
    {
        parent::onModelCreated();

        $this->model->Amount = 130.22;
    }

    protected function getViewClass()
    {
        return MOTOView::class;
    }

    protected function createModel()
    {
        return new MOTOModel();
    }
}
