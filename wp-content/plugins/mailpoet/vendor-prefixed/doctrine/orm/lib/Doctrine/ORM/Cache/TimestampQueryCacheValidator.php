<?php
 namespace MailPoetVendor\Doctrine\ORM\Cache; if (!defined('ABSPATH')) exit; use function microtime; class TimestampQueryCacheValidator implements \MailPoetVendor\Doctrine\ORM\Cache\QueryCacheValidator { private $timestampRegion; public function __construct(\MailPoetVendor\Doctrine\ORM\Cache\TimestampRegion $timestampRegion) { $this->timestampRegion = $timestampRegion; } public function isValid(\MailPoetVendor\Doctrine\ORM\Cache\QueryCacheKey $key, \MailPoetVendor\Doctrine\ORM\Cache\QueryCacheEntry $entry) { if ($this->regionUpdated($key, $entry)) { return \false; } if ($key->lifetime === 0) { return \true; } return $entry->time + $key->lifetime > \microtime(\true); } private function regionUpdated(\MailPoetVendor\Doctrine\ORM\Cache\QueryCacheKey $key, \MailPoetVendor\Doctrine\ORM\Cache\QueryCacheEntry $entry) : bool { if ($key->timestampKey === null) { return \false; } $timestamp = $this->timestampRegion->get($key->timestampKey); return $timestamp && $timestamp->time > $entry->time; } } 