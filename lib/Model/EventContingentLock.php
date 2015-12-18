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

namespace Ticketmatic\Model;

use Ticketmatic\Json;

/**
 * Information about locked tickets in a Contingent.
 *
 * ## Help Center
 *
 * Full documentation can be found in the Ticketmatic Help Center
 * (https://apps.ticketmatic.com/#/knowledgebase/api/types/EventContingentLock).
 */
class EventContingentLock implements \jsonSerializable
{
    /**
     * Create a new EventContingentLock
     *
     * @param array $data
     */
    public function __construct(array $data = array()) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Contingent ID
     *
     * @var int
     */
    public $tickettypeid;

    /**
     * Lock type ID
     *
     * @var int
     */
    public $locktypeid;

    /**
     * Number of tickets in the contingent
     *
     * @var int
     */
    public $amount;

    /**
     * Unpack EventContingentLock from JSON.
     *
     * @param object $obj
     *
     * @return \Ticketmatic\Model\EventContingentLock
     */
    public static function fromJson($obj) {
        if ($obj === null) {
            return null;
        }

        return new EventContingentLock(array(
            "tickettypeid" => isset($obj->tickettypeid) ? $obj->tickettypeid : null,
            "locktypeid" => isset($obj->locktypeid) ? $obj->locktypeid : null,
            "amount" => isset($obj->amount) ? $obj->amount : null,
        ));
    }

    /**
     * Serialize EventContingentLock to JSON.
     *
     * @return array
     */
    public function jsonSerialize() {
        $result = array();
        if (!is_null($this->tickettypeid)) {
            $result["tickettypeid"] = intval($this->tickettypeid);
        }
        if (!is_null($this->locktypeid)) {
            $result["locktypeid"] = intval($this->locktypeid);
        }
        if (!is_null($this->amount)) {
            $result["amount"] = intval($this->amount);
        }

        return $result;
    }
}