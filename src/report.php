<!DOCTYPE html>
<html>
<head>
    <meta charset="gb2312"/>
    <title>网桥用户故障申报登记</title>
</head>
<body>
<form action="<?php echo $_SERVER[PHP_SELF]; ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="com" value="1" >
    <table width="750px" border="1px" align="center">
        <tr>
            <td colspan="3"><div style="text-align:center;"><b>用户故障申报登记</b></div></td>
        </tr>
        <tr>
            <td>申报人：<input type="text" name="name"/></td>
            <td>学校：<input type="text" name="school"/></td>
            <td>楼栋宿舍：<input type="text" name="room" value="如: 西1-510"/></td>
        </tr>
        <tr>
            <td colspan="3">
                <center><h3>问卷调查<font size="-10"><small>*可选</small></font></h3></center>
                <ol>
                    <li>您的电信天翼账号使用中途是否出现过账号失效？<input name="ctaccpro" type="radio" id="ctaccpro" value="出现过账号失效的情况，"/>是 <input name="ctaccpro" type="radio" id="ctaccpro" value=""/>否
                    <li>您的在上网的过程中是否突然弹出过电信认证网页？<input name="ctweb" type="radio" id="ctweb" value="上网时弹出电信拨号网页，"/>是 <input name="ctweb" type="radio" id="ctweb" value=""/>否
                    <li>您的是否遇到过必须拔掉网桥电源才能上网的情况？<select name="ubntpower"><option value="每天网桥死机好几次，">每天好几次</option><option value="网桥死机一天一次，">一天约一次</option><option value="网桥偶尔死机，">偶尔</option><option value="网桥一周难遇到死机，">一周难遇到</option></select>
                    <li>您在使用拨号软件还是电信认证网页进行拨号？<input name="dialway" type="radio" id="dialway" value="我使用软件拨号，"/>拨号软件 <input name="dialway" type="radio" id="dialway" value="我使用网页拨号，"/>电信网页
                    <li>您的电脑是否无法使用拨号软件？<input name="dialsoft" type="radio" id="dialsoft" value="无法使用拨号软件，"/>不能 <input name="dialway" type="radio" id="dialway" value=""/>能用
                    <li>您一共有多少台电脑在共用一个网桥？<input name="oneubnt" type="text" size="10"/>
                </ol>
            </td>
        </tr>
        <tr>
            <td>网桥IP：<input type="text" name="ubntip" value="192.168.10.20"/></td>
            <td>常见问题：
                <select name="usual" style="width:120px;">
                    <option value="客户由自己描述问题" selected="selected">这里没有我的问题，我将在问题描述处描述</option>
                    <option value="登陆页面打不开必须重启网桥">不能显示电信登陆页面，必须拔掉电源再插上</option>
                    <option value="账号失效需更换">账号老提示错误，或者提示密码错误不能登陆</option>
                    <option value="软件提示网络错误">使用拨号软件拨号时，反复拨号都提示网络问题</option>
                    <option value="网桥硬件问题">不能拨号提示网络错误，查看网桥指示灯不亮，线插好了</option>
                    <option value="账号非正常下线">上次没有断开拨号，这次不能登陆了</option>
                </select>
            </td>
            <td>联系方式：<input type="text" name="contact" value="手机/QQ/电子邮箱"/></td>
        </tr>
        <tr>
            <td colspan="3"><small><font color="red">*【网桥IP】请不要随便修改，如果宿舍安装了多个网桥请填写正确的网桥IP。</font>为详细问题，建议在【问题描述】处输入详情。</small></td>
        </tr>
        <tr>
            <td colspan="3"><textarea name="problem" rows="10" cols="89">【问题描述/建议提供】请在这里描述详细的问题或者提供建议。</textarea></td>
        </tr>
        <tr>
            <td colspan="2"><div style="text-align:right;"><small><font color="red"><b>如果</b></font><font color="green">使用网络诊断应用程序生成了报告文件请选择c:\wenti.txt【报告文件】→</font></small></div></td>
            <td><input name="reportfile" id="reportfile" type="file"/></td>
        </tr>
        <tr>
            <td colspan="3"><small>
                【网络诊断应用程序】报告生成说明<br/>
                1、首先下载诊断工具：<a href="netreporter.bat" target="_blank">立即下载</a><br/>
                2、然后双击打开直到提示完成后关闭窗口<br/>
                3、在此页面的【报告文件】处选择C:\wenti.txt<br/>
                4、完成所有项目后点提交
            </small></td>
        </tr>
        <tr>
            <td colspan="3"><div style="text-align:center;"><input type="submit" name="submit" value="提交"/></div></td>
        </tr>
    </table>
