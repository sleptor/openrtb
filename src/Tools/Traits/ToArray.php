<?php

namespace OpenRtb\Tools\Traits;

use OpenRtb\Tools\Classes\ArrayCollection;
use OpenRtb\Tools\Exceptions\ExceptionMissingRequiredField;
use OpenRtb\Tools\ObjectAnalyzer\ObjectDescriberFactory;
use OpenRtb\Tools\ObjectAnalyzer\ParametersBag;

trait ToArray
{
    /**
     * @return array
     * @throws ExceptionMissingRequiredField
     */
    public function toArray()
    {
        $result = [];
        $properties = $this->getProperties();
        foreach ($properties as $propertyName => $property) {
            if (is_object($this->$propertyName)) {
                $this->addResult(
                    $result,
                    $propertyName,
                    $this->getArrayFromObject($this->$propertyName),
                    $property->isRequired()
                );
                continue;
            }
            $this->addResult(
                $result,
                $propertyName,
                $this->$propertyName,
                $property->isRequired()
            );
        }
        return $result;
    }

    /**
     * @return ParametersBag
     * @throws \Exception
     */
    private function getProperties()
    {
        return ObjectDescriberFactory::create(__CLASS__)->properties;
    }

    /**
     * @param object $object
     * @return array
     */
    private function getArrayFromObject($object)
    {
        $result = [];
        if ($object instanceof ArrayCollection && ! $object->isEmpty()) {
            foreach ($object as $item) {
                $result[] = $item->toArray();
            }
        } else {
            $result = $object->toArray();
        }
        return $result;
    }

    /**
     * @param array $result
     * @param string $key
     * @param mixed $value
     * @param bool $required
     * @throws ExceptionMissingRequiredField
     */
    private function addResult(&$result, $key, $value, $required)
    {
        if (is_array($value) && ! empty($value)) {
            $result[$key] = $value;
        } elseif ( ! is_array($value) && ! is_null($value)) {
            $result[$key] = $value;
        }

        if ($required && ! isset($result[$key])) {
            throw new ExceptionMissingRequiredField(sprintf('%s property is required in class: %s', $key, __CLASS__));
        }
    }
}
