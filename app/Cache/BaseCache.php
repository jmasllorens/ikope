<?php

namespace App\Cache;

use App\Contracts\BaseRepositoryInterface;
use Illuminate\Support\Facades\Cache;

abstract class BaseCache implements BaseRepositoryInterface
{   
    const TTL = 900000;
    protected $repository;
    protected $key;
    protected $cache;


    public function __construct(Object $repository, string $key)
    {
        $this->repository = $repository;
        $this->key = $key;

        $this->cache = new Cache();
    }

    protected function forget($key)
    {
        $this->cache::forget($key);
    }
}

