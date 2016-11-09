<?php

namespace PHPMathParser;

class Stack {

    protected $data = array();

    public function push($element) {
        $this->data[] = $element;
    }

    public function poke() {
        return end($this->data);
    }

    public function pop() {
        return array_pop($this->data);
    }

    public function __toString(){
        $string ="]";
        foreach ($this->data as $value) {
            if (!($string == "]"))
                $string = "; ".$string;
            $string = $value." ".$string;

        
        }
        $string = "[ ".$string;
        return $string;
    }

}
