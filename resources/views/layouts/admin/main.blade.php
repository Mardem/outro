@include('layouts.admin.header')

@include('layouts.admin.topbar')

<div class="container-fluid page-body-wrapper">
    @include('layouts.admin.menu')
    <div class="main-panel">

        <div class="content-wrapper">

            @yield('content')
        </div>
    </div>
</div>
</div>
@include('layouts.admin.footer')
