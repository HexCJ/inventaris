<aside id="sidebar" class="js-sidebar ">
    <!-- Content For Sidebar -->
    <div class="h-100">
        <div class="sidebar-logo">
            <a href="#">CV.OgahRugi</a>
        </div>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menu
            </li>
            <li class="sidebar-item">
                <a href="{{ route('dashboard') }}" class="sidebar-link">
                    <i class="fa fa-home pe-2" aria-hidden="true"></i>
                    Dashboard
                </a>
            </li>
            @if (auth()->user()->hasRole('Administrator'))
            <li class="sidebar-item">
                <a href="{{ route('user') }}" class="sidebar-link">
                    <i class="fa fa-user-o pe-2" aria-hidden="true"></i>
                    Data User
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('databarang') }}" class="sidebar-link">
                    <i class="fa fa-archive pe-2" aria-hidden="true"></i>
                    Data Barang
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('ruang') }}" class="sidebar-link">
                    <i class="fa fa-building pe-2" aria-hidden="true"></i>
                    Data Ruang
                </a>
            </li>
            @endif
            @if (auth()->user()->hasRole('Administrator') || auth()->user()->hasRole('Operator') || auth()->user()->hasRole('Petugas') ) 
            <li class="sidebar-item">
                <a href="{{ route('datapembelian') }}" class="sidebar-link">
                    <i class="fa fa-cart-arrow-down pe-2" aria-hidden="true"></i>
                    Data Pembelian
                </a>
            </li>
            @endif
            @if (auth()->user()->hasRole('Administrator') || auth()->user()->hasRole('Operator') )
            <li class="sidebar-item">
                <a href="{{ route('datapemakaian') }}" class="sidebar-link">
                    <i class="fa fa-list-alt pe-2" aria-hidden="true"></i>
                    Data Pemakaian
                </a>
            </li>
            @endif
            @if (auth()->user()->hasRole('Administrator'))
            <li class="sidebar-item">
                <a href="{{ route('inventaris') }}" class="sidebar-link">
                    <i class="fa-solid fa-list pe-2"></i>
                    Data Inventaris
                </a>
            </li>
            @endif

            {{-- hapus nanti --}}
            <li class="sidebar-header">
                Multi Level Menu
            </li>
            <li class="sidebar-item">
                <a href="#" class="sidebar-link collapsed" data-bs-target="#multi" data-bs-toggle="collapse"
                    aria-expanded="false"><i class="fa-solid fa-share-nodes pe-2"></i>
                    Multi Dropdown
                </a>
                <ul id="multi" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#level-1"
                            data-bs-toggle="collapse" aria-expanded="false">Level 1</a>
                        <ul id="level-1" class="sidebar-dropdown list-unstyled collapse">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Level 1.1</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Level 1.2</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</aside>