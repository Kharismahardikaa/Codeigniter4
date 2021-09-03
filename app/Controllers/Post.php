<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\models\PostModel;

class Post extends Controller 
{
    public function index()
    {
        $postModel = new PostModel();

        $pager = \Config\Services::pager();

        $data = array(
            'posts' => $postModel->paginate(2, 'post'),
            'pager' => $postModel->pager
        );

        return view('post-index', $data);
    }

    public function create()
    {
        return view('post-create');
    }

    public function store()
    {
        helper(['form', 'url']);

        $validation = $this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan judul post'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan content post.'
                ]
            ]
        ]);

        if(!$validation){
            return view('post-create', [
                'validation' => $this->validator
            ]);
        } else {
            $postModel = new PostModel();

            $postModel->insert([
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content')
            ]);

            session()->setFlashdata('message', 'Post Berhasil Disimpan');

            return redirect()->to(base_url('post'));
        }
    }

    public function edit($id)
    {
        $postModel = new PostModel();

        $data = array(
            'post' => $postModel->find($id)
        );

        return view('post-edit', $data);
    }

    public function update($id)
    {
        helper(['form', 'url']);

        $validation = $this->validate([
            'title' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan Judul Post.'
                ]
            ],
            'content' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan content post.'
                ]
            ]
        ]);

        if(!$validation){
            $postModel = new PostModel();

            return view('post-edit', [
                'post' => $postModel->find($id),
                'validation' => $this->validator
            ]);
        } else {
            $postModel = new PostModel();

            $postModel->update($id, [
                'title' => $this->request->getPost('title'),
                'content' => $this->request->getPost('content')
            ]);

            session()->setFlashData('message', 'Post berhasil di update');

            return redirect()->to(base_url('post'));
        }
    }


    public function delete($id)
    {
        $postModel = new PostModel();

        $post = $postModel->find($id);

        if($post) {
            $postModel->delete($id);

            session()->setFlashData('message', 'Post berhasil dihapus');

            return redirect()->to(base_url('post'));
        }
    }
}