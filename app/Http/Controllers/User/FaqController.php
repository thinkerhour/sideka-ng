<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Tampilkan halaman detail FAQ.
     */
    public function show($id = null)
    {
        $faqs = Faq::all();
        $selectedFaq = $id ? Faq::find($id) : $faqs->first();

        return view('user.faq.show', [
            'faqs'        => $faqs,
            'selectedFaq' => $selectedFaq,
        ]);
    }

    /**
     * Endpoint API pencarian FAQ untuk autocomplete & suggestion (AJAX).
     */
    public function search(Request $request)
    {
        $query = trim($request->input('q', ''));

        if (empty($query)) {
            return response()->json([]);
        }

        $results = Faq::where('pertanyaan', 'LIKE', '%' . $query . '%')
            ->orWhere('jawaban', 'LIKE', '%' . $query . '%')
            ->get(['id_faq', 'pertanyaan as q', 'jawaban as a']);

        return response()->json($results);
    }
}

