# Homestay Management & Analytics System

**Owner:** MOTAC, Tourism Malaysia  
**Version:** 0.1.0 (Laravel 12.x)

## System Goal
A centralized platform for managing, analyzing, and reporting Homestay data across Malaysia, supporting digital transformation for MOTAC and Tourism Malaysia. Features include Excel import, dashboards, analytics, role-based access, and audit trails.

## Quick Setup

1. Clone repo & install dependencies:
	```bash
	composer install
	npm install
	```
2. Copy environment file:
	```bash
	cp .env.example .env
	```
3. Set up environment variables in `.env` (DB, Redis, Mail, etc.)
4. Generate app key:
	```bash
	php artisan key:generate
	```
5. Run migrations & seeders:
	```bash
	php artisan migrate --seed
	```
6. Build frontend assets:
	```bash
	npm run dev
	```
7. Start local server:
	```bash
	php artisan serve
	```

## References
- See `/docs/` for architecture, requirements, and technical documentation.
- Refer to MOTAC project documentation for standards and system context.

---
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
