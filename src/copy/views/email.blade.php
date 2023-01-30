@php
    use NotificationBell\Library\NotificationBellBuilder;
    /** @var \NotificationBell\Models\NotificationBell $nb */
@endphp
@component('mail::message')


# {{$nb->title ?? "Уведомление"}}

{{$nb->message ?? "Новое уведомление на сайте ".config('app.name')}}


@if($nb->link_href)
@component('mail::button', ['url' => $nb->link_href])
    {{$nb->link_name ?? "Перейти"}}
@endcomponent
@endif


<br>
{{ config('app.name') }}
@endcomponent
