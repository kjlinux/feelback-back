<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TestDataController;

Route::prefix('test-data')->group(function () {
    // Génération automatique de données simulées
    Route::post('/generate', [TestDataController::class, 'generateTestData']);

    // Ajouter manuellement un feedback
    Route::post('/feedback/manual', [TestDataController::class, 'addManualFeedback']);

    // Obtenir la liste des devices pour les tests
    Route::get('/devices', [TestDataController::class, 'getDevicesForTesting']);

    // Obtenir des exemples de configuration
    Route::get('/examples', [TestDataController::class, 'getConfigurationExamples']);

    // Nettoyer les données de test
    Route::delete('/clean', [TestDataController::class, 'cleanTestData']);
});
