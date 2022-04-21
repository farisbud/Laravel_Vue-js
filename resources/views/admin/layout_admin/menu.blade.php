

<div class="sidebar">
    <nav class="sidebar-nav">
      <ul class="nav">
        <li class="nav-item">
          <router-link to="home" class="nav-link">
            <i class="nav-icon icon-speedometer"></i> Dashboard
          </router-link>
         
        </li>
      
  
  
         
           
             
      
            <li class="nav-title">Data</li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" >
                <i class="nav-icon icon-social-dropbox"></i>Data konten</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <router-link to="kategori" class="nav-link">
                    <i class="nav-icon icon-drop"></i>Kategori 
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="sub_kategori" class="nav-link">
                    <i class="nav-icon icon-drop"></i>Sub Kategori
                  </router-link>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="/admin/konten/">
                    <i class="nav-icon icon-list"></i>konten</a>
                </li> 
               
              </ul>
            </li>

            <li class="nav-title">Data finance</li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" >
                <i class="nav-icon icon-social-dropbox"></i>finance</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link" href="/admin/perusahaan">
                    <i class="nav-icon icon-drop"></i>Perusahaan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/admin/data-link">
                    <i class="nav-icon icon-drop"></i>Data-link</a>
                </li> 
                <li class="nav-item">
                  <a class="nav-link" href="/admin/data-excel">
                    <i class="nav-icon icon-drop"></i>Data-excel</a>
                </li> 
                
                
              </ul>
            </li>

      
            <li class="nav-title">Setting</li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" >
                <i class="nav-icon icon-social-dropbox"></i>Setting</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <a class="nav-link" href="/admin/akun">
                    <i class="nav-icon icon-drop"></i>Akun</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/admin/navbar">
                    <i class="nav-icon icon-drop"></i>Nav Bar</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="/admin/about-us">
                    <i class="nav-icon icon-drop"></i>About-Us</a>
                </li>
              </ul>
            </li>
            
           
      
            
      
  
          
        
  
        <li class="nav-item">
          <a class="nav-link nav-link-danger" onclick="return confirm('Apakah anda ingin logout')" href="{{route('log_out')}}">
            <i class="nav-icon cui-account-logout"></i> Log Out</a>
        </li>
      </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
  </div>
   
  