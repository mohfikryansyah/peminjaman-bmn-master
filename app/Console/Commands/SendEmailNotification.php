<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Peminjam;
use App\Mail\InfoPengembalian;
use Illuminate\Support\Facades\Mail;


class SendEmailNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Kirim Notifikasi Pengembalian Barang';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $allPeminjam = Peminjam::all();
        foreach ($allPeminjam as $peminjam) {
            $selisihHari = $peminjam->hitungSelisihTanggal();

            if ($selisihHari <= 3 && $peminjam->status == 'Disetujui') {
                $infoMail = [
                    'title' => 'Halo, ' . $peminjam->user->name,
                    'barang1' => $peminjam->barang1,
                    'barang2' => $peminjam->barang2,
                    'barang3' => $peminjam->barang3,
                    'stokbarang1' => $peminjam->stokbarang1,
                    'stokbarang2' => $peminjam->stokbarang2,
                    'stokbarang3' => $peminjam->stokbarang3,
                    'foto' => $peminjam->user->fotoProfile,
                    'pangkat' => $peminjam->user->pangkat,
                    'selisih' => $selisihHari,
                ];

                mail::to($peminjam->user->email)->send(new InfoPengembalian($infoMail));

                $this->info('Email sent successfully!');
            }
        }
    }
}
