<?php

namespace App\Http\Controllers\Backend;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\WriterRequest;
use App\Http\Services\Backend\WriterService;

class WriterController extends Controller
{
    public function __construct(private WriterService $writerService){
        $this->middleware('owner');
    }

    public function index(): View
    {
        return view('backend.writers.index');
    }

    public function update(WriterRequest $request, string $id)
{
    $data = $request->validated();

    $getData = $this->writerService->getFirstBy('id', $id);

    try {
        $this->writerService->update($data, $getData->id);

        return response()->json([
            'message' => 'Penulis berhasil diubah'
        ]);
    } catch (\Exception $error) {
        return response()->json([
            'message' => $error->getMessage()
        ], 500);
    }
}


    public function serverside(Request $request): JsonResponse
    {
        return $this->writerService->dataTable($request);
    }
}
