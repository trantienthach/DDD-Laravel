<?php

namespace DDD\Domain\DomainEvents\Core;

use DDD\Domain\Aggregates\Core\Repositories\CoreRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

abstract class CoreRepositoryEvent
{
    protected CoreRepositoryInterface $repository;

    protected ?Model $model;

    protected string $action;

    public function __construct(CoreRepositoryInterface $repository, Model $model = null)
    {
        $this->repository = $repository;
        $this->model = $model;
    }

    /**
     * @return Model|array
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @return CoreRepositoryInterface
     */
    public function getRepository()
    {
        return $this->repository;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }
}
