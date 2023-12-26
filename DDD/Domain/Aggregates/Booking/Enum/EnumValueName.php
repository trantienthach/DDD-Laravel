<?php

namespace DDD\Domain\Aggregates\Booking\Enum;

use Exception;

abstract class EnumValueName
{
    public static function values($prefix = null)
    {
        try {
            $refl = new \ReflectionClass(get_called_class());
            $constants = $refl->getConstants();

            $values = [];
            foreach ($constants as $constantKey => $constantValue) {
                if ($prefix == null || ($prefix && preg_match("/^{$prefix}_/", $constantKey))) {
                    $values[] = $constantValue;
                }
            }
            return $values;
        } catch (Exception $exception) {
        }
    }

    public static function keys()
    {
        try {
            $refl = new \ReflectionClass(get_called_class());
            $constants = $refl->getConstants();

            $keys = [];
            foreach ($constants as $constantKey => $constantValue) {
                $keys[] = $constantKey;
            }
            return $keys;
        } catch (Exception $exception) {
        }
    }
}
