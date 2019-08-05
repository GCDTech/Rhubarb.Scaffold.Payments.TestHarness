<?php

namespace Gcd\Payments\TestHarness;

use Gcd\Payments\TestHarness\UI\CustomerInitiated\CustomerInitiated;
use Gcd\Payments\TestHarness\UI\MOTO\MOTO;
use Gcd\Payments\TestHarness\UI\Shared\SimpleLayout;
use Gcd\Scaffold\Payments\Stripe\Settings\StripeSettings;
use Rhubarb\Crown\Application;
use Rhubarb\Crown\Exceptions\Handlers\ExceptionHandler;
use Rhubarb\Crown\Layout\LayoutModule;
use Rhubarb\Crown\UrlHandlers\ClassMappedUrlHandler;
use Rhubarb\Stem\Repositories\MySql\MySql;
use Rhubarb\Stem\Repositories\Repository;
use Rhubarb\Stem\Schema\SolutionSchema;
use Rhubarb\Stem\StemModule;
use Rhubarb\Stem\StemSettings;

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
    }

    protected function getModules()
    {
        return [
            new LayoutModule(SimpleLayout::class),
            new StemModule()
        ];
    }

    protected function registerUrlHandlers()
    {
        $this->addUrlHandlers(
          [
              "/" => new ClassMappedUrlHandler(UI\Menu\MenuPage::class, [
                  "customer-initiated/" => new ClassMappedUrlHandler(CustomerInitiated::class),
                  "moto/" => new ClassMappedUrlHandler(Moto::class)
              ])
          ]
        );
    }


}