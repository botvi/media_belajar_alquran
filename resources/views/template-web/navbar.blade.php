<header id="header" class="header d-flex flex-column justify-content-center">

    <i class="header-toggle d-xl-none bi bi-list"></i>

    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="/" class="{{ request()->is('/') ? 'active' : '' }}"><i class="bi bi-house navicon"></i><span>Home</span></a></li>
        <li><a href="/surah" class="{{ request()->is('surah*') ? 'active' : '' }}"><i class="bi bi-book navicon"></i><span>Surah</span></a></li>
        <li><a href="/sunnah" class="{{ request()->is('sunnah*') ? 'active' : '' }}"><i class="bi bi-bookmark navicon"></i><span>Sunnah</span></a></li>
        <li><a href="/materi" class="{{ request()->is('materi*') ? 'active' : '' }}"><i class="bi bi-journal-text navicon"></i><span>Materi</span></a></li>
        <li><a href="/quiz" class="{{ request()->is('quiz*') ? 'active' : '' }}"><i class="bi bi-question-circle navicon"></i><span>Quiz</span></a></li>
      </ul>
    </nav>

  </header>