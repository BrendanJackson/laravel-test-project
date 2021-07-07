@if (Route::has('login'))
    @auth
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
           aria-expanded="false" xmlns="http://www.w3.org/1999/html">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                <img class="img-profile rounded-circle" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
            @else
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
            @endif
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="{{ route('profile.show') }}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Profile
            </a>
            <a class="dropdown-item" href="{{ route('profile.activity') }}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Activity
            </a>
            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
            <a class="dropdown-item" href="{{ route('api-tokens.index') }}">
                <i class="fas fa-key fa-sm fa-fw mr-2 text-gray-400"></i>
                {{ __('API Tokens') }}
            </a>
            @endif

            @if (Laravel\Jetstream\Jetstream::hasTeamFeatures())
            <!-- Teams Dropdown -->
                <div class="dropdown-divider"></div>
                <h5 class="dropdown-header">
                    {{ __('Manage Team') }}
                </h5>
                <span class="dropdown-item-text">
                    {{ Auth::user()->currentTeam->name }}
                </span>
                <a class="dropdown-item" href="{{ route('teams.show', Auth::user()->currentTeam->id) }}">
                    <i class="fas fa-users-cog fa-sm fa-fw mr-2 text-gray-400"></i>
                    {{ __('Team Settings') }}
                </a>

                @can('create', Laravel\Jetstream\Jetstream::newTeamModel())
                    <a class="dropdown-item" href="{{ route('teams.create') }}">
                        <i class="fas fa-user-plus fa-sm fa-fw mr-2 text-gray-400"></i>
                        {{ __('Create New Team') }}
                    </a>
                @endcan

                <!-- Team Switcher -->
                <div class="dropdown-divider"></div>
                <h6 class="dropdown-header">
                    {{ __('Switch Teams') }}
                </h6>

                @foreach (Auth::user()->allTeams() as $team)
                    <x-jet-switchable-team :team="$team" />
                @endforeach

            @endif

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                Logout
            </a>
        </div>
    @else
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
        </a>
        <!-- Dropdown - User Information -->
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="{{ route('login') }}">
                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                Login
            </a>
            @if (Route::has('register'))
                <a class="dropdown-item" href="{{ route('register') }}" data-toggle="modal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Register
                </a>
            @endif
        </div>
    @endauth
@endif



@push('modals')
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}"
                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
@endpush
