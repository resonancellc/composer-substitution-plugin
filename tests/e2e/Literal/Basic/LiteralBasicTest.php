<?php

namespace SubstitutionPlugin\Literal\Basic;

use SubstitutionPlugin\BaseEndToEndTestCase;

class LiteralBasicTest extends BaseEndToEndTestCase
{
    public static function doSetUpBeforeClass()
    {
        parent::doSetUpBeforeClass();
        self::install(__DIR__);
    }

    public function testScriptFoo()
    {
        list($output, $exitCode) = self::runComposer(__DIR__, 'test');

        self::assertEquals(0, $exitCode);
        self::assertEquals('foo', array_pop($output));
    }

    public static function doTearDownAfterClass()
    {
        parent::doTearDownAfterClass();
        self::safeCleanDir(__DIR__);
    }
}