<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;
use Image;

class UploadController extends Controller
{
    public function upload()
    {
        return view('upload');
    }

    public function proses_upload(Request $request)
    {
        // Validasi input
        $request->validate([
            'file' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
            'keterangan' => 'required',
        ]);

        // Ambil file yang diupload
        $file = $request->file('file');

        // Menampilkan informasi file
        echo 'File Name: ' . $file->getClientOriginalName() . '<br>';
        echo 'File Extension: ' . $file->getClientOriginalExtension() . '<br>';
        echo 'File Real Path: ' . $file->getRealPath() . '<br>';
        echo 'File Size: ' . $file->getSize() . ' bytes<br>';
        echo 'File Mime Type: ' . $file->getMimeType() . '<br>';

        // Tentukan folder tujuan upload
        $tujuan_upload = 'data_file';

        // Pindahkan file ke folder tujuan
        $file->move(public_path($tujuan_upload), $file->getClientOriginalName());

        return "File berhasil diupload ke folder: " . $tujuan_upload;
    }

    // public function resize_upload(Request $request)
    // {
    //     $this->validate($request, [
    //         'file' => 'required',
    //         'keterangan' => 'required',
    //     ]);
    
    //     // TENTUKAN PATH LOKASI UPLOAD
    //     $path = public_path('img/logo');
    
    //     // JIKA FOLDERNYA BELUM ADA
    //     if (!file_exists($path)) {
    //         // MAKA FOLDER TERSEBUT AKAN DIBUAT
    //         File::makeDirectory($path, 0777, true);
    //     }
    
    //     // MENGAMBIL FILE IMAGE DARI FORM
    //     $file = $request->file('file');
    
    //     // MEMBUAT NAMA FILE DARI GABUNGAN TANGGAL DAN UNIQID()
    //     $fileName = 'logo_' . uniqid() . '.' . $file->getClientOriginalExtension();
    
    //     // MEMBUAT CANVAS IMAGE SEBESAR DIMENSI
    //     $canvas = Image::canvas(200, 200);
    
    //     // RESIZE IMAGE SESUAI DIMENSI DENGAN MEMPERTAHANKAN RATIO
    //     $resizeImage = Image::make($file)->resize(null, 200, function($constraint) {
    //         $constraint->aspectRatio();
    //     });
    
    //     // MEMASUKKAN IMAGE YANG TELAH DIRESIZE KE DALAM CANVAS
    //     $canvas->insert($resizeImage, 'center');
    
    //     // SIMPAN IMAGE KE FOLDER
    //     if ($canvas->save($path . '/' . $fileName)) {
    //         return redirect(route('upload'))->with('success', 'Data berhasil ditambahkan!');
    //     } else {
    //         return redirect(route('upload'))->with('error', 'Data gagal ditambahkan!');
    //     }
    // }
    
}
