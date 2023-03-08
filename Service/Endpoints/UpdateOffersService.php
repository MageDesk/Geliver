<?php
/*
 * @author MageDesk Team
 * @copyright Copyright (c) MageDesk (https://www.magedesk.com/)
 */

namespace MageDesk\Geliver\Service\Endpoints;

use MageDesk\Geliver\Api\Data\EndpointDataInterface;

class UpdateOffersService extends AbstractService
{
    /**
     * @var string
     */
    protected string $url = 'shipments';

    /**
     * Set id
     *
     * @param string $id
     * @return UpdateOffersService
     */
    public function setId(string $id): UpdateOffersService
    {
        $this->setUrl($this->getUrl() . '/' . $id);

        return $this;
    }
}
