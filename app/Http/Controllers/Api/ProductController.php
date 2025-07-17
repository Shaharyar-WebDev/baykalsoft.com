<?php

namespace App\Http\Controllers\Api;

use PDO;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $q = $request->input('search');
        $perPage = $request->input('perPage', 10);
        $sortBy = $request->input('sortBy', '');
        $sortDir = $request->input('sortDir', 'asc');
        $page = $request->input('page');

        // Map of frontend field names to DB column aliases
        $sortableColumns = [
            'Stok Kodu' => 'I.CODE',
            'Stok Adı' => 'I.NAME',
            'Özel Kod' => 'I.SPECODE',
            'Şube Kodu' => 'I.CYPHCODE',
            'Stok Grup Kodu' => 'I.STGRPCODE',
            'Üretici Kodu' => 'I.PRODUCERCODE',
            'Birim Seti Ref' => 'I.UNITSETREF',
            'Mevcut Adet' => DB::raw("ISNULL(SUM(CASE
            WHEN S.TRCODE IN (1, 13, 50) THEN S.AMOUNT
            WHEN S.TRCODE IN (2, 14, 51) THEN -S.AMOUNT
            ELSE 0
        END), 0)")
        ];

        $searchableColumns = [
            'I.CODE',
            'I.NAME',
            'I.SPECODE',
            'I.CYPHCODE',
            'I.STGRPCODE',
            'I.PRODUCERCODE',
        ];


        $query = DB::connection('sqlsrv')
            ->table('LG_001_ITEMS as I')
            ->leftJoin('LG_001_01_STLINE as S', 'I.LOGICALREF', '=', 'S.STOCKREF')
            ->selectRaw("
            I.CODE              AS [Stok Kodu],
            I.NAME              AS [Stok Adı],
            I.SPECODE           AS [Özel Kod],
            I.CYPHCODE          AS [Şube Kodu],
            I.STGRPCODE         AS [Stok Grup Kodu],
            I.PRODUCERCODE      AS [Üretici Kodu],
            I.UNITSETREF        AS [Birim Seti Ref],
            ISNULL(SUM(CASE
                WHEN S.TRCODE IN (1, 13, 50) THEN S.AMOUNT
                WHEN S.TRCODE IN (2, 14, 51) THEN -S.AMOUNT
                ELSE 0
            END), 0) AS [Mevcut Adet]
        ")
            ->where('I.CARDTYPE', 1)
            ->where(function ($query) {
                $query->where('S.LINETYPE', 0)
                    ->orWhereNull('S.LINETYPE');
            })
            ->groupBy(
                'I.CODE',
                'I.NAME',
                'I.SPECODE',
                'I.CYPHCODE',
                'I.STGRPCODE',
                'I.PRODUCERCODE',
                'I.UNITSETREF'
            );

        if ($q) {
            $query->where(function ($subQuery) use ($q, $searchableColumns) {
                foreach ($searchableColumns as $column) {
                    $subQuery->orWhere($column, 'LIKE', '%' . $q . '%');
                }
            });
        }


        if (array_key_exists($sortBy, $sortableColumns)) {
            if ($sortBy === 'Mevcut Adet') {
                $query->orderByRaw("[Mevcut Adet] " . ($sortDir === 'desc' ? 'DESC' : 'ASC'));
            } else {
                $query->orderBy($sortableColumns[$sortBy], $sortDir === 'desc' ? 'desc' : 'asc');
            }
        };

        $cacheKey = 'products:' . md5(json_encode([
            'search'  => $q,
            'sortBy'  => $sortBy,
            'sortDir' => $sortDir,
            'perPage' => $perPage,
            'page'    => $page,
        ]));


        $rows = Cache::remember($cacheKey, '3600', function () use ($query, $perPage) {
            return $query->paginate($perPage);
        });


        if ($rows->isEmpty()) {
            return response()->json([
                'message' => 'No rows found',
                'data' => [
                    'data' => [],
                    'from' => 0,
                    'to' => 0,
                    'total' => 0,
                    'links' => []
                ]
            ]);
        }

        return response()->json([
            'message' => 'Fetched successfully',
            'data' =>  $rows,
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
