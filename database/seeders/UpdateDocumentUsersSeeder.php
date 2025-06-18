<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Document;

class UpdateDocumentUsersSeeder extends Seeder
{
    public function run()
    {
        Document::whereNull('user_id')->each(function ($document) {
            $document->update([
                'user_id' => $document->application->user_id
            ]);
        });
    }
}