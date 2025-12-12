<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class ConvertImgToWebp extends Command
{
    protected $signature = 'img:convert-webp';
    protected $description = 'Convert all JPG/PNG images in public/img to WEBP';

    public function handle()
    {
        $directory = public_path('img');
        $files = File::allFiles($directory);

        foreach ($files as $file) {
            $ext = strtolower($file->getExtension());

            // hanya convert JPG/JPEG/PNG
            if (!in_array($ext, ['jpg', 'jpeg', 'png'])) {
                continue;
            }

            $originalPath = $file->getRealPath();
            $newPath = $file->getPath() . '/' . $file->getFilenameWithoutExtension() . '.webp';

            // Skip jika sudah ada WEBP dengan nama sama
            if (File::exists($newPath)) {
                $this->info("SKIPPED (already exists): " . $file->getFilename());
                continue;
            }

            // Convert
            $img = Image::make($originalPath)->encode('webp', 80);
            $img->save($newPath);

            $this->info("Converted: " . $file->getFilename());
        }

        $this->info("✔ Semua gambar berhasil dikonversi ke WEBP!");
    }
}
