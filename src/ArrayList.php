<?php

/**
 * Class ArrayList
 * @type Lists<Date>
 */
class ArrayList implements Lists
{
    const NOT_FOUND = 1;

    /** @var array */
    private $array = [];

    /** @var int */
    private $size = 0;

    /**
     * ArrayList constructor.
     * @param array $elements
     */
    public function __construct($elements = [])
    {
        $this->addAll($elements);
    }

    public function add($element)
    {
        $this->array[$this->size] = $element;
        ++$this->size;
    }

    function addAt($index, $element)
    {
        if (isset($this->array[$index])) {
            $pos = $this->size - 1;
            while ($pos >= $index) {
                $this->array[$pos + 1] = $this->array[$pos];
                --$pos;
            }
            ++$this->size;
        } else {
            for ($pos = $this->size; $pos < $index; $pos++) {
                $this->array[$pos] = null;
            }
            $this->size = $index + 1;
        }
        $this->array[$index] = $element;
    }

    function addAll($elements)
    {
        foreach ($elements as $element) {
            $this->add($element);
        }
    }

    function addAllAt($index, $elements)
    {
        $pos = $index;
        foreach ($elements as $element) {
            $this->addAt($pos, $element);
            ++$pos;
        }
    }

    public function get($index)
    {
        return $this->array[$index];
    }

    function remove($index)
    {
        for ($i = $index; $i < $this->size - 1; $i++) {
            $this->array[$i] = $this->array[$i + 1];
        }
        unset($this->array[$this->size - 1]);
        $pos = $this->size - 2;
        $continue = true;
        while ($pos >= 0 && $continue) {
            if ($this->array[$pos] == null) {
                unset($this->array[$pos]);
            } else {
                $continue = false;
            }
            --$pos;
        }
        $this->size = array_reverse(array_keys($this->array))[0] + 1;
    }

    function clear()
    {
        $this->array = [];
        $this->size = 0;
    }

    function size()
    {
        return $this->size;
    }

    function toArray()
    {
        return $this->array;
    }

    function containts($element)
    {
        foreach ($this->array as $item) {
            $equalityMethod = true;
            if (!($item instanceof Equality) || !($element instanceof Equality)) {
                $equalityMethod = false;
            }
            if ($equalityMethod) {
                if ($element->equals($item)) {
                    return true;
                }
            } else {
                if ($element === $item) {
                    return true;
                }
            }
        }
        return false;
    }

    function indexOf($element)
    {
        foreach ($this->array as $index => $item) {
            $equalityMethod = true;
            if (!($item instanceof Equality) || !($element instanceof Equality)) {
                $equalityMethod = false;
            }
            if ($equalityMethod) {
                if ($element->equals($item)) {
                    return $index;
                }
            } else {
                if ($element === $item) {
                    return $index;
                }
            }
        }
        return ArrayList::NOT_FOUND;
    }

    function sort($comparator)
    {
        // TODO: Implement sort() method.
        throw new RuntimeException("Not implemented");
    }

}
