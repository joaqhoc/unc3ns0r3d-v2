<?php

 
class curl
{
    private $options;
    public $errno;
    public $errmsg;
    public $content;
    public $headers;
    public $httpcode;

    public function __construct()
    {
        global $config;
        $this->options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_SSL_VERIFYHOST => 2,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_AUTOREFERER => true,
            CURLOPT_COOKIEFILE => $config['cookie_file'],
            CURLOPT_COOKIEJAR => $config['cookie_file']);
    }

    public function setopt($key, $val)
    {
        eval('$opt = CURLOPT_' . strtoupper($key) . ';');
        $this->options[$opt] = $val;
    }

    public function removeopt($key)
    {
        switch (strtolower($key))
        {
            case 'post':
                unset($this->options[CURLOPT_POST]);
                unset($this->options[CURLOPT_POSTFIELDS]);
                break;
            case 'sock5':
                unset($this->options[CURLOPT_HTTPPROXYTUNNEL]);
                unset($this->options[CURLOPT_PROXY]);
                unset($this->options[CURLOPT_PROXYTYPE]);
                break;
			default:
                eval('$opt = CURLOPT_' . strtoupper($key) . ';');
                unset($this->options[$opt]);
        }
    }


	
	    public function sock5($sock)
    {
        $this->options[CURLOPT_HTTPPROXYTUNNEL] = true;
        $this->options[CURLOPT_PROXY] = $sock;
        $this->options[CURLOPT_PROXYTYPE] = CURLPROXY_SOCKS5;
    }

    public function ref($ref)
    {
        $this->options[CURLOPT_REFERER] = $ref;
    }

    public function httpheader($headers)
    {
        $this->options[CURLOPT_HTTPHEADER] = $headers;
    }

    public function cookies($cookies)
    {
        $this->options[CURLOPT_COOKIE] = $cookies;
        $this->removeopt('cookiefile');
        $this->removeopt('cookiejar');
    }

    public function header($val = false)
    {
        $this->options[CURLOPT_HEADER] = $val;
    }

    public function nobody($val = false)
    {
        $this->options[CURLOPT_NOBODY] = $val;
    }

    public function ua($ua)
    {
        $this->options[CURLOPT_USERAGENT] = $ua;
    }

    public function postdata($postdata)
    {
        if (is_array($postdata))
        {
            $post_array = array();
            foreach ($postdata as $key => $value)
            {
                $post_array[] = urlencode($key) . '=' . urlencode($value);
            }
            $post_string = implode('&', $post_array);
        } else
        {
            $post_string = $postdata;
        }
        $this->options[CURLOPT_POST] = true;
        $this->options[CURLOPT_POSTFIELDS] = $post_string;
    }

    public function page($url)
    {
        $ch = curl_init($url);
        curl_setopt_array($ch, $this->options);
        $this->content = curl_exec($ch);
        $this->errno = curl_errno($ch);
        $this->errmsg = curl_error($ch);
        $this->headers = curl_getinfo($ch);
        $this->httpcode = $this->headers['http_code'];
        curl_close($ch);
        $this->removeopt('post');
    }

    public function validate()
    {
        if ($this->errno)
        {
            return false;
        }
        return true;
    }

    public function display($m, $t = 1, $d = 0)
    {
        if ($t == 1)
        {
            echo '<div>' . $m . '</div>';
        } else
        {
            echo $m;
        }
        if ($d)
        {
            exit;
        }
    }
}

set_time_limit(0);
$dir = dirname(__file__);
$config['cookie_file'] = $dir . '/cookies/' . md5($_SERVER['REMOTE_ADDR']) .
    'ebay.cookie';

if (!file_exists($dir . '/cookies/index.html'))
{
    $f = fopen($dir . '/cookies/index.html', 'w');
    fwrite($f, 'Fuck You ^_^');
    fclose($f);
}

if (!file_exists($config['cookie_file']))
{
    delete_cookies();
}

function delete_cookies()
{
    global $config;
    $f = fopen($config['cookie_file'], 'w');
    fwrite($f, '');
    fclose($f);
}

function get($list)
{
	preg_match_all("/\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\:\d{1,5}/", $list, $socks);
	return $socks[0];
}

function xflush()
{
    static $output_handler = null;
    if ($output_handler === null)
    {
        $output_handler = @ini_get('output_handler');
    }
    if ($output_handler == 'ob_gzhandler')
    {
        return;
    }
    flush();
    if (function_exists('ob_flush') and function_exists('ob_get_length') and
        ob_get_length() !== false)
    {
        @ob_flush();
    } else
        if (function_exists('ob_end_flush') and function_exists('ob_start') and
            function_exists('ob_get_length') and ob_get_length() !== false)
        {
            @ob_end_flush();
            @ob_start();
        }
}
function getCookies($str){
	preg_match_all('/Set-Cookie: ([^; ]+)(;| )/si', $str, $matches);
	$cookies = implode(";", $matches[1]);
	return $cookies;
}
function fetch_value($str, $find_start = '', $find_end = '')
{
    if ($find_start == '')
    {
        return '';
    }
    $start = strpos($str, $find_start);
    if ($start === false)
    {
        return '';
    }
    $length = strlen($find_start);
    $substr = substr($str, $start + $length);
    if ($find_end == '')
    {
        return $substr;
    }
    $end = strpos($substr, $find_end);
    if ($end === false)
    {
        return $substr;
    }
    return substr($substr, 0, $end);
}

function array_remove_empty($arr)
{
    $narr = array();
    while (list($key, $val) = each($arr))
    {
        if (is_array($val))
        {
            $val = array_remove_empty($val);
            // does the result array contain anything?
            if (count($val) != 0)
            {
                // yes :-)
                $narr[$key] = trim($val);
            }
        } else
        {
            if (trim($val) != "")
            {
                $narr[$key] = trim($val);
            }
        }
    }
    unset($arr);
    return $narr;
}

function display($m, $t = 1, $d = 0)
{
    if ($t == 1)
    {
        echo '<div>' . $m . '</div>';
    } else
    {
        echo $m;
    }
    if ($d)
    {
        exit;
    }
}
