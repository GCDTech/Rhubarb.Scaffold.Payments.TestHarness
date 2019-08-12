<?php

namespace Gcd\Payments\TestHarness\UI\OffSession;

use Gcd\Payments\TestHarness\Email\Templates\TestHarnessPaymentAuthenticationEmail;
use Gcd\Scaffold\Payments\Logic\UseCases\SendPaymentAuthorisationRequestEmailUseCase;
use Gcd\Scaffold\Payments\Logic\UseCases\TakePaymentUseCase;
use Gcd\Scaffold\Payments\Stripe\Services\StripePaymentService;
use Gcd\Scaffold\Payments\UI\Entities\PaymentEntity;
use Gcd\Scaffold\Payments\UI\Entities\SetupEntity;
use Rhubarb\Leaf\Leaves\Leaf;

class OffSession extends Leaf
{
    /** @var OffSessionModel $model **/
    protected $model;

    protected function getViewClass()
    {
        return OffSessionView::class;
    }

    protected function createModel()
    {
        return new OffSessionModel();
    }

    protected function onModelCreated()
    {
        parent::onModelCreated();

        $this->model->takePaymentEvent->attachHandler(function($setupEntity){
            $setupEntity = SetupEntity::castFromObject($setupEntity);

            $paymentEntity = PaymentEntity::fromSetupEntity($setupEntity);
            $paymentEntity->amount = 100;
            $paymentEntity->currency = "GBP";
            $paymentEntity->description = "Off session test";
            $paymentEntity->onSession = false;
            $paymentEntity->emailAddress = $this->model->Email;

            TakePaymentUseCase::create(new StripePaymentService())->execute($paymentEntity);
            SendPaymentAuthorisationRequestEmailUseCase::create(new TestHarnessPaymentAuthenticationEmail($paymentEntity))
                ->execute($paymentEntity->emailAddress);

            return $paymentEntity->status;
        });
    }
}
