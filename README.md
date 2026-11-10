# WP Lab

Educational WordPress theme (`wp-theme`) with a local Docker stack: WordPress (PHP 8.3, Apache) and MySQL 8.

## Project structure

```
wp-lab/
├── compose.yaml
└── src/wp-content/themes/wp-theme/   # mounted into WordPress
    ├── functions.php, index.php, style.css, composer.json
    └── inc/{Admin,Core,Frontend}/
```

## Setup

1. Install [Docker Desktop](https://www.docker.com/products/docker-desktop/) and [Composer](https://getcomposer.org/).

2. Create `.env` in the project root:

```env
MYSQL_DATABASE=wordpress
MYSQL_USER=wordpress
MYSQL_PASSWORD=wordpress
MYSQL_ROOT_PASSWORD=root
```

3. Install theme dependencies (PSR-4 autoload used by `functions.php`):

```bash
composer install --working-dir=src/wp-content/themes/wp-theme
```

4. Start the stack:

```bash
docker compose up -d
```

5. Open [http://localhost:8080](http://localhost:8080), finish the WordPress installer, then activate **WP Theme** under Appearance → Themes.

The theme directory is mounted into the container, so PHP changes apply on refresh. Stop the stack with `docker compose down`. Database and WordPress files stay in Docker volumes.
