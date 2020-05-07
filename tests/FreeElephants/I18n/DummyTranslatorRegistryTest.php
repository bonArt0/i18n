<?php

namespace FreeElephants\I18n;

class DummyTranslatorRegistryTest extends AbstractTestCase
{

    public function testGetTranslatorForAnyLanguageAndFallbackTranslationToKey()
    {
        $registry = new DummyTranslatorRegistry();

        $message = $registry->getTranslator('any')->translate('foo');

        $this->assertSame('foo', $message);
    }
}
