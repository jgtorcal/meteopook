<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">

        <a class="navbar-brand" href="#">Lloros</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">

                {{-- <li class="nav-item">
                    <a class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" href="{{ route('youtube.index') }}">Home</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link {{ (request()->is('lloro*')) ? 'active' : '' }}" href="{{ route('lloro.index') }}">Lista de lloros</a>
                </li>

            </ul>
        </div>

    </div>
</nav>