

<div id="top-nav" class="uk-width-1-1 x-color-accent uk-padding-small uk-clearfix" style="max-height: 50px">
    <div class="uk-float-left">
        <span id="toggle-sidebar" class="x-icon x-icon-menu x-cursor uk-visible@m"></span>
        <a href="{{ url('dashboard') }}" class="uk-flex uk-hidden@m">
          <img src="{{ asset('/img/logo.png') }}" style="height: 32px !important;margin-top:-3px !important;"  alt="Logo">
          <span class="uk-text-bold uk-margin-small-left x-white-text x-font-10 uk-text-uppercase">System Aplikasi  <br> Keuangan PERUSDA</span>
      </a>
    </div>
    <div class="uk-float-right">
       <div class="uk-flex uk-flex-middle">
        <span class="uk-margin-small-right x-font-12 x-white-text uk-text-capitalize  x-cursor"> <span class="uk-visible@m">{{ auth()->user()->nama }}</span> </span>
        <span class="x-icon x-icon-user"></span>
       </div>
        <div uk-dropdown="pos: bottom-right" class=" uk-padding-remove-horizontal">
          <div class="uk-nav" >
              <li><a href="{{ url('X') }}"> <span uk-icon="icon: user" class="uk-margin-small-right"></span>Profile</a></li>
              <li><a href="{{ route('logout') }}"> <span uk-icon="icon:  sign-out" class="uk-margin-small-right"></span>Keluar</a></li>
          </div>
      </div>
    </div>
</div>