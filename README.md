# Example Blog

Пример блога на Imhotep фреймворке.

Рабочий сайт доступен по адресу:
[example-blog.imhotep.dev](https://example-blog.imhotep.dev)

### Установка:

> Убедитесь что установлена PHP версии не ниже 8.2.

```shell
git clone https://github.com/imhotep-php/example-blog
cd example-blog
cp .env.example .env
composer install
./imhotep migrate
```

#### Локальный запуск

```shell
php server
```

#### Запуск в Docker

```shell
./imhotep docker:install --with=
./vendor/bin/docker up -d
./vendor/bin/docker open
```
