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
    private function replaceSQL(string $replacement, string $sql): string {
        return preg_replace('/\\?/', $replacement, $sql, 1);
    }

    public function register(): void {
        DB::listen(function ($query): void {
            $sql = $query->sql;

            foreach ($query->bindings as $binding) {
                if (is_string($binding)) {
                    $sql = $this->replaceSQL("'{$binding}'", $sql);
                    continue;
                }

                if (is_bool($binding)) {
                    $sql = $this->replaceSQL($binding ? '1' : '0', $sql);
                    continue;
                }

                if (is_int($binding)) {
                    $sql = $this->replaceSQL((string) $binding, $sql);
                    continue;
                }

                if ($binding === null) {
                    $sql = $this->replaceSQL("NULL", $sql);
                    continue;
                }

                if ($binding instanceof Carbon) {
                    $sql = $this->replaceSQL("'{$binding->toDateTimeString()}'", $sql);
                    continue;
                }

                if ($binding instanceof DateTime) {
                    $sql = $this->replaceSQL("'{$binding->format('Y-m-d H:i:s')}'", $sql);
                    continue;
                }
            }

            logs()->debug('SQL', ['sql' => $sql, 'time' => "{$query->time} ms"]);
        });

        Event::listen(TransactionBeginning::class, function (TransactionBeginning $event): void {
            logs()->debug('SQL START TRANSACTION');
        });

        Event::listen(TransactionCommitted::class, function (TransactionCommitted $event): void {
            logs()->debug('SQL COMMIT');
        });

        Event::listen(TransactionRolledBack::class, function (TransactionRolledBack $event): void {
            logs()->debug('SQL ROLLBACK');
        });
    }

    public function boot(): void {
    }
}
