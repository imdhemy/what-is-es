<?php


namespace App\Elasticsearch;


class Index
{
    private string $name;

    /**
     * Index constructor.
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }


}