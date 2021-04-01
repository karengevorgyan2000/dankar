<?php

    namespace App\Controllers;
    use App\Controllers\BaseController;
    use App\Models\HomeSlider;
    use App\Models\Files;
    use App\Models\Blog;
    use App\Models\AboutUs;
    use App\language;
    class Home extends BaseController{
        private $homeSlider = '';
        private $files = '';
        private $blog = '';
        private $aboutUs = '';

        public function __construct(){
          $this->homeSlider = new HomeSlider();
          $this->files = new Files();
          $this->blog = new Blog();
          $this->aboutUs = new AboutUs();
        }
            
        public function index(){
            if(!$_COOKIE['lang']) {
              $this->request->setLocale('am');
            }
            $data = [];
            $this->homeSlider->join('files', 'files.id = home_slider.file_id');
            $this->homeSlider->where('status', 'active');
            $this->blog->join('files', 'files.id = blog.file_id');
            $this->blog->where('status', 'active');
            $result['slide'] = $this->homeSlider->get()->getResult();
            $result['aboutUs'] = $this->aboutUs->get()->getResult();
            $result['blog'] = $this->blog->get()->getResult();

            return view('dankar',$result);

        }

        public function setLang($lang) {
          if(in_array($lang, ['en', 'am', 'ru'])) {
            $this->request->setLocale($lang);
          }

          return redirect('/');
        }
    }