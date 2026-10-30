<?php

namespace Database\Seeders;

use App\Models\About;
use App\Models\Agent;
use App\Models\Faq;
use App\Models\FotoDenah;
use App\Models\FotoProperti;
use App\Models\Mitra;
use App\Models\Properti;
use App\Models\Tiket;
use App\Models\Ulasan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

/**
 * Data demo katalog properti di Kota Bengkulu. Semua nama, email, dan nomor HP fiktif.
 *
 * Seeder ini mengosongkan tabel katalog dulu (tabel users tidak disentuh), lalu menyalin
 * foto dari template public/theme_property (CC BY 3.0) serta denah dan logo mitra dari
 * database/seeders/demo ke public/images dengan awalan "demo-".
 */
class DemoSeeder extends Seeder
{
    private const FOTO_TEMPLATE = 'theme_property/images/';

    public function run(): void
    {
        foreach ([Properti::class, FotoProperti::class, FotoDenah::class, Ulasan::class, Tiket::class, Agent::class, Mitra::class, Faq::class, About::class] as $model) {
            $model::truncate();
        }

        $this->agen();
        $this->mitra();
        $this->properti();
        $this->tiket();
        $this->faq();
        $this->about();
    }

    private function agen(): void
    {
        $agen = [
            ['Dimas Prasetyo', 'dimas.prasetyo@example.com', '0812-0000-1101', 'person_1-min.jpg'],
            ['Nadia Putri Lestari', 'nadia.putri@example.com', '0813-0000-2202', 'person_4-min.jpg'],
            ['Reza Firmansyah', 'reza.firmansyah@example.com', '0821-0000-3303', 'person_2-min.jpg'],
            ['Sari Wulandari', 'sari.wulandari@example.com', '0852-0000-4404', 'person_5-min.jpg'],
        ];

        foreach ($agen as [$nama, $email, $nohp, $foto]) {
            Agent::create([
                'nama_agent' => $nama,
                'email' => $email,
                'nohp' => $nohp,
                // View agen membaca foto dari folder images/mitra
                'foto' => $this->salin(public_path(self::FOTO_TEMPLATE.$foto), 'mitra'),
            ]);
        }
    }

    private function mitra(): void
    {
        $mitra = [
            'BPR Dana Griya' => 'mitra-dana-griya.svg',
            'Koperasi Sejahtera Bersama' => 'mitra-koperasi-sejahtera.svg',
            'CV Karya Bangun Persada' => 'mitra-karya-bangun.svg',
            'Kantor Notaris Rafflesia' => 'mitra-notaris-rafflesia.svg',
        ];

        foreach ($mitra as $nama => $logo) {
            Mitra::create([
                'nama_mitra' => $nama,
                'foto' => $this->salin(database_path('seeders/demo/'.$logo), 'mitra'),
            ]);
        }
    }

    private function properti(): void
    {
        foreach ($this->dataProperti() as $i => $item) {
            $dibuat = now()->subDays(150 - $i * 15);

            $properti = Properti::create($item['data'] + [
                'terjual' => '0',
                'created_at' => $dibuat,
                'updated_at' => $dibuat,
            ]);

            foreach ($item['foto'] as $foto) {
                FotoProperti::create([
                    'properti_id' => $properti->id,
                    'foto' => $this->salin(public_path(self::FOTO_TEMPLATE.$foto), 'foto_properti'),
                ]);
            }

            if ($item['denah']) {
                FotoDenah::create([
                    'properti_id' => $properti->id,
                    'foto' => $this->salin(database_path('seeders/demo/'.$item['denah']), 'foto_denah'),
                ]);
            }

            foreach ($item['ulasan'] as $j => [$nama, $ulasan]) {
                Ulasan::create([
                    'properti_id' => $properti->id,
                    'nama' => $nama,
                    'ulasan' => $ulasan,
                    'created_at' => $dibuat->copy()->addDays(10 + $j * 7),
                    'updated_at' => $dibuat->copy()->addDays(10 + $j * 7),
                ]);
            }
        }
    }

