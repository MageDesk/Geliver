<?php
/*
 * @author MageDesk Team
 * @copyright Copyright (c) MageDesk (https://www.magedesk.com/)
 */

declare(strict_types=1);

namespace MageDesk\Geliver\DataProvider;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\App\Config\Storage\WriterInterface;
use MageDesk\Geliver\Model\Config\Source\Providers;

/**
 * Unishipper config provider.
 */
class ConfigDataProvider
{
    /**
     * Xml path to Unishipper config tab.
     *
     * Unishipper config path.
     *
     * @var string
     */
    private const CONFIG_PATH = 'carriers/mgdskGlvr/';

    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    /**
     * @var WriterInterface
     */
    private $configWriter;

    /**
     * @var Providers
     */
    private $providers;

    /**
     * @param ScopeConfigInterface $scopeConfig
     * @param WriterInterface $configWriter
     * @param Providers $providers
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig,
        WriterInterface $configWriter,
        Providers $providers
    ) {
        $this->scopeConfig = $scopeConfig;
        $this->configWriter = $configWriter;
        $this->providers = $providers;
    }

    /**
     * Get Config value of is enabled.
     *
     * @return bool
     */
    public function isEnabled(): bool
    {
        return (bool)$this->scopeConfig->getValue(self::CONFIG_PATH . 'active');
    }

    /**
     * Get Config value of is test mode.
     *
     * @return bool
     */
    public function isTestMode(): bool
    {
        return (bool)$this->scopeConfig->getValue(self::CONFIG_PATH . 'is_test');
    }

    /**
     * Get Config value of name.
     *
     * @return string
     */
    public function getName(): string
    {
        return (string)$this->scopeConfig->getValue(self::CONFIG_PATH . 'name');
    }

    /**
     * Get Config value of token.
     *
     * @return string
     */
    public function getAccessToken(): string
    {
        return (string)$this->scopeConfig->getValue(self::CONFIG_PATH . 'accessToken');
    }

    /**
     * Get Config value of sender address id.
     *
     * @return string
     */
    public function getSenderAddressID(): string
    {
        return (string)$this->scopeConfig->getValue(self::CONFIG_PATH . 'senderAddressID');
    }

    /**
     * Get Config value of return address id.
     *
     * @return string
     */
    public function getReturnAddressID(): string
    {
        return (string)$this->scopeConfig->getValue(self::CONFIG_PATH . 'returnAddressID');
    }

    /**
     * Get Config value of price.
     *
     * @return string
     */
    public function getPrice(): string
    {
        return (string)$this->scopeConfig->getValue(self::CONFIG_PATH . 'price');
    }

    /**
     * Get Config value of provider.
     *
     * @return string
     */
    public function getProviderCode(): string
    {
        return (string)$this->scopeConfig->getValue(self::CONFIG_PATH . 'provider');
    }

    /**
     * Get value of all providers.
     *
     * @return array
     */
    public function getProviders(): array
    {
        return $this->providers->toOptionArray();
    }

    /**
     * Get value of provider name.
     *
     * @return string
     */
    public function getProviderName(): string
    {
        $providerCode = $this->getProviderCode();
        $providers = $this->getProviders();

        foreach ($providers as $provider) {
            if ($provider['value'] === $providerCode) {
                return $provider['label'];
            }
        }

        return '';
    }
}
