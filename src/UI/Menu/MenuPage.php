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
            <li><a href="/customer-initiated/">Simple on-session payment capture</a></li>
            <li><a href="/moto/">Merchant initiated MOTO payment capture</a></li>
            <li><a href="/off-session/">Merchant initiated off-session payment from stored card</a></li>
        </ul>
        <?php

        $html = ob_get_clean();

        return $html;
    }
}