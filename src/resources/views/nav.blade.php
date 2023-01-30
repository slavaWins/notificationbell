<style>
    .notifyNewItem {
        background: #f1fff0;
    }

    .notifyItem {
        padding: 20px 7px;
        min-width: 360px;

    }

    .bellCards {
        height: 400px;
        overflow: auto;
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
    >
        <i class="fas fa-bell iconBell" style="font-size: 21px;"></i>


    </a>
    <ul
            class="dropdown-menu dropdown-menu-end bellCards"
            aria-labelledby="navbarDropdownMenuLink"
    >


        <li>
            <div class="  notifyItem card                            ">
                Спасибо за регистрацию! Обязательно заполните свой профиль!

                <small> 4 мин. назад</small>

                <a class="btn btn-primary" href="http://eda.test/profile" role="button">Перейти </a>
            </div>
        </li>

    </ul>
</div>
