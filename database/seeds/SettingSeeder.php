<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
          [
            'kode' => 'ST-0000',
            'keterangan' => 'Logo perusahaan',
            'isi'=> ''
          ],
          [
            'kode' => 'ST-0001',
            'keterangan' => 'company name',
            'isi'=> ''
          ],
          [
            'kode' => 'ST-0002',
            'keterangan' => 'alamat',
            'isi'=> ''
          ],
          [
            'kode' => 'ST-0003',
            'keterangan' => 'email',
            'isi'=> ''
          ],
          [
            'kode' => 'ST-0004',
            'keterangan' => 'mobile phone /  whatsapp',
            'isi'=> ''
          ],
          [
            'kode' => 'ST-0005',
            'keterangan' => 'mobile phone 2 /  whatsapp2',
            'isi'=> ''
          ],
          [
            'kode' => 'ST-0006',
            'keterangan' => 'telp kantor',
            'isi'=> ''
          ],
          [
            'kode' => 'ST-0007',
            'keterangan' => 'social media',
            'isi'=> ''
          ],
          [
            'kode' => 'ST-0008',
            'keterangan' => 'bank account',
            'isi'=> ''
          ],

        ];

        foreach ($data as $row ) {
          Setting::updateOrCreate(
            ['kode'=> $row['kode'] ],
            $row
          );
        }

    }
}
