@extends('layouts.main')

@section('container')

    <h1>Pedoman Pengguna</h1>
    <p>
        A.	Pencarian
1.	Hasil pencarian akan menampilkan Penawaran dan Halaman yang relevan dengan kata kunci dari pencarian Anda.

B.	Filter Pencarian
1.	Anda dapat menentukan Filter Pencarian untuk membuat hasil pencarian menjadi lebih spesifik.
2.	Variabel filter pencarian yang dapat anda tentukan.
a.	Urutan hasil pecarian (harus)
b.	Harga Terendah (opsional)
c.	Harga Tertinggi (opsional)
d.	Jenis Promo (opsional)
e.	Satuan Promo (opsional)
f.	Nilai Terendah Promo (opsional)
g.	Nilai Tertinggi Promo (opsional)
h.	Waktu Mulai Berlakunya Penawaran (opsional)
i.	Waktu Terakhir Berlakunya Penawaran (opsional)
j.	Keyword dari Penawaran (opsional)
k.	Platform Terkait Penawaran (opsional)
l.	Lokasi Terkait Penawaran (opsional)
3.	Jika variabel filter pencarian sudah ditentukan, pilih Done.

C.	Detail Penawaran
1.	Pilih Suatu Penawaran untuk melihat Detail Penawaran.

D.	Perbandingan Penawaran
1.	Pilih Penawaran.
2.	Pilih opsi Bandingkan.
3.	Penawaran tersebut akan otomatis menjadi Penawaran 1 yang akan dibandingkan.
4.	Pilih Penawaran 2 yang akan dibandingkan.
5.	Jika anda ingin me-reset Penawaran 1 dan/atau Penawaran 2, pilih opsi Reset.
6.	Jika Penawaran 1 dan Penawaran 2 sudah ditentukan, pilih opsi Mulai Bandingkan.
7.	Hasil perbandingan Penawaran 1 dan Penawaran 2 akan ditampilkan.

E.	Detail Halaman
1.	Pilih Suatu Halaman untuk melihat Detail Halaman.

F.	Unfollow Halaman (melalui Detail Halaman)
1.	Log-In ke akun Vilomina Anda. Jika Anda tidak memiliki akun Vilomina, Anda dapat membuatnya di sini.
2.	Buka bagian Detail Halaman dari Suatu Halaman.
3.	Pilih opsi untuk Unfollow dari Halaman tersebut.
4.	Notifikasi akan muncul untuk mengonfirmasi unfollow Halaman.
5.	Jika unfollow dikonfirmasi, pilih Ya.

G.	Log-In
1.	Anda harus memiliki akun Vilomina. Jika Anda tidak memiliki akun Vilomina, Anda dapat membuatnya di sini.
2.	Masukkan email akun Vilomina Anda.
3.	Masukkan password akun Vilomina Anda.
4.	Jika email dan password yang dimasukkan sudah benar, pilih Login.
5.	Jika muncul notifikasi yang menyatakan bahwa email dan/atau password yang dimasukkan salah, mohon periksa kembali dan perbaiki email dan/atau password yang dimasukkan.
6.	Jika muncul notifikasi yang menyatakan bahwa username/email yang dimasukkan tidak terdaftar, silahkan buat akun Vilomina di sini.
7.	Jika Anda lupa kata sandi akun Vilomina Anda, pilih opsi Reset Password. Ikuti prosedur reset password dari Vilomina.

H.	Buat Akun
1.	Buka bagian Akun, anda akan diarahkan ke bagian Buat Akun.
2.	Lengkapi informasi tentang akun anda.
a.	Foto profil (opsional)
b.	Nama (harus)
c.	Tanggal lahir (harus)
d.	Email (harus)
e.	Masukkan password untuk akun anda (harus)
f.	Masukkan kembali password untuk akun anda (harus)
3.	Password dan password konfirmasi harus sama.
4.	Jika muncul notifikasi yang menyatakan informasi yang dimasukkan tidak sesuai, mohon periksa kembali informasi yang dimasukkan.
5.	Jika informasi yang dimasukkan sudah benar, pilih Buat Akun.

I.	Reset Password
1.	Masukkan email akun Vilomina Anda.
2.	Link untuk reset password akan dikirim ke email Anda. Klik link terebut, maka Anda akan diarahkan ke bagian untuk mengatur password baru Anda.
3.	Masukkan password untuk akun anda
4.	Masukkan kembali password untuk akun anda
5.	Password dan password konfirmasi harus sama.
6.	Jika muncul notifikasi yang menyatakan password yang dimasukkan tidak sesuai, mohon periksa kembali password yang dimasukkan.
7.	Jika password baru yang dimasukkan sudah benar, pilih Simpan.

