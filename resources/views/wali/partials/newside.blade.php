<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="/" class="nav_logo">
                <i class="bx bx-layer nav_logo-icon"></i>
                <span class="nav_logo-name">Thomath</span>
            </a>
            <div class="nav_list">
                <a href="{{ url('walimurid/dashboard') }}"
                    class="nav_link {{ request()->is('*/dashboard') ? 'active' : '' }}">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <a href="{{ url('walimurid/konsultasi') }}"
                    class="nav_link {{ request()->is('*/konsultasi') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke="white"
                    stroke-width="0.7" fill="currentColor">
                        <path
                            d="M8 12c2.28 0 4-1.72 4-4s-1.72-4-4-4-4 1.72-4 4 1.72 4 4 4zm0-6c1.178 0 2 .822 2 2s-.822 2-2 2-2-.822-2-2 .822-2 2-2zm1 7H7c-2.757 0-5 2.243-5 5v1h2v-1c0-1.654 1.346-3 3-3h2c1.654 0 3 1.346 3 3v1h2v-1c0-2.757-2.243-5-5-5zm9.364-10.364L16.95 4.05C18.271 5.373 19 7.131 19 9s-.729 3.627-2.05 4.95l1.414 1.414C20.064 13.663 21 11.403 21 9s-.936-4.663-2.636-6.364z">
                        </path>
                        <path
                            d="M15.535 5.464 14.121 6.88C14.688 7.445 15 8.198 15 9s-.312 1.555-.879 2.12l1.414 1.416C16.479 11.592 17 10.337 17 9s-.521-2.592-1.465-3.536z">
                        </path>
                    </svg>
                    <span class="nav_name">Consultation</span>
                </a>
                <a href="{{ url('walimurid/lihat-nilai') }}"
                    class="nav_link {{ request()->is('*/lihat-nilai') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke="white"
                        stroke-width="0.7" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                        <path
                            d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z" />
                    </svg>
                    <span class="nav_name">Score</span>
                </a>
                {{-- <a href="{{ url('walimurid/profile') }}"
                    class="nav_link {{ request()->is('*/profile') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke="white"
                        stroke-width="0.5" fill="currentColor" class="bi bi-skip-end-btn" viewBox="0 0 16 16">
                        <path
                            d="M6.79 5.093 9.5 7.028V5.5a.5.5 0 0 1 1 0v5a.5.5 0 0 1-1 0V8.972l-2.71 1.935A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .79-.407z" />
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                    </svg>
                    <span class="nav_name">Edit Profile</span>
                </a> --}}
            </div>
        </div>
        <a href="/walimurid/logout" class="nav_link">
            <i class="bx bx-log-out nav_icon"></i>
            <span class="nav_name">Sign Out</span>
        </a>
    </nav>
</div>
