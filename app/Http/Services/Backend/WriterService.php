<?php

namespace App\Http\Services\Backend;

use App\Models\User;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class WriterService{
public function dataTable($request)
    {
        // $data = User::latest()->get(['uuid', 'name', 'slug']); // cara 1
        // $data = DB::table('categories')->latest()->get(['uuid', 'name', 'slug']); // cara 2

        if ($request->ajax()) {
            $totalData = User::count();
            $totalFiltered = $totalData;

            $limit = $request->length;
            $start = $request->start;

            if (empty($request->search['value'])) {
                $data = User::orderBy('id', 'DESC')
                    ->offset($start)
                    ->limit($limit)
                    ->get(['id', 'name', 'email', 'created_at', 'is_verified']); // Hapus uuid jika tidak ada
            } else {
                $search = $request->search['value'];
                // Filter data berdasarkan nama, slug, dll.
                $data = User::where('name', 'LIKE', "%{$search}%")
                    ->orWhere('slug', 'LIKE', "%{$search}%")
                    ->orderBy('id', 'DESC')
                    ->offset($start)
                    ->limit($limit)
                    ->get(['id', 'name', 'email', 'created_at', 'is_verified']);

                // Hitung total data yang difilter
                $totalFiltered = User::where('name', 'LIKE', "%{$search}%")
                    ->orWhere('slug', 'LIKE', "%{$search}%")
                    ->count();
            }

            return DataTables::of($data)
                ->addIndexColumn()
                ->setOffset($start)
                ->editColumn('created_at', function ($data) {
                    return date('d-m-Y H:i:s', strtotime($data->created_at));
                })
                ->editColumn('is_verified', function ($data) {
                    return $data->is_verified ? '<span class="badge bg-success">'.date('d-m-Y H:i:s', strtotime($data->is_verified)).'</span>' : '<span class="badge bg-danger">Unverified</span>';
                })
                ->addColumn('action', function ($data) {
                    return '
                        <div class="text-center" width="10%">
                            <div class="btn-group">
                                <button type="button" class="btn btn-sm btn-success" onclick="editData(this)" data-id="' . $data->id . '">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger" onclick="deleteData(this)" data-id="' . $data->id . '">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </div>
                        </div>
                    ';

                    return $actionBtn;
                })
                ->with([
                    'recordsTotal' => $totalData,
                    'recordsFiltered' => $totalFiltered,
                    'start' => $start
                ])
                ->rawColumns(['action', 'is_verified'])
                ->make();
        }

    }

    // public function getFirstBy(string $column, string $value)
    // {
    //     return User::where($column, $value)->firstOrFail();
    // }
}
