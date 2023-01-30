@php
    use NotificationBell\Library\NotificationBellBuilder;
    /** @var \NotificationBell\Models\NotificationBell $nb */
@endphp
<div class="  notifyItem card    p-2 px-3    border-bottom                  ">

    <div class="row">
        @if($nb->image)
            <div class="col-auto mt-1 pr-0 pt-2" style="padding-right: 0px !important;">
                <div class="rounded-9 bg-image"
                     style="background: url(/img/ava0.jpg) center; background-size: cover; width: 32px; height: 32px;">
                </div>
            </div>
        @endif
        <div class="col">
            <b>{{$nb->title ?? ""}}</b>
            <p>
                {{$nb->message ?? ""}}
            </p>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <small>{{NotificationBellBuilder::time_back($nb->created_at->unix())}}</small>
        </div>
        @if($nb->link_href)
            <div class="col">
                <a class="btn btn-outline-dark col-12" href="{{$nb->link_href}}">Перейти</a>
            </div>
        @endif
    </div>
</div>
