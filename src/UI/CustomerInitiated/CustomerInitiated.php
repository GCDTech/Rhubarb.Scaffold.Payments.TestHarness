<?php

namespace Gcd\Payments\TestHarness\UI\CustomerInitiated;

use Gcd\Scaffold\Payments\UI\Entities\PaymentEntity;
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

    protected function onModelCreated()
    {
        parent::onModelCreated();

        $this->model->paymentEntity = $entity = new PaymentEntity();
        $entity->amount = self::BASKET_PRICE;
        $entity->description = "Ball of yarn";
        $entity->currency = "GBP";
    }
}
