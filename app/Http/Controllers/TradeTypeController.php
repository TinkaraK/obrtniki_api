<?php

namespace App\Http\Controllers;

use App\Models\TradeType;
use Illuminate\Http\Request;

class TradeTypeController extends Controller
{
    public function index() {
        $types = TradeType::all();
        return response($types, 200);
    }

    public function show(Request $request, $id) {
        $type = TradeType::find($id);
        return response($type, 200);
    }
}