</form>
<center>
<?php
/*
程序设计：北极光.Norckon
设计日期：2013年10月8日
程序版本：v0.2 beta
作者网站：www.fcsys.us
*/
if ($_POST['com'] == "1") 
{
    if($_POST['name'] == "")
    {
        echo '<script>alert("您还没有填写【申报人】项目，不能提交！")</script>';
        exit ;
    }
    else if ($_POST['school'] == "")
    {
        echo '<script>alert("您还没有填写【学校】项目，不能提交！")</script>';
        exit ;
    }
    else if ($_POST['room'] == "" || $_POST['room'] == "如: 西1-510")
    {
        echo '<script>alert("您没有正确填写【楼栋宿舍】项目，不能提交！")</script>';
        exit ;
    }
    else if ($_POST['usual'] == "客户由自己描述问题" && $_POST['problem'] == "【问题描述/建议提供】请在这里描述详细的问题或者提供建议。")
    {
        echo '<script>alert("请您详细地描述您当前的问题或者在【常见问题】中选择一项，若不清楚什么问题，请上传报告文件！")</script>';
        exit ;
    }
    else if ($_POST['contact'] == "手机/QQ/电子邮箱")
    {
        echo '<script>alert("您没有正确填写【联系方式】项目，不能提交！")</script>';
        exit ;
    }
    
    if ($_FILES["reportfile"]["type"] != "text/plain" && $_FILES["reportfile"]["type"] != "")  //不是TXT文本就不要上传了免得搞鬼
    {
        echo "<script>alert('报告文件不正确，请选择正确的报告文件位于C:\\\\wenti.txt')</script>";
        exit ;
    }
    
    $file = 'Reports/' . $_POST['name'] . '.txt' ;
    $fp=fopen($file,"a+");
           
    if (1)  //这绝壁是坑爹的！O(∩_∩)O
    {              
        date_default_timezone_set("PRC");
        $time = date("Y-m-j H:i:s ");
        $data = "客户姓名：" . $_POST["name"] . "\r\n所在学校：" . $_POST["school"] . "\r\n所在宿舍：" . $_POST["room"] . "\r\n联系方式：" . $_POST["contact"] . "\r\n\r\n--------------问卷调查报告---------\r\n" . $_POST['ctaccpro'] . $_POST['ctweb'] . $_POST['ubntpower'] . $_POST['dialway'] . $_POST['dialsoft'] . "我们宿舍一共有" . $_POST['oneubnt'] . "电脑共用一个网桥," . "\r\n-----------------------------------\r\n网桥IP：" . $_POST["ubntip"] . "\r\n主要问题：" . $_POST["usual"] . "\r\n\r\n--------------附加问题描述---------\r\n" . $_POST["problem"] . "\r\n-----------------------------------\r\n---------------诊断报告------------\r\n";
        fwrite($fp,$data);
        
        if ($_FILES["reportfile"]["type"] != "")  //上传了报告文件才进行这项操作
        {
            $fp2 = fopen($_FILES["reportfile"]["tmp_name"],"rb");
            while(!feof($fp2))
            {
                $buffer=fgets($fp2,40960);
                fwrite($fp, $buffer);
            }
            fclose($fp2);
        }
        
        $data = "\r\n-----------------------------------\r\n上报时间：" . $time . "\r\n\r\nFC-SYSTEM COMPUTER INC.\r\n===================================\r\n\r\n";
        fwrite($fp,$data);

        fclose($fp);
        echo '<script>alert("问题已经成功上报，请等待技术人员与您取得联系！")</script>';
    } 
    else 
    {
        echo '<script>alert("系统错误，问题上报失败")</script>';
    }
}
echo '程序设计：北极光.Norckon';
?>
&nbsp;<a href="Reports/">[查看已上报列表]</a>
</center>
</body>
</html>