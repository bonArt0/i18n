<?php

namespace FreeElephants\I18n;

interface TranslatorRegistryInterface
{
    public const DEFAULT_LANGUAGE = self::ENGLISH;
    public const ENGLISH = 'en';

    public function getTranslator(string $language = self::DEFAULT_LANGUAGE): TranslatorInterface;
}
