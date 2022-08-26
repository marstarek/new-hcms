<?php
// session_start();

?>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <!-- <a class="navbar-brand" href="#"> <img src="./images/icon1.jpg" style="    width: 125px;
      border-radius: 5px;" alt=""></a> -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="./timer.php"><i class="bi bi-house-fill"></i> Home</a>
                </li>
                <?php if (!isset($_SESSION['LoggedIn']) == true) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="./login.php"><i class="bi bi-lock-fill"></i> Login</a>
                    </li>
                <?php endif; ?>
                <li class="nav-item dropdown bg-dark">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-gear"></i>
                    </a>
                    <ul class="dropdown-menu bg-dark text-white" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="./adduser.php">Add user</a></li>
                        <li><a class="dropdown-item" href="./addEmployee.php">Add Emp</a></li>
                        <li><a class="dropdown-item" href="./request.php">request1</a> </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown bg-dark">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="./images/d0b79558-ebba-48a9-9e2a-e3b07a2b2233.webp" class="rounded-circle" height="22" alt="Portrait of a Woman" loading="lazy" />
                    </a>
                    <ul class="dropdown-menu bg-dark text-white" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="logout.php"><i class="bi bi-unlock-fill"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>