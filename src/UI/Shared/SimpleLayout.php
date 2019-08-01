<?php

namespace Gcd\Payments\TestHarness\UI\Shared;

use Rhubarb\Crown\Html\ResourceLoader;
use Rhubarb\Crown\Layout\Layout;
use Rhubarb\Crown\Layout\LayoutModule;
use Rhubarb\Crown\Settings\HtmlPageSettings;

class SimpleLayout extends Layout
{
    protected function getTitle()
    {
        $pageSettings = HtmlPageSettings::singleton();
        return $pageSettings->pageTitle;
    }

    protected function getBodyCssClass()
    {
        $pageSettings = HtmlPageSettings::singleton();

        if ( $pageSettings->bodyCssClass != "" )
        {
            return 'class="'.htmlentities( $pageSettings->bodyCssClass ).'"';
        }
    }

    protected function printHead()
    {
    }

    protected function printTop()
    {
    }

    protected function printTail()
    {
    }

    protected function printContent($content)
    {
        print $content;
    }

    protected function printLayout($content)
    {
        ResourceLoader::loadResource('/static/css/main.css');
        ?>
        <!DOCTYPE html>
        <html>
        <head>
            <title><?= $this->getTitle(); ?></title>
            <?= ResourceLoader::getResourceInjectionHtml(); ?>

            <meta name="viewport" content="initial-scale=1, maximum-scale=1, minimal-ui">

            <?= LayoutModule::getHeadItemsAsHtml(); ?>

            <?php $this->printHead(); ?>
        </head>
        <body <?= $this->getBodyCssClass(); ?>>
        <div class="g-app">
            <?php $this->printTop(); ?>
            <?= LayoutModule::getBodyItemsAsHtml(); ?>
            <?php $this->printContent($content); ?>
            <?php $this->printTail(); ?>
        </div>
        </body>
        </html>
        <?php
    }
}