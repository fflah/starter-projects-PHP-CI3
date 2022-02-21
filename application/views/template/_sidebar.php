<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="<?=base_url('dashboard')?>">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>        
        <?php 
            if($this->session->userdata('id_group_user') == 3) {
                echo"
                    <li class='nav-item'>
                        <a class='nav-link' href='".base_url('surat-masuk')."'>
                            <i class='mdi mdi-email-outline menu-icon'></i>
                            <span class='menu-title'>Surat Masuk</span>
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' data-toggle='collapse' href='#error' aria-expanded='false' aria-controls='error'>
                            <i class='mdi mdi-settings menu-icon'></i>
                            <span class='menu-title'>Pengaturan</span>
                            <i class='menu-arrow'></i>
                        </a>
                        <div class='collapse' id='error'>
                            <ul class='nav flex-column sub-menu'>
                                <li class='nav-item'> <a class='nav-link' href='".base_url('pengaturan/user/edit/').$this->session->userdata('user_id')."'> Akun </a></li>
                            </ul>
                        </div>
                    </li>     
                    ";                       
            }else if($this->session->userdata('id_group_user') == 1){
                echo"                    
                    <li class='nav-item'>
                        <a class='nav-link' href='".base_url('surat-masuk')."'>
                            <i class='mdi mdi-email-outline menu-icon'></i>
                            <span class='menu-title'>Surat Masuk</span>
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='".base_url('surat-keluar')."'>
                            <i class='mdi mdi-email-open-outline menu-icon'></i>
                            <span class='menu-title'>Surat Keluar</span>
                        </a>
                    </li>                
                    <li class='nav-item'>
                        <a class='nav-link' href='".base_url('disposisi')."'>
                            <i class='mdi mdi-email-variant menu-icon'></i>
                            <span class='menu-title'>Disposisi</span>
                        </a>
                    </li>                
                    <li class='nav-item'>
                        <a class='nav-link' data-toggle='collapse' href='#rekap' aria-expanded='false' aria-controls='rekap'>
                            <i class='mdi mdi-book-minus menu-icon'></i>
                            <span class='menu-title'>Rekapitulasi</span>
                            <i class='menu-arrow'></i>
                        </a>
                        <div class='collapse' id='rekap'>
                            <ul class='nav flex-column sub-menu'>
                                <li class='nav-item'> <a class='nav-link' href='".base_url('rekapitulasi/sm-rekap')."'> Surat masuk </a></li>
                                <li class='nav-item'> <a class='nav-link' href='".base_url('rekapitulasi/sk-rekap')."'> Surat keluar </a></li>
                            </ul>
                        </div>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' data-toggle='collapse' href='#error' aria-expanded='false' aria-controls='error'>
                            <i class='mdi mdi-settings menu-icon'></i>
                            <span class='menu-title'>Pengaturan</span>
                            <i class='menu-arrow'></i>
                        </a>
                        <div class='collapse' id='error'>
                            <ul class='nav flex-column sub-menu'>
                                <li class='nav-item'> <a class='nav-link' href='".base_url('pengaturan/user')."'> User </a></li>
                                <li class='nav-item'> <a class='nav-link' href='".base_url('pengaturan/sifat-surat')."'> Sifat Surat </a></li>
                                <li class='nav-item'> <a class='nav-link' href='".base_url('pengaturan/jenis-surat')."'> Jenis Surat </a></li>
                                <li class='nav-item'> <a class='nav-link' href='".base_url('pengaturan/jabatan')."'> Jabatan </a></li>
                            </ul>
                        </div>
                    </li>
                    ";                       
            }else if($this->session->userdata('id_group_user') == 2){
                echo"                    
                    <li class='nav-item'>
                        <a class='nav-link' href='".base_url('surat-masuk')."'>
                            <i class='mdi mdi-email-outline menu-icon'></i>
                            <span class='menu-title'>Surat Masuk</span>
                        </a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' href='".base_url('surat-keluar')."'>
                            <i class='mdi mdi-email-open-outline menu-icon'></i>
                            <span class='menu-title'>Surat Keluar</span>
                        </a>
                    </li>                
                    <li class='nav-item'>
                        <a class='nav-link' href='".base_url('disposisi')."'>
                            <i class='mdi mdi-email-variant menu-icon'></i>
                            <span class='menu-title'>Disposisi</span>
                        </a>
                    </li>                
                    <li class='nav-item'>
                        <a class='nav-link' data-toggle='collapse' href='#rekap' aria-expanded='false' aria-controls='rekap'>
                            <i class='mdi mdi-book-minus menu-icon'></i>
                            <span class='menu-title'>Rekapitulasi</span>
                            <i class='menu-arrow'></i>
                        </a>
                        <div class='collapse' id='rekap'>
                            <ul class='nav flex-column sub-menu'>
                                <li class='nav-item'> <a class='nav-link' href='".base_url('rekapitulasi/sm-rekap')."'> Surat masuk </a></li>
                                <li class='nav-item'> <a class='nav-link' href='".base_url('rekapitulasi/sk-rekap')."'> Surat keluar </a></li>
                            </ul>
                        </div>
                    </li>            
                    <li class='nav-item'>
                        <a class='nav-link' data-toggle='collapse' href='#error' aria-expanded='false' aria-controls='error'>
                            <i class='mdi mdi-settings menu-icon'></i>
                            <span class='menu-title'>Pengaturan</span>
                            <i class='menu-arrow'></i>
                        </a>
                        <div class='collapse' id='error'>
                            <ul class='nav flex-column sub-menu'>
                                <li class='nav-item'> <a class='nav-link' href='".base_url('pengaturan/user/edit/').$this->session->userdata('user_id')."'> Akun </a></li>
                            </ul>
                        </div>
                    </li>        
                    ";          
                
            }
        ?>             
        
    </ul>
</nav>