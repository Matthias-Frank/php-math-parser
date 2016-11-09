<?php

namespace PHPMathParser;

abstract class TerminalExpression {

    protected $value = '';

    public function __construct($value) {
        $this->value = $value;
    }

    public static function factory($value, $oldvalue) {        
        if (is_object($value) && $value instanceof TerminalExpression) {
            return $value;
        } elseif (is_numeric($value)) {
            return new Number($value);
        } elseif ($value == '+') {
            if (is_null($oldvalue) || $oldvalue->isOperator() || $oldvalue->isUnary() || $oldvalue->isParenthesis() && $oldvalue->isOpen())
                return new Unary($value);
            return new Addition($value);
        } elseif ($value == '-') {
            if (is_null($oldvalue) || $oldvalue->isOperator() || $oldvalue->isUnary() || ($oldvalue->isParenthesis() && $oldvalue->isOpen()))
                return new Unary($value);
            return new Subtraction($value);
        } elseif ($value == '*') {
            return new Multiplication($value);
        } elseif ($value == '/') {
            return new Division($value);
        } elseif (in_array($value, array('(', ')'))) {
            return new Parenthesis($value);
        } elseif ($value == '^') {
            return new Power($value);
        }
        throw new \Exception('Undefined Value ' . $value);
    }

    abstract public function operate(Stack $stack);

    public function isOperator() {
        return false;
    }

    public function isParenthesis() {
        return false;
    }

    public function isNoOp() {
        return false;
    }

    public function render() {
        return $this->value;
    }

    public function isUnary() {
        return false;
    }

    public function __toString(){
        return $this->value;
    }
}
