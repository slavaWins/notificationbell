@php
    use SlavaWins\Formbuilder\Library\FElement;
    use NotificationBell\Models\NotificationBell;
@endphp


<div class="col-3 aw-card">
    <h4>Уведомления</h4>

    <div class="row">
        @foreach (NotificationBell::where("user_id", $item->id)->orderBy("id", "desc")->take(5)->get() as $nb)

            @include("notificationbell.content", ['nb' => $nb])

        @endforeach
    </div>

</div>
<div class="col-6 aw-card">
    <h4>Отправить уведомление</h4>

    <div class="row">
        <x-mrp-form route="{{route('admin.notification.sendpost')}}" btn="Отправить">

            @php
                FElement::NewInputTextRow()
                 ->SetLabel("Заголовок ")
                 ->SetName("title")
                 ->FrontendValidate()->String(2,72)
                 ->SetPlaceholder("Заголовок")
                 ->RenderHtml(true);

                FElement::NewInputText()
                 ->SetLabel("Текст")
                 ->SetName("message")
                 ->FrontendValidate()->String(2,66)
                 ->RenderHtml(true);


                FElement::NewInputText()
                 ->SetLabel("Ссылка")
                 ->SetName("link")
                 ->SetDescr("Ссылка котоаря будет в уведомление. Не обязательно. Например можно отправить пользователя заполнить профиль")
                 ->RenderHtml(true);

            @endphp

            <input type="hidden" name="uid" value="{{$item->id}}">
        </x-mrp-form>
    </div>

</div>
