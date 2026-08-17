# VISION AND REQUIREMENTS DOCUMENT

(VRD)

Web Pengajuan Domain dan Pengelolaan Data SIDeKa-NG

Kabupaten Bandung Barat

Versi Revisi — Alur Admin Disesuaikan

17 Agustus 2026



1. Informasi Dokumen

Komponen

Keterangan

Nama Sistem

Web Pengajuan Domain dan Pengelolaan Data SIDeKa-NG

Wilayah

Kabupaten Bandung Barat

Platform

Web Application

Role

User dan Admin

Backend

PHP dengan Laravel

Frontend

HTML, CSS, dan JavaScript

Database

MySQL

Arsitektur

Model–View–Controller (MVC)

Status Pengajuan

Diproses, Revisi, Domain Berhasil



2. Vision Statement

Web Pengajuan Domain dan Pengelolaan Data SIDeKa-NG merupakan aplikasi berbasis web yang memfasilitasi pengajuan domain desa.id sekaligus membantu pengelolaan data pengajuan, data desa, dan informasi domain secara terpusat.

Sistem memiliki dua aktor utama, yaitu User dan Admin. User merupakan pihak desa yang menggunakan layanan publik untuk memperoleh informasi, mengirimkan dokumen persyaratan, melihat domain yang telah terdaftar, membaca FAQ, serta mengecek status pengajuan tanpa harus melakukan login.

Dalam proses pengajuan, User tidak mengisi data administratif desa. User hanya mengunggah empat dokumen persyaratan. Pemeriksaan dokumen, pencatatan data administratif desa, pengelolaan status, serta pencatatan informasi domain dilakukan oleh Admin melalui dashboard administrasi.

Sistem berfungsi sebagai sarana fasilitasi pengajuan dan pengelolaan data SIDeKa-NG. Sistem tidak berfungsi sebagai penyedia hosting maupun pengelola teknis domain secara langsung.

3. Tujuan Sistem

1. Menyediakan media pengajuan fasilitasi domain desa.id berbasis web.

2. Memudahkan pihak desa dalam mengirimkan dokumen persyaratan pengajuan.

3. Menyediakan informasi dokumen yang perlu disiapkan sebelum pengajuan.

4. Menyediakan template Surat Kuasa yang dapat digunakan oleh User.

5. Memudahkan User dalam mengetahui perkembangan status pengajuan.

6. Memungkinkan User mengunggah ulang dokumen apabila status pengajuan Revisi.

7. Menampilkan daftar domain desa yang telah berhasil terdaftar.

8. Menyediakan FAQ mengenai proses pengajuan domain.

9. Membantu Admin memeriksa dokumen dan menentukan status pengajuan.

10. Membantu Admin mengelola data desa dan informasi domain.

11. Menyediakan dashboard yang menampilkan grafik, ringkasan data pengajuan, dan informasi sistem.

12. Menjaga sinkronisasi data terbaru agar perubahan Admin tercermin pada dashboard dan layanan Cek Status User.

4. Aktor Sistem

4.1 User

User adalah pihak desa yang menggunakan layanan publik SIDeKa-NG. User tidak memerlukan autentikasi untuk menggunakan fungsi utama layanan.

Melihat beranda dan informasi layanan.

Mengakses proses pengajuan SIDeKa-NG.

Mengunggah empat dokumen persyaratan.

Mengakses template Surat Kuasa.

Melihat daftar domain terdaftar.

Membaca FAQ.

Mengecek status pengajuan berdasarkan nama desa.

Mengunggah ulang dokumen apabila status Revisi.

4.2 Admin

Admin adalah pengelola sistem yang memiliki akses terautentikasi ke dashboard administrasi. Admin bertanggung jawab atas pemeriksaan pengajuan, pengelolaan data desa, pembaruan status, dan pencatatan data domain.

Login ke dashboard administrasi.

Melihat grafik data desa/domain, ringkasan data pengajuan, dan informasi sistem.

Memeriksa dokumen pada Data Pengajuan.

Menentukan status: Diproses, Revisi, atau Domain Berhasil.

Memberikan catatan revisi.

Memantau dokumen yang diunggah ulang oleh User.

Melakukan CRUD Data Desa.

Mengisi data domain ketika pengajuan berhasil.

