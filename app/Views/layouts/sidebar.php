
<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div>
                <div class="brand-logo d-flex align-items-center justify-content-between">
                    <!-- <a href="<?php base_url()?>" class="btn btn-primary w-100">
                    <img src="<?php echo base_url('/template/images/profile/user-1.jpg')?>" alt="" width="35" height="35"
                            class="rounded-circle float-start">
                    <span class="fw-semibold">Nama</span>
                    </a> -->


                    <div class="unlimited-access hide-menu bg-primary position-relative mt-1 rounded w-100">
                        <div class="d-flex">
                        <img src="<?php echo base_url('/template/images/profile/user-1.jpg')?>" alt="" width="35" height="35"
                            class="rounded-circle me-2">
                            <div class="">
                                <h6 class="fw-semibold text-white"><?= session()->get('nama') ?></h6>
                                <span class="text-white"><?= session()->get('email') ?></span>
                            </div>
                        </div>
                    </div>

                    <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                        <i class="ti ti-x fs-8"></i>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
                    <ul id="sidebarnav">
                      

                        <?php if(session()->get('role')=='siswa'){ ?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">SISWA</span>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo base_url('/')?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Halaman Utama</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo base_url('/capaian')?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-align-box-top-left"></i>
                                </span>
                                <span class="hide-menu">Hasil Capaian</span>
                            </a>
                        </li>
                        <?php }else{?>
                        <li class="nav-small-cap">
                            <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                            <span class="hide-menu">GURU</span>
                        </li>

                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo base_url('buka-kelas')?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Kelas Saya</span>
                            </a>
                        </li> -->

                         <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo base_url('materikurikulum')?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Kelas Saya</span>
                            </a>
                        </li> 

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo base_url('kurikulum')?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-layout-dashboard"></i>
                                </span>
                                <span class="hide-menu">Kurikulum</span>
                            </a>
                        </li> 

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo base_url('/capaiansiswa')?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-align-box-top-left"></i>
                                </span>
                                <span class="hide-menu">Hasil Capaian Siswa</span>
                            </a>
                        </li>


                        <?php }?>
                      

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo base_url('/akun')?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-user"></i>
                                </span>
                                <span class="hide-menu">Informasi Pribadi</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?php echo base_url('/pengaturan')?>" aria-expanded="false">
                                <span>
                                    <i class="ti ti-settings"></i>
                                </span>
                                <span class="hide-menu">Pengaturan</span>
                            </a>
                        </li>
                    
                    </ul>
                    
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>