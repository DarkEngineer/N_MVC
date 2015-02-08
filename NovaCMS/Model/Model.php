<?php
  abstract class Model {
    protected $properties = Array();

    public function __construct() {
    }

    public function getProperties() {
      return $properties;
    }
  }
?>
