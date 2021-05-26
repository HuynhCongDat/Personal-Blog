<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\User;


class BlogController extends Controller
{
	public function index(){
		$categories = Category::with(['posts' => function($query){
			$query->published();
		}])->orderBy('title', 'asc')->get();

		$posts = Post::with('author', 'category', 'comments')
							->latestFirst()
							->published();


		$posts = $posts->take(12)->get();

		return view("blog.index", compact('posts', 'categories'));
	}

	public function blog(Request $request){
		//\DB::enableQueryLog();
		$categories = Category::with(['posts' => function($query){
			$query->published();
		}])->orderBy('title', 'asc')->get();

		$posts_blog = Post::with('author', 'comments')
								->latestFirst()
								->published();

		// check if any entered
		// if ($search = request('search-content')) {

		// 	$posts_blog->where( 'title', 'LIKE', "%{$search}%");

		// 	$posts_blog->orWhere( 'excerpt', 'LIKE', "%{$search}%");
		// }
        if ($search = request('query')) {

			$posts_blog->where( 'title', 'LIKE', "%{$search}%");

			$posts_blog->orWhere( 'excerpt', 'LIKE', "%{$search}%");
		}
		$posts_blog = $posts_blog->paginate(5);
		return view('blog.blog', compact('posts_blog', 'categories'));
		//dd(\DB::getQueryLog(0));
	}

    //search ajax
    public function action(Request $request){
        if($request->ajax()){
            $output = '';
            $query = $request->get('query');
            if($query != ''){
                $data = DB::table('posts')
                        ->where('title', 'like', '%'.$query.'%')
                        ->orWhere('excerpt', 'like', '%'.$query.'%')
                        ->orderBy('id', 'desc')
                        ->get();
            }
            else{
                $data = DB::table('posts')
                        ->orderBy('id', 'desc')
                        ->get();
            }

            echo $data;
            exit();
            $total_row = $data->count();
            if($total_row > 0){
                foreach($data as $row) {
                    $output .= '
                        <tr>
                        <td>'.$row->title.'</td>
                        <td>'.$row->excerpt.'</td>
                        </tr>
                    ';
                }
            }
            else{
                $output = '
                    <tr>
                    <td align="center" colspan="5">No Data Found</td>
                    </tr>
                ';
            }
            $data = array(
                'table_data'  => $output,
                'total_data'  => $total_row
            );

            echo json_encode($data);
        }
    }

    public function about(){
      return view('blog.about');
    }

	// public function featured(){
	// 	$category = Category::with(['posts' => function(){
	// 		$query->published();
	// 	}])->orderBy('title', 'asc')->get();

	// 	$post = Post::with('author', 'comments')
	// 	                   ->latestFirst()
	// 	                   ->published();
	// 	$post = $post->take(6)->get();

	// 	return view('layouts.featured', compact('post', 'category'));
	// }

	public function show(Post $post){
		// update posts set view_count = view_count + 1 where id = ?
		//1
		$viewCount = $post->view_count + 1;
		$post->update(['view_count' => $viewCount]);
		$postComments = $post->comments()->Paginate(3);

		//2
		// $post->increment('view_count');
		return view('blog.show', compact('post', 'postComments'));
	}

	public function category(Category $category){

		$categories = Category::with(['posts' => function($query){
                $query->published();
            }])->orderBy('title', 'asc')->get();

        //\DB::enableQueryLog();
		$posts_blog = $category->posts()
							   ->with('author', 'comments')
							   ->latestFirst()
							   ->published()
							   ->paginate(5);

		return view('blog.blog', compact('posts_blog', 'categories'));
		//dd(\DB::getQueryLog(0));
	}

	public function author(User $author){
		$categories = Category::with(['posts' => function($query){
			$query->published();
		}])->orderBy('title', 'asc')->get();

        // \DB::enableQueryLog();
		$posts_blog = $author->posts()
							   ->with('category', 'comments')
							   ->latestFirst()
							   ->published()
							   ->paginate(5);

		return view('blog.blog', compact('posts_blog', 'categories'));
		// dd(\DB::getQueryLog(0));
	}
}
