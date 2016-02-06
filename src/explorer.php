<?php
/**
 * 对文件 路径进行编码
 *
 * @param string $path
 */
function encodePath($path)
{
    $tmp_array = explode('/', $path);
    foreach ($tmp_array as $key => $value)
    {
        if ($value == '')           //删除空内容
            unset($tmp_array[$key]);
        $tmp_array[$key]=rawurlencode($value);
    }
    return implode("/", $tmp_array);
}

/**
 * 显示验证的输入窗口
 * @param string $user 用户名
 * @param string $pass 密码
 * @access public
 */
function webAuthenticate($user,$pass)
{
    if ($_GET['index'] == "1")
        return true;
    if (!isset($_POST['PHP_AUTH_USER']) || !isset($_POST['PHP_AUTH_PW'])  || !isset($user)  || !isset($pass)  
        || $_POST['PHP_AUTH_USER']!=$user | $_POST['PHP_AUTH_PW']!=$pass 
        )
    {
        header('WWW-Authenticate: Basic realm="Authentication System"');
        header('HTTP/1.0 401 Unauthorized');
        //echo "You must enter a valid login ID and password to access this resource ";
        echo '<head><meta http-equiv="Content-Type" content="text/html; charset=gb2312"><title>系统登录</title></head><form action="'.$_SERVER[PHP_SELF].'" method="post"><table border="1" align="center"><tr><td colspan="2" align="center"><b>系统登录</b></td></tr><tr><td>账号</td><td><input type="text" name="PHP_AUTH_USER" value="Administrator"/></td></tr><tr><td>密码</td><td><input type="password" name="PHP_AUTH_PW"/></td></tr><tr><td colspan="2" align="center"><input type="submit" value="登录"/></td></tr></table></form><center><small>*系统初始密码为123456</small></center>';
        exit;
    }
    return true;
}

if(!webAuthenticate("Administrator","123456"))        //验证用户
{
    die();
}
//2005-4-11
//显示当前目录下的文件
$_CONFIG["SiteName"]="文件浏览器";                   //网站名称
$_CONFIG["SiteUrl"]="http://www.fcsys.us";            //网站地址

?>
<html>
<head>
<title><?php print($_CONFIG["SiteName"])." ".$_CONFIG["SiteUrl"]; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style type="text/css">
<!--
A:link {
    FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: 宋体; TEXT-DECORATION: none
}
A:active {
    FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: 宋体; TEXT-DECORATION: none
}
A:visited {
    FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: 宋体; TEXT-DECORATION: none
}
A:hover {
    FONT-SIZE: 12px; COLOR: #999999; FONT-FAMILY: 宋体; TEXT-DECORATION: underline
}

BODY {
    WORD-BREAK: break-all; LINE-HEIGHT: 150%
}
TD {
    FONT-SIZE: 12px; FONT-FAMILY: 宋体
}
-->
</style>
</head>

<body bgcolor="#FFFFFF" text="#000000">
<center><font color=#ee0000><?php print($_CONFIG["SiteName"]); ?></font>
<br><a href=<?php print($_CONFIG["SiteUrl"]); ?>><?php print($_CONFIG["SiteUrl"]); ?></a></center>

<?php

$_DIR_PATH="./";
if(!empty($_GET["dir"]) && strlen($_GET["dir"])>3 && ".."!=substr($_GET["dir"], 0, 2))
{
    $prevRealpath=dirname($_GET["dir"]);    //得到上一层的目录
    if(substr($_GET["dir"], -1) != '/')
    {    $_GET["dir"] .= '/';
    }
    $_DIR_PATH=$_GET["dir"];

//    print($_DIR_PATH);
//    die();
    print('<table border=1  width=750px align="center"  bordercolordark="#FFFFFF"  cellpadding="2" cellspacing="2"><tr>');
    print("<td>当前目录路径：[<b>".$_DIR_PATH."</b>]</td>");
    print("<td align=right>");
    print("　<a href='?dir=&index=1'>");
    print("[返回根目录]");
    print("</a>");
    
    print("　<a href='?dir=".rawurlencode($prevRealpath)."&index=1'>");
    print("返回上一层目录");
    print("</a>　");
    print("</td>");
    print('</tr></table>');

}
$numb=0;
if(empty($_DIR_PATH))
    $DIRObject=dir("./");
else
    $DIRObject=dir($_DIR_PATH);


?>


<table border=1  width=750px align="center"  bordercolordark="#FFFFFF"  cellpadding="2" cellspacing="2">
<tr>
    <td  align=center>文件名称</td>
    <td  align=center>文件大小</td>
    <td  align=center>修改时间</td>
</tr>
<?php
while($tmp_Str=$DIRObject->read())
{
    if($tmp_Str!="."&&$tmp_Str!="..")
    {
        $numb++;
        print("<tr>");

        if(is_dir($DIRObject->path.$tmp_Str))        //是目录
        {
            print("<td>");
            print("<a href='?dir="./*encodePath(*/$_DIR_PATH.$tmp_Str/*)*/."&index=1'>"); //有些服务器编码后路径不对
            print($tmp_Str);
            print("</a>");
            print(" </td>");
                       
            print("<td>");
            print("<a href='?dir=".encodePath($_DIR_PATH.$tmp_Str)."&index=1'>");
            print("[<font color=red>目录</font>] ");
            print("</a>");
            print(" </td>");
            
            print("<td align=center>");
            print(strftime("%Y年%m月%d日 %H:%M:%S",filemtime($_DIR_PATH.$tmp_Str)));
            print(" </td>");
        }
        else    //其他显示的文件
        {
            if(strstr($tmp_Str,".php") || strstr($tmp_Str,".asp")  )    //不显示 .php .asp的文件
                continue;
                
            print("<td>");
            print("<a target=_blank href='"./*encodePath(*/$_DIR_PATH.$tmp_Str/*)*/."'>");   //有些服务器编码后路径不对
            print($tmp_Str);    //$_DIR_PATH.
            print("</a>");
            print(" </td>");
            
            

            print("<td>");
            $kbSize=round(filesize($_DIR_PATH.$tmp_Str)/1000,2);
            $mbSize=round($kbSize/1000,2);
            if($mbSize>1)
                print($mbSize." 兆字节");
            else if($kbSize>1)
                print($kbSize." 千字节");
            else
                print(filesize($_DIR_PATH.$tmp_Str)." 字节");
            print(" </td>");

            print("<td align=center>");
            print(strftime("%Y年%m月%d日 %H:%M:%S",filemtime($_DIR_PATH.$tmp_Str)));
            print(" </td>");
        }

        print("</tr>");
    }
}
$DIRObject->close();


?>
</table>
</body>
</html>