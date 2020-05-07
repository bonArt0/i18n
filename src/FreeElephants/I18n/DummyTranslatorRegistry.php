<?php

namespace FreeElephants\I18n;

class DummyTranslatorRegistry implements TranslatorRegistryInterface
{
    public function getTranslator(string $language = self::DEFAULT_LANGUAGE): TranslatorInterface
    {
        return new Translator([]);
    }
}
