<?php

namespace HartPableo\PhpCensoringTool\Tests;

use HartPableo\PhpCensoringTool\Censor;
use PHPUnit\Framework\TestCase;

class CensorTest extends TestCase
{
    public function testItCensorsEmailsWithDefaultHtmlFormatter(): void
    {
        $input = "Contact support@example.com for help.";
        $censor = new Censor($input);
        
        $output = $censor->getCensoredText();
        
        $this->assertStringNotContainsString("support@example.com", $output);
        $this->assertStringContainsString("censored-text", $output);
        $this->assertStringContainsString("*******************", $output);
    }

    public function testItCensorsLinksWithDefaultHtmlFormatter(): void
    {
        $input = "Visit <a href='https://example.com'>Example</a> website.";
        $censor = new Censor($input);
        
        $output = $censor->getCensoredText();
        
        $this->assertStringNotContainsString("https://example.com", $output);
        $this->assertStringContainsString("censored-text", $output);
        // "Example" is 7 characters, so it should be replaced by 7 asterisks
        $this->assertStringContainsString("*******", $output);
    }

    public function testItCensorsWithCustomFormatter(): void
    {
        $input = "Contact support@example.com or visit <a href='https://example.com'>Example</a> website.";
        $censor = new Censor($input, 'Censored', function(string $string) {
            return '[REDACTED]';
        });
        
        $output = $censor->getCensoredText();
        
        $this->assertStringNotContainsString("support@example.com", $output);
        $this->assertStringNotContainsString("Example", $output);
        $this->assertStringContainsString("[REDACTED]", $output);
    }
}
