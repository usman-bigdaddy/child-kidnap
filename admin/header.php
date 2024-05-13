<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Admin System</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="dashboard.php">Dashbaord</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="orphanage.php">Orphanages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="orphanage_incident.php">Orphanage Complaints</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="cases.php">All Cases</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="cases.php?q=kidnap">Kidnap Cases</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " aria-current="page" href="cases.php?q=abuse">Abuse Cases</a>
                </li>

            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>