applyTo: '**'

# Coding Preferences

- PHP strict types: Always use declare(strict_types=1) in all PHP files
- Property type hints: Add native type hints to properties when @var annotations are available
- Code style: Follow PSR-12 standards, remove empty comments
- Security: Prefer modern packages (phpoffice/phpspreadsheet over phpoffice/phpexcel)

# Project Architecture

- Laravel 12 project with PHP 8.2
- Uses maatwebsite/excel for spreadsheet operations (v3.1.67)
- PHP Insights configured with Laravel preset
- Excludes vendor, build, config, migrations, tests from insights analysis
- ForbiddenNormalClasses insight disabled (Laravel models/providers need to be extendable)

# Solutions Repository

- PHP Insights security vulnerabilities: Upgrade maatwebsite/excel from v1.1.5 to v3.1.67 (replaces phpoffice/phpexcel with phpoffice/phpspreadsheet)
- Code quality fixes: Add strict types, native property types, remove empty comments  
- Insights config: Exclude build directory and disable normal classes requirement for Laravel compatibility
- Platform requirements: Use --ignore-platform-req=ext-gd when updating packages that require GD extension
- PHP Insights final scores: Code 92.8%, Complexity 82.4%, Architecture 93.3%, Style 91.6%, Security 0 issues 
- Command class properties: Do not add type hints to $signature and $description in Laravel commands (conflicts with parent class)
- Class instantiation: Always use new ClassName() with parentheses instead of new ClassName
- Method parameters: Some mixed types are necessary for settings/config classes that store various data types
- Remaining issues: Forbidden setters (Laravel pattern), mixed type hints (necessary for config classes), cyclomatic complexity (acceptable for domain logic), long functions (complex validation methods)
- Class element ordering: Laravel prefers casts() method at end of class, after other methods