Memastikan pembaruan tersimpan ke database dan muncul sebagai data terbaru.

5. Struktur Frontend User

Frontend User terdiri atas empat bagian utama:

1. Beranda

2. Domain Terdaftar

3. FAQ

4. Cek Status

6. Modul Beranda

6.1 Komponen Beranda

Header/navigasi utama.

Informasi atau teks pengantar layanan.

Tombol Ajukan SIDeKa-NG.

6.2 Alur Tombol Ajukan SIDeKa-NG

Ketika User memilih tombol Ajukan SIDeKa-NG, sistem menampilkan pop-up persyaratan pengajuan yang berisi informasi dokumen, daftar empat dokumen wajib, serta akses ke template Surat Kuasa.

1. Surat Permohonan Fasilitasi Domain desa.id.

2. SK Pengangkatan Kepala Desa.

3. Surat Kuasa.

4. Surat Penunjukan Admin Website desa.id.

Tombol Next/Selanjutnya pada pop-up mengarahkan User ke Form Pengajuan.

6.3 Form Pengajuan

Form pengajuan tidak meminta User mengisi data administratif desa, kepala desa, atau admin website. Form hanya menyediakan empat field upload dokumen.

No.

Dokumen

1

Surat Permohonan Fasilitasi Domain desa.id

2

SK Pengangkatan Kepala Desa

3

Surat Kuasa

4

Surat Penunjukan Admin Website desa.id



Format file yang diterima: PDF, DOC, dan DOCX. Setelah seluruh dokumen terunggah dan User menekan Submit, sistem menampilkan konfirmasi “Berkas berhasil di-submit.”

7. Modul Domain Terdaftar

Halaman Domain Terdaftar menampilkan daftar domain desa yang telah berhasil terdaftar dan datanya telah dikelola oleh Admin.

Kolom

Nama Desa

Kecamatan

Nama Domain Desa



Maksimal 10 data ditampilkan per halaman. Apabila terdapat data berikutnya, sistem menyediakan tombol Selanjutnya untuk pagination.

8. Modul FAQ

8.1 Tampilan FAQ

Pertanyaan ditampilkan dalam bentuk daftar.

Jawaban tidak langsung ditampilkan pada halaman awal.

Pemilihan pertanyaan mengarahkan User ke halaman detail jawaban.

8.2 Halaman Jawaban FAQ

Menampilkan pertanyaan yang dipilih.

Menampilkan jawaban lengkap.

Menyediakan daftar/dropdown FAQ lain untuk navigasi pertanyaan berikutnya.

8.3 Tombol Pengajuan

Pada bagian bawah halaman FAQ tersedia tombol Ajukan SIDeKa-NG yang mengarahkan User ke proses pengajuan.

9. Modul Cek Status

Cek Status digunakan User untuk mengetahui perkembangan pengajuan yang telah dikirimkan. User mencari data menggunakan nama desa.

9.1 Tampilan Cek Status

Header/area halaman.

Kolom pencarian nama desa.

Area hasil berupa pop-up informasi.

Footer.

9.2 Hasil Pencarian

Status

Informasi yang Ditampilkan

Tindakan User

Diproses

Berkas sedang diproses.

Tidak ada tindakan lanjutan.

Revisi

Catatan revisi dan dokumen yang perlu diperbaiki.

Mengunggah ulang dokumen yang diminta.

Domain Berhasil

Nama domain, tanggal aktif, dan tanggal kadaluarsa.

Melihat informasi hasil pengajuan.



10. Alur User Secara Keseluruhan

Alur utama pengajuan dan pengecekan status User

                         USER                           │                           ▼                       BERANDA                           │                           ▼                 [Ajukan SIDeKa-NG]                           │                           ▼                POP-UP PERSYARATAN                ┌──────────────────┐                │ 4 Dokumen Wajib │                │ Template Kuasa  │                └────────┬─────────┘                         │                    [Selanjutnya]                         │                         ▼                  FORM PENGAJUAN                         │                  Upload 4 Dokumen                         │                         ▼                      [SUBMIT]                         │                         ▼              Berkas Berhasil Dikirim                         │                         ▼                    CEK STATUS                         │                    Nama Desa                         │              ┌──────────┼──────────┐              ▼          ▼          ▼          Diproses     Revisi   Domain Berhasil                         │          │                         ▼          ▼                   Upload Ulang  Data Domain



