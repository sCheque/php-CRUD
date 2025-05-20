# Небольшой CRUD на php

- Стек: php 8.3 (+ PDO, php-fpm), tailwind, MySQL, nginx

Запуск сервера

```
docker compose up -d
```

сервер запускается по адресу http://localhost:8080/ 

Чтобы выключить, в терминале набираем

```
docker compose down
```

командля для mysql cli

```
docker compose exec mysql mysql -u user -p123 CRUD_db
```

Создание таблицы постов для нашего CRUD

```
CREATE TABLE posts (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(30) NOT NULL,
    content TEXT NOT NULL
)
```
