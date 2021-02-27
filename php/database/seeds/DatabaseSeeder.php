<?php

use Illuminate\Database\Seeder;
use App\Models\ExecutedSeeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /** 実行したいSeederをここに登録 */
    private const SEEDERS = [
        SourFruitsSeeder::class,
    ];

    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        echo "\n";
        foreach (self::SEEDERS as $seeder) {
            $this->runOneOnce($seeder);
        }
        echo "\n";
    }

    /**
     * 個別実行 (初めて実行する Seeder のみを実行する)
     * @param  string  $seederName
     * @return bool
     */
    private function runOneOnce(string $seederName): bool
    {
        if (self::isDuplicated($seederName)) {
            echo "Already executed: ".$seederName."\n";
            return false;
        }

        DB::transaction(function () use ($seederName) {
            $this->call($seederName);
            self::createExecutedSeeder($seederName);
        });
        return true;
    }

    /**
     * 名前が重複しているレコードがあるかどうか
     * @param string $seederName
     * @return bool
     */
    private static function isDuplicated($seederName): bool
    {
        $sameNamed = ExecutedSeeder::where('name', $seederName)->first();
        return isset($sameNamed) ? true : false;
    }

    /**
     * Seeder の利用実績を管理するテーブルに、クラス名を保存する
     * @param string $seederName
     * @return bool
     */
    private static function createExecutedSeeder(string $seederName): bool
    {
        $executed = new ExecutedSeeder(["name" => $seederName]);
        return $executed->save();
    }

}
