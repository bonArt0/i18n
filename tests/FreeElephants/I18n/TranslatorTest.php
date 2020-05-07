<?php

namespace FreeElephants\I18n;

class TranslatorTest extends AbstractTestCase
{
    public function testTranslate()
    {
        $translator = new Translator(
            [
                'Email is required' => 'Электронная почта обязательна',
            ],
        );

        $this->assertSame('Электронная почта обязательна', $translator->translate('Email is required'));
    }
}
