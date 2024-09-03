<?php

use App\Models\Country;
use App\Models\Currency;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->string('role')->default('provider');


            $table->foreignIdFor(Country::class)->constrained();
            $table->string('inn')->unique()->nullable();
            $table->string('kpp')->unique()->nullable();
            $table->string('ogrn')->nullable();
            $table->string('okpo')->nullable();
            $table->date('date_registration')->nullable();
            $table->text('company_title')->nullable();
            $table->string('company_abbreviated_title')->nullable();
            $table->bigInteger('initial_capital')->nullable();
            $table->string('shared_phone')->nullable();
            $table->string('shared_email')->nullable();
            $table->string('site')->nullable();


            $table->smallInteger('mail_coincides_legal')->default(0);
            $table->string('mailbox')->nullable();
            $table->foreignId('mail_country_id')->nullable()->constrained('countries');
            $table->foreignId('mail_city_id')->nullable()->constrained('cities');
            $table->string('mail_index')->nullable();
            $table->string('mail_street')->nullable();
            $table->string('mail_home_number')->nullable();
            $table->string('mail_room_number')->nullable();


            $table->foreignId('legal_country_id')->nullable()->constrained('countries');
            $table->foreignId('legal_city_id')->nullable()->constrained('cities');
            $table->string('legal_index')->nullable();
            $table->string('legal_street')->nullable();
            $table->string('legal_home_number')->nullable();
            $table->string('legal_room_number')->nullable();


            $table->foreignId('bank_country_id')->nullable()->constrained('countries');
            $table->string('bank_bik_or_swift')->nullable();
            $table->string('bank_current_account')->nullable();
            $table->foreignIdFor(Currency::class)->nullable()->constrained();
            $table->string('bank_name')->nullable();
            $table->string('bank_corporate_account')->nullable();
            $table->string('bank_address')->nullable();
            $table->smallInteger('work_edo')->default(1);


            $table->string('last_name')->nullable();
            $table->string('name')->nullable();
            $table->string('patronymic')->nullable();
            $table->string('position')->nullable();
            $table->string('inn_physical_person')->nullable();
            $table->string('internal_phone')->nullable();
            $table->string('email')->unique();
//            $table->foreignIdFor(Language::class)->nullable()->constrained();
            $table->string('status')->default('moderation');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
