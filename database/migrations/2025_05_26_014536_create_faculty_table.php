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
        DB::statement('CREATE TABLE faculty(
            id INT PRIMARY KEY AUTO_INCREMENT,
            college_id INT,
            department_id INT,
            code VARCHAR(100) UNIQUE,
            first_name VARCHAR(255)  NOT NULL,
            middle_name VARCHAR(255) ,
            last_name VARCHAR(255) NOT NULL,
            suffix VARCHAR(255) NOT NULL,
            email VARCHAR(100) UNIQUE,
            academic_ran_id INT,  
            designation_id INT,
            faculty_type_id INT,
            is_active BOOL DEFAULT 1,
            release_time ENUM("Without Release Time", "With Release Time"),
	        hours_per_week INT ,
            subject_id INT,
            date_created DATETIME DEFAULT CURRENT_TIMESTAMP,
            date_updated DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        );');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faculty');
    }
};
