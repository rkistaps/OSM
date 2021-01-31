<?php

declare(strict_types=1);

namespace OSM\Core\Services;

use OSM\Core\Helpers\StringHelper;
use OSM\Core\Interfaces\ModelDataHydratorInterface;
use OSM\Core\Models\AbstractModel;
use ReflectionProperty;

class ModelDataHydratorService implements ModelDataHydratorInterface
{
    public function hydrate(AbstractModel $model, array $data): AbstractModel
    {
        foreach (get_class_vars(get_class($model)) as $property => $default) {
            $arrayProperty = StringHelper::toSnakeCase($property);
            if (!array_key_exists($arrayProperty, $data)) {
                continue;
            }

            $this->hydrateProperty($model, $property, $data[$arrayProperty]);
        }

        return $model;
    }

    public function hydrateProperty(AbstractModel $model, string $property, $value): AbstractModel
    {
        $reflectionProperty = new ReflectionProperty($model, $property);

        $type = $reflectionProperty->getType()->getName();
        switch ($type) {
            case 'int':
                $value = (int)$value;
                break;
            case 'bool':
                $value = (bool)$value;
                break;
        }

        $model->{$property} = $value;

        return $model;
    }

    public function extract(AbstractModel $model): array
    {
        $objectVars = get_object_vars($model);

        $data = [];
        foreach ($objectVars as $propertyName => $value) {
            $data[StringHelper::toSnakeCase($propertyName)] = $value;
        }

        return $data;
    }
}
