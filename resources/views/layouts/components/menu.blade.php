<ul>



    <li
        class="menu-item  ">
        <a href="{{ route('admin.dashboard') }}" class='menu-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
        </a>
    </li>



    <li
        class="menu-item  has-sub">
        <a href="#" class='menu-link'>
            <i class="bi bi-stack"></i>
            <span>Data Maseter</span>
        </a>
        <div
            class="submenu ">
            <!-- Wrap to submenu-group-wrapper if you want 3-level submenu. Otherwise remove it. -->
            <div class="submenu-group-wrapper">


                <ul class="submenu-group">

                    <li
                        class="submenu-item  ">
                        <a href="{{ route('admin.places.index') }}"
                           class='submenu-link'>Places</a>


                    </li>



                    <li
                        class="submenu-item  ">
                        <a href="{{ route('admin.categories.index') }}"
                           class='submenu-link'>Categories</a>


                    </li>

                </ul>

            </div>
        </div>
    </li>


</ul>
