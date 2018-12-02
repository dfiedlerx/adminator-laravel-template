<style>
    .header {
    width: 100% !important;
    z-index: 45645;
}
.navbar {
    display: block !important;
    padding: 0px !important;
}
</style>

<div class="header navbar">
    <div class="header-container">
        <ul class="nav-left">
            <li><a id="sidebar-toggle" class="sidebar-toggle" href="javascript:void(0);"><i class="ti-menu"></i></a></li>
        </ul>
        <ul class="nav-right">
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display:hidden;">
            {!! csrf_field() !!}
        </form>
            <li class="dropdown"><a href="" class="dropdown-toggle no-after peers fxw-nw ai-c lh-1" data-toggle="dropdown">
                    <div class="peer mR-10"><i class="ti-user mR-10"></i> </div>
                    <div class="peer"><span class="fsz-sm c-grey-900">{{ Auth::user()->name }}</span></div>
                </a>
                <ul class="dropdown-menu fsz-sm">
                    <!-- <li><a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-settings mR-10"></i>
                            <span>Setting</span></a></li> -->
                    <li><a href="{{ url('/users/'. Auth::user()->id . '/edit') }}" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i
                                class="ti-settings mR-10"></i> <span>Perfil</span></a></li>
                    <!-- <li><a href="" class="d-b td-n pY-5 bgcH-grey-100 c-grey-700"><i class="ti-email mR-10"></i> <span>Messages</span></a></li>
                    <li role="separator" class="divider"></li> -->
                    <li>
                        <a href=""
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                         class="d-b td-n pY-5 bgcH-grey-100 c-grey-500"><i class="ti-power-off mR-10"></i>
                            <span>Sair do sistema</span></a></li>
                </ul>
                <form id='edit-form' style="display: none" action="{{route('users.edit', [ 'id' => Auth::user()->id])}}">
                </form>
           
            </li>
        </ul>
    </div>
</div>
