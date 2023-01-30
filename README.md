<p align="center">
<img src="info/logo.jpg">
</p>
 
## NotificationBell
Кароч изи пакет 
   

## Установка из composer

```  
composer require slavawins/notificationbell
```

 Опубликовать js файлы, вью и миграции необходимые для работы пакета.
Вызывать команду:
```
php artisan vendor:publish --provider="NotificationBell\Providers\NotificationBellServiceProvider"
``` 

 В роутере routes/web.php удалить:
 добавить
 ```
    \NotificationBell\Library\NotificationBellRoute::routes();
 ```

Выполнить миграцию
 ```
    php artisan migrate 
 ``` 
