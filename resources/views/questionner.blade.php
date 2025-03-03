@extends('layouts.empty')

@section('title', 'Questionner')

@push('styles')
<link href="{{ asset('css/auth.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="bg-background flex justify-center items-center min-h-screen w-full">
    <div class=" m-auto  w-[600px]  border bg-white shadow rounded-xl px-5">

        <h1 class="font-bold text-3xl mt-11 text-center">{{ $question['question'] }}</h1>
        <p class="text-xl text-center mt-8 mx-8">{{ $question['sub_question'] }}</p>

        <form method="POST" action="{{ route('questionnaire.store', $step) }}" class="p-8">
            @csrf
            <div class="relative flex flex-col rounded-xl">
                <nav class="flex min-w-[240px] flex-col gap-1 p-2">
                    @if($step != 5 && $step != 6)
                    @foreach ($question['options'] as $index => $option)
                    <div role="button"
                        class="flex w-full items-center rounded-lg p-0 transition-all hover:bg-slate-100 focus:bg-slate-100 active:bg-slate-100">
                        <label for="option-{{ $index }}"
                            class="flex w-full cursor-pointer items-center px-3 py-2">
                            <div class="inline-flex items-center">
                                <label class="relative flex items-center cursor-pointer me-3"
                                    for="option-{{ $index }}">
                                    <input
                                        name="answer"
                                        type="radio"
                                        class=" h-5 w-5 cursor-pointer accent-primary   transition-all"
                                        id="option-{{ $index }}"
                                        value="{{ $option['value'] }}"
                                        @if ($userAnswer == $option['value']) checked @endif />
                                    <span
                                        class="absolute bg-slate-800 w-3 h-3 rounded-full opacity-0 peer-checked:opacity-100 transition-opacity duration-200 top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2"></span>
                                </label>
                                <label class="ml-2 font-bold cursor-pointer text-xl"
                                    for="option-{{ $index }}">
                                    {!! $option['answer'] !!}
                                </label>
                            </div>
                        </label>
                    </div>
                    @endforeach
                    @endif

                    @if ($step == 5)

                    <label for="weight" class="block text-sm font-medium text-gray-700">
                        Weight
                    </label>
                    <div class="mt-1 flex max-w-[200px] items-center gap-4 mb-4">
                        <input
                            id="weight"
                            name="answer[]"
                            type="number"
                            value="{{ $weight ?? '' }}"
                            required
                            class="form-input appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm">KG
                    </div>
                    @error('weight')
                    <p class="mt-2 text-sm !text-primary">{{ $message }}</p>
                    @enderror

                    <label for="height" class="block text-sm font-medium text-gray-700">
                        Height
                    </label>
                    <div class="mt-1 max-w-[200px] flex items-center gap-4">
                        <input
                            id="height"
                            name="answer[]"
                            type="number"
                            value="{{ $height ?? '' }}"
                            required
                            class="form-input appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-primary focus:border-primary sm:text-sm"> CM
                    </div>
                    @error('height')
                    <p class="mt-2 text-sm !text-primary">{{ $message }}</p>
                    @enderror
                    @endif

                    @if($step == 6)
                    <div class="space-y-2">
                        <label class="block text-sm font-medium text-gray-700">Date of Birth</label>
                        <div class="flex items-center space-x-2">
                            <input type="number" name="answer[]" placeholder="DD" maxlength="2" min="1" value="{{ $day ?? '' }}"
                                class="date-input px-3 py-2 text-center border rounded-md border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                            <span class="text-gray-500">/</span>
                            <input type="number" name="answer[]" placeholder="MM" maxlength="2" min="1" value="{{ $month ?? '' }}"
                                class="date-input px-3 py-2 text-center border rounded-md border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                            <span class="text-gray-500">/</span>
                            <input type="number" name="answer[]" placeholder="YYYY" maxlength="4" min="1" value="{{ $year ?? '' }}"
                                class="date-input px-3 py-2 text-center border rounded-md border-gray-300 shadow-sm focus:ring-red-500 focus:border-red-500 sm:text-sm">
                        </div>
                    </div>
                    @endif

                </nav>
            </div>

            <div class="flex justify-between mt-8">
                @if ($step > 1)
                <a href="{{ route('questionnaire.show', $step - 1) }}"
                    class="!text-primary px-9 py-4 bg-white shadow border rounded-lg">Previous</a>
                @endif
                <button type="submit"
                    class="text-bold text-white !bg-primary px-14 rounded-lg py-4 shadow border ml-auto">
                    {{ $step == $totalSteps ? 'Finish' : 'Next' }}
                </button>
            </div>

        </form>
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
    })
</script>
@endpush
@endif