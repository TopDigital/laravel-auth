# Быстро-настраиваемая авторизация в Laravel-проектах, на базе Passport

Включает в себя простейший CORS с разрешением на любые кросс-доменные запросы (при желании легко переопределяется по образу и подобию). Подходит для быстрого старта разработки проектов с фронтендом на React/Vue на локальной машине.

### Добавляем пакет авторизации

```bash
$ composer config repositories.0 vcs https://github.com/TopDigital/laravel-auth.git
```

Если уже добавлены какие-то репозитории, лучше вручную добавить элемент в список `repositories` в конфиге `composer.json`:
```json
{
  "repositories": [
    {
    "some": "other repos"
    },
    {
      "type": "vcs",
      "url": "https://github.com/TopDigital/laravel-auth.git"
    }
  ]
}
```

### Подключаем зависимость
```bash
$ composer require topdigital/laravel-auth
```
### Редактируем конфиги
В `./config/auth.php` редактируем значение `guards.api.driver`:
```php
  'guards' => [
//...
    'api' => [
      'driver' => 'passport',
```
и `providers.users.model`:
```php
  'providers' => [
    'users' => [
//...
      'model' => \TopDigital\Auth\Models\User::class,
```

### Добавляем middleware

В `App\Http\Kernel`:
```php
    protected $middlewareGroups = [
//...
        'api' => [
//...
            \TopDigital\Auth\Http\Middleware\Cors::class,
        ],
```

```php
    protected $routeMiddleware = [
//...
        'oauth.check-client' => \TopDigital\Auth\Http\Middleware\CheckOAuthClient::class,
        'cors' => \TopDigital\Auth\Http\Middleware\Cors::class,
    ],
```

Для работы Passport требуется обновление базы данных. Выполняем миграции, создаём ключ для работы фронтенда:
```bash
$ php artisan migrate:fresh --seed
$ php artisan auth:secret
```
Здесь мы увидим созданный ключ:
```bash
Client ID: 1
Client secret: <key>
```

### Очистка дублей

Чистим дубли в базовых миграциях и фабриках Laravel:
1. `./database/factory/UserFactory.php`
2. `./database/migrations/2014_10_12_000000_create_users_table.php`
3. `./database/migrations/2014_10_12_100000_create_password_resets_table.php`

Очищаем файл `./routes/api.php` от дублирующих роутов `/auth` и `/user`
