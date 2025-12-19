<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sparsh</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/images/upload/favicon.ico') ?>">
    <link href="<?= base_url('assets/front/assets/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/front/assets/css/font-awesome.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('assets/front/assets/css/global.css') ?>" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="<?= base_url('assets/front/assets/js/jquery-3.6.0.min.js') ?>">
        window.bootstrap || document.write('<script src="<?= base_url('assets/front/assets/js/bootstrap.bundle.min.js') ?>"></script>
    </script>
    <style>
        /* Navbar Styling */
        #header {
            background-color: #273B79;
            width: 100%;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1050;
        }

        /* Center the Navbar Text Elements */
        .navbar-nav {
            display: flex;
            justify-content: center;
            width: 100%;
        }

        /* Navbar links and icons */
        .navbar-nav .nav-link {
            color: #ffffff !important;
            font-family: 'Playfair Display', serif;
            padding: 10px 18px;
            font-size: 18px;
        }

        .navbar-nav .nav-link:hover {
            color: #273B79 !important;
            background-color: rgba(255, 255, 255, 0.8);
            border-radius: 8px;
        }

        /* Navbar Icons Styling */
        .navbar-icons {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 25px;
            width: 200px;
            margin-left: auto;
        }

        .navbar-icons a {
            color: #ffffff;
            font-size: 24px;
            text-decoration: none;
            text-align: center;
        }

        .navbar-icons a:hover {
            color: #3498db;
        }

        /* Mobile View Icons */
        .mobile-icons {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .mobile-icons a {
            color: #ffffff;
            font-size: 20px;
            text-decoration: none;
        }

        .mobile-icons a:hover {
            color: #f0f0f0;
        }

        .sidebar-toggle {
            font-size: 24px;
            color: #ffffff;
            cursor: pointer;
        }

        /* Sidebar for Mobile View */
        #sidebar {
            position: fixed;
            top: 0;
            left: -250px;
            width: 250px;
            height: 100%;
            background-color: rgba(39, 59, 121, 0.9);
            color: #fff;
            transition: 0.3s;
            padding-top: 20px;
            z-index: 1100;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.2);
            font-size: 20px;
        }

        #sidebar.active {
            left: 0;
        }

        #sidebar ul {
            list-style: none;
            padding: 0;
        }

        #sidebar ul li {
            padding: 12px 20px;
        }

        #sidebar ul li a {
            color: #fff;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            transition: color 0.3s ease;
        }

        #sidebar ul li a .fa {
            font-size: 18px;
            color: #fff;
            transition: color 0.3s ease;
        }

        #sidebar ul li a:hover {
            color: #a3c9f1;
        }

        #sidebar ul li a:hover .fa {
            color: #a3c9f1;
        }

        #sidebar ul li a.selected {
            color: #3498db;
            font-weight: bold;
        }

        #sidebar .close-btn {
            position: absolute;
            top: 10px;
            right: 10px;
            font-size: 20px;
            cursor: pointer;
            color: #fff;
        }

        #sidebar .instagram-logo {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 25px;
            color: rgba(173, 216, 230, 0.8);
        }

        #sidebar .instagram-logo:hover {
            color: #3498db;
        }

        /* Desktop Dropdown Styling */
        @media (min-width: 992px) {
            .nav-item.dropdown {
                position: static;
            }

            .nav-item.dropdown .dropdown-menu {
                display: none;
                position: absolute;
                left: 0;
                right: 0;
                top: 100%;
                width: 100%;
                background-color: rgba(255, 255, 255, 0.85);
                backdrop-filter: blur(2px);
                border: 1px solid rgba(255, 255, 255, 0.15);
                padding: 15px 0;
                border-radius: 0;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
                margin-top: 0;
                display: none;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                z-index: 1050 !important;
            }

            .nav-item.dropdown:hover .dropdown-menu {
                display: flex;
                transition-delay: 0.1s;
            }

            .dropdown-menu:hover {
                display: flex !important;
            }

            .dropdown-menu .dropdown-item {
                display: inline-block;
                padding: 8px 25px;
                color: #273B79;
                font-size: 17px;
                flex: 0 0 auto;
                text-align: center;
                margin: 0 0px;
                font-weight: bold;
            }

            .dropdown-menu .dropdown-item:hover {
                background-color: transparent;
                color: #3498db;
            }
        }

        /* Mobile and Tablet View Styling (≤992px) */
        @media (max-width: 992px) {
            .navbar-icons {
                display: none;
            }

            .mobile-icons {
                display: flex;
                gap: 20px;
            }

            .sidebar-toggle {
                display: block;
                font-size: 24px;
                color: white;
                cursor: pointer;
            }

            #sidebar {
                display: block;
            }

            #sidebar.active {
                left: 0;
            }

            .close-btn {
                display: block;
                position: absolute;
                top: 10px;
                right: 10px;
                font-size: 20px;
                cursor: pointer;
                color: #fff;
            }

            .navbar-toggler {
                display: block !important;
                position: absolute;
                top: 15px;
                right: 20px;
                z-index: 1051;
                background-color: transparent;
                border: none;
                outline: none;
                color: white;
                font-size: 1.5rem;
            }

            .navbar-toggler-icon {
                background-image: url("data:image/svg+xml;charset=UTF8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28100%2C 100%2C 100%2C 1%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
                background-size: contain;
                background-repeat: no-repeat;
                background-position: center;
                width: 1.5rem;
                height: 1.5rem;
            }

            /* Mobile login dropdown styling */
            .mobile-icons .dropdown-menu {
                min-width: 120px !important;
                padding: 8px 0 !important;
                right: 0 !important;
                left: auto !important;
                transform: translateX(15%) !important;
                background-color: rgba(255, 255, 255, 0.95) !important;
                border: 1px solid rgba(0, 0, 0, 0.1) !important;
                border-radius: 6px !important;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1) !important;
                z-index: 1050 !important;
            }

            .mobile-icons .dropdown-menu .dropdown-item {
                color: #273B79 !important;
                padding: 6px 12px !important;
                font-size: 14px !important;
                text-align: center !important;
                white-space: nowrap !important;
            }

            .mobile-icons .dropdown-menu .dropdown-item:hover {
                background-color: rgba(39, 59, 121, 0.1) !important;
                color: #3498db !important;
            }

            .mobile-icons .dropdown-toggle::after {
                display: none !important;
            }
        }

        /* Ensure desktop icons are hidden on mobile */
        @media (max-width: 768px) {
            .navbar-icons {
                display: none;
            }

            .mobile-icons {
                display: flex;
                gap: 20px;
            }

            .sidebar-toggle {
                display: block;
            }

            #sidebar {
                display: block;
            }
        }

        /* Ensure mobile elements are hidden on desktop */
        @media (min-width: 768px) {
            .navbar-icons {
                display: flex;
            }

            .mobile-icons,
            .sidebar-toggle {
                display: none;
            }

            #sidebar {
                display: none;
            }
        }
    </style>
