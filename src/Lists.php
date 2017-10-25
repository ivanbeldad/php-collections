<?php

namespace Collection;

/**
 * Interface Lists
 * @package Collection
 */
interface Lists
{

    /**
     * @param mixed $element
     * @return void
     */
    function add($element);

    /**
     * @param int $index
     * @param mixed $element
     * @return void
     */
    function addAt($index, $element);

    /**
     * @param array $elements
     * @return void
     */
    function addAll($elements);

    /**
     * @param int $index
     * @param array $elements
     * @return void
     */
    function addAllAt($index, $elements);

    /**
     * @param int $index
     * @return mixed
     */
    function get($index);

    /**
     * @param mixed $element
     * @return void
     */
    function remove($element);

    /**
     * @param int $index
     * @return void
     */
    function removeAt($index);

    /**
     * @return void
     */
    function clear();

    /**
     * @param mixed $element
     * @return boolean
     */
    function containts($element);

    /**
     * @param mixed $element
     * @return int
     */
    function indexOf($element);

    /**
     * @return int
     */
    function size();

    /**
     * @return boolean
     */
    function isEmpty();

    /**
     * @return array
     */
    function toArray();

    /**
     * @param Comparator|callable $comparator
     * @param boolean $ascendent
     * @return void
     */
    function sort($comparator, $ascendent);

    /**
     * @param callable $callable
     * @return void
     */
    function forEachDo(callable $callable);

    /**
     * @param callable $callable
     * @return Lists
     */
    function filter(callable $callable);

    /**
     * @param callable $callable
     * @return Lists
     */
    function map(callable $callable);

    /**
     * @param callable $callable
     * @param mixed $initialValue
     * @return mixed
     */
    function reduce(callable $callable, $initialValue);

}
