<?php


namespace App\Elasticsearch;


use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Exception;

/**
 * Class Engine
 * @package App\Elasticsearch
 */
class Engine
{
    /**
     * @var Client
     */
    private Client $client;

    /**
     * Engine constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @return static
     */
    public static function create(): self
    {
        return new self(ClientBuilder::create()->build());
    }

    /**
     * @param Document $document
     * @return Response
     */
    public function index(Document $document): Response
    {
        $response = $this->client->index([
            'index' => $document->getIndex(),
            'id' => $document->getId(),
            'body' => $document->getBody()
        ]);
        return Response::fromArray($response);
    }

    /**
     * @param string $index
     * @param string $id
     * @return Document|null
     */
    public function get(string $index, string $id): ?Document
    {
        try {
            $response = $this->client->get(compact('index', 'id'));
            return Document::fromArray($response);
        } catch (Exception $exception) {
            return null;
        }
    }

    /**
     * @param Query $query
     * @return SearchResult
     */
    public function search(Query $query): SearchResult
    {
        $response = $this->client->search($query->toArray());
        return SearchResult::fromArray($response);
    }

    /**
     * @param string $index
     * @return bool
     */
    public function deleteIndex(string $index): bool
    {
        try {
            $this->client->indices()->delete(compact('index'));
            return true;
        } catch (Exception $exception) {
            return false;
        }
    }

    /**
     * @param string $index
     * @return bool
     */
    public function createIndex(string $index): bool
    {
        try {
            $this->client->indices()->create(compact('index'));
            return true;
        } catch (Exception $exception) {
            return false;
        }
    }
}
