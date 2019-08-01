<?php

namespace Gcd\Payments\TestHarness;

use Gcd\Payments\TestHarness\UI\Shared\SimpleLayout;
use Rhubarb\Crown\Application;
use Rhubarb\Crown\Layout\LayoutModule;
use Rhubarb\Crown\UrlHandlers\ClassMappedUrlHandler;
use Rhubarb\Stem\StemModule;

class TestHarnessApplication extends Application
{
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
              "/" => new ClassMappedUrlHandler(UI\Menu\MenuPage::class)
          ]
        );
    }


}