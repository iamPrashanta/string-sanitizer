# 🧼 String Sanitizer for Laravel

Sanitize strings and protect your Laravel application from Cross-site Scripting (XSS) attacks using global helper functions.

This package provides:

- 🔒 HTML-safe string sanitization using [HTMLPurifier](https://github.com/ezyang/htmlpurifier)
- ⚙️ Laravel-ready auto-discovery and registration
- 🧩 Easy-to-use global helper functions
- 📦 Composer support (private GitHub repo or public Packagist)

---

## 🚀 Installation

### Option 1: From Packagist (Public)

```bash
composer require prashanta/string-sanitizer
```

### Option 2: From Private GitHub Repository

Add the repository to your Laravel app’s `composer.json`:

```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/prashanta/string-sanitizer"
    }
],
"require": {
    "prashanta/string-sanitizer": "dev-main"
}
```

Then run:

```bash
composer update
```

---

## 📂 Package Structure

```
packages/
└── prashanta/
    └── string-sanitizer/
        ├── src/
        │   ├── StringSanitizerServiceProvider.php
        │   └── helpers.php
        └── composer.json
```

---

## 🔧 Laravel Auto-Discovery

Laravel 5.5+ will auto-discover and register this package. No need to manually add the service provider.

For Laravel <5.5, add the provider manually to `config/app.php`:

```php
'providers' => [
    Prashanta\StringSanitizer\StringSanitizerServiceProvider::class,
],
```

---

## 🧼 Usage

After installation, the following global helper function will be available:

```php
sanitize_string($string);
```

### Example

```php
$name = '<script>alert("xss")</script>John Doe';
$safeName = sanitize_string($name);

// Output: 'John Doe'
```

---

## 🧪 Test in Tinker

```bash
php artisan tinker
>>> sanitize_string('<b>Hello</b><script>alert(1)</script>');
=> "Hello"
```

---

## ⚙️ Optional: Auto-Sanitize in Form Requests

To automatically sanitize user input before validation:

In `AppServiceProvider`:

```php
public function boot()
{
    \Illuminate\Support\Facades\Validator::extend('clean_string', function ($attribute, $value, $parameters, $validator) {
        return $value === sanitize_string($value);
    });
}
```

Then use it in your validation rules:

```php
'comment' => 'required|clean_string',
```

---

## 🤝 Contributing

- Fork the repository
- Create your feature branch: `git checkout -b feature/xyz`
- Commit your changes: `git commit -m 'Add new feature'`
- Push to the branch: `git push origin feature/xyz`
- Open a pull request

---

## 🔐 Security

If you discover a security vulnerability, please contact **Prashanta Mondal** directly instead of using the issue tracker.

---

## 📄 License

MIT License — Use freely in personal or commercial projects.

---

Made with ❤️ by [Prashanta Mondal](https://github.com/prashanta)
