@php
    $user = auth()->user();
@endphp

<aside class="sidebar">
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
    
    <nav class="sidebar-nav">
        <a href="/dashboard" class="nav-item active">
            <i class="fas fa-chart-line"></i>
            <span>Tableau de bord</span>
        </a>
        
        <a href="/agents" class="nav-item">
            <i class="fas fa-users"></i>
            <span>Agents</span>
        </a>
        
        <a href="#" class="nav-item">
            <i class="fas fa-calendar-alt"></i>
            <span>Plannings</span>
        </a>
        
        <a href="/sites" class="nav-item">
            <i class="fas fa-building"></i>
            <span>Sites</span>
        </a>
        
    
        
        <a href="#" class="nav-item">
            <i class="fas fa-clock"></i>
            <span>Pointages</span>
        </a>
        
        <div class="nav-divider"></div>
        
             <a href="#" class="nav-item">
            <i class="fas fa-user"></i>
            <span>Profile</span>
        </a>
        
        
        
      
    </nav>
    
    <div class="sidebar-footer">
        <div class="user-profile">
            <div class="user-avatar">
            {{ strtoupper(substr($user->name, 0, 2)) }}
        </div>

        <div class="user-info">
            <p class="user-name">{{ $user->name }}</p>
            <p class="user-role">{{ $user->role ?? 'Utilisateur' }}</p>
        </div>
            <form action="/logout" method="POST" class="d-inline">
            <button class="logout-btn">
                @csrf
                <i class="fas fa-sign-out-alt"></i>
            </button>
            </form>

        </div>
    </div>
</aside>