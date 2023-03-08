<?php
/*
 * @author MageDesk Team
 * @copyright Copyright (c) MageDesk (https://www.magedesk.com/)
 */

namespace MageDesk\Geliver\Service\Endpoints;

use MageDesk\Geliver\Api\Data\EndpointDataInterface;

class GetRequest extends AbstractService
{
    /**
     * @var string $method
     */
    protected $method = self::GET_METHOD;

    /**
     * @var bool
     */
    protected bool $response_json = false;
}
