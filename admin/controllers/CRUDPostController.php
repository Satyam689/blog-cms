<?php 

class CRUDPostController {
    private $blogPostModel;

    public function __construct(BlogPost $blogPostModel) {
        $this->blogPostModel = $blogPostModel;
    }

    public function index() {
        $posts = $this->blogPostModel->getAllPosts();
        // Render the index view with the posts
    }

    public function create() {
        // Render the create view
    }

    public function store() {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $id = $this->blogPostModel->createPost($title, $content);
        // Redirect to the index view
    }

    public function show($id) {
        $post = $this->blogPostModel->getPostById($id);
        // Render the show view with the post
    }

    public function edit($id) {
        $post = $this->blogPostModel->getPostById($id);
        // Render the edit view with the post
    }

    public function update($id) {
        $title = $_POST['title'];
        $content = $_POST['content'];
        $affectedRows = $this->blogPostModel->updatePost($id, $title, $content);
        // Redirect to the index view
    }

    public function destroy($id) {
        $affectedRows = $this->blogPostModel->deletePost($id);
        // Redirect to the index view
    }
}