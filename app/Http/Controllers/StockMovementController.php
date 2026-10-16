<?php
namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\StockMovement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class StockMovementController extends Controller
{
    public function index()
    {
        $movements = StockMovement::with(['product', 'user'])
            ->latest()
            ->paginate(10);

        return view('stock-movements.index', compact('movements'));
    }

    public function create()
    {
        $products = Product::orderBy('name')->get();

        return view('stock-movements.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'type' => 'required|in:in,out',
            'quantity' => 'required|integer|min:1',
            'notes' => 'nullable|string|max:1000',
        ]);

        DB::transaction(function () use ($data) {
            $product = Product::whereKey($data['product_id'])
                ->lockForUpdate()
                ->firstOrFail();

            if ($data['type'] === 'out' && $product->stock < $data['quantity']) {
                throw ValidationException::withMessages([
                    'quantity' => 'Stok tidak mencukupi. Stok tersedia: ' . $product->stock,
                ]);
            }

            if ($data['type'] === 'in') {
                $product->increment('stock', $data['quantity']);
            } else {
                $product->decrement('stock', $data['quantity']);
            }

            StockMovement::create([
                'product_id' => $product->id,
                'type' => $data['type'],
                'quantity' => $data['quantity'],
                'notes' => $data['notes'] ?? null,
                'user_id' => null,
            ]);
        });

        return redirect()->route('stock-movements.index')
            ->with('success', 'Pergerakan stok berhasil dicatat.');
    }
}