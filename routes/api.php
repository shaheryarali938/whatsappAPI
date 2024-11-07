use App\Http\Controllers\ChatroomController;
use App\Http\Controllers\MessageController;

Route::post('/chatrooms', [ChatroomController::class, 'create']);
Route::get('/chatrooms', [ChatroomController::class, 'index']);
Route::post('/chatrooms/{id}/enter', [ChatroomController::class, 'enter']);
Route::post('/chatrooms/{id}/leave', [ChatroomController::class, 'leave']);
Route::post('/chatrooms/{chatroomId}/messages', [MessageController::class, 'send']);
Route::get('/chatrooms/{chatroomId}/messages', [MessageController::class, 'index']);
