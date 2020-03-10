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
     */
    protected $uri;

    /**
     * Request Method
     */
    protected $method;

    /**
     * Request Body
     */
    protected $body;
    /**
     * Request Headers
     * @var array
     */
    protected $headers = [];

    /**
     * Request Query
     */
    protected $query = array();

    /**
     * initialize
     */
    public function __construct($method, $uri)
    {
        $this->uri = $uri;
        $this->method = strtoupper($method);
    }

    /**
     * Create Client Factory
     */
    public static function request($method, $uri)
    {
        return new static($method, $uri);
    }

    /**
     * Request Query
     */
    public function withQuery(array $query)
    {
        $this->query = array_merge($this->query, $query);
        return $this;
    }

    /**
     * Request Json Body
     */
    public function withBody(array $body)
    {
        $this->body = Serializer::jsonEncode($body);
        $this->headers['Content-Type'] = 'application/json';

        return $this;
    }

    /**
     * Request Xml Body
     */
    public function withXmlBody(array $body)
    {
        $this->body = Serializer::xmlEncode($body);
        $this->headers['Content-Type'] = 'application/xml';
        return $this;
    }

    /**
     * Query With AccessToken
     */
    public function withAccessToken(AccessToken $accessToken)
    {
        $this->headers['authorization'] = $accessToken->getTokenString();

        return $this;
    }

    /**
     * Send Request
     */
    public function send($asArray = true)
    {
        $options = array();

        // query
        if (!empty($this->query)) {
            $options['query'] = $this->query;
        }

        // body
        if (!empty($this->body)) {
            $options['body'] = $this->body;
        }
        // headers
        if(count($this->headers) >= 1){
            $options['headers'] = $this->headers;
        }

        $response = (new Client)->request($this->method, $this->uri, $options);
        $contents = $response->getBody()->getContents();

        if (!$asArray) {
            return $contents;
        }

        $array = Serializer::parse($contents);

        return new ArrayCollection($array);
    }
}