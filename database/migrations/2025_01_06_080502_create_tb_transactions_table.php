<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('members_id')->constrained('tb_members')->onDelete('cascade'); // Foreign key ke 'members'
            $table->foreignId('arisan_id')->constrained('tb_arisan')->onDelete('cascade'); // Foreign key ke 'arisan'
            $table->decimal('amount', 10, 2); // Jumlah transaksi
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_transactions');
    }
};
