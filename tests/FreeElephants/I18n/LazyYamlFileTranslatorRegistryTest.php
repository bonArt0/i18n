<?php

namespace FreeElephants\I18n;

class LazyYamlFileTranslatorRegistryTest extends AbstractTestCase
{
    private const TRANSLATION_PATH = self::FIXTURE_PATH . '/i18n';

    public function testGetTranslatorExistingLocale()
    {
        $registry = new LazyYamlFileTranslatorRegistry(self::TRANSLATION_PATH);

        $translator = $registry->getTranslator('ru');

        $this->assertSame('Привет Мир!', $translator->translate('Hello World!'));
    }

    public function testRuntimeExceptionOnGetTranslatorForEmptyFile()
    {
        $registry = new LazyYamlFileTranslatorRegistry(self::TRANSLATION_PATH);

        $this->expectException(\RuntimeException::class);

        $registry->getTranslator('empty');
    }

    public function testGetTranslatorForMissingLanguageFile()
    {
        $registry = new LazyYamlFileTranslatorRegistry(self::TRANSLATION_PATH);

        $fallBackTranslator = $registry->getTranslator('ua');

        $this->assertSame('foo', $fallBackTranslator->translate('foo'));
    }
}
