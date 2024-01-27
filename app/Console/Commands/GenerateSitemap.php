<?php

namespace App\Console\Commands;

use App\Models\Game;
use Illuminate\Console\Command;
use Spatie\Sitemap\SitemapGenerator;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;

class GenerateSitemap extends Command
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate the sitemap.';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $postsitmap = Sitemap::create();
        Game::get()->each(function (Game $post) use ($postsitmap) {
            $postsitmap->add(
                Url::create("/{$post->slug}")
                    ->setPriority(0.9)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_DAILY)
            );
        });
        $sitemapUrl = $postsitmap->writeToFile(public_path('sitemap.xml'));
     
    }
}