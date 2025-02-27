<?php

namespace App\Http\Controllers;

use App\Models\BiodataUser;
use App\Models\MealPlan;
use App\Models\Progress;
use DateTime;
use Faker\Provider\Biased;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Http;

class QuestionnaireController extends Controller
{

    protected $questions = [
        1 => [
            'label' => 'experience_level',
            'question' => 'What’s your current fitness experience?',
            'sub_question' => 'Help us understand your fitness background so we can tailor recommendations just for you.',
            'options' => [
                0 => [
                    'answer' => '<span class="!text-primary">Beginner</span> (I’m just starting out and learning the basics of fitness)',
                    'value' => 'beginner'
                ],
                1 => [
                    'answer' => '<span class="!text-primary">Moderate</span>(I’ve been working out for a while and feel confident with most exercises)',
                    'value' => 'moderate'
                ],
                2 => [
                    'answer' => '<span class="!text-primary">Expert</span> (I have extensive experience and am looking for a challenge)',
                    'value' => 'expert'
                ]
            ]
        ],

        2 => [
            'label' => 'activity_level',
            'question' => 'How active are you daily?',
            'sub_question' => 'Knowing your current activity level helps us suggest realistic goals',
            'options' => [
                0 => [
                    'answer' => '<span class="!text-primary">Not Active</span> (I spend most of my day sitting and have minimal physical activity)',
                    'value' => 'not_active'
                ],
                1 => [
                    'answer' => ' <span class="!text-primary">Quite Active</span>(I move around occasionally but don’t work out regularly)',
                    'value' => 'quite_active'
                ],
                2 => [
                    'answer' => '<span class="!text-primary">Active</span> (I incorporate moderate exercise into my routine a few times a week)',
                    'value' => 'active'
                ]
            ]
        ],
        3 => [
            'label' => 'training_duration',
            'question' => 'How much time can you dedicate to training?',
            'sub_question' => 'Let us create plans that fit your schedule, whether it’s quick sessions or longer routines',
            'options' => [
                0 => [
                    'answer' => '<span class="!text-primary">20 min</span> (I prefer quick and efficient workouts)',
                    'value' => '20_minute'
                ],
                1 => [
                    'answer' => '<span class="!text-primary">30 min</span> (I have time for standard workout sessions)',
                    'value' => '30_minute'
                ],
                2 => [
                    'answer' => '<span class="!text-primary">60 min</span> (I’m ready to invest in extended workout sessions)',
                    'value' => '60_minute'
                ]
            ]
        ],

        4 => [
            'label' => 'accessibility',
            'question' => 'What equipment do you have access to?',
            'sub_question' => 'Let us know if you prefer bodyweight exercises or have access to specific fitness equipment',
            'options' => [
                0 => [
                    'answer' => '<span class="!text-primary">None</span> (I’ll stick with bodyweight workouts)',
                    'value' => 'no_equipment'
                ],
                1 => [
                    'answer' => '<span class="!text-primary">Basic</span> (I have minimal equipment available)',
                    'value' => 'with_equipment'
                ],
                2 => [
                    'answer' => '<span class="!text-primary">Comprehensive</span> (I have access to a fully equipped gym)',
                    'value' => 'both'
                ]
            ]
        ],

        5 => [
            'label' => ['weight', 'height'],
            'question' => 'What’s your current weight and height?',
            'sub_question' => 'This information helps us calculate your BMI and personalize your health goals',
            'inputs' => []
        ],

        6 => [
            'label' => 'birth_date',
            'question' => 'When were you born?',
            'sub_question' => 'Knowing your age helps us provide age-appropriate recommendations for your health journey',
            'inputs' => []
        ],

        7 => [
            'label' => 'dietary_preferences',
            'question' => 'What are your dietary preferences?',
            'sub_question' => 'Your eating habits are key to designing personalized meal plans',
            'options' => [
                0 => [
                    'answer' => '<span class="!text-primary">Vegan</span> (No animal products at all)',
                    'value' => 'vegan'
                ],
                1 => [
                    'answer' => '<span class="!text-primary">Vegetarian</span> (No meat, but I eat eggs and dairy)',
                    'value' => 'vegetarian'
                ],
                2 => [
                    'answer' => '<span class="!text-primary">Pescatarian</span> (I eat fish but avoid other meats)',
                    'value' => 'pescatarian'
                ],
                3 => [
                    'answer' => '<span class="!text-primary">Gluten Free</span> (I avoid gluten-containing foods like wheat, barley, and rye)',
                    'value' => 'gluten'
                ],
                4 => [
                    'answer' => '<span class="!text-primary">No Preference</span> (I’m open to all dietary options)',
                    'value' => 'none'
                ],
            ]
        ],

        8 => [
            'question' => 'Great! You’ve just taken a big step on your journey.',
            'sub_question' => 'Did you know that tracking your food is ascientifically proven method to being successful? It’s called 
            “self-monitoring” and the more consistent you are, the more likely you are to hit your goals.',
            'options' => [],
        ],

    ];

