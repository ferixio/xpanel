

<ul id="sidebar-menu" uk-nav="multiple:true" class="uk-nav-default uk-light x-color-theme">
    <li class="menu-item ">
      <a href="{{ url('dashboard') }}" class="x-space-between">
        <span class="menu-icon"><span class="x-icon x-icon-dashboard"></span>
        Dashboard</span>
      </a>
    </li>
    <li class="menu-item uk-parent has-sub-menu">
        <a href="#" class="x-space-between">
            <span  class="menu-icon"><span class="x-icon x-icon-masterdata"></span> Master Data</span>
            <span uk-icon="icon: triangle-down;ratio:.8" class="uk-margin-small-left"></span>
        </a>
        <ul class="uk-nav-sub uk-margin-left">
          <x-sidebar.master_data />
        </ul>
       
    </li>
    <li class="menu-item uk-parent has-sub-menu">
        <a href="#" class="x-space-between">
            <span class="menu-icon"> <span class="x-icon x-icon-proses"></span> Proses Data</span>
            <span uk-icon="icon: triangle-down;ratio:.8" class="uk-margin-small-left"></span>
        </a>
        <ul class="uk-nav-sub uk-margin-left">
           <x-sidebar.proses_data />
        </ul>
    </li>
    <li class="menu-item uk-parent has-sub-menu">
        <a href="#" class="x-space-between">
            <span class="menu-icon"> <span class="x-icon x-icon-laporan"></span> Laporan</span>
            <span uk-icon="icon: triangle-down;ratio:.8" class="uk-margin-small-left"></span>
        </a>
        <ul class="uk-nav-sub uk-margin-left">
           <x-sidebar.laporan />
        </ul>
    </li>
    <li class="menu-item uk-parent has-sub-menu">
        <a href="#" class="x-space-between">
            <span class="menu-icon"> <span class="x-icon x-icon-pengaturan"></span> Pengaturan</span>
            <span uk-icon="icon: triangle-down;ratio:.8" class="uk-margin-small-left"></span>
        </a>
        <ul class="uk-nav-sub uk-margin-left">
           <x-sidebar.pengaturan />
        </ul>
    </li>
</ul>