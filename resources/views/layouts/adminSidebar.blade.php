    <li>
        <a class="text-white waves-effect" href="{{route('admin.slider.index')}}"><i class="text-white menu-icon bi bi-sliders"></i><span>Slider</span></a>
    </li>
    <li>
        <a class="text-white waves-effect" href="{{route('hospital.index')}}"><i class="text-white menu-icon bi bi-hospital-fill"></i><span>Hospital</span></a>
    </li>

    <li>
        <a class="text-white waves-effect parent-item js__control" href="#"><i class="text-white menu-icon bi bi-award-fill"></i><span>Master</span><span class="menu-arrow fa fa-angle-down"></span></a>
        <ul class="sub-menu js__content">
            <li>
                <a class="text-white waves-effect" href="{{route('city.index')}}"><i class="text-white menu-icon bi bi-buildings"></i><span>City</span></a>
            </li>
            <li>
                <a class="text-white    waves-effect" href="{{route('state.index')}}"><i class="text-white menu-icon bi bi-buildings"></i><span>State</span></a>
            </li>
            <li>
                <a class="text-white waves-effect" href="{{route('admin.category.index')}}"><i class="text-white menu-icon bi bi-list"></i><span>Category</span></a>
            </li>
            <li>
                <a class="text-white waves-effect" href="{{route('hospitaltype.index')}}"><i class="text-white menu-icon bi bi-building-add"></i><span>Hospital Type</span></a>
            </li>

            <li>
                <a class="text-white waves-effect " href="{{route('specialist.index')}}"><i class="text-white menu-icon bi bi-person-fill-gear"></i><span>Specialist</span></a>
            </li>

        </ul>
        <!-- /.sub-menu js__content -->
    </li>
    <li>
        <a class="text-white waves-effect parent-item js__control" href="#"><i class="text-white menu-icon fa fa-cog"></i><span>Settings</span><span class="menu-arrow fa fa-angle-down"></span></a>
        <ul class="sub-menu js__content ">
            <li><a class="text-white" href="{{ route('users.index') }}">Manage User</a></li>
            <li><a class="text-white" href="{{ route('roles.index') }}">Manage Role</a></li>
        </ul>
        <!-- /.sub-menu js__content -->
    </li>
    <li>
        <a class="text-white waves-effect" href="{{route('visitor.viewContact')}}"><i class="text-white menu-icon bi bi-telephone-plus"></i><span>Contact Us</span></a>
    </li>