    private function tiket(): void
    {
        $tiket = [
            ['INV418203', 'Agus Supriyadi', 1, 'penjadwalan', 1, 3, 'Ingin survei lokasi hari Sabtu pagi sekalian tanya simulasi KPR.'],
            ['INV527614', 'Lina Marlina', 3, 'pending', null, null, 'Apakah unit masih tersedia dan bisa dibeli dengan KPA?'],
            ['INV639025', 'Teguh Santoso', 6, 'penjadwalan', 2, 5, 'Mohon info harga untuk pembelian tunai dan jadwal kunjungan.'],
            ['INV740136', 'Ratna Sari', 2, 'pending', null, null, 'Mau sewa untuk 1 tahun mulai bulan depan, apakah masih kosong?'],
            ['INV851247', 'Doni Kurniawan', 7, 'penjadwalan', 3, 1, 'Bisa lihat rumah sore hari setelah jam kerja?'],
            ['INV962358', 'Siti Rahmawati', 8, 'pending', null, null, 'Apakah boleh sewa per 6 bulan?'],
        ];

        foreach ($tiket as $i => [$noTiket, $nama, $propertiId, $status, $agentId, $hariLagi, $pesan]) {
            $dibuat = now()->subDays(12 - $i * 2);

            Tiket::create([
                'no_tiket' => $noTiket,
                'nama' => $nama,
                'email' => strtolower(str_replace(' ', '.', $nama)).'@example.com',
                'no_hp' => '0812-0000-55'.str_pad($i + 1, 2, '0', STR_PAD_LEFT),
                'status' => $status,
                'agent_id' => $agentId,
                'properti_id' => $propertiId,
                'jadwal' => $hariLagi ? now()->addDays($hariLagi)->toDateString() : null,
                'pesan' => $pesan,
                'created_at' => $dibuat,
                'updated_at' => $dibuat,
            ]);
        }
    }

    private function faq(): void
    {
        $faq = [
            'Bagaimana cara menjadwalkan survei lokasi?' => 'Buka halaman detail properti, lalu isi formulir Buat Tiket dengan nama, email, nomor HP, dan pesan. Agen kami akan menghubungi Anda untuk menentukan jadwal kunjungan.',
            'Apakah properti bisa dibeli dengan KPR?' => 'Bisa. Kami bekerja sama dengan bank mitra untuk KPR dengan DP mulai 10% dan tenor hingga 20 tahun. Proses persetujuan biasanya 2 sampai 4 minggu.',
            'Dokumen apa saja yang dibutuhkan untuk pengajuan KPR?' => 'KTP suami dan istri, Kartu Keluarga, NPWP, buku nikah, slip gaji 3 bulan terakhir, rekening koran 3 bulan terakhir, dan surat keterangan kerja. Untuk wiraswasta, lampirkan SIUP atau NIB dan laporan keuangan usaha.',
            'Berapa booking fee untuk memesan unit?' => 'Booking fee mulai Rp 2.000.000 hingga Rp 5.000.000 tergantung tipe properti. Booking fee akan mengurangi DP, dan dikembalikan jika pengajuan KPR ditolak bank.',
            'Apa status sertifikat properti yang dijual?' => 'Sebagian besar properti bersertifikat SHM, sedangkan unit apartemen bersertifikat SHMSRS. Status sertifikat setiap properti tercantum di bagian Informasi Tambahan.',
            'Apakah harga sudah termasuk pajak dan biaya notaris?' => 'Belum, kecuali tertulis lain di Informasi Tambahan. Biaya yang perlu disiapkan antara lain BPHTB, biaya AJB, dan biaya balik nama. Notaris mitra kami dapat membantu menghitung rinciannya.',
            'Berapa lama proses serah terima kunci?' => 'Untuk unit siap huni, serah terima dilakukan 1 sampai 2 minggu setelah akad. Untuk unit inden, perkiraan waktu pembangunan 6 sampai 12 bulan.',
            'Apakah properti sewa bisa dibayar per bulan?' => 'Umumnya sewa dibayar per tahun. Beberapa unit apartemen bisa disewa per 6 bulan. Hubungi agen melalui formulir Buat Tiket untuk menanyakan ketentuan tiap unit.',
        ];

        foreach ($faq as $question => $answer) {
            Faq::create(['question' => $question, 'answer' => $answer]);
        }
    }

