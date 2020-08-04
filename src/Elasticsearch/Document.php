<?php


namespace App\Elasticsearch;


/**
 * Class Document
 * @package Elasticsearch
 */
class Document
{
    /**
     * @var string
     */
    private string $index;

    /**
     * @var string
     */
    private string $id;

    /**
     * @var array
     */
    private array $body;

    /**
     * @var int
     */
    private int $score;

    /**
     * Document constructor.
     * @param string $index
     * @param string $id
     * @param array $body
     * @param int $score
     */
    public function __construct(string $index, string $id, array $body, int $score = 0)
    {
        $this->index = $index;
        $this->id = $id;
        $this->body = $body;
        $this->score = $score;
    }

    /**
     * @param array $attributes
     * @return static
     */
    public static function fromArray(array $attributes): self
    {
        return new self(
            $attributes['_index'],
            $attributes['_id'],
            $attributes['_source'],
            $attributes['_score'] ?? 0
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
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @return array
     */
    public function getBody(): array
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return sprintf("%s:%s", $this->index, $this->id);
    }
}
