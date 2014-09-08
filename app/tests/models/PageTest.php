<?php

class PageTest extends TestCase
{

    /**
     * Test to ensure that the entity implements
     * the required interfaces
     *
     * @return void
     */
    public function testInterfacesArePresent()
    {
        $refl = new \ReflectionClass("Page");

        $this->assertTrue(
            $refl->implementsInterface('Contracts\Instances\InstanceInterface'),
            'Page does not implement InstanceInterface'
        );
    }
}
