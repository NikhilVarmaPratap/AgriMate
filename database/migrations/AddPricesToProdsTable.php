<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPricesToProdsTable extends Migration
{
    public function up()
    {
        Schema::table('prods', function (Blueprint $table) {
            $table->decimal('market_price', 8, 2)->default(0)->after('product');
            $table->decimal('storage_price', 8, 2)->default(0)->after('market_price');
        });
    }

    public function down()
    {
        Schema::table('prods', function (Blueprint $table) {
            $table->dropColumn(['market_price', 'storage_price']);
        });
    }
}
