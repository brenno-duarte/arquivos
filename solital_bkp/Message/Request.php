<?php

declare(strict_types=1);

namespace Solital\Core\Http\Message;

use Solital\Core\Http\Message\Traits\RequestTrait;
use Psr\Http\Message\RequestInterface;

class Request implements RequestInterface
{

    use RequestTrait;

    /**
     * Create a new request instance.
     *
     * @param string|null                                       $method
     * @param string|null|\Psr\Http\Message\UriInterface        $uri
     * @param string|resource|\Psr\Http\Message\StreamInterface $body
     * @param array                                             $headers
     *
     * @throws \InvalidArgumentException for any invalid value.
     */
    public function __construct(string $method = null, $uri = null, $body = 'php://memory', array $headers = [])
    {
        $this->initialize($method, $uri, $body, $headers);
    }
}
