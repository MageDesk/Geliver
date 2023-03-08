<?php
/*
 * @author MageDesk Team
 * @copyright Copyright (c) MageDesk (https://www.magedesk.com/)
 */

namespace MageDesk\Geliver\Service\Endpoints;

use MageDesk\Geliver\Api\Data\EndpointDataInterface;

class PickOfferService extends AbstractService
{
    /**
     * @var string
     */
    protected string $url = 'transactions';

    /**
     * @var string
     */
    public const OFFER_ID = 'offerID';

    /**
     * Set offer id
     *
     * @param string $id
     * @return $this
     */
    public function setOfferId(string $id): PickOfferService
    {
        $this->setBodyParam(self::OFFER_ID, $id);

        return $this;
    }
}
