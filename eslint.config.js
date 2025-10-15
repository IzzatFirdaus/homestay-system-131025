import js from '@eslint/js';
import importPlugin from 'eslint-plugin-import';

export default [
    js.configs.recommended,
    {
        files: ['tests/k6/**/*.js'],
        languageOptions: {
            ecmaVersion: 2022,
            sourceType: 'module',
            globals: {
                __ENV: 'readonly',
                console: 'readonly',
            },
        },
        rules: {
            'no-unused-vars': ['warn', { argsIgnorePattern: '^_' }],
        },
    },
    {
        files: ['tests/Accessibility/**/*.spec.js'],
        languageOptions: {
            ecmaVersion: 2022,
            sourceType: 'module',
            globals: {
                document: 'readonly',
            },
        },
    },
    {
        files: ['*.config.js', 'playwright.config.js'],
        languageOptions: {
            ecmaVersion: 2022,
            sourceType: 'module',
            globals: {
                process: 'readonly',
            },
        },
    },
    {
        files: ['resources/js/**/*.js'],
        languageOptions: {
            ecmaVersion: 2022,
            sourceType: 'module',
            globals: {
                window: 'readonly',
                document: 'readonly',
                console: 'readonly',
                localStorage: 'readonly',
                sessionStorage: 'readonly',
                fetch: 'readonly',
                alert: 'readonly',
                confirm: 'readonly',
                Alpine: 'readonly',
                Livewire: 'readonly',
                Chart: 'readonly',
            },
        },
        plugins: {
            import: importPlugin,
        },
        rules: {
            'no-unused-vars': ['warn', { argsIgnorePattern: '^_' }],
            'no-console': 'off', // Allow console for now, change to 'warn' later
            'prefer-const': 'error',
            'no-var': 'error',
            'eqeqeq': ['error', 'always'],
            'curly': ['error', 'all'],
            'import/no-unresolved': 'off', // Vite handles imports
        },
    },
    {
        ignores: [
            'public/build/**',
            'vendor/**',
            'node_modules/**',
            'bootstrap/cache/**',
            'storage/**',
        ],
    },
];
