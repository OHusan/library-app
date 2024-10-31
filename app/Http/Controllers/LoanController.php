<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Http\Requests\UpdateLoanRequest;
use App\Models\Loan;

class LoanController extends Controller
{
    public function store(StoreLoanRequest $request)
    {
        $attributes = $request->validate([
            'book_id' => ['required'],
            'user_id' => ['required'],
            'loaned_at' => ['required'],
            'due_date' => ['required', 'date', 'after_or_equal:loaned_at'],
        ]);

        Loan::create($attributes);

        return redirect('/');
    }

    public function show(Loan $loan) {
        $books = Loan::query()->where('user_id', auth()->user()->id)->get();

        return view('my-loans', compact('books', 'loan'));
    }
}
