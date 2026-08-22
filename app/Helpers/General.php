<?php

/**
 * Get a site setting value, locale-aware.
 * For URLs / numbers / paths, locale is ignored (returns value_ar).
 */
function sett(string $key, ?string $locale = null): string
{
    return \App\Models\SiteSetting::val($key, $locale);
}

/**
 * Get raw (non-localized) site setting value — for URLs, paths, numbers.
 */
function sett_raw(string $key): string
{
    return \App\Models\SiteSetting::raw($key);
}

/**
 * Save an uploaded photo/file into assets/uploads and return its full public URL
 * (e.g. http://host/assets/uploads/xxx.jpg), ready to store straight in the DB.
 */
function uploadImage($image, string $folder = 'assets/uploads'): string
{
    $extension = strtolower($image->getClientOriginalExtension());

    // generate unique name with timestamp + random string
    $filename = uniqid() . '_' . time() . '.' . $extension;

    $destination = base_path($folder);
    if (! is_dir($destination)) {
        mkdir($destination, 0755, true);
    }

    $image->move($destination, $filename);

    return asset($folder . '/' . $filename);
}

/**
 * Delete a previously uploaded file given its full public URL (as returned by uploadImage()).
 */
function deleteUploadedImage(?string $url, string $folder = 'assets/uploads'): void
{
    if (! $url) {
        return;
    }

    $filename = basename(parse_url($url, PHP_URL_PATH));
    $path     = base_path($folder . '/' . $filename);

    if (is_file($path)) {
        unlink($path);
    }
}




