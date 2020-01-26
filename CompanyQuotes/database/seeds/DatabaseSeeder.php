<?php
use \Illuminate\Support\Facades\Storage as Storage;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $companies = json_decode(
            \Illuminate\Support\Facades\File::get(storage_path('app'.DIRECTORY_SEPARATOR.'api_data' . DIRECTORY_SEPARATOR . 'company_symbols.json')),
            true);
        foreach ($companies as $company) {
            \App\Company::updateOrCreate([
                'company_name' => $company['Company Name'], 'financial_status' => $company['Financial Status'],
                'market_category' => $company['Market Category'], 'round_lot_size' => $company['Round Lot Size'],
                'security_name' => $company['Security Name'], 'symbol' => $company['Symbol']]);
        }
    }
}
