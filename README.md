# Sistem Pendukung Keputusan Pemilihan Varietas Bibit Padi Unggul

Sistem ini dikembangkan sebagai solusi untuk membantu BPP Cibeureum, Kota Tasikmalaya, dalam menentukan varietas bibit padi unggul menggunakan metode **TOPSIS** (Technique for Order of Preference by Similarity to Ideal Solution). Sistem ini dirancang untuk mempermudah pengambilan keputusan berdasarkan berbagai kriteria yang telah ditentukan, sehingga menghasilkan rekomendasi bibit padi terbaik yang cocok untuk ditanam di wilayah tersebut.

## Fitur

- Input data kriteria
- Input data alternatif
- Import file Excel
- Menghitung bobot untuk masing-masing kriteria.
- Menggunakan metode **TOPSIS** untuk pemrosesan data dan penentuan keputusan.
- Menampilkan hasil rekomendasi varietas bibit padi unggul.
- Export Laporan pdf

## Metode yang Digunakan

Metode **TOPSIS** adalah salah satu metode pengambilan keputusan multikriteria yang menggunakan konsep perhitungan jarak antara alternatif dengan solusi ideal positif dan solusi ideal negatif. Alternatif yang terpilih adalah yang memiliki jarak terdekat dengan solusi ideal positif dan terjauh dari solusi ideal negatif.

### Langkah-langkah TOPSIS:

1. Normalisasi matriks keputusan.
2. Menghitung matriks keputusan yang terbobot.
3. Menentukan solusi ideal positif (A+) dan solusi ideal negatif (A-).
4. Menghitung jarak setiap alternatif terhadap solusi ideal positif dan negatif.
5. Menghitung nilai preferensi untuk setiap alternatif.
6. Mengurutkan alternatif berdasarkan nilai preferensi.

## Studi Kasus

Studi kasus yang digunakan dalam pengembangan sistem ini adalah **BPP Cibeureum, Kota Tasikmalaya**. Sistem ini dirancang untuk membantu mereka memilih varietas bibit padi unggul yang sesuai dengan kriteria yang telah ditentukan.


## Teknologi yang Digunakan

- **PHP**: Bahasa pemrograman untuk membangun backend sistem.
- **MySQL**: Basis data untuk menyimpan informasi varietas bibit dan kriteria.
- **HTML/CSS/JavaScript**: Untuk tampilan antarmuka pengguna.
- **Bootstrap**: Framework untuk mempermudah pembuatan antarmuka yang responsif.

