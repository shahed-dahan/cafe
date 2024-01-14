<?php
use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;
   

   class CreateTableReservationsTable extends Migration

   {
    
       public function up()
       {
           Schema::create('table_reservations', function (Blueprint $table) {
               $table->id();
               $table->string('customer_name');
               $table->dateTime('reservation_datetime');
               $table->integer('num_of_guests');
               $table->timestamps();
           });
       }

       public function down()
       {
           Schema::dropIfExists('table_reservations');
       }
   }