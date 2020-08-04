<?php


namespace App\Elasticsearch;


class Query
{
    /**
     * @var string
     */
    private string $index;

    /**
     * @var array
     */
    private array $body;

    /**
     * Query constructor.
     * @param string $index
     * @param array $body
     */
    public function __construct(string $index, array $body = [])
    {
        $this->index = $index;
        $this->body = $body;
    }

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            'index' => $this->index,
            'body' => $this->body
        ];
    }

    /**
     * @param string $key
     * @param string $value
     * @return Query
     */
    public function match(string $key, string $value)
    {
        $this->body['query']['match'][$key] = $value;
        return $this;
    }
}