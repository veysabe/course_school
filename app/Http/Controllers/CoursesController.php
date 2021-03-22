<?php

namespace App\Http\Controllers;

use App\Helpers\RusStr;
use App\Models\Category;
use App\Models\Course;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Intervention\Image\Facades\Image;

class CoursesController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Курсы';
        $courses = auth()->user()->school->courses;
        $how_much_courses = RusStr::rus_plural($courses->count(), ['курс', 'курса', 'курсов']);
        return response(view('admin.course.index', ['courses' => $courses, 'title' => $title, 'how_much' => $how_much_courses]));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Создать курс';
        $categories = Cache::remember(
            'categories',
            3600,
            function () {
                return Category::all();
            });

        $categories = $categories
            ->find($categories->pluck('parent_id'))
            ->each(function ($item, $key) use ($categories) {
                $item['children'] = $categories->where('parent_id', $item->id);
            });

        return view('admin.course.create', ['title' => $title, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|max:100',
            'description' => 'max:100',
            'image' => 'image',
        ]);

        if (\request('image')) {
            $image_path = $request->file('image')->store('courses/covers', 'public');

            $image = Image::make(public_path("storage/{$image_path}"))->widen(600);
            $image->save();

            $imageArray = ['image' => $image_path];
        }

        $category = Category::find(\request('category'));

        $course = auth()->user()->school->courses()->create(array_merge(
            $data,
            $imageArray ?? []
        ));

        $course->categories()->toggle($category);

        return redirect()->route('course.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $code
     * @return \Illuminate\Http\Response
     */
    public function show($code)
    {
        $course = auth()->user()->school->courses->where('code', $code)->first();

        if (!$course) {
            abort(404);
        }

        $title = $course->name;

        return response(view('admin.course.show', compact('course', 'title')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = auth()->user()->school->courses->find($id);
        $category = Category::where('course_id', $id)->get();
        $course->categories()->toggle($category);
        $course->delete();

        return redirect()->route('course.index');
    }
}
