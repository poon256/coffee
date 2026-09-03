<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

        <a class="navbar-brand" href="home.php">Project</a>

        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent"
                aria-expanded="false"
                aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>

        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <!-- เมนูหลัก -->
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="home.php">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="about.php">
                        About
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="shop.php">
                        Shop
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="overview.php">
                        Overview
                    </a>
                </li>

            </ul>


            <!-- Login / Customer -->
<ul class="navbar-nav me-2 mb-0 mb-lg-0">

<?php if (isset($_SESSION['customer_id'])): ?>

    <li class="nav-item">
        <a class="nav-link" href="overview.php">
            <?php echo $_SESSION['customer_name']; ?>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="logout.php">
            Logout
        </a>
    </li>

<?php else: ?>

    <li class="nav-item">
        <a class="nav-link" href="loginC.php">
            Sign in
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="register.php">
            Register
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="../backend/index.php">BackEnd</a>
    </li>

<?php endif; ?>
</ul>

        </div>
    </div>
</nav>