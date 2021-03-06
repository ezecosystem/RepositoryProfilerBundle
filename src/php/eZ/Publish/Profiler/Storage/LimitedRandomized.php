<?php

namespace eZ\Publish\Profiler\Storage;

use eZ\Publish\Profiler\Storage;

class LimitedRandomized extends Storage
{
    protected $storage = [];

    protected $limit;

    public function __construct($limit = 100)
    {
        $this->limit = $limit;
    }

    public function store($object)
    {
        $this->storage[] = $object;
        $this->storage = array_slice($this->storage, -$this->limit);
    }

    public function get()
    {
        if (!count($this->storage)) {
            return null;
        }

        $key = array_rand($this->storage);

        return $this->storage[$key];
    }

    public function pull()
    {
        if (!count($this->storage)) {
            return null;
        }

        $key = array_rand($this->storage);
        $object = $this->storage[$key];
        unset($this->storage[$key]);

        return $object;
    }

    public function reset()
    {
        $this->storage = [];
    }
}
