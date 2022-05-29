

<div class="sidebar">
    <nav class="sidebar-nav">
      <ul class="nav">
        <li class="nav-item">
          <router-link to="/admin" class="nav-link">
            <i class="nav-icon icon-speedometer"></i> Dashboard
          </router-link>
         
        </li>
      
            <li class="nav-title">Data</li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" >
                <i class="nav-icon icon-social-dropbox"></i>Data konten</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <router-link to="/kategori" class="nav-link">
                    <i class="nav-icon icon-drop"></i>Kategori 
                  </router-link>
                </li>
                <li class="nav-item">
                  <router-link to="/sub_kategori" class="nav-link">
                    <i class="nav-icon icon-drop"></i>Sub Kategori
                  </router-link>
                </li> 
                <li class="nav-item">
                  <router-link to="/konten" class="nav-link">
                    <i class="nav-icon icon-list"></i>konten
                  </router-link>
                </li> 
               
              </ul>
            </li>

            <li class="nav-title">Data finance</li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" >
                <i class="nav-icon icon-social-dropbox"></i>finance</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                 <router-link to="/perusahaan" class="nav-link">
                    <i class="nav-icon icon-drop"></i>Perusahaan
                </router-link>
                  </li>
                <li class="nav-item">
                 <router-link to="/data_link" class="nav-link">
                    <i class="nav-icon icon-drop"></i>Data-link
                 </router-link>
                <li class="nav-item">
                  <router-link to="/data_excel" class="nav-link">
                    <i class="nav-icon icon-drop"></i>Data-excel
                  </router-link>
                
                
              </ul>
            </li>

      
            <li class="nav-title">Setting</li>
            <li class="nav-item nav-dropdown">
              <a class="nav-link nav-dropdown-toggle" >
                <i class="nav-icon icon-social-dropbox"></i>Setting</a>
              <ul class="nav-dropdown-items">
                <li class="nav-item">
                  <router-link to="/akun" class="nav-link">
                    <i class="nav-icon icon-drop"></i>Akun
                  </router-link>
                <li class="nav-item">
                 <router-link to="/navbar" class="nav-link">
                    <i class="nav-icon icon-drop"></i>Nav Bar
                 </router-link>
                <li class="nav-item">
                  <router-link to="/about" class="nav-link">
                    <i class="nav-icon icon-drop"></i>About-Us
                  </router-link>
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
   
  