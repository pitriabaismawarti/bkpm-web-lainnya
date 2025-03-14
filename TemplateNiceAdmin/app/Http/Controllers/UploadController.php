<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class UploadController extends Controller
{
    protected $imageManager;

    public function __construct()
    {
        // Gunakan driver GD untuk ImageManager
        $this->imageManager = new ImageManager(new Driver());
    }

    public function upload()
    {
        return view('upload');
    }

    public function proses_upload(Request $request)
    {
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'keterangan' => 'required',
        ]);

        $file = $request->file('file');
        $tujuan_upload = public_path('data_file');

        // Pastikan folder ada
        if (!File::exists($tujuan_upload)) {
            File::makeDirectory($tujuan_upload, 0777, true, true);
        }

        // Simpan file asli
        $file->move($tujuan_upload, $file->getClientOriginalName());

        return redirect()->route('upload')->with('success', 'File berhasil diupload!');
    }

    public function resize_upload(Request $request)
{
    $request->validate([
        'file' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        'keterangan' => 'required',
    ]);

    try {
        $path = public_path('img/logo');

        if (!File::exists($path)) {
            File::makeDirectory($path, 0777, true, true);
        }

        $file = $request->file('file');
        $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();

        // Resize gambar menggunakan ImageManager
        $image = $this->imageManager->read($file)->resize(200, 200);

        // Simpan gambar ke format PNG atau JPEG (sesuai format asli file)
        if ($file->getClientOriginalExtension() === 'png') {
            $image = $image->toPng();
        } else {
            $image = $image->toJpeg(90); // 90 = kualitas gambar
        }

        // Simpan file ke lokasi tujuan
        file_put_contents($path . '/' . $fileName, $image);

        return redirect()->route('upload')->with('success', 'Gambar berhasil diresize & diupload!');
    } catch (\Exception $e) {
        return redirect()->route('upload')->with('error', 'Gagal mengupload gambar! Error: ' . $e->getMessage());
    }
}

// acara 20
public function dropzone()
{
    return view('dropzone');
}

public function dropzone_store(Request $request)
{
    $image = $request->file('file');
    $imageName = time().'.'.$image->extension();
    $image->move(public_path('img/dropzone'), $imageName);
    return response()->json(['success'=> $imageName]);
}

public function pdf_upload()
{
    return view('pdf_upload');

}

public function pdf_store(Request $request)
{
    $pdf = $request->file('file');

    if ($pdf) {
        // Tentukan nama file
        $pdfName = 'pdf_' . time() . '.' . $pdf->extension();

        // Pindahkan ke folder public/pdf/dropzone
        $pdf->move(public_path('pdf/dropzone'), $pdfName);

        return response()->json(['success' => 'File berhasil diunggah!', 'file_name' => $pdfName]);
    }

    return response()->json(['error' => 'Gagal mengunggah file'], 400);
}

// End acara 20


}
