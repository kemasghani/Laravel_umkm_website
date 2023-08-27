 <!-- ======= Sidebar ======= -->
 <aside id="sidebar" class="sidebar">

     <ul class="sidebar-nav" id="sidebar-nav">
         @if (Auth::user()->role == '1')
             <li class="nav-item">
                 <a class="nav-link {{ strpos(Route::currentRouteName(), 'user.umkm') === 0 ? '' : 'collapsed' }}" href="{{ route('user.umkm.index') }}">
                    <i class="bi bi-sim-fill"></i>
                     <span>Formulir</span>
                 </a>
             </li>
             <li class="nav-item">
                 <a class="nav-link {{ strpos(Route::currentRouteName(), 'user.document') === 0 ? '' : 'collapsed' }}" href="{{ route('user.document.index') }}">
                     <i class="bi bi-cloud-upload-fill"></i>
                     <span>Upload Berkas</span>
                 </a>
             </li><!-- End Dashboard Nav -->
             <li class="nav-item">
                 <a class="nav-link {{ strpos(Route::currentRouteName(), 'user.cetak-formulir') === 0 ? '' : 'collapsed' }}" href="{{ route('user.cetak-formulir') }}">
                     <i class="bi bi-printer-fill"></i>
                     <span>Cetak Formulir</span>
                 </a>
             </li><!-- End Dashboard Nav -->
             <li class="nav-item">
                 <a class="nav-link {{ strpos(Route::currentRouteName(), 'user.data-umkm') === 0 ? '' : 'collapsed' }}" href="{{ route('user.data-umkm') }}">
                     <i class="bi bi-folder-fill"></i>
                     <span>Data UMKM</span>
                 </a>
             </li><!-- End Dashboard Nav -->
             <li class="nav-item">
                 <a class="nav-link {{ strpos(Route::currentRouteName(), 'user.umkm.index-document') === 0 ? '' : 'collapsed' }}" href="{{ route('user.umkm.index-document') }}">
                     <i class="bi bi-file-earmark-pdf-fill"></i><span>Berkas UMKM</span>
                 </a>
             </li>
         @endif

         @if (Auth::user()->role == '2')
             <li class="nav-item">
                 <a class="nav-link collapsed {{ strpos(Route::currentRouteName(), 'admin.siswa') === 0 ? '' : 'collapsed' }}" data-bs-target="#data-nav" data-bs-toggle="collapse" href="#">
                     <i class="bi bi-folder-fill"></i><span>Data UMKM</span><i class="bi bi-chevron-down ms-auto"></i>
                 </a>
                 <ul id="data-nav" class="nav-content collapse {{ strpos(Route::currentRouteName(), 'admin.umkm') === 0 ? 'show' : '' }} " data-bs-parent="#sidebar-nav">
                     <li>
                         <a class="{{ strpos(Route::currentRouteName(), 'admin.umkm.data-umkm') === 0 ? 'active' : '' }}" href="{{ route('admin.umkm.data-umkm') }}">
                             <i class="bi bi-people-fill"></i><span>Data UMKM</span>
                         </a>
                     </li>
                     <li>
                         <a class="{{ strpos(Route::currentRouteName(), 'admin.umkm.index-document') === 0 ? 'active' : '' }}" href="{{ route('admin.umkm.index-document') }}">
                             <i class="bi bi-folder-fill"></i><span>Berkas UMKM</span>
                         </a>
                     </li>

                 </ul>
             </li>
             <li class="nav-item">
                 <a class="nav-link collapsed {{ strpos(Route::currentRouteName(), 'admin.seleksi') === 0 ? '' : 'collapsed' }}" data-bs-target="#data-nav2" data-bs-toggle="collapse" href="#">
                     <i class="bi bi-slack"></i><span>SPK Profile Matching</span><i class="bi bi-chevron-down ms-auto"></i>
                 </a>
                 <ul id="data-nav2" class="nav-content collapse  {{ strpos(Route::currentRouteName(), 'admin.seleksi') === 0 ? 'show' : '' }} " data-bs-parent="#sidebar-nav2">
                     <li>
                         <a class="{{ strpos(Route::currentRouteName(), 'admin.seleksi.aspek') === 0 ? 'active' : '' }}" href="{{ route('admin.seleksi.aspek.index') }}">
                             <i class="bi bi-stickies"></i><span>Data Aspek</span>
                         </a>
                     </li>
                     <li>
                         <a class="{{ strpos(Route::currentRouteName(), 'admin.seleksi.kriteria') === 0 ? 'active' : '' }}" href="{{ route('admin.seleksi.kriteria.index') }}">
                             <i class="bi bi-dice-6"></i><span>Data Kriteria</span>
                         </a>
                     </li>
                     <li>
                         <a class="{{ strpos(Route::currentRouteName(), 'admin.seleksi.subkriteria') === 0 ? 'active' : '' }}" href="{{ route('admin.seleksi.subkriteria.index') }}">
                             <i class="bi bi-sd-card"></i><span>Data Sub Kriteria</span>
                         </a>
                     </li>
                     <li>
                         <a class="{{ strpos(Route::currentRouteName(), 'admin.seleksi.alternatif') === 0 ? 'active' : '' }}" href="{{ route('admin.seleksi.alternatif.index') }}">
                             <i class="bi bi-people"></i><span>Data Alternatif</span>
                         </a>
                     </li>
                     <li>
                         <a class="{{ strpos(Route::currentRouteName(), 'admin.seleksi.penilaian') === 0 ? 'active' : '' }}" href="{{ route('admin.seleksi.penilaian.index') }}">
                             <i class="bi bi-calendar2"></i><span>Data Penilaian</span>
                         </a>
                     </li>
                     <li>
                         <a class="{{ strpos(Route::currentRouteName(), 'admin.seleksi.hasil') === 0 ? 'active' : '' }}" href="{{ route('admin.seleksi.hasil.index') }}">
                             <i class="bi bi-calculator"></i><span>Data Perhitungan</span>
                         </a>
                     </li>
                     <li>
                         <a class="{{ strpos(Route::currentRouteName(), 'admin.seleksi.rangking') === 0 ? 'active' : '' }}" href="{{ route('admin.seleksi.rangking.index') }}">
                             <i class="bi bi-file-bar-graph"></i><span>Data Hasil Perangkingan</span>
                         </a>
                     </li>

                 </ul>
             </li>
             <li class="nav-item">
                 <a class="nav-link collapsed {{ strpos(Route::currentRouteName(), 'admin.siswa') === 0 ? '' : 'collapsed' }}" data-bs-target="#data-nav3" data-bs-toggle="collapse" href="#">
                     <i class="bi bi-person-fill"></i><span>Data Admin</span><i class="bi bi-chevron-down ms-auto"></i>
                 </a>
                 <ul id="data-nav3" class="nav-content collapse {{ strpos(Route::currentRouteName(), 'admin.umkm') === 0 ? 'show' : '' }} " data-bs-parent="#sidebar-nav3">
                     <li>
                         <a class="{{ strpos(Route::currentRouteName(), 'admin.umkm.manage_admin') === 0 ? 'active' : '' }}" href="{{ route('admin.umkm.manage_admin') }}">
                             <i class="bi bi-people-fill"></i><span>Manage Admin</span>
                         </a>
                     </li>
                     <li>
                         <a class="{{ strpos(Route::currentRouteName(), 'admin.umkm.profile_admin') === 0 ? 'active' : '' }}" href="{{ route('admin.umkm.profile_admin') }}">
                             <i class="bi bi-file-earmark-person-fill"></i><span>Admin Profile</span>
                         </a>
                     </li>

                 </ul>
             </li>
         @endif

         <li class="nav-item">
            <a class="nav-link collapsed {{ strpos(Route::currentRouteName(), 'admin.siswa') === 0 ? '' : 'collapsed' }}" data-bs-target="#data-nav4" data-bs-toggle="collapse" href="#">
                <i class="bi bi-map-fill"></i><span>Pemetaan UMKM</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="data-nav4" class="nav-content collapse {{ strpos(Route::currentRouteName(), 'admin.umkm') === 0 ? 'show' : '' }} " data-bs-parent="#sidebar-nav4">
                <li>
                    <a class="{{ strpos(Route::currentRouteName(), 'admin.umkm.pemetaan_umkm') === 0 ? 'active' : '' }}" href="{{ route('admin.umkm.pemetaan_umkm') }}">
                        <i class="bi bi-people-fill"></i><span>Pemetaan UMKM</span>
                    </a>
                </li>
                <li>
                    <a class="{{ strpos(Route::currentRouteName(), 'admin.umkm.visualisasi_umkm') === 0 ? 'active' : '' }}" href="{{ route('admin.umkm.visualisasi_umkm') }}">
                        <i class="bi bi-file-earmark-person-fill"></i><span>Visualisasi UMKM</span>
                    </a>
                </li>
            </ul>
         </li>

         {{-- @if (Auth::user()->role == '3')
             <li class="nav-item">
                 <a class="nav-link {{ strpos(Route::currentRouteName(), 'admin-kab.siswa') === 0 ? '' : 'collapsed' }}" data-bs-target="#data-nav" data-bs-toggle="collapse" href="#">
                     <i class="bi bi-people"></i><span>Data Siswa PPDB</span><i class="bi bi-chevron-down ms-auto"></i>
                 </a>
                 <ul id="data-nav" class="nav-content collapse {{ strpos(Route::currentRouteName(), 'admin-kab.siswa') === 0 ? 'show' : '' }} " data-bs-parent="#sidebar-nav">
                     <li>
                         <a class="{{ strpos(Route::currentRouteName(), 'admin-kab.siswa.data-siswa') === 0 ? 'active' : '' }}" href="{{ route('admin-kab.siswa.data-siswa') }}">
                             <i class="bi bi-circle"></i><span>Data Siswa</span>
                         </a>
                     </li>
                     <li>
                         <a class="{{ strpos(Route::currentRouteName(), 'admin-kab.siswa.index-document') === 0 ? 'active' : '' }}" href="{{ route('admin-kab.siswa.index-document') }}">
                             <i class="bi bi-circle"></i><span>Berkas Siswa</span>
                         </a>
                     </li>

                 </ul>
             </li>
             <li class="nav-item">
                 <a class="nav-link {{ strpos(Route::currentRouteName(), 'admin-kab.sekolah.data-sekolah') === 0 ? '' : 'collapsed' }}" href="{{ route('admin-kab.sekolah.data-sekolah') }}">
                     <i class="bi bi-building"></i>
                     <span>Sekolah</span>
                 </a>
             </li>
             <!-- End Forms Nav -->
         @endif --}}

     </ul>

 </aside><!-- End Sidebar-->
