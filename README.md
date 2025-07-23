# 🎭 Sistem Peminjaman Kostum Cosplay

Manajemen Peminjaman Baju Cosplay dengan Menggunakan Laravel 12 + Filament 3 di SigmaRentCos
Di sebuah kota besar di daerah Jakarta Barat, terdapat sebuah toko rental costume bernama "SigmaRentCos", yang menyewakan berbagai macam baju cosplay untuk acara-acara seperti anime convention, event jejepangan, pesta ulang tahun bertema, hingga kebutuhan konten kreator.
Namun, seiring bertambahnya pelanggan dan stok kostum, proses pencatatan manual seperti menggunakan buku atau Excel menjadi tidak efisien. Pemilik studio sering mengalami kesulitan dalam:
### 1. Melacak ketersediaan kostum.
### 2. Mencatat denda keterlambatan.
###	3. Mengelola data pelanggan.
###	4. Mengetahui siapa yang sedang menyewa apa dan kapan jatuh tempo pengembaliannya.


---

## 📌 Fitur Utama

- Manajemen Data Pelanggan (Costumer)
- Manajemen Kostum
- Peminjaman Kostum
- Pembayaran Peminjaman
- Denda Keterlambatan
- Dashboard Admin dengan Filament
- Validasi dan autentikasi data

---

## 🧱 Struktur Tabel Database

### 1. `costumers`
| Kolom         | Tipe Data     |
|---------------|---------------|
| id            | bigint        |
| nama          | string        |
| email         | string (unique) |
| no_hp         | string        |
| alamat        | text          |
| created_at    | timestamp     |
| updated_at    | timestamp     |

### 2. `kostums`
| Kolom         | Tipe Data     |
|---------------|---------------|
| id            | bigint        |
| nama          | string        |
| ukuran        | string        |
| kategori      | string        |
| stok          | integer       |
| harga_sewa    | decimal(10,2) |
| deskripsi     | text          |
| created_at    | timestamp     |
| updated_at    | timestamp     |

### 3. `rentals`
| Kolom           | Tipe Data     |
|------------------|---------------|
| id               | bigint        |
| costumer_id      | foreign key to `costumers` |
| kostum_id        | foreign key to `kostums`   |
| tanggal_pinjam   | date          |
| tanggal_kembali  | date (nullable) |
| total_biaya      | decimal(10,2) |
| status           | enum: dipinjam/kembali |
| created_at       | timestamp     |
| updated_at       | timestamp     |

### 4. `pembayarans`
| Kolom           | Tipe Data     |
|------------------|---------------|
| id               | bigint        |
| rental_id        | foreign key to `rentals` |
| metode_pembayaran| string        |
| jumlah_bayar     | decimal(10,2) |
| tanggal_bayar    | date          |
| created_at       | timestamp     |
| updated_at       | timestamp     |

### 5. `dendas`
| Kolom         | Tipe Data     |
|---------------|---------------|
| id            | bigint        |
| rental_id     | foreign key to `rentals` |
| jumlah_denda  | decimal(10,2) |
| alasan        | string        |
| created_at    | timestamp     |
| updated_at    | timestamp     |

---

## 🔗 Relasi Antar Model

- `Costumer` memiliki banyak `Rental`
- `Kostum` memiliki banyak `Rental`
- `Rental` memiliki satu `Costumer`, satu `Kostum`, satu `Pembayaran`, dan bisa memiliki satu `Denda`

---



