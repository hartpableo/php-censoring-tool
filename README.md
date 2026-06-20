# PHP Censoring Tool

A lightweight, flexible PHP library to censor email addresses and hyperlinks in block text. Ideal for cleaning user-generated content, masking database outputs, or protecting private information before displaying it publicly.

## Features

- **Email Censoring**: Matches and obscures standard email addresses.
- **Link Censoring**: Identifies HTML anchor tags (`<a>...</a>`) and obscures either the anchor text or the full tag.
- **Flexible Masking**: Decoupled design allows you to define custom replacement formats (e.g., HTML, markdown, custom text like `[REDACTED]`, or simple asterisks).
- **Zero Production Dependencies**: Light codebase that runs out-of-the-box on PHP 7.4 or newer.

---

## Installation

Install the package via Composer:

```bash
composer require hartpableo/php-censoring-tool
```

---

## Usage

### 1. Basic Usage (Default HTML Output)

By default, censored links and emails are replaced with standard HTML tags styled with the class `.censored-text` and carrying a notice.

```php
use HartPableo\PhpCensoringTool\Censor;

$text = "Contact support@example.com or visit <a href='https://example.com'>Example Site</a>.";

$censor = new Censor($text, "Please upgrade your subscription to view contact details.");
$output = $censor->getCensoredText();

echo $output;
// Contact <strong class="censored-text" data-notice="Please upgrade your subscription to view contact details.">*******************</strong> or visit <strong class="censored-text" data-notice="Please upgrade your subscription to view contact details.">************</strong>.
```

### 2. Advanced Usage (Custom Formatting Callback)

If you need a plain text output, Markdown formatting, or custom redacted strings, you can pass a custom formatter as the third argument to the constructor:

```php
use HartPableo\PhpCensoringTool\Censor;

$text = "Send your CV to jobs@example.com.";

// Censor using a simple '[REDACTED]' string:
$censor = new Censor($text, 'Redacted', function(string $string) {
    return '[REDACTED]';
});

echo $censor->getCensoredText();
// Send your CV to [REDACTED].
```

Another example using custom asterisk replacement:
```php
$censor = new Censor($text, '', function(string $string) {
    return str_repeat('*', strlen($string));
});
```

---

## Testing

### Automated Unit Tests
The library includes a PHPUnit test suite. To run the automated unit tests:

1. Install development dependencies:
   ```bash
   composer install
   ```
2. Run the test suite:
   ```bash
   vendor/bin/phpunit
   ```

### Manual Sample Run
You can also run the quick demonstration script:
```bash
php tests/index.php
```

---

## License

This project is open-source software licensed under the [MIT License](LICENSE).
