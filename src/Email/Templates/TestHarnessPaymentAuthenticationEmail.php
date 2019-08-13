<?php

namespace Gcd\Payments\TestHarness\Email\Templates;


use Gcd\Scaffold\Payments\Emails\PaymentAuthenticationTemplateEmail;

class TestHarnessPaymentAuthenticationEmail extends PaymentAuthenticationTemplateEmail
{

    protected function getBaseUrl()
    {
        return 'http://localhost:8022';
    }

    protected function getHtmlTemplateBody()
    {
        return $this->getContent();
    }
}