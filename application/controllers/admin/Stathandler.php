<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stathandler extends CI_Controller {

  public function __construct()
  {
    parent::__construct();
    $this->load->database();     
  }   

  public function index()
  {
    $log = 'Дата запуска: '.date('H:i:s, d.m.Y')."\n";    
    file_put_contents('statistics_log.txt', $log,FILE_APPEND);  

    //выделяем браузеры и ос из юзер агента
    $query = $this->db->get('hits')->result_array();
    $date = $query[0]['hit_date'];
    foreach ($query as $key => $item)
    {
        $agent = $this->getBrowser($item['hit_user_agent']);
        $data['hit_browser'] = $agent['name'];
        $data['hit_os'] = $agent['platform'];
        $this->db->where('hit_id',$item['hit_id'])->update('hits',$data);
    }



    //считаем и записываем типы браузеров
    $data = NULL;
    $data['br_date'] = $date;

    $query = $this->db->query("SELECT hit_browser, COUNT(hit_browser) FROM hits GROUP BY hit_browser")->result_array();
//    $query = $this->db->select('hit_browser')->
//                        select_sum('hit_browser')->
//                        group_by('hit_browser')->
//                        get('hits')->result_array();


    foreach ($query as $key => $item)
    {
        $data['br_name'] = $item['hit_browser'];
        $data['br_count'] = $item['COUNT(hit_browser)'];
        switch ($data['br_name']) {
            case 'Internet Explorer':
                $data['br_color'] = "#d2d6de";
                $data['br_highlight'] = "#d2d6de";
                break;
            case 'Mozilla Firefox':
                $data['br_color'] = "#f39c12";
                $data['br_highlight'] = "#f39c12";
                break;                
            case 'Google Chrome':
                $data['br_color'] = "#f56954";
                $data['br_highlight'] = "#f56954";
                break;  
            case 'Apple Safari':
                $data['br_color'] = "#00c0ef";
                $data['br_highlight'] = "#00c0ef";
                break;  
            case 'Opera':
                $data['br_color'] = "#3c8dbc";
                $data['br_highlight'] = "#3c8dbc";
                break;  
            case 'Не определен':
                $data['br_color'] = "red";
                $data['br_highlight'] = "red";
                break;                  
            default:
                $data['br_color'] = "gray";
                $data['br_highlight'] = "gray";
                break;  
        }

        // echo '<pre>';
        // print_r($data);
        // die;

        $this->db->insert('browsers',$data);
    }

    //считаем и записываем типы oc
    $data = NULL;
    $data['os_date'] = $date;

    $query = $this->db->query("SELECT hit_os, COUNT(hit_os) FROM hits GROUP BY hit_os")->result_array();
    foreach ($query as $key => $item)
    {
        $data['os_name'] = $item['hit_os'];
        $data['os_count'] = $item['COUNT(hit_os)'];
        $this->db->insert('os',$data);
    } 

    //считаем и записываем посещенные страницы
    $data = NULL;
    $data['page_date'] = $date;

    $query = $this->db->query("SELECT hit_url, COUNT(hit_url) FROM hits GROUP BY hit_url")->result_array();
    foreach ($query as $key => $item)
    {
        $data['page_url'] = $item['hit_url'];
        $data['page_count'] = $item['COUNT(hit_url)'];
        $this->db->insert('pages',$data);
    }    

    //считаем и записываем источники трафика
    $data = NULL;
    $data['ref_date'] = $date;

    $query = $this->db->query("SELECT hit_ref, COUNT(hit_ref) FROM hits GROUP BY hit_ref")->result_array();
    foreach ($query as $key => $item)
    {
        $data['ref_url'] = $item['hit_ref'];
        $data['ref_count'] = $item['COUNT(hit_ref)'];
        $this->db->insert('refs',$data);
    }   

    // считаем и записываем хиты и посетителей
    $data = NULL;

    $data['stat_date'] = $date;
    $data['stat_hits'] = $this->db->count_all('hits');
    $data['stat_visits'] = count($this->db->query("SELECT hit_ip, COUNT(hit_ip) FROM hits GROUP BY hit_ip")->result_array());
    $this->db->insert('stat',$data);

    $this->db->truncate('hits');
     echo 'the end';
  }  


//Расшифровка Юзер агента -------------------------------------------------------------------------------------------
    public function getBrowser($u_agent) 
    { 
        // $u_agent = $_SERVER['HTTP_USER_AGENT']; 
        $bname = 'Не определен';
        $platform = 'Не определен';
        $version= "";
        $ub = '';

        //First get the platform?
        if (preg_match('/linux/i', $u_agent)) {
            $platform = 'linux';
        }
        elseif (preg_match('/macintosh|mac os x/i', $u_agent)) {
            $platform = 'mac';
        }
        elseif (preg_match('/windows|win32/i', $u_agent)) {
            $platform = 'windows';
        }

        // Next get the name of the useragent yes seperately and for good reason
        if(preg_match('/MSIE/i',$u_agent) && !preg_match('/Opera/i',$u_agent)) 
        { 
            $bname = 'Internet Explorer'; 
            $ub = "MSIE"; 
        } 
        elseif(preg_match('/Trident/i',$u_agent)) 
        { // this condition is for IE11
            $bname = 'Internet Explorer'; 
            $ub = "rv";       
        } 
        elseif(preg_match('/Firefox/i',$u_agent)) 
        { 
            $bname = 'Mozilla Firefox'; 
            $ub = "Firefox";          
        } 
        elseif(preg_match('/Chrome/i',$u_agent)) 
        { 
            $bname = 'Google Chrome'; 
            $ub = "Chrome";         
        } 
        elseif(preg_match('/Safari/i',$u_agent)) 
        { 
            $bname = 'Apple Safari'; 
            $ub = "Safari";           
        } 
        elseif(preg_match('/Opera/i',$u_agent)) 
        { 
            $bname = 'Opera'; 
            $ub = "Opera";           
        } 
        elseif(preg_match('/Netscape/i',$u_agent)) 
        { 
            $bname = 'Netscape'; 
            $ub = "Netscape";           
        } 
        
        // finally get the correct version number
        // Added "|:"
        // $known = array('Version', $ub, 'other');
        // $pattern = '#(?<browser>' . join('|', $known) .
        //  ')[/|: ]+(?<version>[0-9.|a-zA-Z.]*)#';
        // if (!preg_match_all($pattern, $u_agent, $matches)) {
            // we have no matching number just continue
        // }

        // see how many we have
        // $i = count($matches['browser']);
        // if ($i != 1) {
        //     //we will have two since we are not using 'other' argument yet
        //     //see if version is before or after the name
        //     if (strripos($u_agent,"Version") < strripos($u_agent,$ub)){
        //         $version= $matches['version'][0];
        //     }
        //     else {
        //         $version= $matches['version'][1];
        //     }
        // }
        // else {
        //     $version= $matches['version'][0];
        // }

        // check if we have a number
        // if ($version==null || $version=="") {$version="?";}

        return array(
            // 'userAgent' => $u_agent,
            'name'      => $bname,
            // 'version'   => $version,
            'platform'  => $platform,
            // 'pattern'   => $pattern
        );
    }  

}