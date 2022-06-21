<div class="l-navbar" id="nav-bar">
    <nav class="nav">
        <div>
            <a href="/" class="nav_logo">
                <i class="bx bx-layer nav_logo-icon"></i>
                <span class="nav_logo-name">Thomath</span>
            </a>
            <div class="nav_list">
                <a href="{{ url('pengajar/dashboard') }}"
                    class="nav_link {{ request()->is('*/dashboard') ? 'active' : '' }}">
                    <i class="bx bx-grid-alt nav_icon"></i>
                    <span class="nav_name">Dashboard</span>
                </a>
                <a href="{{ url('pengajar/konsultasi') }}"
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
                    <span class="nav_name">Konsultasi</span>
                </a>
                <a href="{{ url('pengajar/course') }}"
                    class="nav_link {{ request()->is('*/course') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke="white"
                        stroke-width="0.7" fill="currentColor" class="bi bi-book type-bold" viewBox="0 0 16 16">
                        <path
                            d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z" />
                    </svg>
                    <span class="nav_name">Course</span>
                </a>
                <a href="{{ url('pengajar/course-material') }}"
                    class="nav_link {{ request()->is('*/course-material') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke="white"
                        stroke-width="0.7" fill="currentColor">
                        <path
                            d="M7 3h2v18H7zM4 3h2v18H4zm6 0h2v18h-2zm9.062 17.792-6.223-16.89 1.877-.692 6.223 16.89z">
                        </path>
                    </svg>
                    <span class="nav_name">Course Material</span>
                </a>
                <a href="{{ url('pengajar/test') }}" class="nav_link {{ request()->is('*/test') ? 'active' : '' }}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" stroke="white"
                    stroke-width="0.7" fill="currentColor">
                        <path
                            d="M19.045 7.401c.378-.378.586-.88.586-1.414s-.208-1.036-.586-1.414l-1.586-1.586c-.378-.378-.88-.586-1.414-.586s-1.036.208-1.413.585L4 13.585V18h4.413L19.045 7.401zm-3-3 1.587 1.585-1.59 1.584-1.586-1.585 1.589-1.584zM6 16v-1.585l7.04-7.018 1.586 1.586L7.587 16H6zm-2 4h16v2H4z">
                        </path>
                    </svg>
                    <span class="nav_name">Teacher Test</span>
                </a>
            </div>
        </div>
        <a href="/pengajar/logout" class="nav_link">
            <i class="bx bx-log-out nav_icon"></i>
            <span class="nav_name">Sign Out</span>
        </a>
    </nav>
</div>
