      <ul class="sidebar-menu" data-widget="tree">  
		  
		<li>
          <a href="{{ route('view.dashboard') }}">
            <i data-feather="pie-chart"></i>
			<span>Dashboard</span>
          </a>
        </li>  
		
        <li class="treeview">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Deretan Club</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('club.view') }}"><i class="ti-more"></i>Club</a></li>
            {{-- <li><a href="chat.html"><i class="ti-more"></i>Lihat Klasemen Club</a></li> --}}
          </ul>
        </li> 
        <li class="treeview">
          <a href="#">
            <i data-feather="message-circle"></i>
            <span>Pertandingan Club</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-right pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('view.pertandingan') }}"><i class="ti-more"></i>Skor Pertandingan</a></li>
            <li><a href="{{ route('view.klasemen') }}"><i class="ti-more"></i>Klasemen Club</a></li>
          </ul>
        </li> 

        
      </ul>