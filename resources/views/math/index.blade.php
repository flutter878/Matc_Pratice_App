<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Math Practice App</title>
    <!-- Tailwind CSS + Flowbite -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
</head>
<body class="min-h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('{{ asset('asset/foto.jpeg') }}');">
    <div class="w-full max-w-md bg-white bg-opacity-70 rounded-2xl shadow-xl p-6 backdrop-blur">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-xl font-bold text-indigo-600">🧮 Math Practice</h1>
            <form method="POST" action="{{ route('math.resetScore') }}">
                @csrf
                <button type="submit"
                    class="px-3 py-1.5 text-xs font-medium text-white bg-red-500 hover:bg-red-600 rounded-lg shadow transition">
                    Reset Score
                </button>
            </form>
        </div>

        <!-- Score Card -->
        <div class="mb-4">
            <div class="flex items-center justify-between mb-2">
                <span class="text-sm font-semibold text-gray-700">Score</span>
                <span class="text-sm font-bold text-indigo-600">{{ $score }}</span>
            </div>
        </div>

        <!-- Message -->
        @if(session('message'))
            <div class="mb-4 p-3 text-sm rounded-lg
                {{ str_contains(session('message'), 'Benar') 
                    ? 'bg-green-100 bg-opacity-70 text-green-700 border border-green-200' 
                    : 'bg-red-100 bg-opacity-70 text-red-700 border border-red-200' }}">
                {{ session('message') }}
            </div>
        @endif

        <!-- Soal -->
        <div class="bg-indigo-50 bg-opacity-70 border border-indigo-200 rounded-lg p-4 mb-4 text-center">
            <h2 class="text-lg font-medium text-gray-800">
                {{ $num1 }} {{ $operator }} {{ $num2 }} = ?
            </h2>
        </div>

        <!-- Form -->
        <form method="POST" action="{{ route('math.answer') }}" class="space-y-4">
            @csrf
            <div>
                <input type="number" name="answer"
                       class="block w-full p-3 text-gray-900 border border-gray-300 rounded-lg focus:ring-indigo-500 focus:border-indigo-500"
                       placeholder="Masukkan jawaban..." required>
            </div>

            <button type="submit"
                class="w-full text-white bg-indigo-600 hover:bg-indigo-700 focus:ring-4 focus:outline-none focus:ring-indigo-300 font-medium rounded-lg text-sm px-5 py-3 text-center shadow-md transition">
                Submit Jawaban
            </button>
        </form>
    </div>

    <!-- Flowbite JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>
</html>
