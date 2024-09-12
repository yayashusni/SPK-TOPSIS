<div class="sidebar sidebar-style-2">
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <div class="user">
                <div class="avatar-sm float-left mr-2">
                    <img src="assets/img/<?= strtolower($jk); ?>.png" alt="..." class="avatar-img rounded-circle">
                </div>
                <div class="info">
                    <a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                        <span>
                            <?php echo $menuLabel?>
                            <span class="user-level"> <?php echo $level==='1'?'Admin':'Staff'?> - <?=$jabatan?></span>
                            <span class="caret"></span>
                        </span>
                    </a>
                    <div class="clearfix"></div>

                    <div class="collapse in" id="collapseExample">
                        <ul class="nav">
                            <li>
                                <a href="profile.php">
                                    <span class="link-collapse">Profil</span>
                                </a>
                            </li>
                            <li>
                                <a href="accountsettings.php">
                                    <span class="link-collapse">Pengaturan akun</span>
                                </a>
                            </li>
                            <div class="dropdown-divider"></div>

                            <li>
                                <a href="logout.php">
                                    <span class="link-collapse">Keluar</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

              <!-- get url  current page -->
              <?php
                $url = $_SERVER['REQUEST_URI'];
                $base= "/SPK_Padi/";
                $link= $_SERVER['REQUEST_URI'];
                ?>

            <ul class="nav nav-primary">
                <li class="<?= $url === '/index.php' ? 'active ' : '' ; ?> nav-item">
                    <a href="index.php">
                        <p>Dashboard</p>
                        
                    </a>
                </li>
            
                <li class="nav-item <?= ($url === '/staff.php') || (@$_GET['a']=='tambahStaff') || (@$_GET['k']=='ubahStaff') ? 'active' : '' ; ?>">
                    <a href="staff.php">
                        <p>Staff</p>
                    </a>
                </li>
              
                <?php if($level==='2'){?>
                <li class="nav-item <?= ($url === '/kriteria.php') || (@$_GET['a']=='tambah') || (@$_GET['k']=='ubah') ? 'active' : '' ; ?>">
                    <a href="kriteria.php">
                        <p>Kriteria</p>
                    </a>
                </li>
                <li class="nav-item <?= ($url === '/alternatif.php') || (@$_GET['a']=='tambahAlternatif') || (@$_GET['k']=='ubahAlternatif') ? 'active' : '' ; ?>">
                    <a href="alternatif.php">
                        <p>Alternatif</p>
                    </a>
                </li>
                <li class="nav-item <?= ($url === '/nilaiMatriks.php') ? 'active' : '' ; ?>">
                    <a href="nilaiMatriks.php">
                        <p>Nilai Matriks</p>
                    </a>
                </li>
                <li class="nav-item <?= ($url === '/topsis.php') ? 'active' : '' ; ?>">
                    <a href="topsis.php">
                        <p>Perhitungan TOPSIS</p>
                    </a>
                </li>
               <?php } ?>
                <li class="nav-item">
                    <a href="viewrangking.php">
                        <p>Hasil Perangkingan</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>