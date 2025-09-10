<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
    Schema::create('umscs', function (Blueprint $table) {
        $table->id();
        $table->string('healthCenter');
        $table->string('month');
        $table->integer('year');
        $table->json('people')->nullable();
        $table->json('times')->nullable();
        $table->json('linePeople')->nullable();
        $table->json('lineTimes')->nullable();
        $table->string('othersSpecify')->nullable();
        $table->string('lineOthersSpecify')->nullable();
        $table->string('reporterName');
        $table->string('reporterPosition');
        $table->string('reporterPhone');
        $table->timestamps();
    });
}

    
    
};