    public function show($step)
    {
        $questions = $this->questions;

        // BMI question
        if ($step == 5) {
            $biodata = BiodataUser::select('weight', 'height')
                ->where('user_id', auth()->user()->id)
                ->first();
        }

        if ($step == 6) {
            $biodata = BiodataUser::select('birth_date')
                ->where('user_id', auth()->user()->id)
                ->first();

            if ($biodata->birth_date != null) {
                [$year, $month, $day] = explode('-', $biodata->birth_date);
            }
        }

        // Options question
        if ($step != 5 && $step != 6 && $step != 8) {
            $label = $questions[$step]['label'];
            $userAnswer = BiodataUser::where('user_id', auth()->user()->id)->value($label);
        }

        return view('questionner', [
            'question' => $questions[$step],
            'step' => $step,
            'totalSteps' => count($questions),
            'userAnswer' => $userAnswer ?? null,
            'weight' => $biodata->weight ?? null,
            'height' => $biodata->height ?? null,
            'year' => $year ?? null,
            'month' => $month ?? null,
            'day' => $day ?? null
        ]);
    }

    public function store(Request $request, $step)
    {
        if ($step == count($this->questions)) {
            return redirect()->route('result');
        }

        $request->validate([
            'answer' => 'required',
        ], [
            'answer.required' => 'Please fill in the answer!',
        ]);

        if ($step == 5) {
            $height = $request->answer[1];
            $weight = $request->answer[0];

            $heightInMeters = $height / 100;
            $bmi = round($weight / ($heightInMeters ** 2), 2);

            BiodataUser::updateOrCreate(
                ['user_id' => auth()->user()->id],
                [
                    'weight' => $weight,
                    'height' => $height,
                    'bmi' => $bmi
                ]
            );

            Progress::updateOrCreate(
                ['user_id' => auth()->user()->id],
                ['weight' => $weight],
            );

            return redirect()->route('questionnaire.show', $step + 1);
        }

        if ($step == 6) {
            $birthDate = $request->answer[2] . '-' . $request->answer[1] . '-' . $request->answer[0];
            $birthDate = new DateTime($birthDate);
            $today = new DateTime(); // Tanggal hari ini
            $age = $today->diff($birthDate)->y;
            BiodataUser::updateOrCreate(
                ['user_id' => auth()->user()->id],
                [
                    'birth_date' => $birthDate,
                    'age' => $age
                ]
            );
            return redirect()->route('questionnaire.show', $step + 1);
        }

        $label = $this->questions[$step]['label'];
        $answer = $request->answer;

        BiodataUser::updateOrCreate(
            ['user_id' => auth()->user()->id],
            [$label => $answer],
        );

        return redirect()->route('questionnaire.show', $step + 1);
    }

    public function result(Request $request)
    {
        // return view('result');
        try {
            $biodataUser = $request->user()->biodata;

            if (!$biodataUser) {
                return redirect('questionnaire/1')->with('error', 'Please fill out all of the question');
            }

            $userData = Arr::except($biodataUser->getAttributes(), ['id', 'user_id', 'created_at', 'updated_at']);
            // dd($userData);
            $responseWorkout = Http::post(env('API_AI') . '/workout', $userData);
            $jsonWorkout = $responseWorkout->json();
            $dataWorkout = $jsonWorkout['data'];
            // dd($dataWorkout);

            $responseWorkout = Http::post(env('API_AI') . '/food', $userData);
            $jsonFood = $responseWorkout->json();
            // dd($jsonFood);
            $dataFood = $jsonFood['data'];
            

            $data = [
                'workouts' => $dataWorkout['workouts'],
                'foods' => [
                    [
                        'type' => $dataFood[0]['type'],
                        'foods' => $dataFood[0]['breakfast']
                    ],
                    [
                        'type' => $dataFood[1]['type'],
                        'foods' => $dataFood[1]['lunch']
                    ],
                    [
                        'type' => $dataFood[2]['type'],
                        'foods' => $dataFood[2]['dinner']
                    ],
                ]
            ];

            $existingMealPlan = MealPlan::where('user_id', auth()->user()->id)->first();

            if(!$existingMealPlan) {
                foreach ($data['foods'] as $mealPlanData) {
                    // Simpan MealPlan terlebih dahulu
                    $mealPlan = MealPlan::create([
                        'meal_time' => $mealPlanData['type'],
                        'user_id' => auth()->user()->id
                    ]);

                    // Simpan Foods yang terkait dengan MealPlan
                    foreach ($mealPlanData['foods'] as $food) {
                        $mealPlan->foods()->updateOrCreate(
                            [
                                'name' => $food['name'],  // Kriteria pencarian berdasarkan nama makanan
                            ],
                            [
                                'image' => $food['image'],
                                'calories' => $food['nutrition']['Calories'],  // Jika ditemukan, update nutrisi, jika tidak, buat baru
                                'carbs' => $food['nutrition']['Carbohydrate (g)'],
                                'fat' => $food['nutrition']['Fat (g)'],
                                'protein' => $food['nutrition']['Protein (g)'],
                            ]
                        );
                    }
                }
            }



            return view('result', compact('data'));
        } catch (\Throwable $th) {
            dd($th->getMessage());
            return back()->with('error', 'An unexpected error occurred. Please contact admin.');
        }
    }
}
