<?php

class Category {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function getTag() {
        return $this->tag;
    }
}

?>