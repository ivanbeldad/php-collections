<?php

namespace Collection;

/**
 * Interface Comparator
 * @package Collection
 */
interface Comparator
{

    /**
     * @param $o1
     * @param $o2
     * @return int
     */
    function compareTo($o1, $o2);

}