J.	Edit Profil
1.	Log-In ke akun Vilomina Anda. Jika Anda tidak memiliki akun Vilomina, Anda dapat membuatnya di sini.
2.	Buka bagian Akun.
3.	Buka bagian Profil.
4.	Anda dapat melakukan penyesuaian pada profil Anda.
a.	Foto profil (opsional)
b.	Nama (harus)
c.	Tanggal lahir (harus)
d.	Email (harus)
5.	Jika muncul notifikasi yang menyatakan bahwa informasi yang dimasukkan tidak sesuai, harap periksa kembali informasi yang dimasukkan.
6.	Jika informasi yang dimasukkan sudah benar, pilih Simpan.

K.	Buat Halaman
1.	Log-In ke akun Vilomina Anda. Jika Anda tidak memiliki akun Vilomina, Anda dapat membuatnya di sini.
2.	Buka bagian Akun.
3.	Pilih opsi Buat Halaman. Satu akun hanya dapat memiliki satu Halaman.
4.	Lengkapi informasi tentang Halaman Anda.
a.	Foto Profil Halaman (opsional)
b.	Nama Halaman (harus)
c.	Deskripsi (opsional)
d.	Negara (opsional)
e.	Provinsi (opsional)
f.	Kota/Kabupaten (opsional)
g.	Alamat (opsional)
5.	If a notification appears stating the added information does not comply with Vilomina's requirements, please check again and make corrections to the added information.
6.	If the information added is correct, select Save.
7.	Jika muncul notifikasi yang menyatakan bahwa informasi yang dimasukkan tidak sesuai, harap periksa kembali informasi yang dimasukkan.
8.	Jika informasi yang dimasukkan sudah benar, pilih Simpan.

L.	Edit Informasi Halaman
1.	Log-In ke akun Vilomina Anda. Jika Anda tidak memiliki akun Vilomina, Anda dapat membuatnya di sini.
2.	Buka bagian Akun.
3.	Pilih opsi Manajemen Halaman. Satu akun hanya dapat memiliki satu Halaman.
4.	Di bagian Informasi Halaman, Anda dapat melakukan penyesuaian pada informasi tersebut.
a.	Foto Profil Halaman (opsional)
b.	Nama Halaman (harus)
c.	Deskripsi (opsional)
d.	Negara (opsional)
e.	Provinsi (opsional)
f.	Kota/Kabupaten (opsional)
g.	Alamat (opsional)
5.	Jika muncul notifikasi yang menyatakan bahwa informasi yang dimasukkan tidak sesuai, harap periksa kembali informasi yang dimasukkan.
6.	Jika informasi yang dimasukkan sudah benar, pilih Simpan.

M.	Tambahkan Penawaran ke Halaman
1.	Log-In ke akun Vilomina Anda. Jika Anda tidak memiliki akun Vilomina, Anda dapat membuatnya di sini.
2.	Buka bagian Akun.
3.	Pilih opsi Manajemen Halaman. Satu akun hanya dapat memiliki satu Halaman.
4.	Buka bagian Manajemen Penawaran.
5.	Pilih Tambah Penawaran.
6.	Lengkapi informasi penawaran yang akan Anda tambahkan.
a.	Gambar dari Penawaran (opsional)
b.	Judul dari Penawaran (harus)
c.	Deskripsi dari Penawaran (opsional)
d.	Harga Asli (opsional)
e.	Harga Promosi (opsional)
f.	Jenis Promo (opsional)
g.	Satuan Promo (opsional)
h.	Nilai Promo (opsional)
i.	Waktu Mulai Berlakunya Penawaran (opsional)
j.	Waktu Terakhir Berlakunya Penawaran (opsional)
k.	Keyword dari Penawaran (opsional)
l.	Link Terkait Penawaran (opsional)
m.	Lokasi Terkait Penawaran (opsional)
n.	Syarat dan Ketentuan dari Penawaran (opsional)
7.	Jika muncul notifikasi yang menyatakan bahwa informasi yang dimasukkan tidak sesuai, harap periksa kembali informasi yang dimasukkan.
8.	Jika informasi yang dimasukkan sudah benar, pilih Simpan.

