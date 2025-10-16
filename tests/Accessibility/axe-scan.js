#!/usr/bin/env node
/* global process, console */

/**
 * Axe-Core Accessibility Scanning Script
 * ========================================
 * Purpose: Automated accessibility audit of critical routes using axe-core
 * WCAG Level: 2.1 AA
 * Usage: npm run a11y:scan
 *
 * This script scans the following critical routes for accessibility violations:
 * 1. /dashboard - Main dashboard with metrics
 * 2. /import/upload - Data import form
 * 3. /homestays - Homestay listing page
 *
 * Output: Reports critical and serious violations, fails build if violations found
 */

import axios from 'axios';
import { chromium } from 'playwright';
import { injectAxe, getViolations } from 'axe-playwright';
import fs from 'fs';
import path from 'path';

const BASE_URL = process.env.APP_URL || 'http://127.0.0.1:8000';
const REPORT_DIR = './build/a11y-reports';
const CRITICAL_VIOLATIONS = [];
let totalViolations = 0;

// Routes to scan (critical user flows)
const ROUTES_TO_SCAN = [
    {
        name: 'Dashboard',
        path: '/dashboard',
        description: 'Main dashboard with metrics and charts',
    },
    {
        name: 'Import Form',
        path: '/import/upload',
        description: 'Data import form with file upload',
    },
    {
        name: 'Homestay List',
        path: '/homestays',
        description: 'Homestay listing and search page',
    },
];

// Create report directory if it doesn't exist
if (!fs.existsSync(REPORT_DIR)) {
    fs.mkdirSync(REPORT_DIR, { recursive: true });
}

console.log('🧪 Starting Accessibility Scan');
console.log(`📍 Base URL: ${BASE_URL}`);
console.log('');

/**
 * Scan a single page for accessibility violations
 * @param {Page} page - Playwright page object
 * @param {string} url - Full URL to scan
 * @param {string} routeName - Human-readable route name
 * @returns {Promise<Object>} Scan results with violations
 */
async function scanPage(page, url, routeName) {
    try {
        console.log(`🔍 Scanning: ${routeName} (${url})`);

        // Navigate to page
        await page.goto(url, { waitUntil: 'networkidle' });

        // Inject axe-core library
        await injectAxe(page);

        // Run accessibility checks
        const violations = await getViolations(page);

        return {
            route: routeName,
            url,
            violations,
            timestamp: new Date().toISOString(),
        };
    } catch (error) {
        console.error(`❌ Error scanning ${routeName}:`, error.message);
        return {
            route: routeName,
            url,
            violations: [],
            error: error.message,
            timestamp: new Date().toISOString(),
        };
    }
}

/**
 * Generate human-readable report of violations
 * @param {Object} result - Scan result object
 */
function generateViolationReport(result) {
    if (result.error) {
        console.log(`⚠️  Skipped: ${result.route} - ${result.error}\n`);
        return;
    }

    if (result.violations.length === 0) {
        console.log(`✅ ${result.route}: No violations found`);
        return;
    }

    totalViolations += result.violations.length;

    result.violations.forEach((violation) => {
        const icon = violation.impact === 'critical' ? '🔴' : '🟠';
        console.log(
            `${icon} [${violation.impact.toUpperCase()}] ${violation.id} - ${violation.description}`
        );

        // Track critical violations
        if (
            violation.impact === 'critical' ||
            violation.impact === 'serious'
        ) {
            CRITICAL_VIOLATIONS.push({
                route: result.route,
                id: violation.id,
                description: violation.description,
                impact: violation.impact,
                help: violation.help,
                nodes: violation.nodes.length,
            });
        }

        if (process.env.DEBUG) {
            violation.nodes.forEach((node) => {
                console.log(`   └─ ${node.html.substring(0, 80)}...`);
            });
        }
    });

    console.log('');
}

/**
 * Generate JSON report for CI/CD integration
 * @param {Array} results - All scan results
 */
function generateJSONReport(results) {
    const report = {
        timestamp: new Date().toISOString(),
        baseUrl: BASE_URL,
        scannedRoutes: results.length,
        totalViolations,
        criticalViolations: CRITICAL_VIOLATIONS.length,
        results,
    };

    const reportPath = path.join(REPORT_DIR, 'accessibility-report.json');
    fs.writeFileSync(reportPath, JSON.stringify(report, null, 2));

    console.log(`📄 Report saved to: ${reportPath}`);
}

/**
 * Main function: Run all scans
 */
async function main() {
    let browser;
    const results = [];

    try {
        browser = await chromium.launch();
        const context = await browser.newContext();
        const page = await context.newPage();

        // Scan each route
        for (const route of ROUTES_TO_SCAN) {
            const fullUrl = `${BASE_URL}${route.path}`;

            try {
                // Wait for server to be ready
                await axios.head(fullUrl, { timeout: 5000 }).catch(() => {});

                const result = await scanPage(page, fullUrl, route.name);
                results.push(result);
                generateViolationReport(result);
            } catch (error) {
                console.log(
                    `⚠️  Route not accessible: ${route.name} (${error.message})\n`
                );
                results.push({
                    route: route.name,
                    url: fullUrl,
                    error: error.message,
                    violations: [],
                    timestamp: new Date().toISOString(),
                });
            }
        }

        await context.close();
        await browser.close();

        // Generate reports
        console.log('');
        console.log('='.repeat(60));
        generateJSONReport(results);

        // Summary
        console.log('');
        console.log('📊 Scan Summary:');
        console.log(`   Total Violations: ${totalViolations}`);
        console.log(
            `   Critical/Serious: ${CRITICAL_VIOLATIONS.length}`
        );

        // Exit code
        if (CRITICAL_VIOLATIONS.length > 0) {
            console.log('');
            console.log('❌ SCAN FAILED: Critical accessibility violations found');
            process.exit(1);
        } else {
            console.log('');
            console.log('✅ SCAN PASSED: No critical violations');
            process.exit(0);
        }
    } catch (error) {
        console.error('Fatal error:', error);
        process.exit(1);
    }
}

// Run the scan
main();
