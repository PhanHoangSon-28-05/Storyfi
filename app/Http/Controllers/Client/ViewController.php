<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Client\Home\Category\CategoryRepositoryInterface;
use App\Repositories\Client\Home\Chapter\ChapterRepositoryInterface;
use App\Repositories\Client\Home\Story\StoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Repositories\Client\Home\Comment\CommentRepositoryInterface;

class ViewController extends Controller
{
    protected $categoryRepo;
    protected $storyRepo;
    protected $chapterRepo;
    protected $commentRepo;

    public function __construct(
        StoryRepositoryInterface $storyRepo,
        CategoryRepositoryInterface $categoryRepo,
        ChapterRepositoryInterface $chapterRepo,
        CommentRepositoryInterface $comment
    ) {
        $this->storyRepo = $storyRepo;
        $this->categoryRepo = $categoryRepo;
        $this->chapterRepo = $chapterRepo;
        $this->commentRepo = $comment;
    }

    public function index()
    {
        $stories_all = $this->storyRepo->getStory_all();
        $categories = $this->categoryRepo->getAll();
        $category_story_counts = $this->categoryRepo->getIndex_category();
        $stories_sung_hot = $this->storyRepo->getIndex_story_sung_hot();
        $stories_ngontinh = $this->storyRepo->getIndex_story_ngontinh();
        $stories_hot = $this->storyRepo->getHot_story();
        $stories_new = $this->storyRepo->getNew_story();
        $stories_short = $this->storyRepo->getStory_short();
        $stories_count_chapter = $this->storyRepo->getStory_countChapter();

        //content-4
        $stories_kinhdi = $this->storyRepo->getIndex_story_kinh_di();
        $stories_ngon_tinh = $this->storyRepo->getIndex_story_ngon_tinh();
        $stories_tinhyeu = $this->storyRepo->getIndex_story_tinh_yeu();
        $stories_tamly = $this->storyRepo->getIndex_story_tam_ly();
        $stories_teen = $this->storyRepo->getIndex_story_teen();
        $stories_hocduong = $this->storyRepo->getIndex_story_hoc_duong();
        $stories_hai = $this->storyRepo->getIndex_story_hai();
        $stories_trongsinh = $this->storyRepo->getIndex_story_trong_sinh();

        //content-5
        $stories_hot_header = $this->storyRepo->getHot_story_header();

        return view('client.page-body.page-body-index', compact(
            'stories_all',
            'categories',
            'stories_sung_hot',
            'category_story_counts',
            'stories_hot',
            'stories_ngontinh',
            'stories_new',
            'stories_short',
            'stories_count_chapter',
            'stories_kinhdi',
            'stories_ngon_tinh',
            'stories_tinhyeu',
            'stories_tamly',
            'stories_teen',
            'stories_hocduong',
            'stories_hai',
            'stories_trongsinh',
            'stories_hot_header',
        ));
    }

    public function category(String $slug_category)
    {
        $stories_all = $this->storyRepo->getAll();
        $categories = $this->categoryRepo->getAll();

        // Lấy name category từ slug
        $name_category = str_replace('-', ' ', Str::slug($slug_category));
        $name_category = mb_convert_case($name_category, MB_CASE_TITLE, 'UTF-8');
        $slug_categories = $this->categoryRepo->get_category($name_category);

        //Lấy story theo category
        // dd($slug_categories);
        $id_category = $slug_categories[0]->id;
        $stories_category = $this->storyRepo->getStory_category($id_category);
        // dd($stories_category);
        $stories_hot = $this->storyRepo->getHot_story();
        $stories_sung_hot = $this->storyRepo->getIndex_story_sung_hot();

        $stories_new = $this->storyRepo->getNew_story();

        return view('client.page-body.page-body-view-category', compact(
            'stories_all',
            'categories',
            'slug_categories',
            'stories_category',
            'stories_hot',
            'stories_sung_hot',
            'stories_new'
        ));
    }

    public function summary_story(String $slug)
    {
        $stories_all = $this->storyRepo->getAll();
        $categories = $this->categoryRepo->getAll();

        $summaries = $this->storyRepo->getStory_summary($slug);
        $stories_new = $this->storyRepo->getNews_story_InSummary();
        $stories_sung_hot = $this->storyRepo->getIndex_story_sung_hot();
        $stories_user = $this->storyRepo->getStory_user($slug);
        $stories_chapter = $this->storyRepo->getStory_chapter($slug);
        $comments = $this->commentRepo->show_comment($summaries['id']);
        // dd($comments->users);
        return view('client.page-body.page-body-view-story', compact(
            'stories_all',
            'categories',
            'summaries',
            'stories_sung_hot',
            'stories_new',
            'stories_user',
            'stories_chapter',
            'comments'
        ));
    }

    public function content_chapter(String $slugstory, $slug)
    {
        $stories_all = $this->storyRepo->getAll();
        $categories = $this->categoryRepo->getAll();
        $summaries = $this->storyRepo->getStory_summary($slugstory);

        $number_chapter = str_replace('-', ' ', Str::slug($slug));
        $number_chapter = str_replace("chuong", "Chương", $number_chapter);
        $number_chapter = mb_convert_case($number_chapter, MB_CASE_TITLE_SIMPLE, 'UTF-8');
        $contentChapter = $this->chapterRepo->getContent_chapter($slugstory, $number_chapter);

        $stories_chapter = $this->storyRepo->getStory_chapter($slugstory);

        $comments = $this->commentRepo->show_comment($summaries['id']);
        return view('client.page-body.page-body-content-chapter', compact(
            'stories_all',
            'categories',
            'contentChapter',
            'summaries',
            'stories_chapter',
            'comments'
        ));
    }

    public function content_chapter_short(String $slugstory)
    {
        $stories_all = $this->storyRepo->getAll();
        $categories = $this->categoryRepo->getAll();
        $summaries = $this->storyRepo->getStory_summary($slugstory);

        $stories_chapter = $this->storyRepo->getStory_chapter($slugstory);
        $comments = $this->commentRepo->show_comment($summaries['id']);
        return view('client.page-body.page-body-content-chapter', compact(
            'stories_all',
            'categories',
            'summaries',
            'stories_chapter',
            'comments'
        ));
    }

    public function comment(Request $request, $id_user, $id_story)
    {
        $array = $request->all();
        $array['user_id'] = $id_user;
        $array['story_id'] = $id_story;
        // dd($array);
        $this->commentRepo->post_comment($array);
        return redirect()->back();
    }
}
