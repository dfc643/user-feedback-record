<?php
/**
 * ���ļ� ·�����б���
 *
 * @param string $path
 */
function encodePath($path)
{
    $tmp_array = explode('/', $path);
    foreach ($tmp_array as $key => $value)
    {
        if ($value == '')           //ɾ��������
            unset($tmp_array[$key]);
        $tmp_array[$key]=rawurlencode($value);
    }
    return implode("/", $tmp_array);
}

/**
 * ��ʾ��֤�����봰��
 * @param string $user �û���
 * @param string $pass ����
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
        echo '<head><meta http-equiv="Content-Type" content="text/html; charset=gb2312"><title>ϵͳ��¼</title></head><form action="'.$_SERVER[PHP_SELF].'" method="post"><table border="1" align="center"><tr><td colspan="2" align="center"><b>ϵͳ��¼</b></td></tr><tr><td>�˺�</td><td><input type="text" name="PHP_AUTH_USER" value="Administrator"/></td></tr><tr><td>����</td><td><input type="password" name="PHP_AUTH_PW"/></td></tr><tr><td colspan="2" align="center"><input type="submit" value="��¼"/></td></tr></table></form><center><small>*ϵͳ��ʼ����Ϊ123456</small></center>';
        exit;
    }
    return true;
}

if(!webAuthenticate("Administrator","123456"))        //��֤�û�
{
    die();
}
//2005-4-11
//��ʾ��ǰĿ¼�µ��ļ�
$_CONFIG["SiteName"]="�ļ������";                   //��վ����
$_CONFIG["SiteUrl"]="http://www.fcsys.us";            //��վ��ַ

?>
<html>
<head>
<title><?php print($_CONFIG["SiteName"])." ".$_CONFIG["SiteUrl"]; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style type="text/css">
<!--
A:link {
    FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: ����; TEXT-DECORATION: none
}
A:active {
    FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: ����; TEXT-DECORATION: none
}
A:visited {
    FONT-SIZE: 12px; COLOR: #000000; FONT-FAMILY: ����; TEXT-DECORATION: none
}
A:hover {
    FONT-SIZE: 12px; COLOR: #999999; FONT-FAMILY: ����; TEXT-DECORATION: underline
}

BODY {
    WORD-BREAK: break-all; LINE-HEIGHT: 150%
}
TD {
    FONT-SIZE: 12px; FONT-FAMILY: ����
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
    $prevRealpath=dirname($_GET["dir"]);    //�õ���һ���Ŀ¼
    if(substr($_GET["dir"], -1) != '/')
    {    $_GET["dir"] .= '/';
    }
    $_DIR_PATH=$_GET["dir"];

//    print($_DIR_PATH);
//    die();
    print('<table border=1  width=750px align="center"  bordercolordark="#FFFFFF"  cellpadding="2" cellspacing="2"><tr>');
    print("<td>��ǰĿ¼·����[<b>".$_DIR_PATH."</b>]</td>");
    print("<td align=right>");
    print("��<a href='?dir=&index=1'>");
    print("[���ظ�Ŀ¼]");
    print("</a>");
    
    print("��<a href='?dir=".rawurlencode($prevRealpath)."&index=1'>");
    print("������һ��Ŀ¼");
    print("</a>��");
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
    <td  align=center>�ļ�����</td>
    <td  align=center>�ļ���С</td>
    <td  align=center>�޸�ʱ��</td>
</tr>
<?php
while($tmp_Str=$DIRObject->read())
{
    if($tmp_Str!="."&&$tmp_Str!="..")
    {
        $numb++;
        print("<tr>");

        if(is_dir($DIRObject->path.$tmp_Str))        //��Ŀ¼
        {
            print("<td>");
            print("<a href='?dir="./*encodePath(*/$_DIR_PATH.$tmp_Str/*)*/."&index=1'>"); //��Щ�����������·������
            print($tmp_Str);
            print("</a>");
            print(" </td>");
                       
            print("<td>");
            print("<a href='?dir=".encodePath($_DIR_PATH.$tmp_Str)."&index=1'>");
            print("[<font color=red>Ŀ¼</font>] ");
            print("</a>");
            print(" </td>");
            
            print("<td align=center>");
            print(strftime("%Y��%m��%d�� %H:%M:%S",filemtime($_DIR_PATH.$tmp_Str)));
            print(" </td>");
        }
        else    //������ʾ���ļ�
        {
            if(strstr($tmp_Str,".php") || strstr($tmp_Str,".asp")  )    //����ʾ .php .asp���ļ�
                continue;
                
            print("<td>");
            print("<a target=_blank href='"./*encodePath(*/$_DIR_PATH.$tmp_Str/*)*/."'>");   //��Щ�����������·������
            print($tmp_Str);    //$_DIR_PATH.
            print("</a>");
            print(" </td>");
            
            

            print("<td>");
            $kbSize=round(filesize($_DIR_PATH.$tmp_Str)/1000,2);
            $mbSize=round($kbSize/1000,2);
            if($mbSize>1)
                print($mbSize." ���ֽ�");
            else if($kbSize>1)
                print($kbSize." ǧ�ֽ�");
            else
                print(filesize($_DIR_PATH.$tmp_Str)." �ֽ�");
            print(" </td>");

            print("<td align=center>");
            print(strftime("%Y��%m��%d�� %H:%M:%S",filemtime($_DIR_PATH.$tmp_Str)));
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