<?php

use Illuminate\Support\Facades\File;


// Handle file upload with size reduction
function handleUpload($inputName, $model = null)
{
    try {
        if (request()->hasFile($inputName)) {
            if ($model && File::exists(public_path($model->$inputName))) {
                File::delete(public_path($model->$inputName));
            }

            $file = request()->file($inputName);
            $maxSizeKB = 2048; // Maximum size in KB
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('/uploads');
            $filePath = '/uploads/' . $fileName;

            // Check file size (in KB)
            $fileSizeKB = $file->getSize() / 1024;

            if ($fileSizeKB > $maxSizeKB) {
                // Load the image based on its type
                $extension = strtolower($file->getClientOriginalExtension());
                $image = null;

                switch ($extension) {
                    case 'jpg':
                    case 'jpeg':
                        $image = imagecreatefromjpeg($file->getRealPath());
                        break;
                    case 'png':
                        $image = imagecreatefrompng($file->getRealPath());
                        break;
                    case 'gif':
                        $image = imagecreatefromgif($file->getRealPath());
                        break;
                    case 'webp':
                        $image = imagecreatefromwebp($file->getRealPath());
                        break;
                    default:
                        throw new \Exception('Unsupported image format');
                }

                // Calculate quality to achieve target size
                $quality = 90; // Start with high quality
                $tempFile = tempnam(sys_get_temp_dir(), 'img');

                do {
                    // Save the image with current quality
                    switch ($extension) {
                        case 'jpg':
                        case 'jpeg':
                            imagejpeg($image, $tempFile, $quality);
                            break;
                        case 'png':
                            // PNG compression (0-9, where 9 is max compression)
                            imagepng($image, $tempFile, round($quality / 10));
                            break;
                        case 'gif':
                            imagegif($image, $tempFile);
                            break;
                    }

                    $newSizeKB = filesize($tempFile) / 1024;
                    $quality -= 5; // Reduce quality incrementally

                    // Break if quality is too low or size is acceptable
                    if ($quality < 10 || $newSizeKB <= $maxSizeKB) {
                        break;
                    }
                } while ($newSizeKB > $maxSizeKB);

                // Move the compressed file to the destination
                File::move($tempFile, $destinationPath . '/' . $fileName);

                // Free up memory
                imagedestroy($image);
            } else {
                // If file size is within limit, move it directly
                $file->move($destinationPath, $fileName);
            }

            return $filePath;
        }
    } catch (\Exception $e) {
        throw $e;
    }
}

// function handleUpload($inputName, $model = null)
// {
//     try {
//         if (request()->hasFile($inputName)) {
//             if ($model && File::exists(public_path($model->$inputName))) {
//                 File::delete(public_path($model->$inputName));
//             }

//             $file = request()->file($inputName);
//             $fileName = time() . '.' . $file->getClientOriginalName();
//             $file->move(public_path('/uploads'), $fileName);

//             $filePath = '/uploads/' . $fileName;
//             return $filePath;
//         }
//     } catch (\Exception $e) {
//         throw $e;
//     }
// }

function getColor($index){
    $colors = [
        '#558bff',
        '#fecc90',
        '#ff885e',
        '#282828',
        '#190844',
        '#9dd3ff',
    ];

    return $colors[$index % count($colors)];
}


// Set sidebar active
function setSidebarActive($route)
{
    if (is_array($route)) {
        foreach ($route as $r) {
            if (request()->routeIs($r)) {
                return 'active';
            }
        }
    } else {
        if (request()->routeIs($route)) {
            return 'active';
        }
    }

    return '';
}

