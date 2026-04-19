# 📰 Blog Dinamis (PHP & MySQL)

---

## 📖 Description
Website ini merupakan **Blog Dinamis berbasis PHP dan MySQL** yang memiliki 3 level pengguna yaitu:

- **Admin**
- **Author**
- **User**

Setiap pengguna memiliki hak akses berbeda untuk mengelola sistem blog secara efisien.

---

## 🚀 Features

- 🔐 Login & Register (User, Author, Admin)
- 👨‍💼 Multi Role (Admin, Author, User)
- 📝 CRUD Artikel (Tambah, Edit, Hapus)
- 💬 Sistem Komentar
- 📊 Dashboard Admin & Author
- 🖼 Upload Gambar Artikel
- 🔎 User dapat melihat artikel tanpa login

---

## 👥 User Roles

### 👑 Admin
- Mengelola semua data (artikel, user, author, komentar)
- Melihat semua komentar dari user
- Menghapus komentar

### ✍️ Author
- Membuat artikel
- Mengedit & menghapus artikel sendiri
- Tidak bisa mengakses artikel author lain

### 👤 User
- Melihat artikel tanpa login
- Harus login untuk komentar
- Bisa memberikan komentar pada artikel

---

## 📂 Project Structure

blog/
- index.php → Halaman utama (user/public)
- login.php → Login user
- daftar.php → Register user
-logout.php → Logout
- upload/ → Folder gambar artikel

- admin/
- dashboard.php → Dashboard admin
- artikel.php → Kelola artikel
- komentar.php → Kelola komentar
- user.php → Kelola user

- author/
- dashboard.php → Dashboard author
- artikel.php → Artikel milik author

- koneksi.php → Koneksi database

## ⚙️ Installation
https://github.com/ajijahsidqia9090-cell/Blog-Dinamis.git


---

## 👨‍💻 Author

- Nama: Khajizatu Sidqiyah
- Kelas : Informatika - B

---

## 📌 Notes

Project ini dibuat untuk keperluan pembelajaran dan tugas akademik.
