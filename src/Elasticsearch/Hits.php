<?php


namespace App\Elasticsearch;


/**
 * Class Hits
 * @package App\Elasticsearch
 */
class Hits
{
    /**
     * @var int
     */
    private int $total;

    /**
     * @var array
     */
    private array $items;

    /**
     * Hits constructor.
     * @param int $total
     * @param array $items
     */
    public function __construct(int $total, array $items)
    {
        $this->total = $total;
        $this->items = $items;
    }

    /**
     * @param array $data
     * @return static
     */
    public static function fromArray(array $data): self
    {
        return new self(
            $data['total']['value'],
            self::hydrateHits($data['hits'])
        );
    }

    /**
     * @param array $documents
     * @return array
     */
    protected static function hydrateHits(array $documents): array
    {
        $items = [];
        foreach ($documents as $document) {
            $items[] = Document::fromArray($document);
        }
        return $items;
    }

    /**
     * @return array
     */
    public function getAll(): array
    {
        return $this->items;
    }
}