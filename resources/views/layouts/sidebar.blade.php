@php
    $user = auth()->user();
@endphp

<aside class="sidebar">

    <!-- HEADER -->
    <div class="sidebar-header">
        <div class="logo">
            <div class="logo-icon">
                <i class="fas fa-shield-halved"></i>
            </div>
            <div class="logo-text">
                <h1>SecureGuard</h1>
                <p>Gestion Agents</p>
            </div>
        </div>
    </div>

    <!-- NAV -->
    <nav class="sidebar-nav">

        <!-- Dashboard (TOUS) -->
        <a href="{{ route('dashboard') }}"
           class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <i class="fas fa-chart-line"></i>
            <span>Tableau de bord</span>
        </a>

        {{-- ================= ADMIN UNIQUEMENT ================= --}}
        @if($user->role === 'admin')

            <a href="{{ route('agents.index') }}"
               class="nav-item {{ request()->routeIs('agents.*') ? 'active' : '' }}">
                <i class="fas fa-users"></i>
                <span>Agents</span>
            </a>

            <a href="{{ route('sites.index') }}"
               class="nav-item {{ request()->routeIs('sites.*') ? 'active' : '' }}">
                <i class="fas fa-building"></i>
                <span>Sites</span>
            </a>

            <a href="{{ route('plannings.index') }}"
               class="nav-item {{ request()->routeIs('plannings.*') ? 'active' : '' }}">
                <i class="fas fa-calendar-alt"></i>
                <span>Plannings</span>
            </a>
        <a href="#" class="nav-item">
<i class="fas fa-stopwatch"></i>
            <span>Liste de presence</span>
        </a>
        @endif
        {{-- ==================================================== --}}

        <!-- Pointages (plus tard) -->
        
       
        @if($user->role === 'agent')

        <a href="#" class="nav-item">
    <i class="fas fa-user-clock"></i>
            <span>Pointages</span>
        </a>

        <a href="/agent/calendrier" class="nav-item">
        <i class="fas fa-calendar-alt"></i>
            <span>Planning</span>
        </a>
        @endif
        <div class="nav-divider"></div>

        <!-- Profil (TOUS) -->
        <a href="{{ route('profile.edit') }}"
           class="nav-item {{ request()->routeIs('profile.*') ? 'active' : '' }}">
            <i class="fas fa-user"></i>
            <span>Profil</span>
        </a>

    </nav>

    <!-- FOOTER -->
    <div class="sidebar-footer">
        <div class="user-profile">
            <div class="user-avatar">
                {{ strtoupper(substr($user->name, 0, 2)) }}
            </div>

            <div class="user-info">
                <p class="user-name">{{ $user->name }}</p>
                <p class="user-role">{{ ucfirst($user->role) }}</p>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="logout-btn" title="Déconnexion">
                    <i class="fas fa-sign-out-alt"></i>
                </button>
            </form>
        </div>
    </div>

</aside>