Selain alur pengajuan, User dapat mengakses Domain Terdaftar dan FAQ secara langsung melalui navigasi frontend.

11. Modul Admin

Modul Admin menggunakan alur baru yang berpusat pada dashboard, dua modul pengelolaan utama (Data Pengajuan dan Data Desa), penyimpanan terpusat pada database, serta pembaruan data yang kemudian tercermin pada Dashboard dan layanan User.

11.1 Login Admin

Admin wajib melakukan login. Setelah autentikasi berhasil, sistem mengarahkan Admin ke Dashboard.

11.2 Dashboard Admin

Dashboard menjadi halaman utama Admin dan menyajikan tiga kelompok informasi:

Grafik Data Desa/Domain: visualisasi perkembangan data desa dan domain yang telah tercatat.

Ringkasan Data Pengajuan: jumlah pengajuan berdasarkan status dan informasi ringkas aktivitas pengajuan.

Informasi Sistem: informasi operasional atau data pendukung yang relevan bagi Admin.

Dari Dashboard, Admin dapat masuk ke Data Pengajuan atau Data Desa.



Alur Admin yang digunakan pada dokumen ini

              ADMIN                │                ▼              LOGIN                │                ▼            DASHBOARD                │       ┌────────┼────────┐       │        │        │       ▼        ▼        ▼    Grafik   Ringkasan  Informasi Data Desa/    Data      Sistem   Domain    Pengajuan       │        │       └────────┼────────┘                │      ┌─────────┴─────────┐      │                   │      ▼                   ▼ DATA PENGAJUAN        DATA DESA      │                   │      ▼                   ▼ Pemeriksaan          CRUD Data Desa   Dokumen                │      │                   │      ▼                   │ Tentukan Status          │  ┌───┼──────────┐        │  ▼   ▼          ▼        │Diproses Revisi  Domain   │          │      Berhasil │          ▼         │     │       Catatan      ▼     │       Revisi    Data Domain          │         │          ▼         ├─ Nama Domain     User Upload    ├─ Tanggal Aktif     Ulang Dokumen  └─ Tanggal Kadaluarsa          │         │          └────┬────┘               ▼            DATABASE               │               ▼          DATA TERBARU               │        ┌──────┴──────┐        ▼             ▼    DASHBOARD        USER  Grafik Update    Cek Status





12. Pengelolaan Data Pengajuan oleh Admin

Data Pengajuan merupakan modul untuk memeriksa dokumen yang dikirim User dan menentukan status proses. Alurnya sebagai berikut:

1. Admin membuka Data Pengajuan dari Dashboard.

2. Admin memilih pengajuan yang akan diperiksa.

3. Admin memeriksa kelengkapan dan kesesuaian empat dokumen.

4. Admin menentukan salah satu status: Diproses, Revisi, atau Domain Berhasil.

12.1 Status Diproses

Status Diproses digunakan ketika pengajuan masih dalam tahap pemeriksaan atau tindak lanjut. Status disimpan ke database dan dapat dilihat User melalui Cek Status.

12.2 Status Revisi

Jika terdapat dokumen yang harus diperbaiki, Admin memilih status Revisi dan mengisi catatan revisi yang menjelaskan kekurangan atau dokumen yang perlu diperbarui. Data revisi tersimpan ke database. User melihat catatan tersebut melalui Cek Status dan dapat mengunggah ulang dokumen. Dokumen hasil upload ulang kembali tersedia bagi Admin untuk diperiksa.

12.3 Status Domain Berhasil

Jika pengajuan telah berhasil, Admin memilih status Domain Berhasil dan melengkapi Data Domain yang terdiri atas:

Nama Domain.

Tanggal Aktif.

Tanggal Kadaluarsa.

Informasi tersebut disimpan ke database dan menjadi data terbaru yang dapat ditampilkan pada Cek Status User serta dapat digunakan dalam ringkasan/grafik dashboard.

13. Pengelolaan Data Desa oleh Admin

Data Desa merupakan modul terpisah dari Data Pengajuan. Admin dapat melakukan CRUD (Create, Read, Update, Delete) terhadap data desa. Data yang diperbarui tersimpan ke database dan dapat memengaruhi grafik/ringkasan dashboard serta daftar domain terdaftar pada sisi User.

