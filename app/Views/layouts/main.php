<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> — CineMax</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800;900&family=Space+Grotesk:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- CSS bawaan (pindahkan semua <style> dari HTML asli ke sini) -->
    <link rel="stylesheet" href="<?= base_url('assets/css/dashboard.css') ?>">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['Space Grotesk', 'sans-serif'],
                        body: ['Plus Jakarta Sans', 'sans-serif'],
                    }
                }
            }
        }
    </script>
</head>

<body>

    <!-- Sidebar -->
    <?= $this->include('partials/sidebar') ?>

    <!-- Overlay mobile -->
    <div id="sidebarOverlay" onclick="toggleSidebar()"></div>

    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <?= $this->include('partials/header') ?>

        <main>
            <?= $this->renderSection('content') ?>
        </main>
    </div>

    <!-- Toast -->
    <?= $this->include('partials/toast') ?>

    <!-- JS bawaan -->
    <script src="<?= base_url('assets/js/dashboard.js') ?>"></script>

    <!-- JS per-halaman (opsional) -->
    <?= $this->renderSection('scripts') ?>

    <style>
        @media (max-width: 900px) {
            main .card { padding: 18px; }
            section[style*="grid-template-columns: 1fr 1fr"],
            section[style*="grid-template-columns: 1.4fr 1fr"] { grid-template-columns: 1fr !important; }
        }
        @media (max-width: 640px) {
            main div[style*="padding:28px 32px"] { padding: 16px !important; }
            header { padding: 12px 16px !important; }
            h1 { font-size: 22px !important; }
            #statsGrid { gap: 10px !important; }
            .stat-card { padding: 14px !important; }
        }
    </style>
</body>

</html>