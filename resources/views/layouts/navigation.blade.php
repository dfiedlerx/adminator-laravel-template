<div class="sidebar-logo">
            <div class="peers ai-c fxw-nw">
              <div class="peer peer-greed">
                <a class="sidebar-link td-n" href="index.html">
                  <div class="peers ai-c fxw-nw">
                    <div class="peer">
                      <div class="logo">
                        <img style="width: 60px;" src="/img/logo.jpg" alt="">
                      </div>
                    </div>
                    <div class="peer peer-greed">
                      <h5 class="lh-1 mB-0 logo-text">Clínica Veterinária</h5>
                    </div>
                  </div>
                </a>
              </div>
              <div class="peer">
                <div class="mobile-toggle sidebar-toggle">
                  <a href="" class="td-n">
                    <i class="ti-arrow-circle-left"></i>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- ### $Sidebar Menu ### -->
          <ul class="sidebar-menu scrollable pos-r">
            <li class="nav-item mT-30 active">
              <a class="sidebar-link" href="index.html">
                <span class="icon-holder">
                  <i class="c-blue-500 ti-briefcase"></i>
                </span>
                <span class="title">Consultas</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="email.html">
                <span class="icon-holder">
                  <i class="c-brown-500 ti-pencil"></i>
                </span>
                <span class="title">Blog</span>
              </a>
            </li>
   
            <li class="nav-item">
              <a class='sidebar-link' href="calendar.html">
                <span class="icon-holder">
                  <i class="c-deep-orange-500 ti-calendar"></i>
                </span>
                <span class="title">Calendário</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="chat.html">
                <span class="icon-holder">
                  <i class="c-deep-purple-500 ti-comment-alt"></i>
                </span>
                <span class="title">Chat</span>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a class='sidebar-link' href="charts.html">
                <span class="icon-holder">
                  <i class="c-indigo-500 ti-bar-chart"></i>
                </span>
                <span class="title">Estatísticas</span>
              </a>
            </li>
            <li class="nav-item">
              <a class='sidebar-link' href="forms.html">
                <span class="icon-holder">
                  <i class="c-light-blue-500 ti-pencil"></i>
                </span>
                <span class="title">Nova consulta</span>
              </a>
            </li> -->
            
            
            <li class="nav-item dropdown open">
              <a class="dropdown-toggle" href="javascript:void(0);">
                <span class="icon-holder">
                  <i class="c-teal-500 ti-view-list-alt"></i>
                </span>
                <span class="title">Clínica</span>
                <span class="arrow">
                  <i class="ti-angle-right"></i>
                </span>
              </a>
              <ul class="dropdown-menu">
                @if(Request::is('clientes') || Request::is('clientes/*'))
                <li style="border-right: 3px solid #efc634;" class="nav-item dropdown">
                @else
                <li class="nav-item dropdown">
                @endif  
                  <a href="{{url('/clientes')}}">
                    <span>Clientes</span>
                  </a>
                </li>
               
                @if(Request::is('pets') || Request::is('pets/*'))
                <li style="border-right: 3px solid #efc634;" class="nav-item dropdown">
                @else
                <li class="nav-item dropdown">
                @endif  
                  <a href="javascript:void(0);">
                    <span>Pets</span>
                  </a>
                </li>

                @if(Request::is('users') || Request::is('users/*'))
                <li style="border-right: 3px solid #efc634;" class="nav-item dropdown">
                @else
                <li class="nav-item dropdown">
                @endif  
                  <a href="{{url('/users')}}">
                    <span>Usuários do sistema</span>
                  </a>
                </li>
               
              </ul>
            </li>
          </ul>