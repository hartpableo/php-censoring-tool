<?php

namespace HartPableo\PhpCensoringTool;

class Censor {
  private string $text;
  private string $filterMessage;
  /** @var callable */
  private $formatter;

  public function __construct(
    string $unfilteredText,
    string $filterMessage = 'Not authorized to view this info',
    ?callable $formatter = null
  ) {
    $this->text = $unfilteredText;
    $this->filterMessage = $filterMessage;
    
    $this->formatter = $formatter ?: function(string $string) {
      $censoredString = str_repeat('*', strlen($string));
      return "<strong class=\"censored-text\" data-notice=\"{$this->filterMessage}\">{$censoredString}</strong>";
    };
  }

  public function getCensoredText(): array|string|null {
    $text = $this->censorEmails($this->text);
    return $this->censorLinks($text);
  }

  private function censorEmails($text): array|string|null {
    return preg_replace_callback(
      '/\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}\b/',
      fn($match) => $this->censorString($match[0]),
      $text
    );
  }

  private function censorLinks($text): array|string|null {
    return preg_replace_callback(
      '/<a\s+(?:[^>]*)href=["\']([^"\']*)["\']([^>]*)>(.*?)<\/a>/i',
      fn($match) => $this->censorString($match[3] != '' ? $match[3] : $match[0]),
      $text
    );
  }

  private function censorString($string): string {
    return ($this->formatter)($string);
  }
}

