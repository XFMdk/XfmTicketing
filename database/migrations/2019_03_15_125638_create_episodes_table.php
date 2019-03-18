<?php

use App\Helpers\EpisodeStatus;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->integer('episode_number')->unsigned()->nullable();
            $table->bigInteger('radio_show_id')->unsigned();
            $table->string('description', 512)->nullable();
            $table->string('status')->default(EpisodeStatus::PLANNED);
            $table->timestamps();

            $table->foreign('radio_show_id')
                ->references('id')->on('radio_shows')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('episodes');
    }
}
