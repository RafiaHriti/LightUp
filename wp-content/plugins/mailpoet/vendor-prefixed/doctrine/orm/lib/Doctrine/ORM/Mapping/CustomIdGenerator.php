<?php
 namespace MailPoetVendor\Doctrine\ORM\Mapping; if (!defined('ABSPATH')) exit; use Attribute; use MailPoetVendor\Doctrine\Common\Annotations\Annotation\NamedArgumentConstructor; final class CustomIdGenerator implements \MailPoetVendor\Doctrine\ORM\Mapping\Annotation { public $class; public function __construct(?string $class = null) { $this->class = $class; } } 