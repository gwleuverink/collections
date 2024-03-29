<?php

namespace Leuverink\Collections\Concerns;

trait First
{
    /**
     * Get the first item in this collection, or return null.
     * If passed a closure, it will return the first
     * item passing the given thruth check
     */
    public function first(callable $callback = null, $default = null): mixed
    {
        if (! $callback) {
            return empty($this->items) ? $default : $this[0];
        }

        foreach ($this as $key => $item) {
            if ($callback($item, $key)) {
                return $item;
            }
        }

        return $default;
    }
}
