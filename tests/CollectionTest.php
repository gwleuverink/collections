<?php

use Leuverink\Collections\Collection;

it('initalizes as an empty collection when no arguments are passed')
    ->expect(Collection::make())
    ->toHaveCount(0);


it('wraps a single argument in an array if it is not already an array')
    ->expect(Collection::make('foo'))
    ->toHaveCount(1);


it('wraps an array of items')
    ->expect(Collection::make(['foo', 'bar', 'baz']))
    ->toHaveCount(3);


it('acts as an array')
    ->expect(Collection::make('foo')[0])
    ->toBe('foo');


it('is iterable')
    ->expect(Collection::make(['foo', 'bar', 'baz']))
    ->toBeIterable()
    ->sequence(
        fn ($number) => $number->toBe('foo'),
        fn ($number) => $number->toBe('bar'),
        fn ($number) => $number->toBe('baz')
    );
