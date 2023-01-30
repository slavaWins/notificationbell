@php



        @endphp
<style>
    .roundBell {
        width: 10px;
        height: 10px;
        background: #21a6ff;
        display: block;
        border-radius: 100%;
        position: absolute;
        left: 10px;
        top: -1px;
        display: none;
    }

    .iconBell_new .roundBell {
        display: block;
    }

    .notifyNewItem {
        background: #f1fff0;
    }

    .notifyItem {
        min-width: 360px;

    }

    .bellCards {
        height: 400px;
        overflow: auto;
    }

    .iconBellA {
        color: #444;
    }
</style>
<div class="dropdown  ">
    <a
            class="text-reset me-3 dropdown-toggle hidden-arrow"
            href="#"
            id="navbarDropdownMenuLink"
            role="button"
            data-mdb-toggle="dropdown"
            aria-expanded="false"
            onclick="NotificationBell.Click()"
    >
        <i class="fas fa-bell iconBellA
        @if(\Illuminate\Support\Facades\Auth::user()->ExistNotifications()) iconBell_new @endif

         " style="font-size: 18px;"><span class="roundBell"></span></i>

    </a>
    <ul
            class="dropdown-menu dropdown-menu-end bellCards"
            aria-labelledby="navbarDropdownMenuLink"
    >


        <li>
            @include('vendor.notificationbell.header')
        </li>
        <li class="notifybellContent">

            <div class="  notifyItem card    p-2 px-3    border-bottom                  ">
              Загрузка...
            </div>
        </li>

    </ul>
</div>
