

<ul id="sidebar-menu" uk-nav="multiple:true" class="uk-nav-default uk-light x-color-theme">
    <li class="menu-item ">
      <a href="{{ url('xpanel') }}" class="x-space-between">
        <span class="menu-icon"><span class="x-icon x-icon-dashboard"></span>
        Overview</span>
      </a>
    </li>
    <li class="menu-item">
      <a href="{{ url('xpanel/article') }}" class="x-space-between">
            <span  class="menu-icon"><span class="x-icon x-icon-article"></span> Article</span>
        </a>
    </li>
    <li class="menu-item">
      <a href="{{ url('xpanel/article') }}" class="x-space-between">
            <span  class="menu-icon"><span class="x-icon x-icon-product"></span> Product</span>
        </a>
    </li>
    <li class="menu-item">
      <a href="{{ url('xpanel/article') }}" class="x-space-between">
            <span  class="menu-icon"><span class="x-icon x-icon-page"></span> Page</span>
        </a>
    </li>
   <hr>
    <li class="menu-item uk-parent has-sub-menu">
        <a href="#" class="x-space-between">
            <span class="menu-icon"> <span class="x-icon x-icon-pengaturan"></span> Setting</span>
            <span uk-icon="icon: triangle-down;ratio:.8" class="uk-margin-small-left"></span>
        </a>
        <ul class="uk-nav-sub uk-margin-left">
           <x-sidebar.pengaturan />
        </ul>
    </li>
</ul>