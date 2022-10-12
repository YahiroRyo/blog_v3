<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Event;
use Illuminate\Database\Events\TransactionBeginning;
use Illuminate\Database\Events\TransactionCommitted;
use Illuminate\Database\Events\TransactionRolledBack;
use Carbon\Carbon;
use DateTime;

class DataBaseQueryServiceProvider extends ServiceProvider {
    private function replaceSQL(string $replacement, string $sql) : string {
        return preg_replace('/\\?/', $replacement, $sql, 1);
    }

    private function writeLog(string $replacement, $query) : void {
        $sql = $this->replaceSQL($replacement, $query->sql);
        logs()->debug('SQL', ['sql' => $sql, 'time' => "{$query->time} ms"]);
    }

    public function register() : void {
        DB::listen(function ($query) : void {
            foreach ($query->bindings as $binding) {
                if (is_string($binding)) {
                    $this->writeLog("'{$binding}'", $query);
                    return;
                }

                if (is_bool($binding)) {
                    $this->writeLog($binding ? '1' : '0', $query);
                    return;
                }

                if (is_int($binding)) {
                    $this->writeLog((string) $binding, $query);
                    return;
                }

                if ($binding === null) {
                    $this->writeLog("NULL", $query);
                    return;
                }

                if ($binding instanceof Carbon) {
                    $this->writeLog("'{$binding->toDateTimeString()}'", $query);
                    return;
                }

                if ($binding instanceof DateTime) {
                    $this->writeLog("'{$binding->format('Y-m-d H:i:s')}'", $query);
                    return;
                }
            }
        });

        Event::listen(TransactionBeginning::class, function (TransactionBeginning $event) : void {
            logs()->debug('SQL START TRANSACTION');
        });

        Event::listen(TransactionCommitted::class, function (TransactionCommitted $event) : void {
            logs()->debug('SQL COMMIT');
        });

        Event::listen(TransactionRolledBack::class, function (TransactionRolledBack $event) : void {
            logs()->debug('SQL ROLLBACK');
        });
    }

    public function boot() : void {
    }
}
