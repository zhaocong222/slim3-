<?php

interface Foo { }

interface Bar { }

class Baz implements Foo, Bar{}

$rc1 = new ReflectionClass("Baz");

//print_r($rc1->getInterfaces());

/*
 * Array
(
    [Foo] => ReflectionClass Object
        (
            [name] => Foo
        )

    [Bar] => ReflectionClass Object
        (
            [name] => Bar
        )

)
 *
 */

print_r($rc1->getInterfaceNames());
/*
  Array
(
    [0] => Foo
    [1] => Bar
)
 */