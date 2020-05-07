<?php

namespace FreeElephants\I18n;

interface TranslatorInterface
{
    public function translate(string $key): string;
}
