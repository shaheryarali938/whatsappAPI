Schema::create('chatrooms', function (Blueprint $table) {
    $table->id();
    $table->string('name');
    $table->integer('max_members')->default(50);
    $table->timestamps();
});
