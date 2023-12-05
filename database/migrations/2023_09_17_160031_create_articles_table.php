<?php

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
        Schema::create('articles', function (Blueprint $table) {
            $table->id();

            $table->uuid('uuid')->index();
            $table->string('code')->nullable();
            $table->string('numero_bon_commande')->nullable();
            $table->string('numero_serie')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();

            $table->string('marque_uuid')->nullable();
            $table->string('categorie_uuid')->nullable();
            $table->string('model_uuid')->nullable();
            $table->string('famille_uuid')->nullable();
            $table->string('source_uuid')->nullable();
            $table->string('entrepot_uuid')->nullable();
            $table->enum('status', ['enFabrication', 'sortiUsine', 'enExpedition', 'arriverAuPod', 'stocked', 'expEnCours', 'delivered'])->default("enFabrication");
            $table->enum('packaging', ['roro', 'container'])->nullable();
            $table->integer('poid_tonne')->nullable();
            $table->integer('hauteur')->nullable();
            $table->integer('largeur')->nullable();
            $table->integer('volume')->nullable();
            $table->integer('longueur')->nullable();
            $table->string('price_unitaire')->nullable();
            $table->string('is_AddSourcing')->default('false');

            $table->string('etat')->default('actif');
            $table->timestamps();
        });
    }

    // $table->string('status')->default('enUsine')->nullable(); // enUsine, sourcer, waitLivraison, received,awaitingShipment,waitExpedite,delivered

    /**
     *
     *$table->string('local_machine')->default('enFabrication')->nullable(); // enFabrication, sortiUsine, enExpedition ,arriverAuPod,expedier
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
