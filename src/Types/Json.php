<?php

namespace Ideo\Doctrine\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Platforms\MySQL57Platform;
use Doctrine\DBAL\Types\JsonArrayType;

/**
 * Class Json
 *
 * @package Ideo\Doctrine\Types
 */
class Json extends JsonArrayType
{

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $value === null ? null : parent::convertToPHPValue($value, $platform);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'json';
    }

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        if ($platform instanceof MySQL57Platform) {
            return 'JSON';
        } else {
            return parent::getSQLDeclaration($fieldDeclaration, $platform);
        }
    }

}
