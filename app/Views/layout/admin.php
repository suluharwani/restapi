<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $this->renderSection('title') ?> - Admin Panel</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    
    <!-- Custom Styles -->
    <?= $this->renderSection('styles') ?>
</head>
<body class="bg-gray-100">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen">
        <!-- Sidebar -->
        <aside class="fixed inset-y-0 left-0 bg-white shadow-lg w-64 transform transition-transform duration-200 ease-in-out" 
               :class="{ '-translate-x-full': !sidebarOpen, 'translate-x-0': sidebarOpen }">
            <div class="flex items-center justify-between p-4 border-b">
                <h1 class="text-xl font-bold">Admin Panel</h1>
                <button @click="sidebarOpen = false" class="lg:hidden">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <nav class="p-4">
                <a href="<?= site_url('admin') ?>" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                    Dashboard
                </a>
                <a href="<?= site_url('admin/users') ?>" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                    Users
                </a>
                <a href="<?= site_url('admin/sliders') ?>" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                    Sliders
                </a>
                <a href="<?= site_url('admin/sponsors') ?>" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                    Sponsors
                </a>
                <a href="<?= site_url('admin/contacts') ?>" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                    Contacts
                </a>
                <a href="<?= site_url('admin/clients') ?>" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                    Clients
                </a>
                <a href="<?= site_url('admin/projects') ?>" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                    Projects
                </a>
                <a href="<?= site_url('admin/blog-categories') ?>" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                    Blog Categories
                </a>
                <a href="<?= site_url('admin/blog-tags') ?>" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                    Blog Tags
                </a>
                <a href="<?= site_url('admin/blogs') ?>" class="block py-2.5 px-4 rounded transition duration-200 hover:bg-gray-100">
                    Blogs
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="lg:ml-64">
            <!-- Top Navigation -->
            <header class="bg-white shadow-sm">
                <div class="flex items-center justify-between p-4">
                    <button @click="sidebarOpen = true" class="lg:hidden">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                    
                    <div class="flex items-center">
                        <div class="relative" x-data="{ open: false }">
                            <button @click="open = !open" class="flex items-center space-x-2">
                                <span>Admin</span>
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                </svg>
                            </button>
                            
                            <div x-show="open" 
                                 @click.away="open = false"
                                 class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1">
                                <a href="<?= site_url('logout') ?>" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="p-6">
                <?php if (session()->has('success')): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline"><?= session('success') ?></span>
                    </div>
                <?php endif; ?>

                <?php if (session()->has('error')): ?>
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                        <span class="block sm:inline"><?= session('error') ?></span>
                    </div>
                <?php endif; ?>

                <?= $this->renderSection('content') ?>
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <?= $this->renderSection('scripts') ?>
</body>
</html>