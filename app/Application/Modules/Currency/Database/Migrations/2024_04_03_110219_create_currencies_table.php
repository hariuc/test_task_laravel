<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class() extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->date('date')->comment('Date of currency loading');
            $table->string('num_code', 3)->comment('Numeric currency code');
            $table->string('char_code', 3)->comment('The character code of the currency');
            $table->string('nominal', 3)->comment('Nominal currency value');
            $table->string('currency_name', 50)->comment('Name of the currency');
            $table->float('currency_value', 12, 4)->comment('Currency value');
            $table->timestamps();

            $table->comment('Currency table');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
