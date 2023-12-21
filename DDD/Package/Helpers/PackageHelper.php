<?php

namespace DDD\Package\Helpers;

class PackageHelper
{
    public static function isExistsAggregate(string $aggregate, $throwIfNotExists = true): bool
    {
        $aggregates = config('package.aggregates', []);

        if (! isset($aggregates[$aggregate])) {
            if ($throwIfNotExists) {
                throw new \Exception('Aggregate not yet registered.');
            }

            return false;
        }

        return true;
    }

    public static function isEnableAggregate(string $aggregate)
    {
        if (self::isExistsAggregate($aggregate)) {
            $aggregates = config('package.aggregates', []);

            return data_get($aggregates, $aggregate, false);
        }

        return false;
    }
}
