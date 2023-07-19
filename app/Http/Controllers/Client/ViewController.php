<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Repositories\Client\Home\Category\CategoryRepositoryInterface;
use App\Repositories\Client\Home\Chapter\ChapterRepositoryInterface;
use App\Repositories\Client\Home\Story\StoryRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;

class ViewController extends Controller
{
    protected $categoryRepo;
    protected $storyRepo;
    protected $chapterRepo;

    public function __construct(StoryRepositoryInterface $storyRepo, CategoryRepositoryInterface $categoryRepo, ChapterRepositoryInterface $chapterRepo)
    {
        $this->storyRepo = $storyRepo;
        $this->categoryRepo = $categoryRepo;
        $this->chapterRepo = $chapterRepo;
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

        return view('client.page-body.page-body-index', compact(
            'stories_all',
            'categories',
            'stories_sung_hot',
            'category_story_counts',
            'stories_hot',
            'stories_ngontinh',
            'stories_new',
            'stories_short',
            'stories_count_chapter'
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

        return view('client.page-body.page-body-view-category', compact(
            'stories_all',
            'categories',
            'slug_categories',
            'stories_category',
            'stories_hot',
            'stories_sung_hot'
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

        return view('client.page-body.page-body-view-story', compact(
            'stories_all',
            'categories',
            'summaries',
            'stories_sung_hot',
            'stories_new',
            'stories_user',
            'stories_chapter'
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

        return view('client.page-body.page-body-content-chapter', compact(
            'stories_all',
            'categories',
            'contentChapter',
            'summaries',
            'stories_chapter'
        ));
    }

    public function content_chapter_short(String $slugstory)
    {
        $stories_all = $this->storyRepo->getAll();
        $categories = $this->categoryRepo->getAll();
        $summaries = $this->storyRepo->getStory_summary($slugstory);

        $stories_chapter = $this->storyRepo->getStory_chapter($slugstory);

        return view('client.page-body.page-body-content-chapter', compact(
            'stories_all',
            'categories',
            'summaries',
            'stories_chapter'
        ));
    }
}
