<?php
/*
 * @author MageDesk Team
 * @copyright Copyright (c) MageDesk (https://www.magedesk.com/)
 */

namespace MageDesk\Geliver\Service\Endpoints;

use MageDesk\Geliver\Api\Data\EndpointDataInterface;

/**
 * Class CreateOrder
 */
class CreateOrderService extends AbstractService
{
    /**
     * @var string
     */
    protected string $url = 'transactions';
}
