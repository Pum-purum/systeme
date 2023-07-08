# Разворачивание проекта

Скопировать файлы с настройками окружения:
```bash
 cp .env.example .env
 cp code/.env.example code/.env
```
Придумать любой пароль и вставить его вместо `password` в файлы `.env` и `code/.env`

Сбилдить контейнеры:
```bash
docker-compose build
```

Запустить проект:
```bash
make up
```
Войти в контейнер `php`:
```bash
make sh
```
Установить зависимости `Composer`:
```bash
composer install
```
Создать и заполнить данными базу данных:
```bash
bin/recreate 
```
По окончании работы остановить контейнеры:
```bash
make stop
```