13.1 Data yang Dikelola

Nama desa.

Kecamatan.

Informasi administratif desa yang diperlukan sistem.

Informasi kepala desa/pemangku desa.

Informasi admin website desa.id.

Informasi domain, jika sudah tersedia.

13.2 Operasi Data

Operasi

Deskripsi

Create

Menambahkan data desa baru.

Read

Melihat detail data desa.

Update

Memperbarui data desa yang telah tersimpan.

Delete

Menghapus data desa sesuai kewenangan dan kebutuhan operasional.

Search

Mencari data desa untuk mempercepat pengelolaan.



14. Relasi Proses User, Admin, dan Database

USER                          ADMIN │                              │ │ Upload 4 Dokumen             │ Login ▼                              ▼ └──────────────► DATABASE ◄─ DASHBOARD                     │            │                     │     ┌──────┴──────┐                     │     ▼             ▼                     │ Data Pengajuan  Data Desa                     │     │             │                     │     ▼             ▼                     │ Periksa &       CRUD Data                     │ Tentukan Status   Desa                     │     │             │                     └─────┴──────┬──────┘                                  ▼                              DATA TERBARU                                  │                         ┌────────┴────────┐                         ▼                 ▼                    Dashboard          User Cek Status                    Grafik Update      Status/Domain/Revisi



Database menjadi titik konsolidasi seluruh perubahan. Setiap pembaruan status, catatan revisi, dokumen revisi, data desa, atau data domain menghasilkan data terbaru yang digunakan kembali oleh dashboard Admin dan layanan User.

15. Kebutuhan Fungsional User

ID

Fitur

Deskripsi

FR-U01

Beranda

User dapat mengakses beranda tanpa login.

FR-U02

Informasi Layanan

User dapat melihat informasi layanan pengajuan domain.

FR-U03

Pop-up Persyaratan

Sistem menampilkan empat dokumen persyaratan.

FR-U04

Template Surat Kuasa

User dapat mengakses template Surat Kuasa.

FR-U05

Form Pengajuan

User dapat mengakses form upload dokumen.

FR-U06

Upload Dokumen

User dapat mengunggah empat dokumen persyaratan.

FR-U07

Validasi Format

Sistem menerima PDF, DOC, dan DOCX.

FR-U08

Submit Pengajuan

User dapat mengirimkan dokumen pengajuan.

FR-U09

Konfirmasi Submit

Sistem menampilkan konfirmasi pengiriman berhasil.

FR-U10

Domain Terdaftar

User dapat melihat daftar domain desa yang terdaftar.

FR-U11

Pagination Domain

Sistem menampilkan maksimal 10 data per halaman dan menyediakan navigasi berikutnya.

FR-U12

FAQ

User dapat melihat daftar pertanyaan FAQ.

FR-U13

Detail FAQ

User dapat membuka halaman jawaban dari pertanyaan yang dipilih.

FR-U14

Ajukan dari FAQ

User dapat menuju proses pengajuan dari halaman FAQ.

FR-U15

Cek Status

User dapat mengecek status pengajuan.

FR-U16

Pencarian Desa

User dapat mencari pengajuan berdasarkan nama desa.

FR-U17

Status Diproses

Sistem menampilkan informasi bahwa berkas sedang diproses.

FR-U18

Status Revisi

Sistem menampilkan catatan revisi dan opsi upload ulang.

FR-U19

Upload Ulang

User dapat mengunggah kembali dokumen revisi.

FR-U20

Status Berhasil

Sistem menampilkan informasi keberhasilan pengajuan.

FR-U21

Informasi Domain

Sistem menampilkan nama domain, tanggal aktif, dan tanggal kadaluarsa jika tersedia.



16. Kebutuhan Fungsional Admin

ID

Fitur

Deskripsi

FR-A01

Login Admin

Admin dapat melakukan login ke area administrasi.

FR-A02

Dashboard

Admin dapat mengakses dashboard setelah login.

FR-A03

Grafik Data Desa/Domain

Dashboard menampilkan grafik data desa/domain berdasarkan data terbaru.

FR-A04

Ringkasan Pengajuan

