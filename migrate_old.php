<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     *  Execute migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('authkey');
            $table->dateTime('date_create');
            $table->dateTime('date_update');
            $table->timestamps();
        });
    }

    /**
     * Abort migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}

class CreatePowerbanksTable extends Migration
{
    /**
     *  Execute migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('powerbanks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('company_id');
            $table->string('number');            
            $table->string('advert');
            $table->dateTime('created');
            $table->integer('use_status');
            $table->timestamps();
        });
    }

    /**
     * Abort migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('powerbanks');
    }
}

class CreatePointsTable extends Migration
{
    /**
     *  Execute migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('address_id');
            $table->timestamps();
        });
    }

    /**
     * Abort migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('points');
    }
}

class CreateAddressTable extends Migration
{
    /**
     *  Execute migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address', function (Blueprint $table) {
            $table->increments('id');
            $table->string('region_id');
            $table->string('city_id');
            $table->string('street');
            $table->string('house');
            $table->string('geo_x');
            $table->string('geo_y');
            $table->timestamps();
        });
    }

    /**
     * Abort migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('address');
    }
}

class CreateAdvertTable extends Migration
{
    /**
     *  Execute migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advert', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->timestamps();
        });
    }

    /**
     * Abort migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('advert');
    }
}

class CreateUsersMetaTable extends Migration
{
    /**
     *  Execute migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid');
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });
    }

    /**
     * Abort migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users_meta');
    }
}

class CreatePowerbanksMetaTable extends Migration
{
    /**
     *  Execute migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('powerbanks_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid');
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });
    }

    /**
     * Abort migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('powerbanks_meta');
    }
}

class CreatePointsMetaTable extends Migration
{
    /**
     *  Execute migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid');
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });
    }

    /**
     * Abort migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('points_meta');
    }
}

class CreateAddressMetaTable extends Migration
{
    /**
     *  Execute migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid');
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });
    }

    /**
     * Abort migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('address_meta');
    }
}

class CreateAdvertMetaTable extends Migration
{
    /**
     *  Execute migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advert_meta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pid');
            $table->string('name');
            $table->string('value');
            $table->timestamps();
        });
    }

    /**
     * Abort migration.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('advert_meta');
    }
}