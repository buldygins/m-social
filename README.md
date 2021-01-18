## Инструкция по установке

```shell script
composer install
npm install && npm run dev
```

Настраиваете .env 
```shell script
cp .env-example .env
php artisan key:generate
```
Заполняете данные для подключения  к бд

```shell script
php artisan migrate
```

Присутствует сид для заполнения стартовых данных ( уч.запись(только 1 раз), 3 автора, 5 книг )
```shell script
php artisan db:seed
```