Dashboard menampilkan ringkasan data pengajuan.

FR-A05

Informasi Sistem

Dashboard menampilkan informasi sistem yang relevan.

FR-A06

Data Pengajuan

Admin dapat membuka dan melihat daftar pengajuan.

FR-A07

Pemeriksaan Dokumen

Admin dapat membuka serta memeriksa dokumen pengajuan.

FR-A08

Status Diproses

Admin dapat menetapkan status Diproses.

FR-A09

Status Revisi

Admin dapat menetapkan status Revisi.

FR-A10

Catatan Revisi

Admin dapat memberikan catatan revisi.

FR-A11

Dokumen Revisi

Admin dapat melihat dokumen yang diunggah ulang oleh User.

FR-A12

Status Domain Berhasil

Admin dapat menetapkan status Domain Berhasil.

FR-A13

Data Domain

Admin dapat mengisi nama domain, tanggal aktif, dan tanggal kadaluarsa.

FR-A14

Data Desa

Admin dapat mengakses modul Data Desa.

FR-A15

CRUD Data Desa

Admin dapat membuat, melihat, memperbarui, dan menghapus data desa.

FR-A16

Search Data Desa

Admin dapat mencari data desa.

FR-A17

Penyimpanan Database

Perubahan Admin disimpan ke database.

FR-A18

Data Terbaru

Sistem menggunakan data terbaru untuk memperbarui dashboard dan layanan User.

FR-A19

Sinkronisasi Cek Status

Status, catatan revisi, dan informasi domain terbaru dapat dilihat User melalui Cek Status.



17. Business Rules

ID

Aturan Bisnis

BR-01

User tidak perlu melakukan login.

BR-02

User hanya mengunggah empat dokumen persyaratan pada pengajuan awal.

BR-03

User tidak mengisi data administratif desa pada form pengajuan.

BR-04

Informasi administratif dikelola oleh Admin berdasarkan dokumen yang diterima.

BR-05

Setiap desa hanya memiliki satu pengajuan aktif/utama dalam konteks fasilitasi domain.

BR-06

Nama desa digunakan sebagai dasar pencarian pada fitur Cek Status.

BR-07

Status pengajuan terdiri atas Diproses, Revisi, dan Domain Berhasil.

BR-08

Status Revisi harus dapat disertai catatan revisi dari Admin.

BR-09

Status Revisi memungkinkan User mengunggah ulang dokumen.

BR-10

Status Domain Berhasil harus dapat menyimpan nama domain, tanggal aktif, dan tanggal kadaluarsa.

BR-11

Admin wajib login sebelum mengakses dashboard dan fungsi pengelolaan.

BR-12

Data Desa dikelola melalui operasi CRUD oleh Admin.

BR-13

Setiap perubahan data penting disimpan ke database sebagai sumber data terbaru.

BR-14

Dashboard menggunakan data terbaru untuk memperbarui grafik dan ringkasan.

BR-15

Cek Status User menggunakan data terbaru hasil pengelolaan Admin.

BR-16

Sistem tidak berfungsi sebagai penyedia hosting atau pengelola domain secara teknis.



18. Kebutuhan Data

18.1 Data Pengajuan

ID pengajuan.

Identitas/nama desa yang terkait.

Status pengajuan.

Catatan revisi.

Waktu pengajuan dan waktu pembaruan.

Empat dokumen persyaratan.

Dokumen revisi, jika ada.

18.2 Data Dokumen

Surat Permohonan Fasilitasi Domain desa.id.

SK Pengangkatan Kepala Desa.

Surat Kuasa.

Surat Penunjukan Admin Website desa.id.

Versi dokumen hasil upload ulang/revisi.

18.3 Data Desa

Nama desa.

Kecamatan.

Informasi administratif desa.

Informasi kepala desa/pemangku desa.

Informasi admin website.

18.4 Data Domain

Nama domain desa.

Tanggal aktif.

Tanggal kadaluarsa.

19. Kebutuhan Non-Fungsional

ID

Kebutuhan

Deskripsi

NFR-01

Framework

Sistem menggunakan Laravel.

NFR-02

Backend

Sistem menggunakan PHP.

NFR-03

Frontend

Sistem menggunakan HTML, CSS, dan JavaScript.

NFR-04

Database

