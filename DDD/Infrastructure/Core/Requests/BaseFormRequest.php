<?php

namespace DDD\Infrastructure\Core\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\ValidationException;

abstract class BaseFormRequest extends FormRequest
{
    private function setDefaults()
    {
        $defaults = [];
        foreach ($this->defaults() as $key => $default) {
            if ($this->offsetGet($key) === null) {
                data_set($defaults, $key, $default);
            }
        }

        $this->merge($defaults);
    }

    public function throw($key, $message = null)
    {
        if (is_array($key)) {
            $errors = $key;
        } else {
            $errors = [$key => $message];
        }

        throw ValidationException::withMessages($errors);
    }

    protected function defaults(): array
    {
        return [];
    }

    /**
     * Validate the class instance.
     *
     * @return void
     */
    public function validateResolved()
    {
        $this->setDefaults();

        $this->prepareForValidation();

        if (! $this->passesAuthorization()) {
            $this->failedAuthorization();
        }

        $instance = $this->getValidatorInstance();

        if ($instance->fails()) {
            $this->failedValidation($instance);
        }

        $this->passedValidation();
    }
}
