<?php

namespace SubstitutionPlugin\Provider;

use SubstitutionPlugin\BaseUnitTestCase;

class ProviderProxyCacheTest extends BaseUnitTestCase
{
    public function testGetValue()
    {
        $innerProvider = new LiteralProvider('foo');
        $provider = new ProviderProxyCache($innerProvider);

        self::assertEquals('foo', $provider->getValue());
    }

    public function testCache()
    {
        require_once self::getFixturesDir() . '/DummyProvider.php';
        $innerProvider = new \DummyProvider('foo');
        $provider = new ProviderProxyCache($innerProvider);

        self::assertEquals(0, $innerProvider->getCount());
        for ($i = 0; $i < 3; $i++) {
            self::assertEquals('foo', $provider->getValue());
        }
        self::assertEquals(1, $innerProvider->getCount());
    }
}
