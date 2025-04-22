<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreToolRequest;
use App\Http\Resources\ToolResource;
use App\Models\Tag;
use App\Models\Tool;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreToolRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $tool = Tool::create($validated);

        if (!empty($validated['tags'])) {
            $tool->tags()->attach(Tag::getOrCreateIds($validated['tags']));
        }

        return response()->json([
            'message' => 'Ferramenta cadastrada com sucesso.',
            'data' => new ToolResource($tool),
        ], 201);
    }
}
