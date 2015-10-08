<?php
/**
 * User: delboy1978uk
 * Date: 08/10/15
 * Time: 23:42
 */

namespace Del\Collection;

use Del\Entity\Monitor;
use ArrayIterator;

class Monitors extends ArrayIterator
{
    /**
     * @return Monitor|null
     */
    public function current()
    {
        return parent::current();
    }

    /**
     * @param Monitor $monitor
     */
    public function append(Monitor $monitor)
    {
        parent::append($monitor);
    }
}