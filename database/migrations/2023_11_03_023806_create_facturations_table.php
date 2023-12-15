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
        Schema::create('facturations', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->nullable();
            $table->string('code')->nullable();
            $table->string('etat')->nullable()->default('actif');
            $table->enum('statut', ['reccording', 'good_pay', 'payed', 'cancel'])->default('reccording');
            $table->string('numFacture')->nullable();
            $table->date('date_paiement')->nullable();
            $table->string('typeFacture')->nullable();

            $table->string('transitaire_uuid')->nullable();
            $table->integer('montantHtDouane')->nullable(); // Rubrique Douane
            $table->integer('tvaDouane')->nullable();
            $table->integer('montantTtcDouane')->nullable();
            $table->integer('montantHtAmat')->nullable(); // Rubrique Amatteur
            $table->integer('tvaAmat')->nullable();
            $table->integer('montantTtcAmat')->nullable();
            $table->integer('montantHtAccor')->nullable(); // Rubrique Accordier
            $table->integer('tvaAccor')->nullable();
            $table->integer('montantTtcAccor')->nullable();
            $table->integer('montantHtPres')->nullable(); // Rubrique Prestation
            $table->integer('tvaPres')->nullable();
            $table->integer('montantTtcPres')->nullable();
            $table->integer('montantHtAutre')->nullable(); // Rubrique Autres
            $table->integer('tvaAutre')->nullable();
            $table->integer('montantTtcAutre')->nullable();

            $table->integer('montantTotalHtTransit')->nullable()->default(0);
            $table->integer('montantTotalTtcTransit')->nullable()->default(0);
            $table->integer('TotalTvaTransit')->nullable()->default(0);

            $table->string('transporteur_uuid')->nullable();
            $table->integer('montantHtTpPres')->nullable(); //Rubrique prestation transporteur
            $table->integer('tvaTpPres')->nullable();
            $table->integer('montantTtcTpPres')->nullable();
            $table->integer('montantHtTpAutr')->nullable();
            $table->integer('tvaTpAutr')->nullable();
            $table->integer('montantTtcTpAutr')->nullable()->default(0);

            $table->integer('montantTotalHtTransport')->nullable()->default(0);
            $table->integer('montantTotalTtcTransport')->nullable()->default(0);
            $table->integer('TotalTvaTransport')->nullable()->default(0);

            $table->string('facture_original')->nullable();

            $table->string('num_blTransit')->nullable();
            $table->string('file_BlTransit')->nullable();
            $table->string('num_blTransport')->nullable();
            $table->string('file_BlTransport')->nullable();

            $table->string('user_create')->nullable();
            $table->string('user_payed')->nullable();
            $table->longText('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facturations');
    }
};
