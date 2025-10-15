import http from 'k6/http';
import { check, sleep } from 'k6';
import { Rate } from 'k6/metrics';

// Custom metrics
const errorRate = new Rate('errors');

// Test configuration
export const options = {
    stages: [
        { duration: '30s', target: 10 }, // Ramp up to 10 users
        { duration: '1m', target: 10 },  // Stay at 10 users for 1 minute
        { duration: '30s', target: 0 },  // Ramp down to 0 users
    ],
    thresholds: {
        http_req_duration: ['p(95)<2000'], // 95% of requests must complete below 2s
        errors: ['rate<0.01'],             // Error rate must be below 1%
    },
};

const BASE_URL = __ENV.BASE_URL || 'http://127.0.0.1:8000';

export default function () {
    // Test dashboard endpoint performance
    const dashboardRes = http.get(`${BASE_URL}/api/v1/dashboard`, {
        headers: {
            'Accept': 'application/json',
            // Note: Add authentication header if required
            // 'Authorization': `Bearer ${__ENV.API_TOKEN}`,
        },
    });

    // Verify response
    const dashboardCheck = check(dashboardRes, {
        'dashboard status is 200': (r) => r.status === 200,
        'dashboard response time < 2s': (r) => r.timings.duration < 2000,
        'dashboard has data': (r) => {
            try {
                const body = JSON.parse(r.body);
                return body.data !== undefined;
            } catch (e) {
                return false;
            }
        },
    });

    errorRate.add(!dashboardCheck);

    sleep(1);

    // Test health endpoint (should be very fast)
    const healthRes = http.get(`${BASE_URL}/api/v1/health`, {
        headers: {
            'Accept': 'application/json',
        },
    });

    const healthCheck = check(healthRes, {
        'health status is 200': (r) => r.status === 200,
        'health response time < 500ms': (r) => r.timings.duration < 500,
    });

    errorRate.add(!healthCheck);

    sleep(1);
}

// Setup function (runs once at the start)
export function setup() {
    console.log(`Running performance tests against: ${BASE_URL}`);

    // Verify base URL is accessible
    const res = http.get(`${BASE_URL}/api/v1/health`);
    if (res.status !== 200) {
        throw new Error(`Base URL ${BASE_URL} is not accessible. Status: ${res.status}`);
    }

    return { baseUrl: BASE_URL };
}

// Teardown function (runs once at the end)
export function teardown(data) {
    console.log(`Performance test completed for: ${data.baseUrl}`);
}
