<?php

namespace App\Http\Controllers;

use App\Models\BiodataUser;
use App\Models\Food;
use App\Models\HistoryPlan;
use App\Models\MealPlan;
use App\Models\Plan;
use App\Models\Progress;
use App\Models\User;
use App\Models\Workout;
use App\Models\WorkoutPlan;
use App\Services\GlobalService;
use DateTime;
use Error;
use Faker\Provider\Biased;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class QuestionnaireController extends BaseController
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
                ->where('user_id', $this->user->id)
                ->first();
        }

        if ($step == 6) {
            $biodata = BiodataUser::select('birth_date')
                ->where('user_id', $this->user->id)
                ->first();

            if ($biodata->birth_date != null) {
                [$year, $month, $day] = explode('-', $biodata->birth_date);
            }
        }

        // Options question
        if ($step != 5 && $step != 6 && $step != 8) {
            $label = $questions[$step]['label'];
            $userAnswer = BiodataUser::where('user_id', $this->user->id)->value($label);
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
                ['user_id' => $this->user->id],
                [
                    'weight' => $weight,
                    'height' => $height,
                    'bmi' => $bmi
                ]
            );

            Progress::updateOrCreate(
                ['user_id' => $this->user->id],
                ['weight' => $weight],
            );

            return redirect()->route('questionnaire.show', $step + 1);
        }

        if ($step == 6) {
            $birthDate = $request->answer[2] . '-' . $request->answer[1] . '-' . $request->answer[0];
            $birthDate = new DateTime($birthDate);
            $today = new DateTime();
            $age = $today->diff($birthDate)->y;
            BiodataUser::updateOrCreate(
                ['user_id' => $this->user->id],
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
            ['user_id' => $this->user->id],
            [$label => $answer],
        );

        return redirect()->route('questionnaire.show', $step + 1);
    }

    public function result(Request $request, GlobalService $service)
    {
        try {
            $this->validateUserBiodata($request->user());

            $userData = $this->getFilteredUserData($request->user());
            $data = $this->fetchRecommendation($userData);

            if (!$this->userHasExistingPlans()) {
                $this->createUserPlans($data);
            }

            return view('result', compact('data'));
        } catch (\Throwable $th) {
            return back()->with('error', 'An unexpected error occurred. Please contact admin.');
        }
    }

    public function feedback(Request $request)
    {
        try {
            $this->validateUserBiodata($request->user());

            $userData = $this->getFilteredUserData($request->user());
            $recommendation = $this->fetchRecommendation($userData);

            $payload = [
                'user' => [
                    'age' => $userData['age'],
                    'sex' => $userData['gender'] == 'male' ? 'M' : 'F',
                    'height_cm' => $userData['height'],
                    'weight_kg' => $userData['weight'],
                    'daily_activity' => 'not active',
                    'goal' => 'Weight Loss',
                    'food_pref' => 'no preference',
                    'fitness_exp' => $userData['experience_level'],
                    'equipment' => 'none',
                    'session_duration_min' => 30,
                ],
                'feedback' => [
                    'ate_breakfast' => $request->ate_breakfast,
                    'ate_lunch' => $request->ate_lunch,
                    'ate_dinner' => $request->ate_dinner,
                    'workout_setA' => $request->workout_setA,
                    'difficulty' => $request->difficulty,
                    'reason' => $request->reason,
                    'mood' => $request->mood,
                    'energy' => $request->energy,
                    'notes' => $request->notes,
                ],
                'previous_reco' => $recommendation
            ];


            $data = $this->fetchFeedback($payload);
            MealPlan::where('user_id', auth()->id())->update(['is_active' => false]);
            WorkoutPlan::where('user_id', auth()->id())->update(['is_active' => false]);
            $this->createUserPlans($data);

            return view('result', [
                'data'    => $data,
                'success' => 'Success generate recommendation by feedback',
            ]);
        } catch (\Throwable $th) {
            return back()->with('error', 'An unexpected error occurred. Please contact admin.');
        }
    }

    // Supporting private methods
    private function validateUserBiodata(User $user): void
    {
        if (!$user->biodata) {
            throw new \Exception('Biodata not completed');
        }
    }

    private function getFilteredUserData(User $user): array
    {
        return Arr::except($user->biodata->getAttributes(), [
            'id',
            'user_id',
            'created_at',
            'updated_at'
        ]);
    }

    private function fetchRecommendation(array $userData): array
    {

        $payload = [
            'age' => $userData['age'],
            'sex' => $userData['gender'] == 'male' ? 'M' : 'F',
            'height_cm' => $userData['height'],
            'weight_kg' => $userData['weight'],
            'daily_activity' => 'not active',
            'goal' => 'Weight Loss',
            'food_pref' => 'no preference',
            'fitness_exp' => $userData['experience_level'],
            'equipment' => 'none',
            'session_duration_min' => 30,
        ];

        $response = Http::post(env('API_AI') . '/recommendation', $payload);
        $data = $response->throw()->json();

        return $data;
    }

    private function fetchFeedback(array $payload): array
    {
        $response = Http::post(env('API_AI') . '/feedback', $payload);
        $data = $response->throw()->json();

        return $data;
    }

    private function userHasExistingPlans(): bool
    {
        return MealPlan::where('user_id', $this->user->id)->exists() &&
            WorkoutPlan::where('user_id', $this->user->id)->exists();
    }

    private function createUserPlans(array $data): void
    {
        DB::transaction(function () use ($data) {
            $this->createWorkoutPlan($data['workouts']);
            $this->createMealPlan($data['meals']);
        });
    }

    private function createWorkoutPlan(array $workouts): WorkoutPlan
    {
        $processedWorkouts = collect($workouts)->map(function ($workout) {
            $processed = Workout::updateOrCreate(
                ['name' => $workout['workout_name']],
                [
                    'image' => null,
                    'difficulty' => $workout['difficulty'] ?? null,
                    'muscle_group' => $workout['muscle_group'] ?? null,
                    'duration' => $workout['duration'] ?? null,
                    'repitition' => $workout['repitition'] ?? null,
                ]
            );
            return ['workout_id' => $processed->id];
        });

        $workoutPlan = WorkoutPlan::create([
            'user_id' => $this->user->id,
            'is_active' => true,
        ]);

        $workoutPlan->workouts()->attach(
            $processedWorkouts->all(),
            ['created_at' => now(), 'updated_at' => now()]
        );

        return $workoutPlan;
    }

    private function createMealPlan(array $mealPlans): MealPlan
    {
        // 1) Ambil blok meals
        $meals = $mealPlans ?? [];

        // 2) Buat MealPlan header
        $mealPlan = MealPlan::create([
            'user_id'  => $this->user->id,
            'is_active' => true,
        ]);

        foreach ($meals as $type => $detail) {
            if ($type === 'summary') {
                continue;
            }

            // ──> Upsert ke tabel foods
            $food = Food::updateOrCreate(
                ['name' => $detail['name']],
                [
                    'image'    => $detail['image_url'] ?? null,
                    'calories' => null,
                    'carbs'    => null,
                    'fat'      => null,
                    'protein'  => null,
                ]
            );

            // ──> Attach ke pivot meal_plan_food
            $mealPlan->foods()->attach(
                $food->id,
                [
                    'meal_time'        => $type,
                    'created_at'       => now(),
                    'updated_at'       => now(),
                ]
            );
        }

        return $mealPlan;
    }
}
