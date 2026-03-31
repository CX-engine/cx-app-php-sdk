<?php

namespace CXEngine\AppSdk\Entities\SmartRoutings;

abstract class Entity
{
    public function toArray(bool $filter = false): array
    {
        $data = get_object_vars($this);

        return $filter
            ? array_filter($data, fn ($v) => $v !== null)
            : $data;
    }

    public static function fromArray(array $data): static
    {
        $instance = new static();

        foreach ($data as $key => $value) {
            if (property_exists($instance, $key)) {
                $instance->$key = $value;
            }
        }

        return $instance;
    }
}