    private function about(): void
    {
        About::create([
            'foto' => $this->salin(public_path(self::FOTO_TEMPLATE.'hero_bg_1.jpg'), 'about'),
            'deskripsi' => "Kami adalah agen dan pengembang properti yang membantu keluarga dan investor menemukan hunian yang tepat di Kota Bengkulu dan sekitarnya.\n\n"
                ."Katalog ini memuat rumah, villa, apartemen, dan properti komersial yang dijual maupun disewakan, lengkap dengan foto, denah, fasilitas, dan lokasi. Setiap properti dapat dijadwalkan untuk survei bersama agen kami melalui formulir Buat Tiket.\n\n"
                .'Bersama bank, koperasi, kontraktor, dan notaris mitra, kami mendampingi seluruh proses mulai dari survei, pengajuan KPR, hingga serah terima kunci.',
        ]);
    }

    // Salin file ke public/images/<folder> dengan awalan "demo-", lalu kembalikan nama filenya
    private function salin(string $sumber, string $folder): string
    {
        $nama = 'demo-'.basename($sumber);
        File::ensureDirectoryExists(public_path('images/'.$folder));
        File::copy($sumber, public_path('images/'.$folder.'/'.$nama));

        return $nama;
    }

    private function dataProperti(): array
    {
        return [
            [
                'data' => [
                    'nama_properti' => 'Griya Hibrida Residence Tipe 120',
                    'type_properti' => 'Rumah',
                    'nomor_rumah' => 'Blok B-07',
                    'status' => 'Dijual',
                    'harga' => 1450000000,
                    'luas' => 120,
                    'tahun_pembuatan' => '2022-01-01',
                    'jumlah_kamar_tidur' => 3,
                    'jumlah_kamar_mandi' => 2,
                    'garasi' => 1,
                    'ac' => 'true', 'wifi' => 'true', 'tv' => 'true', 'kulkas' => 'true', 'gym' => 'false',
                    'alamat' => 'Jl. Hibrida Raya, Sidomulyo, Gading Cempaka, Kota Bengkulu',
                    'latitude' => '-3.8105',
                    'longitude' => '102.3021',
                    'deskripsi' => "Rumah dua lantai bergaya modern tropis di kawasan Hibrida yang tenang. Fasad kayu dan bukaan kaca lebar membuat rumah terasa terang dan sejuk sepanjang hari.\n\nLantai satu berisi ruang tamu, ruang keluarga yang menyatu dengan ruang makan, dapur, dan kamar mandi. Lantai dua memiliki kamar utama, dua kamar tidur, ruang santai, dan balkon menghadap taman.",
                    'informasi_tambahan' => "Sertifikat SHM, PBG lengkap.\nBisa KPR dengan DP mulai 10%.\nGratis biaya balik nama.",
                ],
                'foto' => ['img_1.jpg', 'img_8.jpg', 'hero_bg_1.jpg'],
                'denah' => 'denah-tipe-120.svg',
                'ulasan' => [
                    ['Rahmat Hidayat', 'Sudah survei langsung, bangunannya rapi dan lingkungannya tenang. Agennya cepat menjawab pertanyaan soal KPR.'],
                    ['Dewi Anggraini', 'Desainnya bagus dan dapurnya luas. Semoga masih ada unit di blok yang sama.'],
                ],
            ],
            [
                'data' => [
                    'nama_properti' => 'Villa Kolam Renang Pantai Panjang',
                    'type_properti' => 'Villa',
                    'nomor_rumah' => 'No. 12',
                    'status' => 'Disewakan',
                    'harga' => 180000000,
                    'luas' => 320,
                    'tahun_pembuatan' => '2021-01-01',
                    'jumlah_kamar_tidur' => 4,
                    'jumlah_kamar_mandi' => 4,
                    'garasi' => 2,
                    'ac' => 'true', 'wifi' => 'true', 'tv' => 'true', 'kulkas' => 'true', 'gym' => 'false',
                    'alamat' => 'Jl. Pariwisata, Lempuing, Ratu Agung, Kota Bengkulu',
                    'latitude' => '-3.8065',
                    'longitude' => '102.2741',
                    'deskripsi' => "Villa dua lantai dengan kolam renang pribadi, hanya beberapa menit dari Pantai Panjang. Cocok untuk keluarga besar atau rumah singgah perusahaan.\n\nEmpat kamar tidur ber-AC dengan kamar mandi dalam, ruang keluarga yang terbuka ke area kolam, dapur lengkap, dan carport untuk dua mobil. Disewakan lengkap dengan furnitur.",
                    'informasi_tambahan' => "Harga sewa per tahun.\nMinimal sewa 1 tahun, deposit setara 1 bulan sewa.\nSudah termasuk perawatan kolam dan taman.",
                ],
                'foto' => ['img_3.jpg', 'img_8.jpg'],
                'denah' => null,
                'ulasan' => [
                    ['Yoga Pratama', 'Kami sewa untuk acara keluarga. Kolamnya bersih dan rumahnya sesuai foto.'],
                ],
            ],
            [
                'data' => [
                    'nama_properti' => 'Apartemen 2 Kamar Tower Rafflesia Lt. 8',
                    'type_properti' => 'Apartement',
                    'nomor_rumah' => 'Unit 8-15',
                    'status' => 'Dijual',
                    'harga' => 865000000,
                    'luas' => 54,
                    'tahun_pembuatan' => '2020-01-01',
                    'jumlah_kamar_tidur' => 2,
                    'jumlah_kamar_mandi' => 1,
                    'garasi' => 0,
                    'ac' => 'true', 'wifi' => 'true', 'tv' => 'false', 'kulkas' => 'false', 'gym' => 'true',
                    'alamat' => 'Jl. S. Parman, Padang Jati, Ratu Samban, Kota Bengkulu',
                    'latitude' => '-3.7975',
                    'longitude' => '102.2652',
                    'deskripsi' => "Unit dua kamar di lantai 8 dengan pemandangan kota dan laut. Unit sudah semi furnished: kitchen set, lemari tanam, AC di setiap kamar, dan water heater.\n\nFasilitas gedung meliputi kolam renang, gym, keamanan 24 jam, dan parkir basement.",
                    'informasi_tambahan' => "Sertifikat SHMSRS.\nIPL Rp 15.000/m² per bulan.\nBisa KPA dengan DP mulai 15%.",
                ],
                'foto' => ['img_4.jpg', 'img_8.jpg'],
                'denah' => 'denah-apartemen-2kt.svg',
                'ulasan' => [
                    ['Intan Permatasari', 'Pemandangan dari lantai 8 bagus sekali, apalagi sore hari.'],
                ],
            ],
            [
                'data' => [
                    'nama_properti' => 'Rumah Minimalis Bentiring Permai Tipe 45',
                    'type_properti' => 'Rumah',
                    'nomor_rumah' => 'Blok C-21',
                    'status' => 'Dijual',
                    'terjual' => '1',
                    'harga' => 485000000,
                    'luas' => 98,
                    'tahun_pembuatan' => '2023-01-01',
                    'jumlah_kamar_tidur' => 2,
                    'jumlah_kamar_mandi' => 1,
                    'garasi' => 1,
                    'ac' => 'false', 'wifi' => 'false', 'tv' => 'false', 'kulkas' => 'false', 'gym' => 'false',
                    'alamat' => 'Jl. Bentiring Permai, Bentiring, Muara Bangkahulu, Kota Bengkulu',
                    'latitude' => '-3.7560',
                    'longitude' => '102.3005',
                    'deskripsi' => "Rumah satu lantai siap huni di perumahan Bentiring Permai, dengan sistem satu gerbang, jalan lebar, dan taman bermain anak.\n\nDua kamar tidur, satu kamar mandi, ruang keluarga, ruang makan, dapur, dan carport. Sisa lahan di belakang bisa dikembangkan untuk dapur kotor atau taman.",
                    'informasi_tambahan' => "Sertifikat SHM, PBG lengkap.\nBisa KPR subsidi maupun komersial.\nUnit ini sudah terjual, tipe serupa tersedia di blok lain.",
                ],
                'foto' => ['img_7.jpg'],
                'denah' => 'denah-tipe-45.svg',
                'ulasan' => [
                    ['Hendra Gunawan', 'Proses pembelian cepat, akad selesai kurang dari sebulan.'],
                    ['Putri Ayu', 'Perumahannya asri, cocok untuk keluarga muda.'],
                ],
            ],
            [
                'data' => [
                    'nama_properti' => 'Hotel Butik 18 Kamar Dekat Pantai',
                    'type_properti' => 'Hotel',
                    'nomor_rumah' => 'No. 88',
                    'status' => 'Disewakan',
                    'harga' => 1200000000,
                    'luas' => 650,
                    'tahun_pembuatan' => '2019-01-01',
                    'jumlah_kamar_tidur' => 18,
                    'jumlah_kamar_mandi' => 18,
                    'garasi' => 6,
                    'ac' => 'true', 'wifi' => 'true', 'tv' => 'true', 'kulkas' => 'true', 'gym' => 'true',
                    'alamat' => 'Jl. Pariwisata, Sumber Jaya, Kampung Melayu, Kota Bengkulu',
                    'latitude' => '-3.8290',
                    'longitude' => '102.2850',
                    'deskripsi' => "Hotel butik tiga lantai dengan 18 kamar tamu, kolam renang, restoran, dan area parkir, berjarak jalan kaki ke pantai. Bangunan terawat dan sudah beroperasi, cocok untuk investor yang ingin langsung menjalankan usaha penginapan.\n\nSetiap kamar dilengkapi AC, TV, Wi-Fi, kamar mandi dalam, dan kulkas mini. Tersedia lobi, ruang staf, dan gudang linen.",
                    'informasi_tambahan' => "Harga sewa per tahun, minimal kontrak 3 tahun.\nFurnitur dan peralatan hotel termasuk dalam sewa.\nIzin usaha dapat dialihkan ke penyewa.",
                ],
                'foto' => ['img_6.jpg', 'img_5.jpg', 'img_8.jpg'],
                'denah' => null,
                'ulasan' => [
                    ['Bayu Setiawan', 'Lokasinya strategis untuk usaha penginapan, dekat pantai dan tempat makan.'],
                ],
            ],
            [
                'data' => [
                    'nama_properti' => 'Villa Modern Danau Dendam',
                    'type_properti' => 'Villa',
                    'nomor_rumah' => 'No. 5',
                    'status' => 'Dijual',
                    'harga' => 1950000000,
                    'luas' => 420,
                    'tahun_pembuatan' => '2022-01-01',
                    'jumlah_kamar_tidur' => 5,
                    'jumlah_kamar_mandi' => 5,
                    'garasi' => 2,
                    'ac' => 'true', 'wifi' => 'true', 'tv' => 'true', 'kulkas' => 'true', 'gym' => 'true',
                    'alamat' => 'Jl. Danau Dendam Tak Sudah, Dusun Besar, Singaran Pati, Kota Bengkulu',
                    'latitude' => '-3.8000',
                    'longitude' => '102.3180',
                    'deskripsi' => "Villa modern dengan kolam renang dan teras luas, dikelilingi suasana hijau dekat Danau Dendam Tak Sudah. Desain terbuka dengan plafon tinggi membuat sirkulasi udara terasa sejuk.\n\nLima kamar tidur dengan kamar mandi dalam, ruang keluarga, dapur bersih dan dapur kotor, ruang gym, serta carport dua mobil. Cocok sebagai hunian keluarga atau villa sewa harian.",
                    'informasi_tambahan' => "Sertifikat SHM.\nHarga bisa nego untuk pembelian tunai.\nBisa KPR dengan DP mulai 20%.",
                ],
                'foto' => ['img_5.jpg', 'hero_bg_1.jpg', 'img_8.jpg'],
                'denah' => null,
                'ulasan' => [
                    ['Melati Kusuma', 'Villanya mewah dan sejuk, pemandangannya hijau.'],
                ],
            ],
            [
                'data' => [
                    'nama_properti' => 'Rumah Modern 2 Lantai Kebun Tebeng',
                    'type_properti' => 'Rumah',
                    'nomor_rumah' => 'No. 17',
                    'status' => 'Dijual',
                    'harga' => 1380000000,
                    'luas' => 120,
                    'tahun_pembuatan' => '2024-01-01',
                    'jumlah_kamar_tidur' => 3,
                    'jumlah_kamar_mandi' => 2,
                    'garasi' => 1,
                    'ac' => 'true', 'wifi' => 'false', 'tv' => 'false', 'kulkas' => 'false', 'gym' => 'false',
                    'alamat' => 'Jl. Kebun Tebeng, Kebun Tebeng, Ratu Agung, Kota Bengkulu',
                    'latitude' => '-3.7930',
                    'longitude' => '102.2760',
                    'deskripsi' => "Rumah dua lantai desain kontemporer di kawasan Kebun Tebeng yang dekat sekolah, rumah sakit, dan pusat kuliner. Fasad memadukan panel dan kayu.\n\nTiga kamar tidur, dua kamar mandi, ruang tamu, ruang keluarga dan makan, dapur, balkon, dan carport. Bangunan baru dan belum pernah dihuni.",
                    'informasi_tambahan' => "Sertifikat SHM, PBG lengkap.\nBisa KPR dengan DP mulai 10%.\nGaransi struktur 1 tahun dari developer.",
                ],
                'foto' => ['hero_bg_2.jpg', 'img_8.jpg'],
                'denah' => 'denah-tipe-120.svg',
                'ulasan' => [
                    ['Arif Rahman', 'Bangunan masih baru dan finishing-nya rapi. Tinggal nego harga.'],
                ],
            ],
            [
                'data' => [
                    'nama_properti' => 'Studio Furnished Dekat Kampus UNIB',
                    'type_properti' => 'Apartement',
                    'nomor_rumah' => 'Unit 3-08',
                    'status' => 'Disewakan',
                    'harga' => 24000000,
                    'luas' => 28,
                    'tahun_pembuatan' => '2021-01-01',
                    'jumlah_kamar_tidur' => 1,
                    'jumlah_kamar_mandi' => 1,
                    'garasi' => 0,
                    'ac' => 'true', 'wifi' => 'true', 'tv' => 'true', 'kulkas' => 'true', 'gym' => 'false',
                    'alamat' => 'Jl. WR Supratman, Kandang Limun, Muara Bangkahulu, Kota Bengkulu',
                    'latitude' => '-3.7590',
                    'longitude' => '102.2735',
                    'deskripsi' => "Unit studio fully furnished untuk mahasiswa atau karyawan muda, dekat kampus UNIB. Ruangan terang dengan dapur kecil, sofa, meja kerja, dan tempat tidur queen.\n\nFasilitas gedung meliputi akses kartu, CCTV, laundry, dan parkir motor.",
                    'informasi_tambahan' => "Harga sewa per tahun (Rp 2 juta per bulan).\nSudah termasuk Wi-Fi dan biaya kebersihan.\nListrik token, bayar sesuai pemakaian.",
                ],
                'foto' => ['img_8.jpg'],
                'denah' => null,
                'ulasan' => [
                    ['Fikri Maulana', 'Pas untuk mahasiswa, dekat kampus dan sudah ada Wi-Fi.'],
                ],
            ],
            [
                'data' => [
                    'nama_properti' => 'Rumah Modern Sawah Lebar',
                    'type_properti' => 'Rumah',
                    'nomor_rumah' => 'No. 9A',
                    'status' => 'Dijual',
                    'harga' => 1150000000,
                    'luas' => 120,
                    'tahun_pembuatan' => '2021-01-01',
                    'jumlah_kamar_tidur' => 3,
                    'jumlah_kamar_mandi' => 2,
                    'garasi' => 1,
                    'ac' => 'true', 'wifi' => 'true', 'tv' => 'false', 'kulkas' => 'false', 'gym' => 'false',
                    'alamat' => 'Jl. Sawah Lebar Baru, Sawah Lebar, Ratu Agung, Kota Bengkulu',
                    'latitude' => '-3.7895',
                    'longitude' => '102.2830',
                    'deskripsi' => "Rumah dua lantai dengan pagar minimalis dan taman depan di Sawah Lebar, kawasan permukiman yang dekat pusat kota. Jendela kaca besar memberi cahaya alami ke ruang keluarga.\n\nTiga kamar tidur, dua kamar mandi, ruang keluarga, ruang makan, dapur, balkon, dan carport.",
                    'informasi_tambahan' => "Sertifikat SHM, PBG lengkap.\nBisa KPR dengan DP mulai 10%.\nHarga masih bisa nego.",
                ],
                'foto' => ['img_2.jpg', 'hero_bg_1.jpg'],
                'denah' => 'denah-tipe-120.svg',
                'ulasan' => [],
            ],
        ];
    }
}
