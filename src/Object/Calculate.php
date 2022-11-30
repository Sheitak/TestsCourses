<?php
namespace TestsCourses\Object;

use RuntimeException;

class Calculate {

    public function additional($x, $y): float|int
    {
        if (is_string($x) || is_string($y)) {
            throw new RuntimeException("Parameters is a string type, integer or float required.");
        }
        if ((is_int($x) || is_float($x)) && (is_int($y) || is_float($y))) {
            return $x + $y;
        }
        throw new RuntimeException("Parameters are not integer or float type");
    }

    public function subtract($x, $y): float|int
    {
        if (is_string($x) || is_string($y)) {
            throw new RuntimeException("Parameters is a string type, integer or float required.");
        }
        if (is_float($x) || is_float($y)) {
            return round($x - $y, 1);
        }
        if (is_int($x) && is_int($y)) {
            return $x - $y;
        }
        throw new RuntimeException("Parameters are not integer or float type");
    }

    public function multiply($x, $y): float|int
    {
        if (is_string($x) || is_string($y)) {
            throw new RuntimeException("Parameters is a string type, integer or float required.");
        }
        if ((is_int($x) || is_float($x)) && (is_int($y) || is_float($y))) {
            return $x * $y;
        }
        throw new RuntimeException("Parameters are not integer or float type");
    }

    public function divise($x, $y): float|int
    {
        if (is_string($x) || is_string($y)) {
            throw new RuntimeException("Parameters is a string type, integer or float required.");
        }
        if ($x === 0 || $y === 0) {
            throw new RuntimeException("Divide by zero : Parameters A or B equals zero.");
        }
        if ((is_int($x) || is_float($x)) && (is_int($y) || is_float($y))) {
            return $x / $y;
        }
        throw new RuntimeException("Parameters are not integer or float type, or equals zero");
    }

    public function modulo($x, $y): int
    {
        if (is_string($x) || is_string($y)) {
            throw new RuntimeException("Parameters is a string type, integer or float required.");
        }
        if ($x === 0 || $y === 0) {
            throw new RuntimeException("Divide by zero : Parameters A or B equals zero.");
        }
        if (is_float($x) || is_float($y)) {
            throw new RuntimeException("Modulo cannot accept float type for parameters.");
        }
        if (is_int($x) && is_int($y)) {
            return $x % $y;
        }
        throw new RuntimeException("Parameters are not integer type.");
    }
}
