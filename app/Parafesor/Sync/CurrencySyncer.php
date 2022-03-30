<?php

namespace App\Parafesor\Sync;

use App\Models\Currency;
use App\Parafesor\Altinkaynak\Altinkaynak;
use App\Parafesor\Constants\AltinParaConst;
use App\Parafesor\Constants\Currency as CurrencyConst;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class CurrencySyncer
{
    public static function UpdateCurrencies()
    {
        (new CurrencySyncer())->updateForeignCurrencies();
        (new CurrencySyncer())->updateCryptoCurrencies();
        (new CurrencySyncer())->updateGoldCurrencies();
//        ( new CurrencySyncer )->getStockCurrencies();

    }

    private function updateForeignCurrencies()
    {
        $yesterdayDate = Carbon::yesterday()->format('Ym');
        $yesterdayDateDetailed = Carbon::yesterday()->format('dmY');

        try {
            $todaysCurrencies = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');
        } catch (Exception $e) {
            $todaysCurrencies = null;
        }


        try {
            $yesterdaysCurrencies = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/'
              .$yesterdayDate.'/'.$yesterdayDateDetailed.'.xml');
        } catch (Exception $e) {
            $yesterdaysCurrencies = null;
        }
        if (!$todaysCurrencies) {
            $todaysCurrencies = $yesterdaysCurrencies;
        }

        if (!$yesterdaysCurrencies) {
            $yesterdaysCurrencies = $todaysCurrencies;
        }

        $fiatCurrencies['USD'] = [
          'Buying'           => $todaysCurrencies->Currency[0]->BanknoteBuying,
          'Selling'          => $todaysCurrencies->Currency[0]->BanknoteSelling,
          'YesterdayBuying'  => $yesterdaysCurrencies ? $yesterdaysCurrencies->Currency[0]->BanknoteSelling : null,
          'YesterdaySelling' => $yesterdaysCurrencies ? $yesterdaysCurrencies->Currency[0]->BanknoteSelling : null,
        ];

        $fiatCurrencies['EURO'] = [
          'Buying'           => $todaysCurrencies->Currency[3]->BanknoteBuying,
          'Selling'          => $todaysCurrencies->Currency[3]->BanknoteSelling,
          'YesterdayBuying'  => $yesterdaysCurrencies->Currency[3]->BanknoteBuying,
          'YesterdaySelling' => $yesterdaysCurrencies->Currency[3]->BanknoteSelling,
        ];

        $fiatCurrencies['STERLIN'] = [
          'Buying'           => $todaysCurrencies->Currency[4]->BanknoteBuying,
          'Selling'          => $todaysCurrencies->Currency[4]->BanknoteSelling,
          'YesterdayBuying'  => $yesterdaysCurrencies->Currency[4]->BanknoteBuying,
          'YesterdaySelling' => $yesterdaysCurrencies->Currency[4]->BanknoteSelling,
        ];

        $fiatCurrencies['YEN'] = [
          'Buying'           => $todaysCurrencies->Currency[11]->BanknoteBuying,
          'Selling'          => $todaysCurrencies->Currency[11]->BanknoteSelling,
          'YesterdayBuying'  => $yesterdaysCurrencies->Currency[11]->BanknoteBuying,
          'YesterdaySelling' => $yesterdaysCurrencies->Currency[11]->BanknoteSelling,
        ];

        foreach ($fiatCurrencies as $fiatCurrency => $values) {
            $change = 0;
            $currency = Currency::where('currency', $fiatCurrency)->first();
            if ($currency) {
                $change = ($values['Buying'] - $currency->yesterday_buying) / $values['Buying'] * 100;
            }

            Currency::updateOrCreate(
              [
                'type'     => CurrencyConst::FIAT,
                'currency' => $fiatCurrency,
              ],
              [
                'buying'            => $values['Buying'] ?: $currency->buying,
                'selling'           => $values['Selling'] ?: $currency->selling,
                'yesterday_buying'  => $values['YesterdayBuying'] ?: $currency->yesterday_buying,
                'yesterday_selling' => $values['YesterdaySelling'] ?: $currency->yesterday_selling,
                'change'            => $change,
              ]);
        }
        $currencies = Currency::where('type', CurrencyConst::FIAT)->get();
        Cache::put('Currencies:'.CurrencyConst::FIAT, $currencies);
    }

    private function updateCryptoCurrencies()
    {
        /*  $response = Http::withHeaders([
              'X-CMC_PRO_API_KEY' => '5d2f66f8-68f7-43c8-9a30-9b81bacb23b3',
          ])
              ->get('https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest', [
                  'convert' => 'TRY',
                  'start'   => 1,
                  'limit'   => 10,
              ])->json();*/


        $response = Http::get('https://api.btcturk.com/api/v2/ticker', [])->json();

        foreach ($response['data'] as $value) {
            if ($value['denominatorSymbol'] !== 'TRY') {
                continue;
            }
            $currency = Currency::where('type', CurrencyConst::CRYPTO)->
            where('currency', $value['numeratorSymbol'])->first();
            if (!$currency) {
                continue;
            }
            $currency->buying = $value['bid'];
            $currency->selling = $value['ask'];
            $currency->change = $value['dailyPercent'];
            $currency->change_amount = $value['daily'];
            $currency->save();
        }

        /*  foreach ($response['data'] as $value) {
              Currency::updateOrCreate(
                  [
                      'type'     => \App\Parafesor\Constants\Currency::CRYPTO,
                      'currency' => $value['symbol'],
                  ],
                  [
                      'buying'  => $value['quote']['TRY']['price'],
                      'selling' => null,
                      'change'  => $value['quote']['TRY']['percent_change_24h'],
                  ]);
          }*/
        $currencies = Currency::where('type', CurrencyConst::CRYPTO)->get();
        Cache::put('Currencies:'.CurrencyConst::CRYPTO, $currencies);
    }

    private function updateGoldCurrencies()
    {
        $instance = new Altinkaynak();
        foreach ($instance->GetGold() as $response) {
            if (!isset(AltinParaConst::Altın[$response->code])) {
                continue;
            }

            Currency::updateOrCreate(
              [
                'type'     => CurrencyConst::FIAT,
                'currency' => AltinParaConst::Altın[$response->code],
              ],
              [
                'buying'  => $response->buying,
                'selling' => $response->selling,
                'change'  => 0,
              ]);
        }
        $currencies = Currency::where('type', CurrencyConst::FIAT)->get();
        Cache::put('Currencies:'.CurrencyConst::FIAT, $currencies);
    }
}
