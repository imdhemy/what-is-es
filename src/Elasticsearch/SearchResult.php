<?php


namespace App\Elasticsearch;


/**
 * Class SearchResult
 * @package App\Elasticsearch
 */
class SearchResult
{
    /**
     * @var int
     */
    private int $took;

    /**
     * @var bool
     */
    private bool $timedOut;

    /**
     * @var array
     */
    private array $shards;

    /**
     * @var Hits
     */
    private Hits $hits;

    /**
     * SearchResult constructor.
     * @param int $took
     * @param bool $timedOut
     * @param array $shards
     * @param Hits $hits
     */
    public function __construct(int $took, bool $timedOut, array $shards, Hits $hits)
    {
        $this->took = $took;
        $this->timedOut = $timedOut;
        $this->shards = $shards;
        $this->hits = $hits;
    }

    /**
     * @param array $attributes
     * @return $this
     */
    public static function fromArray(array $attributes): self
    {
        return new self(
            $attributes['took'],
            $attributes['timed_out'],
            $attributes['_shards'],
            Hits::fromArray($attributes['hits'])
        );
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->hits->getAll();
    }

    /**
     * @return Document
     */
    public function first(): Document
    {
        return $this->getAll()[0];
    }
}