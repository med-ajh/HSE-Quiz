<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('quiz_id'); // Foreign key to quizzes table
            $table->text('question_text'); // The question text
            $table->string('option_a'); // Option A
            $table->string('option_b'); // Option B
            $table->string('option_c'); // Option C
            $table->char('correct_option', 1); // Correct option (A, B, or C)
            $table->string('image')->nullable(); // Video URL (optional)
            $table->timestamps();

            // Foreign key constraint
            $table->foreign('quiz_id')->references('id')->on('quizzes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