Sistem menggunakan MySQL.

NFR-05

Authentication

Dashboard Admin dilindungi autentikasi.

NFR-06

File Upload

Sistem menerima PDF, DOC, dan DOCX.

NFR-07

Data Integrity

Data pengajuan, dokumen, desa, status, revisi, dan domain disimpan terstruktur.

NFR-08

Usability

Proses User dibuat sederhana tanpa input data administratif.

NFR-09

Maintainability

Struktur aplikasi mengikuti pola MVC Laravel agar mudah dipelihara.

NFR-10

Security

Fungsi pengelolaan hanya dapat diakses Admin yang terautentikasi.

NFR-11

Consistency

Perubahan data pada Admin harus tercermin secara konsisten pada dashboard dan fitur User.

NFR-12

Traceability

Data pengajuan dan revisi sebaiknya menyimpan waktu pembaruan untuk mendukung penelusuran proses.



20. Teknologi dan Arsitektur Sistem

Lapisan

Teknologi / Komponen

Frontend

HTML, CSS, JavaScript

Backend

PHP, Laravel

Database

MySQL

Pola Arsitektur

MVC (Model–View–Controller)



Arsitektur aplikasi berbasis MVC

             USER / ADMIN                  │                  ▼                VIEW          HTML / CSS / JS                  │                  ▼             CONTROLLER               Laravel                  │                  ▼                MODEL               Laravel                  │                  ▼                MySQL                  │        ┌─────────┼─────────┐        ▼         ▼         ▼   Pengajuan   Data Desa  Data Domain   & Dokumen   & Admin    & Status



21. Batasan Sistem

1. User tidak perlu login.

2. User hanya mengunggah empat dokumen pada pengajuan awal.

3. User tidak mengisi data administratif desa melalui form pengajuan.

4. Data administratif dikelola oleh Admin.

5. Pencarian status menggunakan nama desa.

6. Status pengajuan dibatasi pada Diproses, Revisi, dan Domain Berhasil.

7. Upload ulang dokumen hanya tersedia pada proses Revisi.

8. Informasi domain ditampilkan apabila datanya telah tersedia.

9. Data Desa dikelola melalui fungsi CRUD oleh Admin.

10. Dashboard menampilkan data yang bersumber dari database terbaru.

11. Sistem tidak menyediakan hosting dan tidak mengelola domain secara teknis.

22. Ringkasan Vision Sistem

                         SIDeKa-NG                            │              ┌─────────────┴─────────────┐              ▼                           ▼            USER                         ADMIN              │                           │      Informasi / Pengajuan             LOGIN              │                           │      Upload 4 Dokumen                    ▼              │                        DASHBOARD              ▼                    ┌──────┼──────┐          DATABASE                Grafik Ringkasan Info              ▲                    │              │             ┌──────┴──────┐              │             ▼             ▼              │       Data Pengajuan   Data Desa              │             │             │              │      Periksa Dokumen    CRUD              │             │             │              │      Tentukan Status      │              │      ┌──────┼──────┐      │              │      ▼      ▼      ▼      │              │   Diproses Revisi Berhasil│              │             │      │      │              │          Catatan  Data Domain              │          + Upload  Nama/Tgl Aktif/              │           Ulang    Kadaluarsa              │             │      │              └─────────────┴──────┴──────┘                            │                       DATA TERBARU                            │                 ┌──────────┴──────────┐                 ▼                     ▼           Dashboard Update        User Cek Status



23. Kesimpulan

Sistem SIDeKa-NG berfokus pada dua proses utama: pengajuan dokumen oleh User dan pengelolaan data oleh Admin. User memperoleh alur yang sederhana karena tidak perlu login dan tidak perlu mengisi data administratif; User cukup membaca persyaratan, mengunggah empat dokumen, lalu mengecek status pengajuan.

Pada sisi Admin, proses dimulai dari Login menuju Dashboard. Dashboard menampilkan Grafik Data Desa/Domain, Ringkasan Data Pengajuan, dan Informasi Sistem. Admin kemudian bekerja melalui dua modul utama, yaitu Data Pengajuan dan Data Desa.

