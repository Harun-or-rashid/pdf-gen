<?php
namespace ringku\PdfGenerator;

use Illuminate\Support\ServiceProvider;

class PdfGeneratorServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind('pdf-generator', function ($app) {
            return new PdfGenerator();
        });
    }

    public function boot(): void
    {
        // Publish configuration
        $this->publishes([
            __DIR__.'/../config/pdf_generator.php' => config_path('pdf_generator.php')
        ], 'config');

        // Load views
        $this->loadViewsFrom(__DIR__.'/../resources/views', 'pdf-generator');
    }
}