N.	Edit Deal on the Page
1.	Log-In ke akun Vilomina Anda. Jika Anda tidak memiliki akun Vilomina, Anda dapat membuatnya di sini.
2.	Buka bagian Akun.
3.	Pilih opsi Manajemen Halaman. Satu akun hanya dapat memiliki satu Halaman.
4.	Buka bagian Manajemen Penawaran.
5.	Pilih Penawaran yang ingin Anda sesuaikan.
6.	Di bagian Manajemen Penawaran, Anda dapat melakukan penyesuaian pada informasi penawaran.
a.	Gambar dari Penawaran (opsional)
b.	Judul dari Penawaran (harus)
c.	Deskripsi dari Penawaran (opsional)
d.	Harga Asli (opsional)
e.	Harga Promosi (opsional)
f.	Jenis Promo (opsional)
g.	Satuan Promo (opsional)
h.	Nilai Promo (opsional)
i.	Waktu Mulai Berlakunya Penawaran (opsional)
j.	Waktu Terakhir Berlakunya Penawaran (opsional)
k.	Keyword dari Penawaran (opsional)
l.	Link Terkait Penawaran (opsional)
m.	Lokasi Terkait Penawaran (opsional)
n.	Syarat dan Ketentuan dari Penawaran (opsional)
7.	Jika muncul notifikasi yang menyatakan bahwa informasi yang dimasukkan tidak sesuai, harap periksa kembali informasi yang dimasukkan.
8.	Jika informasi yang dimasukkan sudah benar, pilih Simpan.

O.	Hapus Penawaran dari Halaman
1.	Log-In ke akun Vilomina Anda. Jika Anda tidak memiliki akun Vilomina, Anda dapat membuatnya di sini.
2.	Buka bagian Akun.
3.	Pilih opsi Manajemen Halaman. Satu akun hanya dapat memiliki satu Halaman.
4.	Buka bagian Manajemen Penawaran.
5.	Pilih penawaran yang ingin Anda hapus.
6.	Notifikasi akan muncul untuk mengonfirmasi penghapusan penawaran.
7.	Jika penghapusan dikonfirmasi, pilih Ya.

P.	Hapus Penawaran yang di-Bookmark
1.	Log-In ke akun Vilomina Anda. Jika Anda tidak memiliki akun Vilomina, Anda dapat membuatnya di sini.
2.	Buka bagian Akun.
3.	Buka bagian Bookmark.
4.	Pilih penawaran yang ingin Anda hapus.
5.	Notifikasi akan muncul untuk mengonfirmasi penghapusan penawaran.
6.	Jika penghapusan dikonfirmasi, pilih Ya.

Q.	Unfollow Halaman (melalui Akun)
1.	Log-In ke akun Vilomina Anda. Jika Anda tidak memiliki akun Vilomina, Anda dapat membuatnya di sini.
2.	Buka bagian Akun.
3.	Buka bagian Following.
4.	Pilih Halaman yang ingin Anda unfollow.
5.	Notifikasi akan muncul untuk mengonfirmasi unfollow Halaman.
6.	Jika unfollow dikonfirmasi, pilih Ya.

R.	Notifikasi
1.	Log-In ke akun Vilomina Anda. Jika Anda tidak memiliki akun Vilomina, Anda dapat membuatnya di sini.
2.	Buka bagian Akun.
3.	Buka bagian Notifikasi.
4.	Anda dapat melihat semua notifikasi yang terkait dengan Akun anda disini. 

S.	Ganti Password
1.	Log-In ke akun Vilomina Anda. Jika Anda tidak memiliki akun Vilomina, Anda dapat membuatnya di sini.
2.	Buka bagian Akun.
3.	Buka bagian Ganti Password.
4.	Masukkan password akun Vilomina Anda saat ini.
5.	Jika password saat ini yang dimasukkan sudah benar, pilih Berikutnya.
6.	Jika muncul notifikasi yang menyatakan password saat yang dimasukkan tidak sesuai, mohon periksa kembali password yang dimasukkan.
7.	Masukkan password untuk akun anda
8.	Masukkan kembali password untuk akun anda
9.	Password dan password konfirmasi harus sama.
10.	Jika muncul notifikasi yang menyatakan password yang dimasukkan tidak sesuai, mohon periksa kembali password yang dimasukkan.
11.	Jika password baru yang dimasukkan sudah benar, pilih Simpan.

T.	Pedoman
1.	Menuju bagian Footer.
2.	Pilih bagian Pedoman Pengguna.
3.	Anda dapat melihat semua pedoman yang terkait dengan penggunaan platform Vilomina di sini. 

U.	Syarat dan Ketentuan
1.	Menuju bagian Footer.
2.	Pilih bagian Syarat dan Ketentuan.
3.	Anda dapat melihat semua Syarat dan Ketentuan yang terkait dengan penggunaan platform Vilomina di sini.

V.	Log-out
1.	Log-In ke akun Vilomina Anda. Jika Anda tidak memiliki akun Vilomina, Anda dapat membuatnya di sini.
2.	Buka bagian Akun.
3.	Pilih opsi Log-out.
4.	Notifikasi akan muncul untuk mengonfirmasi Log-out.
5.	Jika Log-out dikonfirmasi, pilih Ya.

    </p>

@endsection