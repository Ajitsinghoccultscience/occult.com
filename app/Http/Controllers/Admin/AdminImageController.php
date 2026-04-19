<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminImageController extends Controller
{
    private string $uploadDir = 'uploads/landing-pages';

    public function index()
    {
        $disk   = public_path($this->uploadDir);
        $files  = [];

        if (is_dir($disk)) {
            foreach (scandir($disk) as $file) {
                if ($file === '.' || $file === '..') continue;
                $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                if (in_array($ext, ['jpg', 'jpeg', 'png', 'gif', 'webp', 'svg'])) {
                    $files[] = [
                        'name'     => $file,
                        'url'      => asset($this->uploadDir . '/' . $file),
                        'copy_url' => '/' . $this->uploadDir . '/' . $file,
                        'size'     => round(filesize($disk . '/' . $file) / 1024) . ' KB',
                    ];
                }
            }
        }

        // Newest first
        usort($files, fn($a, $b) => strcmp($b['name'], $a['name']));

        return view('admin.images.index', compact('files'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,webp,svg|max:5120',
        ]);

        $dir = public_path($this->uploadDir);
        if (! is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $file      = $request->file('image');
        $filename  = Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME))
                     . '-' . time()
                     . '.' . $file->getClientOriginalExtension();

        $file->move($dir, $filename);

        return back()->with('success', 'Image uploaded! Copy the URL below.')->with('uploaded_url', '/' . $this->uploadDir . '/' . $filename);
    }

    public function destroy(string $filename)
    {
        $path = public_path($this->uploadDir . '/' . basename($filename));
        if (file_exists($path)) {
            unlink($path);
        }
        return back()->with('success', 'Image deleted.');
    }
}
