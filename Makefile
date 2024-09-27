# Makefile para Docker y Symfony

# Variables
DOCKER_COMPOSE = docker-compose
PHP_CONTAINER = symfony_app # Cambia esto por el nombre de tu contenedor PHP

# Comandos de Docker
up:
	@$(DOCKER_COMPOSE) up --build -d
	@$(MAKE) symfony-server

down:
	@$(DOCKER_COMPOSE) down

# Iniciar el servidor de Symfony dentro del contenedor
start-symfony-server:
	@docker exec -it $(PHP_CONTAINER) php -S 0.0.0.0:8000 -t public

# Instalar dependencias de Composer dentro del contenedor
install:
	@docker exec -it $(PHP_CONTAINER) composer install

# Ejecutar migraciones dentro del contenedor
migrate:
	@docker exec -it $(PHP_CONTAINER) php bin/console doctrine:migrations:migrate --no-interaction

# Ver rutas de Symfony dentro del contenedor
routes:
	@docker exec -it $(PHP_CONTAINER) php bin/console debug:router

# Ejecutar tests dentro del contenedor
test:
	@docker exec -it $(PHP_CONTAINER) php bin/phpunit