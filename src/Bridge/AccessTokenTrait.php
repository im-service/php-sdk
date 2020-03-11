<?php

namespace ImService\Bridge;

use ImService\AccessToken;

/**
 * Trait AccessTokenTrait
 * @package ImService\Bridge
 */
trait AccessTokenTrait
{
    /**
     * @var AccessToken|null
     */
    protected $accessToken = null;

    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;
    }
}