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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->integer('price');
            $table->string('material', 100);
            $table->date('manufactured');
            $table->timestamps();
        });
        DB::table('products')->insert(array('id'=>'1','name'=>'Dagadó','price'=>'3250','material'=>'Disznó','manufactured'=>'2021-03-23','created_at'=>'2022-02-11 18:58:07','updated_at'=>'2022-02-11 18:58:07'));
        DB::table('products')->insert(array('id'=>'2','name'=>'Oldalas','price'=>'2780','material'=>'Mangalica sertés','manufactured'=>'2021-05-11','created_at'=>'2022-02-11 18:58:07','updated_at'=>'2022-02-11 18:58:07'));
        DB::table('products')->insert(array('id'=>'3','name'=>'Csirkefarhát','price'=>'1150','material'=>'Csirke','manufactured'=>'2022-11-01','created_at'=>'2022-02-11 18:58:07','updated_at'=>'2022-02-11 18:58:07'));
        DB::table('products')->insert(array('id'=>'4','name'=>'Száraz kolbász','price'=>'5550','material'=>'Marha','manufactured'=>'2016-08-05','created_at'=>'2022-02-11 18:58:07','updated_at'=>'2022-02-11 18:58:07'));
        DB::table('products')->insert(array('id'=>'5','name'=>'Paprikás kolbász','price'=>'5250','material'=>'Marha','manufactured'=>'2018-09-14','created_at'=>'2022-02-11 18:58:07','updated_at'=>'2022-02-11 18:58:07'));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }

};
