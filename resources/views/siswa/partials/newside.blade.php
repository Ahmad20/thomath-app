<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="/" class="nav_logo">
                <i class="bx bx-layer nav_logo-icon"></i>
                <span class="nav_logo-name">Thomath</span>
            </a>
            <div class="nav_list">
                <a href="{{ url('siswa/dashboard') }}" class="nav_link {{ (request()->is('*/dashboard')) ? 'active' : '' }}">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <a href="{{ url('siswa/course') }}" class="nav_link {{ (request()->is('*/course')) ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke="white"
                        stroke-width="0.7" fill="currentColor" class="bi bi-book type-bold" viewBox="0 0 16 16">
                        <path
                            d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                    </svg>
                    <span class="nav_name">Course</span>
                </a>
                <a href="{{ url('siswa/lihat-nilai') }}" class="nav_link {{ (request()->is('*/lihat-nilai')) ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke="white"
                        stroke-width="0.7" fill="currentColor" class="bi bi-bar-chart" viewBox="0 0 16 16">
                        <path
                            d="M4 11H2v3h2v-3zm5-4H7v7h2V7zm5-5v12h-2V2h2zm-2-1a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1h-2zM6 7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1V7zm-5 4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1v-3z" />
                    </svg>
                    <span class="nav_name">Score</span>
                </a>
                <a href="{{ url('siswa/ai') }}" class="nav_link {{ (request()->is('*/ai')) ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke="white"
                        stroke-width="0.5" fill="currentColor" class="bi bi-skip-end-btn" viewBox="0 0 16 16">
                        <path
                            d="M6.79 5.093 9.5 7.028V5.5a.5.5 0 0 1 1 0v5a.5.5 0 0 1-1 0V8.972l-2.71 1.935A.5.5 0 0 1 6 10.5v-5a.5.5 0 0 1 .79-.407z" />
                        <path
                            d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm15 0a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z" />
                    </svg>
                    <span class="nav_name">Video</span>
                </a>
            </div>
        </div>
        <a href="/siswa/logout" class="nav_link">
            <i class="bx bx-log-out nav_icon"></i>
            <span class="nav_name">Sign Out</span>
        </a>
    </nav>
</div>
