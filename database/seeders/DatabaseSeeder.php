<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Barang;
use App\Models\Kasie;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $admin = User::factory()->create([
            'name' => 'Administrator',
            'email' => 'admin@bpkhtl15gorontalo.com',
            'password' => 'bpkhtl!23',
            'verified' => true,
        ]);

        $kasubag = User::factory()->create([
            'name' => 'Fiqriansyah',
            'email' => 'moh.fikryansyah@gmail.com',
            'password' => 'fiqriansyah2001',
            'verified' => true,
            'kasie_id' => 4,
        ]);

        Role::create(['name' => 'ADMIN']);
        Role::create(['name' => 'PEGAWAI']);
        Role::create(['name' => 'KASUBAG']);
        
        $admin->assignRole('ADMIN');
        $kasubag->assignRole('KASUBAG');

        Kasie::create([
            'namaKasie' => 'La Ode Bahtiar, S.Hut, M.Si',
            'nipKasie' => 197902192000031003,
            'seksi' => 'PKH',
        ]);
        Kasie::create([
            'namaKasie' => 'Herman, S.Hut.T, M.Si',
            'nipKasie' => 197407031992121001,
            'seksi' => 'SDHTL',
        ]);
        Kasie::create([
            'namaKasie' => 'Ciciek Caroline Darwis, S.P, M.M',
            'nipKasie' => 197910041998032001,
            'seksi' => 'Tata Usaha',
        ]);

        Barang::create([
            'nama' => 'Sepeda Motor',
            'stok' => 5,
            'stokawal' => 5,
            'kode_barang' => 3020104001,
            'satuan' => 'Unit',
        ]);
        Barang::create([
            'nama' => 'Battery Charge',
            'stok' => 4,
            'stokawal' => 4,
            'kode_barang' => 3030103001,
            'satuan' => 'Buah',
        ]);

        Barang::create([
            'nama' => 'Rol Meter',
            'stok' => 9,
            'stokawal' => 9,
            'kode_barang' => 3030211003,
            'satuan' => 'Buah',
        ]);

        Barang::create([
            'nama' => 'Termometer Standar',
            'stok' => 9,
            'stokawal' => 9,
            'kode_barang' => 3030308012,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Alat Pengukur Garis Tengah',
            'stok' => 9,
            'stokawal' => 9,
            'kode_barang' => 3030309004,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Diameter Tape',
            'stok' => 9,
            'stokawal' => 9,
            'kode_barang' => 3030309006,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Alat Ukur Lainnya',
            'stok' => 14,
            'stokawal' => 14,
            'kode_barang' => 3030309999,
            'satuan' => 'Dummy',
        ]);
        Barang::create([
            'nama' => 'Mesin Ketik Elektronik/Selektrik',
            'stok' => 8,
            'stokawal' => 8,
            'kode_barang' => 3050101008,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Mesin Ketik Lainnya',
            'stok' => 1,
            'stokawal' => 1,
            'kode_barang' => 3050101999,
            'satuan' => 'dummy',
        ]);
        Barang::create([
            'nama' => 'White Board',
            'stok' => 2,
            'stokawal' => 2,
            'kode_barang' => 3050105010,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Peta',
            'stok' => 1,
            'stokawal' => 1,
            'kode_barang' => 3050105014,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'LCD Projector/Infocus',
            'stok' => 6,
            'stokawal' => 6,
            'kode_barang' => 3050105048,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Alat Kantor Lainnya',
            'stok' => 1,
            'stokawal' => 1,
            'kode_barang' => 3050199999,
            'satuan' => 'Dummy',
        ]);
        Barang::create([
            'nama' => 'Mesin Penghisap Debu/Vacuum Cleaner',
            'stok' => 1,
            'stokawal' => 1,
            'kode_barang' => 3050203001,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Mesin Pemotong Rumput',
            'stok' => 1,
            'stokawal' => 1,
            'kode_barang' => 3050203003,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Air Cleaner',
            'stok' => 9,
            'stokawal' => 9,
            'kode_barang' => 3050203005,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Sound System',
            'stok' => 2,
            'stokawal' => 2,
            'kode_barang' => 3050206008,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Wireless',
            'stok' => 2,
            'stokawal' => 2,
            'kode_barang' => 3050206012,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Microphone',
            'stok' => 1,
            'stokawal' => 1,
            'kode_barang' => 3050206014,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Dispenser',
            'stok' => 6,
            'stokawal' => 6,
            'kode_barang' => 3050206036,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Digital Audio Storage System',
            'stok' => 2,
            'stokawal' => 2,
            'kode_barang' => 3060101075,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Layar Film/Projector',
            'stok' => 1,
            'stokawal' => 1,
            'kode_barang' => 3060102107,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Camera Digital',
            'stok' => 12,
            'stokawal' => 12,
            'kode_barang' => 3060102128,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Theodolite (Peralatan Studio Pemetaan/peralatan Ukur Tanah)',
            'stok' => 1,
            'stokawal' => 1,
            'kode_barang' => 3060105017,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Kompas Geologi',
            'stok' => 3,
            'stokawal' => 3,
            'kode_barang' => 3060105023,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Clinometer',
            'stok' => 14,
            'stokawal' => 14,
            'kode_barang' => 3060105024,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Kompas (Peralatan Studio Pemetaan/peralatan Ukur Tanah)',
            'stok' => 22,
            'stokawal' => 22,
            'kode_barang' => 3060105035,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'GPS Receiver',
            'stok' => 19,
            'stokawal' => 19,
            'kode_barang' => 3060105038,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Kamera Udara',
            'stok' => 2,
            'stokawal' => 2,
            'kode_barang' => 3060105047,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Handy Talky (HT)',
            'stok' => 10,
            'stokawal' => 10,
            'kode_barang' => 3060201006,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Solar Cell',
            'stok' => 2,
            'stokawal' => 2,
            'kode_barang' => 3060347003,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Tiang Keseimbangan',
            'stok' => 6,
            'stokawal' => 6,
            'kode_barang' => 3070112007,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Digital Signal Procesor',
            'stok' => 1,
            'stokawal' => 1,
            'kode_barang' => 3080111147,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Mesin Power Station White Emergency Diesel Generating',
            'stok' => 1,
            'stokawal' => 1,
            'kode_barang' => 3080140010,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Sprayer',
            'stok' => 2,
            'stokawal' => 2,
            'kode_barang' => 3080141248,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Spiegel Relascope',
            'stok' => 14,
            'stokawal' => 14,
            'kode_barang' => 3080146014,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Wash Bak',
            'stok' => 1,
            'stokawal' => 1,
            'kode_barang' => 3080151024,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Antena Relay',
            'stok' => 6,
            'stokawal' => 6,
            'kode_barang' => 3080158021,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Serial Scanner/Printer',
            'stok' => 2,
            'stokawal' => 2,
            'kode_barang' => 3080302039,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Refrigerator/Freezer',
            'stok' => 2,
            'stokawal' => 2,
            'kode_barang' => 3080605036,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Kipas Penggerak Air',
            'stok' => 1,
            'stokawal' => 1,
            'kode_barang' => 3090201087,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'GPS',
            'stok' => 9,
            'stokawal' => 9,
            'kode_barang' => 3090403004,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Layar Proyektor',
            'stok' => 1,
            'stokawal' => 1,
            'kode_barang' => 3090407022,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Laptop',
            'stok' => 1,
            'stokawal' => 1,
            'kode_barang' => 3100102002,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Note Book',
            'stok' => 23,
            'stokawal' => 23,
            'kode_barang' => 3100102003,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Tablet PC',
            'stok' => 1,
            'stokawal' => 1,
            'kode_barang' => 3100102009,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Hard Disk',
            'stok' => 1,
            'stokawal' => 1,
            'kode_barang' => 3100201012,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Keyboard (Peralatan Mainframe)',
            'stok' => 1,
            'stokawal' => 1,
            'kode_barang' => 3100201013,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Printer (Peralatan Personal Komputer)',
            'stok' => 41,
            'stokawal' => 41,
            'kode_barang' => 3100203003,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'External/ Portable Hardisk',
            'stok' => 5,
            'stokawal' => 5,
            'kode_barang' => 3100203017,
            'satuan' => 'Buah',
        ]);
        Barang::create([
            'nama' => 'Baju Pengaman Lainnya',
            'stok' => 2,
            'stokawal' => 2,
            'kode_barang' => 3150201999,
            'satuan' => 'Dummy',
        ]);
    }
}
