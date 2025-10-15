<?php

declare(strict_types=1);

return [

    /*
    |--------------------------------------------------------------------------
    | Default Preset
    |--------------------------------------------------------------------------
    |
    | This option controls the default preset that will be used by PHP Insights
    | to make your code reliable, simple, and clean. However, you can always
    | adjust the insight behavior using the configuration below.
    |
    */

    'preset' => 'laravel',

    /*
    |--------------------------------------------------------------------------
    | IDE
    |--------------------------------------------------------------------------
    |
    | This options allow to add hyperlinks in your terminal to quickly open
    | files in your favorite IDE while browsing your PhpInsights report.
    |
    */

    'ide' => null,

    /*
    |--------------------------------------------------------------------------
    | Configuration
    |--------------------------------------------------------------------------
    |
    | Here you may adjust all the various `Insights` that will be used by PHP
    | Insights. This is the place to add, remove or configure insights according
    | to your needs. Of course, you can always create your own Insights.
    |
    */

    'exclude' => [
        'app/Console/Kernel.php',
        'app/Exceptions/Handler.php',
        'app/Http/Middleware',
        'bootstrap',
        'build',
        'config',
        'database/migrations',
        'database/seeders/DatabaseSeeder.php',
        'public',
        'resources',
        'routes',
        'storage',
        'tests',
        'vendor',
    ],

    'add' => [
        //  ExampleMetric::class => [
        //      ExampleInsight::class,
        //  ]
    ],

    'remove' => [
        // Architecture - Laravel patterns that conflict with opinionated rules
        NunoMaduro\PhpInsights\Domain\Insights\ForbiddenNormalClasses::class,
        NunoMaduro\PhpInsights\Domain\Insights\ForbiddenTraits::class,
        NunoMaduro\PhpInsights\Domain\Insights\CyclomaticComplexityIsHigh::class,
        NunoMaduro\PhpInsights\Domain\Insights\MethodCyclomaticComplexityIsHigh::class,
        SlevomatCodingStandard\Sniffs\Classes\SuperfluousExceptionNamingSniff::class,
        SlevomatCodingStandard\Sniffs\Functions\FunctionLengthSniff::class,
        SlevomatCodingStandard\Sniffs\Classes\ClassStructureSniff::class,

        // Code - Laravel/Livewire patterns
        SlevomatCodingStandard\Sniffs\Classes\ForbiddenPublicPropertySniff::class,
        NunoMaduro\PhpInsights\Domain\Sniffs\ForbiddenSetterSniff::class,
        SlevomatCodingStandard\Sniffs\Functions\UnusedParameterSniff::class,
        SlevomatCodingStandard\Sniffs\ControlStructures\DisallowEmptySniff::class,

        // Type hints - covered by strict types + phpstan
        SlevomatCodingStandard\Sniffs\TypeHints\DisallowMixedTypeHintSniff::class,
        SlevomatCodingStandard\Sniffs\TypeHints\ReturnTypeHintSniff::class,
        SlevomatCodingStandard\Sniffs\TypeHints\ParameterTypeHintSniff::class,
        SlevomatCodingStandard\Sniffs\TypeHints\PropertyTypeHintSniff::class,
        SlevomatCodingStandard\Sniffs\Functions\StaticClosureSniff::class,
        SlevomatCodingStandard\Sniffs\Commenting\InlineDocCommentDeclarationSniff::class,
        PhpCsFixer\Fixer\FunctionNotation\VoidReturnFixer::class,

        // Style - handled by Pint
        SlevomatCodingStandard\Sniffs\Commenting\DocCommentSpacingSniff::class,
        SlevomatCodingStandard\Sniffs\Classes\DisallowConstructorPropertyPromotionSniff::class,
        SlevomatCodingStandard\Sniffs\Operators\DisallowEqualOperatorsSniff::class,
        PhpCsFixer\Fixer\ClassNotation\OrderedClassElementsFixer::class,
        PhpCsFixer\Fixer\Whitespace\BlankLineBeforeStatementFixer::class,
        PhpCsFixer\Fixer\Comment\NoEmptyCommentFixer::class,
        PhpCsFixer\Fixer\LanguageConstruct\DeclareEqualNormalizeFixer::class,
        PhpCsFixer\Fixer\ClassNotation\ClassDefinitionFixer::class,
        PhpCsFixer\Fixer\Whitespace\CompactNullableTypeDeclarationFixer::class,
        PhpCsFixer\Fixer\ClassNotation\SingleClassElementPerStatementFixer::class,
        PhpCsFixer\Fixer\Basic\BracesPositionFixer::class,
        PhpCsFixer\Fixer\Whitespace\StatementIndentationFixer::class,
        PhpCsFixer\Fixer\Phpdoc\PhpdocAlignFixer::class,
    ],

    'config' => (static function () {
        $cfg = [];
        if (class_exists(\PHP_CodeSniffer\Standards\Generic\Sniffs\Files\LineLengthSniff::class)) {
            $cfg[\PHP_CodeSniffer\Standards\Generic\Sniffs\Files\LineLengthSniff::class] = [
                'lineLimit' => 120,
                'absoluteLineLimit' => 160,
                'ignoreComments' => true,
            ];
        }

        return $cfg;
    })(),

    /*
    |--------------------------------------------------------------------------
    | Requirements
    |--------------------------------------------------------------------------
    |
    | Here you may define a level you want to reach per `Insights` category.
    | When a score is lower than the minimum level defined, then an error
    | code will be returned. This is optional and individually defined.
    |
    */

    'requirements' => [
        'min-quality' => 90,
        'min-complexity' => 75,
        'min-architecture' => 65,
        'min-style' => 90,
        'disable-security-check' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Threads
    |--------------------------------------------------------------------------
    |
    | Here you may adjust how many threads (core) PHPInsights can use to run
    | analise. This may speed up the analise on this option is not available
    | to "GithubActions", "TeamCity", "GitLabCi" when ran.
    |
    */

    'threads' => null,

];
