@extends('layouts.empty')

@section('title', 'Questionnaire')

@push('styles')
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="bg-gradient-to-br from-gray-50 to-gray-100 flex justify-center items-center min-h-screen w-full py-10">
    <div class="w-full max-w-2xl mx-auto animate-fade-in">
        <!-- Progress bar -->
        <div class="px-6 sm:px-0 mb-8">
            <div class="flex justify-between items-center mb-2">
                <span class="text-sm font-medium text-gray-500">Question {{ $step }} of {{ $totalSteps }}</span>
                <span class="text-sm font-medium text-red-500">{{ floor(($step / $totalSteps) * 100) }}% completed</span>
            </div>
            <div class="w-full bg-gray-200 rounded-full h-1.5">
                <div class="bg-gradient-to-r from-red-500 to-red-400 h-1.5 rounded-full transition-all duration-300 ease-in-out" style="width: {{ ($step / $totalSteps) * 100 }}%"></div>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
            <!-- Question header -->
            <div class="px-8 pt-8 pb-6 border-b border-gray-100">
                <h1 class="font-bold text-2xl text-gray-800 mb-3">{{ $question['question'] }}</h1>
                <p class="text-lg text-gray-600">{{ $question['sub_question'] }}</p>
            </div>

            <form method="POST" action="{{ route('questionnaire.store', $step) }}" class="p-8">
                @csrf

                <!-- Standard radio options (steps 1-4) -->
                @if($step != 5 && $step != 6)
                <div class="space-y-3">
                    @foreach ($question['options'] as $index => $option)
                    <label class="flex items-center p-4 border border-gray-200 rounded-xl cursor-pointer transition-all hover:border-red-200 hover:bg-red-50/30 relative">
                        <div class="relative flex items-center">
                            <input
                                type="radio"
                                name="answer"
                                id="option-{{ $index }}"
                                value="{{ $option['value'] }}"
                                class="h-5 w-5 cursor-pointer accent-primary   transition-all"
                                @if ($userAnswer == $option['value']) checked @endif
                            <span class="absolute bg-slate-800 w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></span>
                        </div>
                        <span class="text-lg font-medium text-gray-700 ml-4">{!! $option['answer'] !!}</span>
                    </label>
                    @endforeach
                </div>
                @endif

                <!-- Weight & Height inputs (step 5) -->
                @if ($step == 5)
                <div class="space-y-6">
                    <div class="space-y-2 max-w-md w-1/2">
                        <label for="weight" class="block text-sm font-medium text-gray-700">
                            Weight
                        </label>
                        <div class="flex items-center">
                            <div class="flex-grow">
                                <input
                                    id="weight"
                                    name="answer[]"
                                    type="number"
                                    value="{{ $weight ?? '' }}"
                                    required
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition-all">
                            </div>
                            <div class="ml-2">
                                <span class="text-gray-500">KG</span>
                            </div>
                        </div>
                        @error('weight')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="space-y-2 max-w-md w-1/2">
                        <label for="height" class="block text-sm font-medium text-gray-700">
                            Height
                        </label>
                        <div class="flex items-center">
                            <div class="flex-grow">
                                <input
                                    id="height"
                                    name="answer[]"
                                    type="number"
                                    value="{{ $height ?? '' }}"
                                    required
                                    class="block w-full px-4 py-3 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition-all">
                            </div>
                            <div class="ml-2">
                                <span class="text-gray-500">CM</span>
                            </div>
                        </div>
                        @error('height')
                        <p class="mt-2 text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                @endif

                <!-- Date of Birth inputs (step 6) -->
                @if($step == 6)
                <div class="space-y-3">
                    <label class="block text-sm font-medium text-gray-700 mb-2">Date of Birth</label>
                    <div class="grid grid-cols-3 gap-3">
                        <div class="relative">
                            <input
                                type="number"
                                name="answer[]"
                                placeholder="DD"
                                maxlength="2"
                                min="1"
                                max="31"
                                value="{{ $day ?? '' }}"
                                class="block w-full px-4 py-3 text-center border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition-all">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            </div>
                        </div>
                        <div class="relative">
                            <input
                                type="number"
                                name="answer[]"
                                placeholder="MM"
                                maxlength="2"
                                min="1"
                                max="12"
                                value="{{ $month ?? '' }}"
                                class="block w-full px-4 py-3 text-center border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition-all">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            </div>
                        </div>
                        <div class="relative">
                            <input
                                type="number"
                                name="answer[]"
                                placeholder="YYYY"
                                maxlength="4"
                                min="1900"
                                max="2023"
                                value="{{ $year ?? '' }}"
                                class="block w-full px-4 py-3 text-center border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-red-500/20 focus:border-red-500 transition-all">
                            <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Navigation buttons -->
                <div class="flex justify-between mt-10 pt-6 border-t border-gray-100">
                    @if ($step > 1)
                    <a href="{{ route('questionnaire.show', $step - 1) }}"
                        class="flex items-center px-6 py-3 bg-white border border-gray-200 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                        Previous
                    </a>
                    @else
                    <div></div>
                    @endif

                    <button type="submit"
                        class="flex items-center px-8 py-3 bg-gradient-to-r from-red-600 to-red-500 text-white font-medium rounded-lg hover:from-red-700 hover:to-red-600 transition-all focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 shadow-md">
                        {{ $step == $totalSteps ? 'Finish' : 'Next' }}
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@if ($errors->has('answer'))
@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        Swal.fire({
            icon: 'warning',
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 3000,
            text: '{{ $errors->first("answer") }}',
        });
    });
</script>
@endpush
@endif
