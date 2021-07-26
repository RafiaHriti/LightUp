<?php
 namespace MailPoetVendor\Doctrine\DBAL\Types; if (!defined('ABSPATH')) exit; use DateTime; use DateTimeInterface; use MailPoetVendor\Doctrine\DBAL\Platforms\AbstractPlatform; class DateType extends \MailPoetVendor\Doctrine\DBAL\Types\Type { public function getName() { return \MailPoetVendor\Doctrine\DBAL\Types\Types::DATE_MUTABLE; } public function getSQLDeclaration(array $column, \MailPoetVendor\Doctrine\DBAL\Platforms\AbstractPlatform $platform) { return $platform->getDateTypeDeclarationSQL($column); } public function convertToDatabaseValue($value, \MailPoetVendor\Doctrine\DBAL\Platforms\AbstractPlatform $platform) { if ($value === null) { return $value; } if ($value instanceof \DateTimeInterface) { return $value->format($platform->getDateFormatString()); } throw \MailPoetVendor\Doctrine\DBAL\Types\ConversionException::conversionFailedInvalidType($value, $this->getName(), ['null', 'DateTime']); } public function convertToPHPValue($value, \MailPoetVendor\Doctrine\DBAL\Platforms\AbstractPlatform $platform) { if ($value === null || $value instanceof \DateTimeInterface) { return $value; } $val = \DateTime::createFromFormat('!' . $platform->getDateFormatString(), $value); if (!$val) { throw \MailPoetVendor\Doctrine\DBAL\Types\ConversionException::conversionFailedFormat($value, $this->getName(), $platform->getDateFormatString()); } return $val; } } 