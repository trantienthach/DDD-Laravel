<?php

namespace DDD\Domain\DomainEvents\Core;

class RepositoryEntityCreated extends CoreRepositoryEvent
{
    protected string $action = 'created';
}
