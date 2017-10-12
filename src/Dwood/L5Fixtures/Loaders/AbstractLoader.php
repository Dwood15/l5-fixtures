<?php namespace Dwood\L5Fixtures\Loaders;

use Dwood\L5Fixtures\FixturesMetadata;

abstract class AbstractLoader implements Loader
{
    /**
     * @var FixturesMetadata
     */
    protected $metadata;

    public function initialize(FixturesMetadata $metadata)
    {
        $this->metadata = $metadata;
    }
}