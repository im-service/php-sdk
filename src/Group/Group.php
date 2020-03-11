<?php
namespace ImService\Group;
use ImService\Bridge\AccessTokenTrait;
use ImService\Bridge\Http;
use ImService\Bridge\Serializer;

/**
 * Class Group
 * @package ImService\Group
 */
class Group
{
    use AccessTokenTrait;

    /**
     * 创建群组
     * @param string $name
     * @param array $extras
     * @throws \Exception
     */
    public function makeGroup(string $name,array $extras=[])
    {
        $res = Http::request('POST', $this->accessToken->getHost() . '/api/group/createGroup')->withBody([
            'name' => $name,
            'extras' => Serializer::jsonEncode($extras)
        ])->withAccessToken($this->accessToken)->send();
        if ($res->get('status') != 200) {
            throw new \Exception($res->get('msg'));
        }
    }
}
