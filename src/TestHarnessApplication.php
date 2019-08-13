<?php

namespace Gcd\Payments\TestHarness;

use Gcd\Payments\TestHarness\UI\CustomerInitiated\CustomerInitiated;
use Gcd\Payments\TestHarness\UI\MOTO\MOTO;
use Gcd\Payments\TestHarness\UI\OffSession\OffSession;
use Gcd\Payments\TestHarness\UI\Shared\SimpleLayout;
use Gcd\Scaffold\Payments\Logic\Services\PaymentService;
use Gcd\Scaffold\Payments\PaymentsModule;
use Gcd\Scaffold\Payments\Stripe\Services\StripePaymentService;
use Gcd\Scaffold\Payments\Stripe\Settings\StripeSettings;
use Gcd\Scaffold\Payments\Stripe\StripePaymentsModule;
use Rhubarb\Crown\Application;
use Rhubarb\Crown\Exceptions\Handlers\ExceptionHandler;
use Rhubarb\Crown\Layout\LayoutModule;
use Rhubarb\Crown\Sendables\Email\EmailProvider;
use Rhubarb\Crown\Sendables\Email\EmailRecipient;
use Rhubarb\Crown\Sendables\Email\EmailSettings;
use Rhubarb\Crown\UrlHandlers\ClassMappedUrlHandler;
use Rhubarb\Stem\Repositories\MySql\MySql;
use Rhubarb\Stem\Repositories\Repository;
use Rhubarb\Stem\Schema\SolutionSchema;
use Rhubarb\Stem\StemModule;
use Rhubarb\Stem\StemSettings;
use Rhubarb\PostmarkEmail\EmailProviders\PostmarkEmailProvider;
use Rhubarb\PostmarkEmail\Settings\PostmarkSettings;

class TestHarnessApplication extends Application
{
    protected function initialise()
    {
        parent::initialise();

        $this->developerMode = true;

        Repository::setDefaultRepositoryClassName(MySql::class);
        SolutionSchema::registerSchema('TestHarnessSchema', TestHarnessSolutionSchema::class);

        $db = StemSettings::singleton();
        $db->host = 'db';
        $db->username = 'payments';
        $db->password = 'payments';
        $db->database = 'payments';

        ExceptionHandler::disableExceptionTrapping();

        StripeSettings::singleton()->publicKey = 'pk_test_Ng9jNyqA01sIUyqrGn4BMoUb';
        StripeSettings::singleton()->secretKey = 'sk_test_BaJmnLU75P9DhiAQIdW6YxvY';

        PaymentService::registerPaymentService(StripePaymentService::class);

        EmailProvider::setProviderClassName(PostmarkEmailProvider::class);
        PostmarkSettings::singleton()->serverToken = $this->getPostmarkServerToken();
        EmailSettings::singleton()->defaultSender = 'rellis@gcdtech.com';
        EmailSettings::singleton()->OnlyRecipient = new EmailRecipient("jmcelreavey@gcdtech.com");
    }

    protected function getModules()
    {
        return [
            new LayoutModule(SimpleLayout::class),
            new StemModule(),
            new PaymentsModule(),
            new StripePaymentsModule()
        ];
    }

    protected function registerUrlHandlers()
    {
        $this->addUrlHandlers(
          [
              "/" => new ClassMappedUrlHandler(UI\Menu\MenuPage::class, [
                  "customer-initiated/" => new ClassMappedUrlHandler(CustomerInitiated::class),
                  "moto/" => new ClassMappedUrlHandler(Moto::class),
                  "off-session/" => new ClassMappedUrlHandler(OffSession::class)
              ])
          ]
        );
    }

    protected function getPostmarkServerToken() : string {
        return '35746c5e-248c-4c34-b7d3-9c5780b0b81a';
    }


}