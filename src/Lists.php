<?php



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
     * @param int $index
     * @return void
     */
    function remove($index);

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
     * @return array
     */
    function toArray();

    /**
     * @param Comparator $comparator
     * @return void
     */
    function sort($comparator);

}