</head>
<body>
    <section id="header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container-xl">
                <!-- Logo Image on Left Side -->
                <a class="navbar-brand" href="<?= base_url('/') ?>">
                    <img src="<?= base_url('assets/images/upload/logo.webp') ?>" alt="Logo" style="height: 48px;">
                </a>

                <!-- Desktop Navbar Menu -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-0">
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Home</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="<?= base_url('/allproducts') ?>" id="productsDropdown">Products</a>
                            <ul class="dropdown-menu" aria-labelledby="productsDropdown">
                                <li><a class="dropdown-item" href="<?= base_url('/allproducts?category=Earring') ?>">Earrings</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('/allproducts?category=Bracelet') ?>">Bracelets</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('/allproducts?category=Necklace') ?>">Necklaces</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('/allproducts?category=Bangles') ?>">Bangles</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('/allproducts?category=Pendant') ?>">Pendants</a></li>
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('/about') ?>">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('/contact') ?>">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?= base_url('/#faqs') ?>">FAQs</a></li>
                    </ul>
                </div>

                <!-- Icons placed after FAQs (Desktop) -->
                <div class="navbar-icons">
                    <a href="<?= base_url('/cart') ?>"><i class="fa fa-shopping-cart"></i></a>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <?php if (session()->has('customer_id')): ?>
                                <li><a class="dropdown-item" href="<?= base_url('/customer/orders') ?>">Your Orders</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('/customer/logout') ?>" onclick="logoutAndRefresh()">Logout</a></li>
                            <?php else: ?>
                                <li><a class="dropdown-item" href="<?= base_url('/customer/login') ?>">Login</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

                <!-- Mobile Icons (Hamburger Menu) -->
                <div class="mobile-icons d-lg-none">
                    <a href="<?= base_url('/cart') ?>"><i class="fa fa-shopping-cart"></i></a>
                    <div class="dropdown">
                        <a href="#" class="dropdown-toggle" id="userDropdownMobile" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-user"></i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdownMobile">
                            <?php if (session()->has('customer_id')): ?>
                                <li><a class="dropdown-item" href="<?= base_url('/customer/orders') ?>">Your Orders</a></li>
                                <li><a class="dropdown-item" href="<?= base_url('/customer/logout') ?>" onclick="logoutAndRefresh()">Logout</a></li>
                            <?php else: ?>
                                <li><a class="dropdown-item" href="<?= base_url('/customer/login') ?>">Login</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <span class="sidebar-toggle" onclick="toggleSidebar()">
                        <i class="fa fa-bars"></i>
                    </span>
                </div>
            </div>
        </nav>
    </section>

    <!-- Sidebar (for mobile) -->
    <div id="sidebar">
        <span class="close-btn" onclick="toggleSidebar()">×</span>
        <ul>
            <li><a href="<?= base_url('/') ?>">Home</a></li>
            <li>
                <a href="<?= base_url('/allproducts') ?>">Products</a>
                <ul class="sub-menu">
                    <li><a href="<?= base_url('/allproducts?category=Earring') ?>">Earrings</a></li>
                    <li><a href="<?= base_url('/allproducts?category=Bracelet') ?>">Bracelets</a></li>
                    <li><a href="<?= base_url('/allproducts?category=Necklace') ?>">Necklaces</a></li>
                    <li><a class="dropdown-item" href="<?= base_url('/allproducts?category=Bangles') ?>">Bangles</a></li>
                    <li><a href="<?= base_url('/allproducts?category=Pendant') ?>">Pendants</a></li>
                </ul>
            </li>
            <li><a href="<?= base_url('/about') ?>">About</a></li>
            <li><a href="<?= base_url('/contact') ?>">Contact</a></li>
            <li><a href="<?= base_url('/#faqs') ?>">FAQs</a></li>
            <li>
                <a href="https://www.instagram.com/sparsh.collection" class="instagram-logo" target="_blank">
                    <i class="fab fa-instagram instagram-icon"></i> Instagram
                </a>
            </li>
        </ul>
    </div>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            sidebar.classList.toggle('active');
        }

        function logoutAndRefresh() {
            fetch('<?= base_url('/customer/logout') ?>', {
                method: 'POST',
                credentials: 'same-origin'
            })
                .then(response => {
                    if (response.ok) {
                        window.location.reload();
                    } else {
                        console.error('Logout failed:', response.statusText);
                    }
                })
                .catch(error => console.error('Error during logout:', error));
        }

        document.addEventListener('DOMContentLoaded', function () {
            const dropdowns = document.querySelectorAll('.dropdown');
            dropdowns.forEach(dropdown => {
                const toggle = dropdown.querySelector('.dropdown-toggle');
                const menu = dropdown.querySelector('.dropdown-menu');
                let hoverTimer;

                // Desktop: Hover-based dropdown
                if (window.innerWidth > 768) {
                    dropdown.addEventListener('mouseenter', function () {
                        clearTimeout(hoverTimer);
                        menu.style.display = 'flex';
                    });

                    dropdown.addEventListener('mouseleave', function () {
                        hoverTimer = setTimeout(() => {
                            if (!menu.matches(':hover') && !toggle.matches(':hover')) {
                                menu.style.display = 'none';
                            }
                        }, 150);
                    });

                    menu.addEventListener('mouseenter', function () {
                        clearTimeout(hoverTimer);
                        this.style.display = 'flex';
                    });

                    menu.addEventListener('mouseleave', function () {
                        hoverTimer = setTimeout(() => {
                            this.style.display = 'none';
                        }, 150);
                    });
                }

                // Mobile: Click-based dropdown
                toggle.addEventListener('click', function (e) {
                    if (window.innerWidth <= 768) {
                        e.preventDefault();
                        menu.style.display = menu.style.display === 'block' ? 'none' : 'block';
                    }
                });
            });
        });
    </script>
</body>
</html>