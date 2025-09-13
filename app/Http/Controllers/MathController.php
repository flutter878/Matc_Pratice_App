<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MathController extends Controller
{
    public function index(Request $request)
    {
        $num1 = rand(1, 10);
        $num2 = rand(1, 10);
        $operators = ['+', '-', '*', '/'];
        $operator = $operators[array_rand($operators)];

        if ($operator == '/') {
            $num1 = $num1 * $num2;
        }

        $request->session()->put('num1', $num1);
        $request->session()->put('num2', $num2);
        $request->session()->put('operator', $operator);

        $score = $request->session()->get('score', 0);

        return view('math.index', compact('num1', 'num2', 'operator', 'score'));
    }

    public function checkAnswer(Request $request)
    {
        $num1 = $request->session()->get('num1');
        $num2 = $request->session()->get('num2');
        $operator = $request->session()->get('operator');

        $correctAnswer = 0;
        switch ($operator) {
            case '+':
                $correctAnswer = $num1 + $num2;
                break;
            case '-':
                $correctAnswer = $num1 - $num2;
                break;
            case '*':
                $correctAnswer = $num1 * $num2;
                break;
            case '/':
                $correctAnswer = $num1 / $num2;
                break;
        }

        $userAnswer = $request->input('answer');

        $score = $request->session()->get('score', 0);
        if ($userAnswer == $correctAnswer) {
            $score++;
            $message = "Benar! ";

            if ($score % 100 === 0) {
                $message .= " Ultimate Math Champion! 🌌🏅";
            } elseif ($score % 50 === 0) {
                $message .= " Math Grandmaster! 🧙‍♂️✨";
            } elseif ($score % 30 === 0) {
                $message .= " Legendary Math Hero! 👑⚡";
            } elseif ($score % 20 === 0) {
                $message .= " Master Matematika! 📚💡";
            } elseif ($score % 3 === 0) {
                $message .= " Hebat! Skor kelipatan 10! ";
            }

        } else {
            $message = "Salah! Jawaban benar adalah $correctAnswer.";
        }

        $request->session()->put('score', $score);

        return redirect()->route('math.index')->with('message', $message);
    }

    public function resetScore(Request $request)
    {
        $request->session()->forget('score');
        return redirect()->route('math.index')->with('message', 'Score telah direset.');
    }
}
