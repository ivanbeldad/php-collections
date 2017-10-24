<?php

namespace Collection;

use RuntimeException;

/**
 * Class ArrayList
 * @package Collection
 */
class ArrayList implements Lists
{

    /** @const int */
    const NOT_FOUND = 1;
    /** @var array */
    private $array = [];
    /** @var int */
    private $size = 0;
    /** @var string */
    private $type = null;

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
        $this->checkType($element);
        $this->array[$this->size] = $element;
        ++$this->size;
    }

    public function addAt($index, $element)
    {
        $this->checkType($element);
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

    public function addAll($elements)
    {
        foreach ($elements as $element) {
            $this->add($element);
        }
    }

    public function addAllAt($index, $elements)
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

    public function remove($index)
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

    public function clear()
    {
        $this->array = [];
        $this->size = 0;
    }

    public function size()
    {
        return $this->size;
    }

    public function toArray()
    {
        return $this->array;
    }

    public function containts($element)
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

    public function indexOf($element)
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

    public function sort($comparator)
    {
        if (gettype($comparator) !== 'object') {
            if (!($comparator instanceof Comparator) || get_class($comparator) !== 'Closure') {
                throw new RuntimeException('ArrayList.sort must receive an Comparator or a callable instance');
            }
        }
        if ($comparator instanceof Comparator) {
            usort($this->array, function($o1, $o2) use ($comparator) {
                return $comparator->compareTo($o1, $o2);
            });
            return;
        }
        usort($this->array, $comparator);
    }

    protected function checkType($element) {
        if ($this->type === null) {
            $this->type = gettype($element);
            if ($this->type === 'object') {
                $this->type = get_class($element);
            }
        }
        if (gettype($element) === 'object') {
            if (get_class($element) !== $this->type) {
                throw new RuntimeException("All elements on the List must have same type.");
            }
        } else if (gettype($element) !== $this->type) {
            throw new RuntimeException("All elements on the List must have same type.");
        }
    }

}
