<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Question;
use App\Category;
use App\Http\Requests\QuestionsRequest;
use DB;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('admin.content.questions.view', compact('questions', 'questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.content.questions.create', compact('categories', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionsRequest $request)
    {

        $questions = new Question();

        /**
         * Lấy giá trị mảng options
         * @return $option = value1--value2--value3...
         */
        if($request->hasFile('option')) {
            $options = $request->file('option');
            foreach ($options as $option) {
                $file = time().rand(1,100). '.' . $option->getClientOriginalExtension(); // Đổi tên file được up lên
                $success = $option->move('upload/questions/', $file); // Di chuyển file tới thư mục upload/
                $nameOption[] = $file; // Lấy tên từng ảnh tạo thành mảng array
            }

        } else {
            $nameOption = $request->input('option');

        }

        $option = implode('--', $nameOption); // Chuyển mảng thành chuỗi
        $questions->option = $option; // Lưu dữ liệu vào thuộc tính option

        /**
         * Lấy giá trị mảng rightAnswer từ value option
         * @var string
         * @return $correct = value1--value2--value3...
         */
        $rightAnswer = $request->input('rightAnswer');

        foreach($rightAnswer as $right){
            $correct[] = $nameOption[$right];
        }

        $questions->rightAnswer = implode('--',$correct); // Chuyển mảng thành chuỗi

        // Tùy chọn type
        $type = $request->input('type');
        if ($type == 0) {

            $questions->type = (count($correct) == 1) ? 1 : 2 ;

        }else{
            $questions->type = 3;
        }

        $questions->ask = $request->input('ask');
        $questions->rightAnswerNote = $request->input('rightAnswerNote');
        $questions->active = $request->input('active');
        $questions->categoryID = $request->input('categoryID');

        $questions->save();

        // Thêm dữ liệu thẻ Tags vào CSDL
        if (null !== $request->input('tag')){
            $tags = $request->input('tag');
            foreach ($tags as $tag) {
                DB::table('questiontag')->insert(
                    ['questionID' => $questions->questionID, 'tagID' => $tag]
                );
            }
        }


        // Lọc danh sách category
        $categories = Category::all();

        return view('admin.content.questions.create', compact('categories', 'categories'))->with('success', 'Thêm thành công');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);
        return view('admin.content.questions.show', compact('question','question'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $question = Question::find($id);
        $categories = Category::all();
        return view('admin.content.questions.edit', compact('categories', 'categories'))->with('question', $question);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionsRequest $request, $id)
    {
        $questions = Question::findOrFail($id);

        /**
         * Lấy giá trị mảng options
         * @return $option = value1--value2--value3...
         */
        if($request->hasFile('option')) {
            $options = $request->file('option');
            foreach ($options as $option) {
                $file = time().rand(1,100). '.' . $option->getClientOriginalExtension(); // Đổi tên file được up lên
                $success = $option->move('upload/questions/', $file); // Di chuyển file tới thư mục upload/
                $nameOption[] = $file; // Lấy tên từng ảnh tạo thành mảng array
            }

        } elseif ($request->input('option')) {
            $nameOption = $request->input('option');

        }

        if(isset($nameOption)){
            $option = implode('--', $nameOption); // Chuyển mảng thành chuỗi
            $questions->option = $option; // Lưu dữ liệu vào thuộc tính option

            /**
             * Lấy giá trị mảng rightAnswer từ value option
             * @var string
             * @return $correct = value1--value2--value3...
             */
            $rightAnswer = $request->input('rightAnswer');

            foreach($rightAnswer as $right){
                $correct[] = $nameOption[$right];
            }

            $questions->rightAnswer = implode('--',$correct); // Chuyển mảng thành chuỗi
        }

        // Tùy chọn type
        $type = $request->input('type');
        if ($type == 0) {

            $questions->type = (count($correct) == 1) ? 1 : 2 ;

        }else{
            $questions->type = 3;
        }


        $questions->ask = $request->input('ask');
        $questions->rightAnswerNote = $request->input('rightAnswerNote');
        $questions->active = $request->input('active');
        $questions->categoryID = $request->input('categoryID');

        $questions->save();

        // Thêm dữ liệu thẻ Tags vào CSDL
        if (null !== $request->input('tag')){
            $tags = $request->input('tag');
            foreach ($tags as $tag) {
                DB::table('questiontag')->insert(
                    ['questionID' => $questions->questionID, 'tagID' => $tag]
                );
            }
        }

        // Lọc danh sách category
        $question = Question::find($id);

        return view('admin.content.questions.show', compact('question', 'question'))->with('success', 'Cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect('admin/questions');
    }
}
