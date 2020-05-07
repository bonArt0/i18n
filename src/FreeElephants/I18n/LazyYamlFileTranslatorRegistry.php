<?php

namespace FreeElephants\I18n;

use Symfony\Component\Yaml\Parser;

class LazyYamlFileTranslatorRegistry implements TranslatorRegistryInterface
{
    private string $baseDir;

    public function __construct(string $baseDir)
    {
        $this->baseDir = $baseDir;
    }

    public function getTranslator(string $language = self::DEFAULT_LANGUAGE): TranslatorInterface
    {
        $filename = $this->findFile($language);
        if ($filename) {
            if ($dictionary = (new Parser())->parseFile($filename)) {
                return new Translator($dictionary);
            } else {
                throw new \RuntimeException(sprintf('Dictionary for `%s` is empty', $language));
            }
        }

        return new Translator([]);
    }

    private function findFile(string $locale): ?string
    {
        $filenames = [
            $this->baseDir . '/' . $locale . '.yml',
            $this->baseDir . '/' . $locale . '.yaml',
        ];

        foreach ($filenames as $filename) {
            if (file_exists($filename)) {
                return $filename;
            }
        }

        return null;
    }
}
