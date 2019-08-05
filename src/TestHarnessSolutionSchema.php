<?php

namespace Gcd\Payments\TestHarness;

use Gcd\Scaffold\Payments\Models\PaymentTracking;
use Rhubarb\Stem\Schema\SolutionSchema;

class TestHarnessSolutionSchema extends SolutionSchema
{
    public function __construct()
    {
        parent::__construct();

        $this->addModel('PaymentTracking',PaymentTracking::class);
    }
}
