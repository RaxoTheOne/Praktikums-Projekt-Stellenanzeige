<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
	public function up(): void
	{
		Schema::table('job_listings', function (Blueprint $table) {
			$table->foreign('company_id')->references('id')->on('companies')->cascadeOnDelete();
		});

		Schema::create('category_job_listing', function (Blueprint $table) {
			$table->id();
			$table->foreignId('job_listing_id')->constrained('job_listings')->cascadeOnDelete();
			$table->foreignId('category_id')->constrained('categories')->cascadeOnDelete();
			$table->timestamps();
			$table->unique(['job_listing_id', 'category_id']);
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('category_job_listing');
		Schema::table('job_listings', function (Blueprint $table) {
			$table->dropForeign(['company_id']);
		});
	}
};
