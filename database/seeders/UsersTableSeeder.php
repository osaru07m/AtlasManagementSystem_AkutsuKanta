<?php
namespace Database\Seeders;

use App\Models\Users\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('ja-JP');

        // 作成するユーザー数
        $userCount = 10;

        for ($i = 0; $i < $userCount; $i++) {
            User::create([
                'over_name' => 'テスト',
                'under_name' => "{$i}号",
                'over_name_kana' => "テスト",
                'under_name_kana' => "{$i}ゴウ",
                'mail_address' => "test_{$i}@atlas.jp",
                // sex => 1: 男, 2: 女
                'sex' => Arr::random([1, 2]),
                'birth_day' => $faker->dateTimeBetween('2000-01-01', 'now')->format('Y-m-d'),
                // role => 1: 教師(国語), 2: 教師(数学), 3: 講師(英語), 4: 生徒
                'role' => Arr::random([1, 2, 3, 4]),
                'password' => Hash::make('Compass_1234'),
            ]);
        }
    }
}
