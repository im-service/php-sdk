<?php
namespace ImService\Member;
use ImService\AccessToken;

/**
 * Class Member
 * @package ImService\Member
 */
class Member
{
    /**
     * @var AccessToken|null
     */
    protected $accessToken = null;
    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     *
     */
    public function getInfo()
    {

    }
}