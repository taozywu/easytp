<?php

/**
 * 系统公用函数.
 *
 * @author taozywu
 * @date 2016/08/17
 */

/**
 * 获取当前完整url
 * @return [type] [description]
 */
function getFullUrl()
{
    $potocalName = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
    $selfName = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
    $pathName = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $relateUrl = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $selfName
        . (isset($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : $pathName);

    return $potocalName . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '') . $relateUrl;
}


/**
 * 邮件发送
 * @param type $mailConfig
 * @param type $mailTo
 * @param type $mailSubject
 * @param type $mailContent
 */
function sendMail($mailConfigArray, $mailToArray, $mailSubject, $mailContent)
{
    // 配置
//		$mailConfigArray = array(
//			"host" => "smtp.8888.com.cn",
//			"port" => 25,
//			"user_name" => "8888@8888.com.cn",
//			"password" => "8888" ,
//			"from" => "8888@8888.com.cn",
//			"from_name" => "8888@8888.com.cn",
//		);
    // 邮件人
//		$mailToArray = array(
//			"8888@8888.com.cn" , "8888@8888.com.cn"
//		);
    require_once COMMON_PATH .'Ext/email/class.phpmailer.php';

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->IsHTML(true);
    $mail->Host = "{$mailConfigArray['host']}";
    $mail->Port = $mailConfigArray['port'];
    $mail->SMTPAuth = true;
    $mail->Username = "{$mailConfigArray['user_name']}";
    $mail->Password = "{$mailConfigArray['password']}";
    $mail->From = isset($mailConfigArray['from']) ? "{$mailConfigArray['from']}" : "{$mailConfigArray['user_name']}";
    $mail->FromName = isset($mailConfigArray['from_name']) ? "{$mailConfigArray['from_name']}" : "{$mailConfigArray['user_name']}";

    if (!empty($mailToArray)) {
        if (is_array($mailToArray)) {
            foreach ($mailToArray as $mailTo) {
                $mail->AddAddress($mailTo);
            }
        } else {
            $mail->AddAddress($mailToArray);
        }
    }

    $mail->CharSet = "utf-8";
    // $mail->CharSet = "GBK";
    $mail->Subject = "=?utf-8?B?" . base64_encode($mailSubject) . "?=";
    $mail->Body = $mailContent;

    //print_r($mail);exit();
    if (!$mail->Send()) {

        echo "Message could not be sent. <p>";
        echo "Mailer Error: " . $mail->ErrorInfo;
        return false;
    } else {
        //echo "ok";
        return true;
    }
    //return !$mail->Send() ? false : true;
}

/**
 * excel 导出
 * @param  [type] $datas     [description]
 * @param  [type] $titlename [description]
 * @param  [type] $title     [description]
 * @param  [type] $filename  [description]
 * @return [type]            [description]
 */
function outputExcel($datas, $titlename, $title, $filename)
{
    $str = "<html xmlns:o=\"urn:schemas-microsoft-com:office:office\"\r\nxmlns:x=\"urn:schemas-microsoft-com:office:excel\"\r\nxmlns=\"http://www.w3.org/TR/REC-html40\">
	\r\n<head>\r\n<meta http-equiv=Content-Type content=\"text/html; charset=utf-8\">\r\n</head>\r\n<body>";
    $str .= "<table border=1><tr>" . $titlename . "</tr>\r\n";
    $str .= $title;
    foreach ($datas as $key => $rt) {
        $str .= "<tr>";
        foreach ($rt as $k => $v) {
            $str .= "<td>{$v}</td>";
        }
        $str .= "</tr>\r\n";
    }
    $str .= "</table></body></html>";
    //echo $str;die();
    header("Content-Type: application/vnd.ms-excel; name='excel'");
    header("Content-type: application/octet-stream");
    header("Content-Disposition: attachment; filename=" . $filename);
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Pragma: no-cache");
    header("Expires: 0");
    exit($str);
}

/**
 * html 转义
 * @param  [type] $data    [description]
 * @param  array  $filters [description]
 * @return [type]          [description]
 */
function dataEscape($data, $filters = array())
{
    if (!$data) return false;
    $filters = !$filters ? C("DEFAULT_DECODE_FILTER") : $filters;
    $filters = !empty($filters) ? explode(",", $filters) : NULL;
    if (is_array($filters)) {
        foreach ($filters as $filter) {
            $data = is_array($data) ? array_map_recursive($filter, $data) : $filter($data);
        }
    } else {
        $data = is_array($data) ? array_map_recursive($filters, $data) : $filters($data);
    }

    return $data;
}
