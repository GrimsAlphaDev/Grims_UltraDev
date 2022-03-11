
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 my-3000 fixed-start ms-0 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="/" >
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Ultra Dev</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <div class="collapse navbar-collapse  w-auto  max-height-vh-100" id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white {{ ($title === "HOME") ? 'active bg-gradient-primary' : '' }}" href="/">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Dashboard</span>
          </a>
          <li class="nav-item">
            <a class="nav-link text-white {{ ($title === "Jurusan") ? 'active bg-gradient-primary' : '' }}" href="/categories">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">Jurusan</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-white {{ ($title === "Data Mahasiswa" || $title === "Detail Mahasiswa") ? 'active bg-gradient-primary' : '' }}" href="/mahasiswa">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">table_view</i>
              </div>
              <span class="nav-link-text ms-1">Data Mahasiswa</span>
            </a>
          </li>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white {{ ($title === "ABOUT") ? 'active bg-gradient-primary' : '' }}" href="/about">
              <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                <i class="material-icons opacity-10">view_in_ar</i>
              </div>
              <span class="nav-link-text ms-1">About</span>
            </a>
          </li>
       
        
      </ul>
    </div>
  </aside>