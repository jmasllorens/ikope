<?php

namespace App\Cache;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\UserRepository;

class UserCache extends BaseCache
{
    public function __construct(UserRepository $userRepository)
    {
        parent::__construct($userRepository, 'user');
    }

    public function all()
    {
        return $this->cache::remember($this->key, self::TTL, function() {
            return $this->repository->all();
        }
    );
    }

    public function get(int $id)
    {
        return $this->repository->get($id);
    }

    public function save(Model $model)
    {
        $this->cache::forget($this->key);
       return $this->repository->save($model);
        
    }
    public function delete(Model $model)
    {
        $this->cache::forget($this->key);
        return $this->repository->delete($model);
    }

}