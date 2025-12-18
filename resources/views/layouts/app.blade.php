<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>

    <!-- Bootstrap -->
      <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

</head>

<body class="bg-light">

<!-- NAVBAR -->

    @include('layouts.sidebar')

<!-- CONTENU -->
     <main class="main-content">
        <button id="toggleSidebar" class="toggle-btn">
            <i class="fas fa-bars"></i>
        </button>
    @yield('content')
    
    </main>

 <script>
    const toggleBtn = document.getElementById('toggleSidebar');
    const sidebar = document.querySelector('.sidebar');
    const mainContent = document.querySelector('.main-content');
    
    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('hidden');
        mainContent.classList.toggle('full');
    });
</script>
</body>
</html>