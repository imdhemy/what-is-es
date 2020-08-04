<?php

namespace App\Elasticsearch;


/**
 * Class Response
 * @package App\Elasticsearch
 */
class Response
{
    /**
     * @var string
     */
    private string $index;

    /**
     * @var string
     */
    private string $type;

    /**
     * @var string
     */
    private string $id;

    /**
     * @var int
     */
    private int $version;

    /**
     * @var string
     */
    private string $result;

    /**
     * @var array
     */
    private array $shards;

    /**
     * Response constructor.
     * @param string $index
     * @param string $type
     * @param string $id
     * @param int $version
     * @param string $result
     * @param array $shards
     */
    public function __construct(string $index, string $type, string $id, int $version, string $result, array $shards)
    {
        $this->index = $index;
        $this->type = $type;
        $this->id = $id;
        $this->version = $version;
        $this->result = $result;
        $this->shards = $shards;
    }

    /**
     * @param array $attributes
     * @return static
     */
    public static function fromArray(array $attributes): self
    {
        return new self(
            $attributes['_index'],
            $attributes['_type'],
            $attributes['_id'],
            $attributes['_version'],
            $attributes['result'],
            $attributes['_shards']
        );
    }

    /**
     * @return string
     */
    public function getIndex(): string
    {
        return $this->index;
    }

    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getVersion(): int
    {
        return $this->version;
    }

    /**
     * @return string
     */
    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * @return array
     */
    public function getShards(): array
    {
        return $this->shards;
    }
}