<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require APPPATH.'third_party/simple_html_dom.php';

class Newconcept extends CI_Controller {
    private static $html;
    private static function getInstance(){
        if(!self::$html)
           self::$html = new simple_html_dom();
        return self::$html;
    }
    public function __construct(){
        parent::__construct();
        $this->load->model('Nc');
    }
	public function index()
	{
		
		$this->load->view('nc/index');
	}
	public function tests(){
        $name = $this->input->get('name');
        $lesson = $this->input->get('lessons');
        $name = empty($name) ? '小可爱' : strip_tags($name);
        $lesson = empty($lesson) ? 1 : intval($lesson);
		$this->load->model('Nc');
        $res = $this->Nc->getArticle($lesson);
        $keys = array();
        $num = 0;
        $arr = array('nbsp', 'br', 'the', 'can', 'of');
        $content = $res[0]['content'];
        $words = str_word_count($content, 2);
        $blanks = array_rand($words, 30);
        foreach($blanks as $r){
            $replace = '';
            if(in_array($words[$r], $arr))
                continue;
            if($num == 20)
                break;
            for($i = 0; $i < strlen($words[$r]); $i++)
                $replace .= '*';
            $content = substr_replace($content, $replace, $r, strlen($words[$r]));
            $num ++ ;
            array_push($keys, $words[$r]);
        }
        $content = preg_replace("/\*{2,}/", '<input type="text" class="blank"/>', $content);
        

		$this->load->view('nc/tests', array('title' => $res[0]['title'], 'content' => $content, 'name' => $name, 'res' => json_encode($keys)));
	}
	private function fetch($url){
		
		self::getInstance()->load_file($url);
		$title = "";
        $content = "";
        $lesson = 1;
		
		foreach(self::getInstance()->find('div#newsview_artiletitle') as $e){
            $title = preg_replace('/([\x80-\xff]*)/i', '',$e->innertext); 
            $res = preg_match('/\d+/', $title, $match);
            if($res)
                $lesson = $match[0];
            } 
			
		foreach(self::getInstance()->find('font#zoom') as $e){
			$pho = $e->find('p');
            foreach($pho as $p){
                if(strlen($p->innertext) > 1000){
                    $content = $p->innertext;
                    break;
                }
            }
			$content = $p->innertext;
		}
        foreach(self::getInstance()->find('div#newsview_artilepinglun') as $e){
            $td = $e->find('td[align=right]');
            $a = $td[0]->find('a');
            $href = $a[0]->href;
            $href1 = str_replace('/nce4/', '', $href);
            $href2 = str_replace('.html', '', $href1);
            if($href2 < 999)
                $res = 'nce4/'.$href1;
            else
                $res = false;
        }
        $data = array('title' => $title, 'volumn' => 4, 'content' => $content, 'lesson'=>$lesson);
        $this->Nc->insert($data);
        return $res;
	}
  //   public function spider(){
  //       set_time_limit(0);
		// header('Content-Type:text/html;charset=gbk');
		// $baseurl = "http://www.english-sky.com/";
  //       $baseurl = "http://www.english-sky.com/";
  //       $next = "nce4/176.html";
  //       while($next)
  //           $next = $this->fetch($baseurl.$next);
  //   }
	
	
}
