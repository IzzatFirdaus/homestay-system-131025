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
        NunoMaduro\PhpInsights\Domain\Insights\ForbiddenNormalClasses::class,
        NunoMaduro\PhpInsights\Domain\Insights\ForbiddenTraits::class,
    ],

    'config' => (static function () {
        $cfg = [];
        if (class_exists(\PHP_CodeSniffer\Standards\Generic\Sniffs\Files\LineLengthSniff::class)) {
            $cfg[\PHP_CodeSniffer\Standards\Generic\Sniffs\Files\LineLengthSniff::class] = [
                'lineLimit' => 120,
                'absoluteLineLimit' => 160,
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
        'min-quality' => 80,
        'min-complexity' => 65,
        'min-architecture' => 80,
        'min-style' => 80,
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
