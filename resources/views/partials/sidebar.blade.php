<div class="sidebar d-flex flex-column bg-dark text-white" style="min-height:100vh;">

    <h4 class="text-center py-4 mb-0 border-bottom border-secondary">
        UnujaKantin
    </h4>

    <ul class="nav nav-pills flex-column px-2 py-3 gap-1 flex-grow-1">

        <li class="nav-item">
            <a href="{{ url('dashboard') }}" class="nav-link text-white {{ request()->is('dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2 me-2"></i> Dashboard
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('categories') }}" class="nav-link text-white {{ request()->is('categories*') ? 'active' : '' }}">
                <i class="bi bi-grid me-2"></i> Kategori
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('products') }}" class="nav-link text-white {{ request()->is('products*') ? 'active' : '' }}">
                <i class="bi bi-cup-hot me-2"></i> Produk
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('tables') }}" class="nav-link text-white {{ request()->is('tables*') ? 'active' : '' }}">
                <i class="bi bi-table me-2"></i> Meja
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ route('promotions.index') }}"
             class="nav-link text-white {{ request()->is('promotions*') ? 'active' : '' }}">
            <i class="bi bi-gift me-2"></i> Promo
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('orders') }}" class="nav-link text-white {{ request()->is('orders*') ? 'active' : '' }}">
                <i class="bi bi-cart me-2"></i> Pesanan
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('reviews') }}" class="nav-link text-white {{ request()->is('reviews*') ? 'active' : '' }}">
                <i class="bi bi-star me-2"></i> Review
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('notifications') }}" class="nav-link text-white {{ request()->is('notifications*') ? 'active' : '' }}">
                <i class="bi bi-bell me-2"></i> Notifikasi
            </a>
        </li>

    </ul>

    <div class="px-2 pb-3 border-top border-secondary pt-3">
        <form action="{{ url('logout') }}" method="POST">
            @csrf
            <button type="submit" class="nav-link text-white bg-transparent border-0 w-100 text-start">
                <i class="bi bi-box-arrow-right me-2"></i> Logout
            </button>
        </form>
    </div>

</div>