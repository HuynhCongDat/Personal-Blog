<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\POST;
use App\Http\Requests;

class BlogController extends BackendController
{
    protected $limit = 5;
    protected $uploadPath;

    public function __construct(){
        parent::__construct();
        $this->uploadPath = public_path('img');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $onlyTrashed = FALSE;

        if (($status = $request->get('status')) && $status == 'trash') {
            $posts     = POST::onlyTrashed()->with('category', 'author')->latest()->paginate($this->limit);
            $postCount = POST::onlyTrashed()->count();
            $onlyTrashed = TRUE;
        }
        elseif($status == 'published') {
            $posts     = POST::published()->with('category', 'author')->paginate($this->limit);
            $postCount = POST::published()->count();
            
        }
        elseif($status == 'scheduled') {
            $posts     = POST::scheduled()->with('category', 'author')->paginate($this->limit);
            $postCount = POST::scheduled()->count();
            
        }
        elseif($status == 'draft') {
            $posts     = POST::draft()->with('category', 'author')->paginate($this->limit);
            $postCount = POST::draft()->count();
            
        }
        elseif($status == 'own') {
            $posts     = $request->user()->posts()->with('category', 'author')->paginate($this->limit);
            $postCount = $request->user()->posts()->count();
            
        }
        else {
            $posts     = POST::latest()->with('category', 'author')->paginate($this->limit);
            $postCount = POST::count();
            
        }

        $statusList = $this->statusList($request);
        
        return view("backend.blog.index", compact('posts', 'postCount', 'onlyTrashed', 'statusList'));
    }

    private function statusList($request){

        return [
            'own'       => $request->user()->posts()->count(),
            'all'       => Post::count(),
            'published' => Post::published()->count(),
            'scheduled' => Post::scheduled()->count(),
            'draft'     => Post::draft()->count(),
            'trash'     => Post::onlyTrashed()->count(),
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Post $post)
    {
        return view("backend.blog.create", compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostRequest $request)
    {
        $data = $this->handleRequest($request);
        $request->user()->posts()->create($data);

        return redirect('/backend/blog')->with('message', 'Your post was created success');
    }

    private function handleRequest($request){
        $data = $request->all();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();
            $destination = $this->uploadPath;

            $image->move($destination, $fileName);

            $data['image'] = $fileName;
        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('backend.blog.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        $oldImage = $post->image;
        $data = $this->handleRequest($request);
        $post->update($data);

        if ($oldImage !== $post->image) {
            $this->remopveImage($oldImage);
        }

        return redirect('/backend/blog')->with('message', 'Your post was updated success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect('/backend/blog')->with('trash-message', ['Your post moved to Trash', $id]);
    }

    public function  forceDestroy($id){
         $post = Post::withTrashed()->findOrFail($id);
         $post->forceDelete();
         $this->remopveImage($post->image);
        return redirect('backend/blog?status=trash')->with('message', 'Your post has been deleted successfully');
    }

    public function restore($id){
        $post = Post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect()->back()->with('message', 'Your post has been moved from the trash');
    }

    public function remopveImage($image){
        if (! empty($image)) {
            $imagePath = $this->uploadPath. '/' .$image;
            if(file_exists($imagePath)) unlink($imagePath);
        }
    }
}
