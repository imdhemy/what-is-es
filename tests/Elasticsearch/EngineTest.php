<?php

namespace Tests\Elasticsearch;

use App\Elasticsearch\Document;
use App\Elasticsearch\Engine;
use App\Elasticsearch\Query;
use Faker\Factory;
use Faker\Generator;
use Tests\TestCase;

class EngineTest extends TestCase
{
    /**
     * @var Document
     */
    private Document $document;

    /**
     * @var Engine
     */
    private Engine $engine;

    /**
     * @var string
     */
    private string $index;

    /**
     * @var Generator
     */
    private Generator $faker;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $this->faker = Factory::create();
        $this->index = 'my_index';
        $id = $this->faker->uuid;
        $body = ['sentence' => $this->faker->sentence];

        $this->document = new Document($this->index, $id, $body);
        $this->engine = Engine::create();
        $this->engine->createIndex($this->index);
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        $this->engine->deleteIndex($this->index);
    }

    /**
     * @test
     */
    public function test_it_can_index_a_document()
    {
        $response = $this->engine->index($this->document);
        $this->assertEquals('created', $response->getResult());
        $this->assertEquals($this->document->getId(), $response->getId());
    }

    /**
     * @test
     */
    public function test_it_can_get_a_document()
    {
        $this->engine->index($this->document);
        $document = $this->engine->get($this->document->getIndex(), $this->document->getId());
        $this->assertEquals($this->document, $document);
    }

    /**
     * @test
     */
    public function test_it_can_get_all_documents()
    {
        $documents = [];
        for ($i = 0; $i < 10; $i++) {
            $document = new Document($this->index, $this->faker->uuid, ['sentence' => $this->faker->sentence]);
            $this->engine->index($document);
            $documents[] = $document;
        }
        $query = new Query($this->index);
        $results = $this->engine->search($query);
        $this->assertEmpty(array_diff($results->getAll(), $documents));
    }

    /**
     * @test
     */
    public function test_it_can_search_for_a_document()
    {
        $this->engine->index($this->document);
        $query = new Query($this->index);
        $query->match('sentence', $this->document->getBody()['sentence']);
        sleep(1);
        $results = $this->engine->search($query);
        $this->assertEquals($this->document->getId(), $results->first()->getId());
    }

    /**
     * @test
     */
    public function test_serialization()
    {
        $serializedDocument = serialize($this->document);
        $unserlaizedDocument = unserialize($serializedDocument);
        $this->assertEquals($this->document->getId(), $unserlaizedDocument->getId());
    }
}
