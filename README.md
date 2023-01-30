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

Подключить js

 ``` 
    <script src="{{ asset('js/notificationbell/bell.js') }}" defer></script>

 ``` 

Добавить в навигацию куда-то

 ```
           @include('notificationbell.nav')

 ``` 

Добавить в User

 ```
    use TUserNotificationBell;

 ``` 

Для отправки юзать

 ```
    $user->SendNotification()->SetTitle("Тайтл типа")->SetMessage("Гу что")->SendToUser($user);
    NotificationBellBuilder::Short($user,  "Спасибо за регистрацию! Обязательно заполните свой профиль!", route('profile'));


 ``` 
