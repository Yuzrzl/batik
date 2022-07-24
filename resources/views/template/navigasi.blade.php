<nav id="header" class="w-full z-30 top-0 py-1">
        
        <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3 border-b-2 border-gray-900">

            @include('template.nav_right')

            <div class="order-2 md:order-3 flex items-center m-3" id="nav-content" style="font-size: 1.5rem;">
                
                
                <a class="pl-3 inline-block no-underline  hover:text-yellow-600 fa fa-cart-plus mx-6" href="/cart" ></a>
                <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle hover:text-yellow-600 fa fa-user ml-8"  href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre> </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="/profile">Profil</a>
                                    <a class="dropdown-item" href="/transaksi">Transaksi Saya</a>
                                    <a class="dropdown-item" href="/retur">Pengajuan Retur</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                </li>
                </ul>
            </div>
        </div>
        <div class="container p-2  flex items-center justify-center">
            <nav>
                
                {{-- <a class="bg-red-500 hover:bg-yellow-400 text-white rounded-full p-2 m-2" href="">Transaksi Saya</a> --}}
            </nav>
        </div>
    </nav>