Pada Data Pengajuan, Admin memeriksa dokumen dan menetapkan status Diproses, Revisi, atau Domain Berhasil. Status Revisi disertai catatan dan memungkinkan User mengunggah ulang dokumen. Status Domain Berhasil dilengkapi Data Domain berupa nama domain, tanggal aktif, dan tanggal kadaluarsa. Pada Data Desa, Admin melakukan CRUD terhadap data desa.

Seluruh perubahan disimpan ke database sebagai data terbaru. Data tersebut selanjutnya digunakan untuk memperbarui grafik/ringkasan Dashboard dan ditampilkan kembali kepada User melalui fitur Cek Status. Dengan struktur ini, alur sistem menjadi konsisten: input User → pengelolaan Admin → database → data terbaru → Dashboard dan User.

## Struktur Folder dan File

`
sideka-ng/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/
│   │   │   │   ├── AdminDesaController.php
│   │   │   │   ├── AdminPengajuanController.php
│   │   │   │   ├── Auth/
│   │   │   │   │   └── LoginController.php
│   │   │   │   └── DashboardController.php
│   │   │   ├── Controller.php
│   │   │   └── User/
│   │   │       ├── BerandaController.php
│   │   │       ├── CekStatusController.php
│   │   │       ├── DomainTerdaftarController.php
│   │   │       ├── FaqController.php
│   │   │       └── PengajuanController.php
│   │   └── Middleware/
│   │       └── AdminAuthenticate.php
│   ├── Models/
│   │   ├── Desa.php
│   │   ├── Dokumen.php
│   │   ├── Domain.php
│   │   ├── Faq.php
│   │   ├── Pengajuan.php
│   │   └── User.php
│   └── Providers/
│       └── AppServiceProvider.php
├── config/
│   ├── app.php
│   ├── database.php
│   └── filesystems.php
├── database/
│   ├── factories/
│   │   ├── DesaFactory.php
│   │   ├── DomainFactory.php
│   │   └── PengajuanFactory.php
│   ├── migrations/
│   │   ├── 2026_08_17_000001_create_users_table.php
│   │   ├── 2026_08_17_000002_create_desas_table.php
│   │   ├── 2026_08_17_000003_create_pengajuans_table.php
│   │   ├── 2026_08_17_000004_create_dokumens_table.php
│   │   ├── 2026_08_17_000005_create_domains_table.php
│   │   └── 2026_08_17_000006_create_faqs_table.php
│   └── seeders/
│       ├── DatabaseSeeder.php
│       ├── DesaSeeder.php
│       ├── FaqSeeder.php
│       └── UserSeeder.php
├── doc/
│   └── vrd pdsideka-ng.docx
├── public/
│   ├── css/
│   │   ├── admin.css
│   │   ├── style.css
│   │   └── user.css
│   ├── favicon.ico
│   ├── index.php
│   ├── js/
│   │   ├── admin.js
│   │   ├── main.js
│   │   └── user.js
│   └── templates/
│       └── template-surat-kuasa.docx
├── resources/
│   ├── css/
│   │   └── app.css
│   ├── js/
│   │   └── app.js
│   └── views/
│       ├── admin/
│       │   ├── auth/
│       │   │   └── login.blade.php
│       │   ├── dashboard.blade.php
│       │   ├── desa/
│       │   │   ├── create.blade.php
│       │   │   ├── edit.blade.php
│       │   │   ├── index.blade.php
│       │   │   └── show.blade.php
│       │   └── pengajuan/
│       │       ├── index.blade.php
│       │       └── show.blade.php
│       ├── components/
│       │   ├── footer.blade.php
│       │   ├── modal-persyaratan.blade.php
│       │   └── navbar.blade.php
│       ├── layouts/
│       │   ├── admin.blade.php
│       │   ├── app.blade.php
│       │   └── auth.blade.php
│       └── user/
│           ├── beranda.blade.php
│           ├── cek-status.blade.php
│           ├── domain-terdaftar.blade.php
│           └── faq/
│               ├── index.blade.php
│               └── show.blade.php
├── routes/
│   ├── admin.php
│   ├── api.php
│   └── web.php
├── storage/
│   ├── app/
│   │   └── public/
│   │       └── dokumen/
│   ├── framework/
│   │   ├── cache/
│   │   ├── sessions/
│   │   └── views/
│   └── logs/
├── artisan
├── composer.json
├── package.json
└── VRD.md
`