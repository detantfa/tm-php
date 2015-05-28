<?php
/**
 * Copyright (C) 2014-2015 by Ticketmatic BVBA <developers@ticketmatic.com>
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @license     MIT X11 http://opensource.org/licenses/MIT
 * @author      Ticketmatic BVBA <developers@ticketmatic.com>
 * @copyright   Ticketmatic BVBA
 * @link        http://www.ticketmatic.com/
 */

namespace Ticketmatic\Test\Endpoints\Settings\Ticketsales;

use Ticketmatic\Client;
use Ticketmatic\Endpoints\Settings\Ticketsales\Paymentscenarios;
use Ticketmatic\Model\PaymentScenario;
use Ticketmatic\Model\PaymentScenarioQuery;

class PaymentscenariosTest extends \PHPUnit_Framework_TestCase {

    public function testCreate() {
        $accountcode = $_SERVER["TM_TEST_ACCOUNTCODE"];
        $accesskey = $_SERVER["TM_TEST_ACCESSKEY"];
        $secretkey = $_SERVER["TM_TEST_SECRETKEY"];
        $client = new Client($accountcode, $accesskey, $secretkey);

        $paymentscenario = Paymentscenarios::create($client, array(
            "availability" => array(
                "saleschannels" => array(
                    1,
                ),
                "usescript" => false,
            ),
            "expiryparameters" => array(
                "daysafterordercreation" => 24,
                "daysbeforeevent" => 2,
            ),
            "internalremark" => "Testing",
            "name" => "Payment scenario test",
            "overdueparameters" => array(
                "daysafterordercreation" => 12,
                "daysbeforeevent" => 5,
            ),
            "paymentmethods" => array(
                1,
                2,
            ),
            "shortdescription" => "Short test",
            "typeid" => 2702,
        ));

        $this->assertNotEquals(0, $paymentscenario->id);
        $this->assertEquals(2702, $paymentscenario->typeid);
        $this->assertEquals("Payment scenario test", $paymentscenario->name);

    }

}