<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

  <!-- ! Hide app brand if navbar-full -->
  <div class="app-brand demo">
    <a href="{{url('/dashboard')}}" class="app-brand-link">
      <span class="app-brand-logo demo">
        @include('_partials.macros',["width"=>25,"withbg"=>'var(--bs-primary)'])
      </span>
      <span class="app-brand-text demo menu-text fw-bold ms-2">{{ "Desura"}}</span>
    </a>

    <a href="{{ url('/dashboard') }}" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
      <i class="bx bx-chevron-left bx-sm align-middle"></i>
    </a>
  </div>

  <div class="menu-inner-shadow"></div>

  <ul class="menu-inner py-1">
    <li class="menu-item">
      <a class="menu-link active" href="{{ url('/dashboard') }}">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div>{{ 'Dashboard' }}</div>
      </a>

    </li>
    <li class="menu-item">
      <a class="menu-link active" href="{{ url('/contents') }}">
        <i class="menu-icon tf-icons bx bx-home-circle"></i>
        <div>{{ 'Manage Content' }}</div>
      </a>

    </li>
  </ul>
</aside>