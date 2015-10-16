<?php

namespace Beer;

class Foo2 implements \Respect\Rest\Routable
{
    public function getOuter($id)
    {
        return $id;
    }
}