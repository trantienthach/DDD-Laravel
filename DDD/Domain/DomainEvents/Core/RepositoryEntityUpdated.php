<?php

namespace DDD\Domain\DomainEvents\Core;

class RepositoryEntityUpdated extends CoreRepositoryEvent
{
    protected string $action = 'updated';
}
