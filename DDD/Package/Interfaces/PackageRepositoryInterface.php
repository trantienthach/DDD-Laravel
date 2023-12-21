<?php

namespace DDD\Package\Interfaces;

interface PackageRepositoryInterface
{
    public function all();

    public function scan(): array;

    public function getScanPaths(): array;

    public function find(string $name);

    public function findOrFail(string $name);
}
