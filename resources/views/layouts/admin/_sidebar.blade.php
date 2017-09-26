<div class="sidebar">
    <nav class="sidebar-nav">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="icon-speedometer"></i>
                    Tableau de bord
                </a>
            </li>

            <li class="nav-title">
                Gestion Hotel
            </li>
            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="icon-book-open"></i> Reservations
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reservations.index') }}">
                            <i class="icon-list"></i> Afficher les reservations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('reservations.create') }}">
                            <i class="icon-plus"></i> Ajouter une reservation
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="fa fa-bed"></i> Chambres
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rooms.index') }}">
                            <i class="icon-list"></i> Toutes de chambres
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('rooms.index') . '?free=1' }}">
                            <i class="icon-list"></i> Chambres libres
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item nav-dropdown">
                <a class="nav-link nav-dropdown-toggle" href="#">
                    <i class="icon-people"></i> Utilisateurs
                </a>
                <ul class="nav-dropdown-items">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('clients.index') }}">
                            <i class="fa fa-user"></i> Clients
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('agents.index') }}">
                            <i class="icon-user"></i> Agents
                        </a>
                    </li>
                </ul>
            </li>

            {{-- <li class="nav-item">
                <a class="nav-link" href="{{ route('facturation') }}">
                    <i class="fa fa-cutlery"></i> Facturation
                    <span class="badge badge-info">BIENTÔT</span>
                </a>
            </li> --}}

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="fa fa-cutlery"></i> Restaurant
                    <span class="badge badge-info">BIENTÔT</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="icon-settings"></i> Configuration
                    <span class="badge badge-info">BIENTÔT</span>
                </a>
            </li>

        </ul>
    </nav>
</div>
