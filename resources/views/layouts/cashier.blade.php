<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @include('components.style')
</head>

<body class="bg-soft-blue">
    <nav class="navbar navbar-expand-lg bg-white py-3">
        <div class="container-fluid">
            <a href="." class="navbar-brand logo">
                <img src="{{ url('assets/images/logo.png') }}" alt=""> JagoPos
            </a>
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarMenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav me-auto gap-2">
                    <li class="nav-item">
                        <a href="." class="nav-link px-4 {{ request()->is('/') ? 'active' : '' }}">Kasir</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('cashier.order-list') }}"
                            class="nav-link px-4  {{ request()->is('order-list') ? 'active' : '' }}">
                            Order List
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end mt-2">
                            <li>
                                <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                    {{ Auth::user()->role }}
                                </a>
                            </li>
                            <li><a class="dropdown-item" href="#">Setting</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="container-fluid py-5 px-0 px-md-5">
        @yield('content')
    </section>

    <footer class="pt-5 pb-4">
        <div class="container">
            <p class="mb-0 text-center text-secondary fs-7">
                2025 &copy; Created By Saeful Ammar 20210100032, Sahidin 20210100023, Oktabian Linggar Yudistira 20210100030, Rizky Septianda 20220100064.
            </p>
        </div>
    </footer>

    @include('components.script')
    <script>
        document.getElementById('checkoutModal').addEventListener('shown.bs.modal', function() {
            document.getElementById('name').focus();
        });
    </script>
</body>

</html>
