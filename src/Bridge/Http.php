<?php

namespace ImService\Bridge;

use GuzzleHttp\Client;
use ImService\AccessToken;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Class Http
 * @package ImService\Bridge
 */
class Http
{
    /**
     * Request Url
     * @var string
     */
    protected $uri;

    /**
     * Request Method
     * @var string
     */
    protected $method;

    /**
     * Request Body
     * @var array
     */
    protected $body;
    /**
     * Request Headers
     * @var array
     */
    protected $headers = [];

    /**
     * Request Query
     * @var array
     */
    protected $query = [];

    /**
     * initialize
     * Http constructor.
     * @param string $method
     * @param string $uri
     */
    public function __construct($method, $uri)
    {
        $this->uri = $uri;
        $this->method = strtoupper($method);
    }

    /**
     * Create Client Factory
     * @param string $method
     * @param string $uri
     * @return static
     */
    public static function request($method, $uri)
    {
        return new static($method, $uri);
    }

    /**
     * Request Query
     * @param array $query
     * @return $this
     */
    public function withQuery(array $query)
    {
        $this->query = array_merge($this->query, $query);
        return $this;
    }

    /**
     * Request Json Body
     * @param array $body
     * @return $this
     */
    public function withBody(array $body)
    {
        $this->body = Serializer::jsonEncode($body);
        $this->headers['Content-Type'] = 'application/json';

        return $this;
    }

    /**
     * Request Xml Body
     * @param array $body
     * @return $this
     */
    public function withXmlBody(array $body)
    {
        $this->body = Serializer::xmlEncode($body);
        $this->headers['Content-Type'] = 'application/xml';
        return $this;
    }

    /**
     * Query With AccessToken
     * @param AccessToken $accessToken
     * @return $this
     * @throws \Exception
     */
    public function withAccessToken(AccessToken $accessToken)
    {
        $this->headers['authorization'] = $accessToken->getTokenString();

        return $this;
    }

    /**
     * Send Request
     * @return ArrayCollection|string
     */
    public function send()
    {
        $options = [];

        // query
        if (!empty($this->query)) {
            $options['query'] = $this->query;
        }

        // body
        if (!empty($this->body)) {
            $options['body'] = $this->body;
        }
        // headers
        if (count($this->headers) >= 1) {
            $options['headers'] = $this->headers;
        }

        $response = (new Client)->request($this->method, $this->uri, $options);
        $contents = $response->getBody()->getContents();

        $array = Serializer::parse($contents);

        return new ArrayCollection($array);
    }
}