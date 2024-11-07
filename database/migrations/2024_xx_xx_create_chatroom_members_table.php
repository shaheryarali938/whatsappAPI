Schema::create('chatroom_members', function (Blueprint $table) {
    $table->id();
    $table->foreignId('chatroom_id')->constrained()->onDelete('cascade');
    $table->foreignId('user_id')->constrained()->onDelete('cascade');
    $table->timestamps();
});
