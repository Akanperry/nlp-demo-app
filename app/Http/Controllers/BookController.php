<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function createBook() {
        return view('upload.index');
    }

    public function storeBook(Request $request){
        if($request->get('upload-type') === "batch"){
            $validatedData = $request->validate([
                'batch_file' => ['required', 'file', 'mimes:xlsx,csv'],
            ]);

            $file = $request->file('batch_file');
            $extension = $file->extension();
            $fileContents = file($file->getPathname());
            $count = 0;
            $counter = 1;
            $errors = array();

            if($extension == "csv"){

                foreach ($fileContents as $line) {
                    if($count == 0){
                        $count++;
                        $counter++;
                        continue;
                    }
                    try {
                        $data = str_getcsv($line);
                        Log::info($data);
                        $path = Storage::disk('public')->putFileAs('files/books', new File($data[7]), $data[6]);
                        Book::create([
                            'book_name' => $data[0],
                            'authors' => $data[1],
                            'isbn_number' => $data[2],
                            'number_of_pages' => $data[3],
                            'publisher' => $data[4],
                            'year_published' => $data[5],
                            'file' => $path,
                        ]);

                        $count++;
                    } catch (\Throwable $th) {
                        Log::info($th->getMessage());
                        array_push($errors, $counter);
                    }
                    $counter++;
                }
            }else{
                // $reader = new Xlsx(); 
                // $spreadsheet = $reader->load($file); 
                // $worksheet = $spreadsheet->getActiveSheet();  
                // $worksheet_arr = $worksheet->toArray(); 
    
                // // Remove header row 
                // unset($worksheet_arr[0]);
                // $count++;

                // foreach ($worksheet_arr as $line) {

                //     try {
                        
                //         Log::info($line);
                //         // Book::create([
                //         //     'book_name' => $data[0],
                //         //     'authors' => $data[1],
                //         //     'isbn_number' => $data[2],
                //         //     'number_of_pages' => $data[3],
                //         //     'publisher' => $data[4],
                //         //     'year_published' => $data[5],
                //         //     'file' => $data[6],
                //         // ]);

                //         $count++;
                //     } catch (\Throwable $th) {
                //         Log::info($th->getMessage());
                //         // array_push($errors, $counter);
                //     }
                //     $counter++;
                // }
                return redirect(route('admin.upload'))->with('error', "Excel File formt not supported now!");
            }

            if(empty($errors)){
                return redirect(route('admin.upload'))->with('success', 'Batch upload successfull');
            } else{
                $falied_text = ($count-1)." Records upload. ".sizeof($errors)." failed. "."Failed Rows: ".implode(',', $errors);
                return redirect(route('admin.upload'))->with('error', $falied_text);
            }


        }elseif($request->get('upload-type') === "single") {
    
            $validatedData = $request->validate([
                'book_name' => ['required', 'string'],
                'authors' => ['required', 'string'],
                'isbn_number' => ['required', 'string', 'unique:books,isbn_number'],
                'number_of_pages' => ['required', 'int'],
                'publisher' => ['required', 'string'],
                'year_published' => ['required', 'string'],
                'book_file' => ['required', 'file', 'mimes:pdf'],
            ]);

            if(!$request->hasFile('book_file')){
                $book_file = "";
            } else {
                if($request->book_file->isValid()){
                    $book_file = $request->file('book_file')->storeAs('files/books', str_replace(' ', '-', trim($request->get('book_name'))).'.pdf', 'public');
                }else{
                    $book_file = "";
                }
            }
    
            Book::create([
                'book_name' => $request->get('book_name'),
                'authors' => $request->get('authors'),
                'isbn_number' => $request->get('isbn_number'),
                'number_of_pages' => $request->get('number_of_pages'),
                'publisher' => $request->get('publisher'),
                'year_published' => $request->get('year_published'),
                'file' => $book_file,
            ]);
            return redirect(route('admin.upload'))->with('success', 'Book uploaded successfully');
        }
        
    }
}
