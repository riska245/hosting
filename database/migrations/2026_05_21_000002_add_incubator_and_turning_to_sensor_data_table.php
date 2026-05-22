<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('sensor_data', 'incubator_code')) {
            Schema::table('sensor_data', function (Blueprint $table) {
                $table->string('incubator_code')->nullable()->after('id')->index();
            });
        }

        if (!Schema::hasColumn('sensor_data', 'temperature')) {
            Schema::table('sensor_data', function (Blueprint $table) {
                $table->float('temperature')->default(0);
            });
        }

        if (!Schema::hasColumn('sensor_data', 'humidity')) {
            Schema::table('sensor_data', function (Blueprint $table) {
                $table->float('humidity')->default(0);
            });
        }

        if (!Schema::hasColumn('sensor_data', 'lamp_status')) {
            Schema::table('sensor_data', function (Blueprint $table) {
                $table->string('lamp_status')->default('mati');
            });
        }

        if (!Schema::hasColumn('sensor_data', 'turning_status')) {
            Schema::table('sensor_data', function (Blueprint $table) {
                $table->string('turning_status')->default('menunggu');
            });
        }

        if (!Schema::hasColumn('sensor_data', 'turned_at')) {
            Schema::table('sensor_data', function (Blueprint $table) {
                $table->timestamp('turned_at')->nullable();
            });
        }

        if (!Schema::hasColumn('sensor_data', 'next_turn_at')) {
            Schema::table('sensor_data', function (Blueprint $table) {
                $table->timestamp('next_turn_at')->nullable();
            });
        }
    }

    public function down(): void
    {
        Schema::table('sensor_data', function (Blueprint $table) {
            if (Schema::hasColumn('sensor_data', 'incubator_code')) {
                $table->dropIndex(['incubator_code']);
                $table->dropColumn('incubator_code');
            }

            foreach (['turning_status', 'turned_at', 'next_turn_at'] as $column) {
                if (Schema::hasColumn('sensor_data', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
