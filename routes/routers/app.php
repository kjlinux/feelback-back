<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TestDataController;
use App\Http\Controllers\Api\DashboardController;

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

Route::prefix('dashboard')->middleware(['auth:api'])->group(function () {

    // 📊 Statistiques globales (KPI Cards + Gauge)
    Route::get('/global-stats', [DashboardController::class, 'getGlobalStatistics']);

    // 📈 Tendances temporelles (Line Chart)
    Route::get('/trends', [DashboardController::class, 'getTemporalTrends']);

    // 📱 Performance des dispositifs (Bar Chart + Table)
    Route::get('/devices', [DashboardController::class, 'getDevicePerformance']);

    // ⏰ Patterns horaires (Column Chart)
    Route::get('/hourly-patterns', [DashboardController::class, 'getHourlyPatterns']);

    // 🎯 Distribution des sentiments (Pie Chart)
    Route::get('/sentiment-distribution', [DashboardController::class, 'getSentimentDistribution']);

    // 🚨 Alertes (Alert Cards)
    Route::get('/alerts', [DashboardController::class, 'getAlerts']);

    // 📊 Dashboard complet (tous les insights)
    Route::get('/complete', [DashboardController::class, 'getDashboardData']);
});
