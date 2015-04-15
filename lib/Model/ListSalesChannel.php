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
 * An item in a list of sales channels. This differs from the normal SalesChannel
 * type: not all fields are present in the list. More info: see the getlist
 * operation
 * (https://apps.ticketmatic.com/#/knowledgebase/api/settings_ticketsales_saleschannels/getlist).
 */
class ListSalesChannel implements \jsonSerializable
{
    /**
     * Create a new ListSalesChannel
     *
     * @param array $data
     */
    public function __construct(array $data = array()) {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * Unique ID
     *
     * @var int
     */
    public $id;

    /**
     * Name of the sales channel
     *
     * @var string
     */
    public $name;

    /**
     * The type of this sales channel, defines where this sales channel will be used.
     * The available values for this field can be found on the sales channel overview
     * (https://apps.ticketmatic.com/#/knowledgebase/api/settings_ticketsales_saleschannels)
     * page.
     *
     * @var int
     */
    public $typeid;

    /**
     * The ID of the order mail template to use for sending confirmations
     *
     * @var int
     */
    public $ordermailtemplateid_confirmation;

    /**
     * Always send the confirmation, regardless of the payment method configuration
     *
     * @var bool
     */
    public $ordermailtemplateid_confirmation_sendalways;

    /**
     * Created timestamp
     *
     * @var \DateTime
     */
    public $createdts;

    /**
     * Last updated timestamp
     *
     * @var \DateTime
     */
    public $lastupdatets;

    /**
     * Whether or not this item is archived
     *
     * @var bool
     */
    public $isarchived;

    /**
     * Unpack ListSalesChannel from JSON.
     *
     * @param object $obj
     *
     * @return \Ticketmatic\Model\ListSalesChannel
     */
    public static function fromJson($obj) {
        return new ListSalesChannel(array(
            "id" => $obj->id,
            "name" => $obj->name,
            "typeid" => $obj->typeid,
            "ordermailtemplateid_confirmation" => $obj->ordermailtemplateid_confirmation,
            "ordermailtemplateid_confirmation_sendalways" => $obj->ordermailtemplateid_confirmation_sendalways,
            "createdts" => Json::unpackTimestamp($obj->createdts),
            "lastupdatets" => Json::unpackTimestamp($obj->lastupdatets),
            "isarchived" => $obj->isarchived,
        ));
    }

    /**
     * Serialize ListSalesChannel to JSON.
     *
     * @return array
     */
    public function jsonSerialize() {
        $result = array();
        foreach ($fields as $field) {
            if (!is_null($this->id)) {
                $result["id"] = intval($this->id);
            }
            if (!is_null($this->name)) {
                $result["name"] = strval($this->name);
            }
            if (!is_null($this->typeid)) {
                $result["typeid"] = intval($this->typeid);
            }
            if (!is_null($this->ordermailtemplateid_confirmation)) {
                $result["ordermailtemplateid_confirmation"] = intval($this->ordermailtemplateid_confirmation);
            }
            if (!is_null($this->ordermailtemplateid_confirmation_sendalways)) {
                $result["ordermailtemplateid_confirmation_sendalways"] = boolval($this->ordermailtemplateid_confirmation_sendalways);
            }
            if (!is_null($this->createdts)) {
                $result["createdts"] = Json::packTimestamp($this->createdts);
            }
            if (!is_null($this->lastupdatets)) {
                $result["lastupdatets"] = Json::packTimestamp($this->lastupdatets);
            }
            if (!is_null($this->isarchived)) {
                $result["isarchived"] = boolval($this->isarchived);
            }

        }
        return $result;
    }
}
