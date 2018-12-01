  <!-- sidebar: style can be found in sidebar.less -->
  <aside class="main-sidebar">

  <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img  @if(Auth::User()->worker->photo!=null) src="{{ asset('imgUsuarios/'.Auth::User()->worker->photo) }}" @else src="{{ asset('img/avatar.png') }}" @endif  class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>{{Auth::User()->worker->name}}</p>
            <a href="#"><i class="fa fa-circle text-success"></i> En línea</a>
          </div>
        </div>
        <!-- search form -->
          {{-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                    </button>
                  </span>
            </div>
          </form> --}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <br>
        <ul class="sidebar-menu" data-widget="tree">
          <li class="header">MENU NAVEGACIÓN</li>
          <li>
              {{-- <a href="http://polleriatony.herokuapp.com/admin/index"> --}}
                <a href="#">
                <i class="fa fa-th"></i> <span>Inicio</span>
                {{-- <span class="pull-right-container">
                  <small class="label pull-right bg-green">new</small>
                </span> --}}
              </a>
          </li>
          <li>
             {{-- <a href="http://polleriatony.herokuapp.com/admin/users">  --}}
              <a href="users">
              <i class="fa fa-user"></i> <span>Usuarios</span>
              <span class="pull-right-container">
                <small class="label pull-right bg-green">new</small>
              </span>
            </a>
        </li>
          {{-- 
          <li class="treeview">
            <a href="#">
              <i class="fa fa-files-o"></i>
              <span>Layout Options</span>
              <span class="pull-right-container">
                <span class="label label-primary pull-right">4</span>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="pages/layout/top-nav.html"><i class="fa fa-circle-o"></i> Top Navigation</a></li>
              <li><a href="pages/layout/boxed.html"><i class="fa fa-circle-o"></i> Boxed</a></li>
              <li><a href="pages/layout/fixed.html"><i class="fa fa-circle-o"></i> Fixed</a></li>
              <li><a href="pages/layout/collapsed-sidebar.html"><i class="fa fa-circle-o"></i> Collapsed Sidebar</a></li>
            </ul>
          </li> --}}
          
          
        </ul>
      </section>
  </aside>
      <!-- /.sidebar -->