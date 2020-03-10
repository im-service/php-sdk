<?php
namespace ImService\Member;

use ImService\AccessToken;

class MemberToken
{
    private $accessToken = null;
    public function __construct(AccessToken $accessToken)
    {
        $this->accessToken = $accessToken;
    }
    public function getToken()
    {

    }
    public function makeToken()
    {

    }
}