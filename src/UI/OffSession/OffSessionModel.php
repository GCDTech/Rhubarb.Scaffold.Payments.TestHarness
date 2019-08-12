<?php

namespace Gcd\Payments\TestHarness\UI\OffSession;

use Rhubarb\Crown\Events\Event;
use Rhubarb\Leaf\Leaves\LeafModel;

class OffSessionModel extends LeafModel
{
    /**
     * @var Event Raised when we want to simulate an off session payment.
     */
    public $takePaymentEvent;
    public $Email;

    public function __construct()
    {
        parent::__construct();

        $this->takePaymentEvent = new Event();
    }
}