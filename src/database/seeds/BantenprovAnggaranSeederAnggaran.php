<?php

/* Require */
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

/* Models */
use Bantenprov\Anggaran\Models\Bantenprov\Anggaran\Anggaran;

class BantenprovAnggaranSeederAnggaran extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
	public function run()
	{
        Model::unguard();

        $anggarans = (object) [
            (object) [
                'user_id' => '1',
                'group_egovernment_id' => '1',
                'sector_egovernment_id' => '1',
                'label' => 'GroupEgovernment 1',
                'description' => 'GroupEgovernment satu'
            ],
            (object) [
                'user_id' => '2',
                'group_egovernment_id' => '2',
                'sector_egovernment_id' => '',
                'label' => 'GroupEgovernment 2',
                'description' => 'GroupEgovernment dua',
            ]
        ];

        foreach ($anggarans as $anggaran) {
            $model = Anggaran::updateOrCreate(
                [
                    'user_id' => $anggaran->user_id,
                    'group_egovernment_id' => $anggaran->group_egovernment_id,
                    'sector_egovernment_id' => $anggaran->sector_egovernment_id,
                    'label' => $anggaran->label,
                    'description' => $anggaran->description,
                ]
            );
            $model->save();
        }
	}
}
