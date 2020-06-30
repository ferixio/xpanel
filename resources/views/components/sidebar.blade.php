

<ul id="sidebar-menu" uk-nav="multiple:true" class="uk-nav-default uk-light x-color-theme">
    <li class="menu-item ">
      <a href="{{ url('xpanel') }}" class="x-space-between">
        <span class="menu-icon"><span class="x-icon x-icon-dashboard"></span>
        Overview</span>
      </a>
    </li>
    <li class="menu-item uk-parent has-sub-menu">
      <a href="{{ url('xpanel/article') }}" class="x-space-between">
            <span  class="menu-icon"><span class="x-icon x-icon-article"></span> Article</span>
            <span uk-icon="icon: triangle-down;ratio:.8" class="uk-margin-small-left"></span>
      </a>
      <ul class="uk-nav-sub uk-margin-left">
        <li><a href="{{url('xpanel/article/create')}}">New Article</a></li>
        <li><a href="{{url('xpanel/article')}}">List of Article</a></li>
        <li><a href="{{url('xpanel/category-article')}}">Article Category</a></li>
        <hr class="uk-margin-small">
        <li><a href="#">Comments</a></li>
      </ul>
      
    </li>
      <li class="menu-item uk-parent has-sub-menu">
        <a href="{{ url('xpanel/product') }}" class="x-space-between">
          <span  class="menu-icon"><span class="x-icon x-icon-product"></span> Product</span>
          <span uk-icon="icon: triangle-down;ratio:.8" class="uk-margin-small-left"></span>
        </a>
        <ul class="uk-nav-sub uk-margin-left">
          <li><a href="{{url('xpanel/product/create')}}">New Product</a></li>
          <li><a href="{{url('xpanel/product')}}">List of Product</a></li>
          <li><a href="{{url('xpanel/category-product')}}">Product Category</a></li>
          <hr class="uk-margin-small">
          <li><a href="#">Order of customer</a></li>
        </ul>
    </li>
    <li class="menu-item uk-parent has-sub-menu">
      <a href="#" class="x-space-between">
        <span class="menu-icon"> <span class="x-icon x-icon-page"></span> Page</span>
        <span uk-icon="icon: triangle-down;ratio:.8" class="uk-margin-small-left"></span>
      </a>
      <ul class="uk-nav-sub uk-margin-left">
        <x-sidebar.page />
      </ul>
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