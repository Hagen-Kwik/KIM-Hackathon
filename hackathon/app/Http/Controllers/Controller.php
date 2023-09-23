<?php

namespace App\Http\Controllers;

use App\Models\AboutUs;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use App\Models\Finance;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Teacher;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function finance()
    {
        $results = DB::table('finances')
            ->select('id', 'created_at', 'updated_at', 'nama', 'kategori', 'nominal', 'satuan', 'jumlah')
            ->selectRaw('(nominal * jumlah) AS total')
            ->get();

        return view('admin-finance', [
            'results' => $results,
            'name' => "tes"
        ]);
    }

    public function finance_add()
    {
        Finance::create([
            'nama' => $_POST["name"],
            'nominal' => $_POST["nominal"],
            'kategori' => $_POST["kategori"],
            'satuan' => $_POST["satuan"],
            'jumlah' => $_POST["jumlah"],
        ]);

        return redirect("admin-finance");
    }

    public function finance_edit()
    {
        $finance = Finance::findOrFail($_POST['id']);

        $finance->update([
            'nama' => $_POST['nama'],
            'nominal' => $_POST['nominal'],
            'kategori' => $_POST['kategori'],
            'satuan' => $_POST['satuan'],
            'jumlah' => $_POST['jumlah'],
        ]);

        return redirect("admin-finance");
    }

    public function finance_delete()
    {
        if (isset($_POST['delete'])) {
            Finance::where('id', $_POST['id'])->delete();
        }

        return redirect("admin-finance");
    }

    public function quiz()
    {
        $results = DB::table('quizzes')
            ->select()
            ->get();
        $questions = DB::table('questions')
            ->select()
            ->get();

        return view('admin-quiz', [
            'results' => $results,
            'questions' => $questions,
            'name' => "quiz"
        ]);
    }

    public function quiz_add()
    {
        Quiz::create([
            'title' => $_POST["title"],
            'quiz_type_id' => $_POST["quiz_type"],
        ]);

        return redirect("admin-quiz");
    }

    public function quiz_edit()
    {
        $quiz = Quiz::findOrFail($_POST['id']);

        $quiz->update([
            'title' => $_POST['title'],
            'quiz_type_id' => $_POST['type'],
        ]);

        return redirect("admin-quiz");
    }

    public function quiz_delete()
    {
        if (isset($_POST['delete'])) {
            Quiz::where('id', $_POST['id'])->delete();
        }

        return redirect("admin-quiz");
    }

    public function guru()
    {
        $results = DB::table('teachers')
            ->select()
            ->get();

        return view('admin-guru', [
            'results' => $results,
            'name' => "guru"
        ]);
    }

    public function guru_edit()
    {
        $guru = Teacher::findOrFail($_POST['id']);

        if ($_POST['picture']) {
            $guru->update([
                'teacherName' => $_POST['teacherName'],
                'description' => $_POST['description'],
                'job_title' => $_POST['job_title'],
                'whatsapp' => $_POST['whatsapp'],
                'email' => $_POST['email'],
                'instagram' => $_POST['instagram'],
                'picture' => substr($_POST['picture']->store('/public/images/teacher'), 7, strlen($_POST['picture']->store('/public/images/teacher')) - 7),
            ]);
        } else {
            $guru->update([
                'teacherName' => $_POST['teacherName'],
                'description' => $_POST['description'],
                'job_title' => $_POST['job_title'],
                'whatsapp' => $_POST['whatsapp'],
                'email' => $_POST['email'],
                'instagram' => $_POST['instagram'],
            ]);
        }

        return redirect("admin-guru");
    }

    public function guru_delete()
    {
        if (isset($_POST['delete'])) {
            Teacher::where('id', $_POST['id'])->delete();
        }

        return redirect("admin-guru");
    }

    public function question_add()
    {
        $id = $_POST['quizID'];
        Question::create([
            'question' => $_POST["soal"],
            'optionA' => $_POST["optionA"],
            'optionB' => $_POST["optionB"],
            'optionC' => $_POST["optionC"],
            'optionD' => $_POST["optionD"],
            'correctOption' => $_POST[$_POST["correctOption"]],
            'quiz_id' => $_POST["quizID"],
        ]);

        return redirect("admin-question?quizID=$id");
    }

    public function question_edit()
    {
        $question = Question::findOrFail($_POST['id']);
        $id = $question->quiz_id;
        $question->update([
            'question' => $_POST["soal"],
            'optionA' => $_POST["optionA"],
            'optionB' => $_POST["optionB"],
            'optionC' => $_POST["optionC"],
            'optionD' => $_POST["optionD"],
            'correctOption' => $_POST[$_POST["correctOption"]],
        ]);

        return redirect("admin-question?quizID=$id");
    }

    public function question_delete()
    {
        if (isset($_POST['delete'])) {
            Question::where('id', $_POST['id'])->delete();
        }
        $id = $_POST['quizID'];

        return redirect("admin-question?quizID=$id");
    }

    public function aboutus_edit()
    {
        $latarbelakang = AboutUs::findOrFail(1);
        $maksud = AboutUs::findOrFail(2);
        $tujuan = AboutUs::findOrFail(3);
        
        $latarbelakang->update([
            'description' => $_POST['latarbelakang'],
        ]);
        $maksud->update([
            'description' => $_POST['maksud'],
        ]);
        $tujuan->update([
            'description' => $_POST['tujuan'],
        ]);

        return redirect("/admin-tentang-kami");
    }
}
