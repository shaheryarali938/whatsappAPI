Schema::create('messages', function (Blueprint $table) {
    $table->id();
    $table->foreignId('chatroom_id')->constrained()->onDelete('cascade');
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->text('content')->nullable();
    $table->string('attachment')->nullable();
    $table->timestamps();
});
