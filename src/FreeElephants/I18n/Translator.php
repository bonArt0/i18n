<?php

namespace FreeElephants\I18n;

class Translator implements TranslatorInterface
{
    private array $dictionary;

    public function __construct(array $dictionary)
    {
        $this->dictionary = $dictionary;
    }

    public function translate(string $key): string
    {
        return $this->dictionary[$key] ?? $key;
    }
}
