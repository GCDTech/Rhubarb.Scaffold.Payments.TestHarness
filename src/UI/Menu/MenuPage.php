<?php

namespace Gcd\Payments\TestHarness\UI\Menu;

use Rhubarb\Crown\Response\GeneratesResponseInterface;

class MenuPage implements GeneratesResponseInterface
{

    public function generateResponse($request = null)
    {
        ob_start();

        ?>
        <ul>
            <li>Simple on-session payment capture</li>
            <li>Merchant initiated on-session payment capture</li>
            <li>Merchant initiated off-session payment from stored card</li>
        </ul>
        <?php

        $html = ob_get_clean();

        return $html;
    }
}