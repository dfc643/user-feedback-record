<!DOCTYPE html>
<html>
<head>
    <meta charset="gb2312"/>
    <title>�����û������걨�Ǽ�</title>
</head>
<body>
<form action="<?php echo $_SERVER[PHP_SELF]; ?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="com" value="1" >
    <table width="750px" border="1px" align="center">
        <tr>
            <td colspan="3"><div style="text-align:center;"><b>�û������걨�Ǽ�</b></div></td>
        </tr>
        <tr>
            <td>�걨�ˣ�<input type="text" name="name"/></td>
            <td>ѧУ��<input type="text" name="school"/></td>
            <td>¥�����᣺<input type="text" name="room" value="��: ��1-510"/></td>
        </tr>
        <tr>
            <td colspan="3">
                <center><h3>�ʾ����<font size="-10"><small>*��ѡ</small></font></h3></center>
                <ol>
                    <li>���ĵ��������˺�ʹ����;�Ƿ���ֹ��˺�ʧЧ��<input name="ctaccpro" type="radio" id="ctaccpro" value="���ֹ��˺�ʧЧ�������"/>�� <input name="ctaccpro" type="radio" id="ctaccpro" value=""/>��
                    <li>�����������Ĺ������Ƿ�ͻȻ������������֤��ҳ��<input name="ctweb" type="radio" id="ctweb" value="����ʱ�������Ų�����ҳ��"/>�� <input name="ctweb" type="radio" id="ctweb" value=""/>��
                    <li>�����Ƿ�����������ε����ŵ�Դ���������������<select name="ubntpower"><option value="ÿ�����������ü��Σ�">ÿ��ü���</option><option value="��������һ��һ�Σ�">һ��Լһ��</option><option value="����ż��������">ż��</option><option value="����һ��������������">һ��������</option></select>
                    <li>����ʹ�ò���������ǵ�����֤��ҳ���в��ţ�<input name="dialway" type="radio" id="dialway" value="��ʹ��������ţ�"/>������� <input name="dialway" type="radio" id="dialway" value="��ʹ����ҳ���ţ�"/>������ҳ
                    <li>���ĵ����Ƿ��޷�ʹ�ò��������<input name="dialsoft" type="radio" id="dialsoft" value="�޷�ʹ�ò��������"/>���� <input name="dialway" type="radio" id="dialway" value=""/>����
                    <li>��һ���ж���̨�����ڹ���һ�����ţ�<input name="oneubnt" type="text" size="10"/>
                </ol>
            </td>
        </tr>
        <tr>
            <td>����IP��<input type="text" name="ubntip" value="192.168.10.20"/></td>
            <td>�������⣺
                <select name="usual" style="width:120px;">
                    <option value="�ͻ����Լ���������" selected="selected">����û���ҵ����⣬�ҽ�����������������</option>
                    <option value="��½ҳ��򲻿�������������">������ʾ���ŵ�½ҳ�棬����ε���Դ�ٲ���</option>
                    <option value="�˺�ʧЧ�����">�˺�����ʾ���󣬻�����ʾ��������ܵ�½</option>
                    <option value="�����ʾ�������">ʹ�ò����������ʱ���������Ŷ���ʾ��������</option>
                    <option value="����Ӳ������">���ܲ�����ʾ������󣬲鿴����ָʾ�Ʋ������߲����</option>
                    <option value="�˺ŷ���������">�ϴ�û�жϿ����ţ���β��ܵ�½��</option>
                </select>
            </td>
            <td>��ϵ��ʽ��<input type="text" name="contact" value="�ֻ�/QQ/��������"/></td>
        </tr>
        <tr>
            <td colspan="3"><small><font color="red">*������IP���벻Ҫ����޸ģ�������ᰲװ�˶����������д��ȷ������IP��</font>Ϊ��ϸ���⣬�����ڡ��������������������顣</small></td>
        </tr>
        <tr>
            <td colspan="3"><textarea name="problem" rows="10" cols="89">����������/�����ṩ����������������ϸ����������ṩ���顣</textarea></td>
        </tr>
        <tr>
            <td colspan="2"><div style="text-align:right;"><small><font color="red"><b>���</b></font><font color="green">ʹ���������Ӧ�ó��������˱����ļ���ѡ��c:\wenti.txt�������ļ�����</font></small></div></td>
            <td><input name="reportfile" id="reportfile" type="file"/></td>
        </tr>
        <tr>
            <td colspan="3"><small>
                ���������Ӧ�ó��򡿱�������˵��<br/>
                1������������Ϲ��ߣ�<a href="netreporter.bat" target="_blank">��������</a><br/>
                2��Ȼ��˫����ֱ����ʾ��ɺ�رմ���<br/>
                3���ڴ�ҳ��ġ������ļ�����ѡ��C:\wenti.txt<br/>
                4�����������Ŀ����ύ
            </small></td>
        </tr>
        <tr>
            <td colspan="3"><div style="text-align:center;"><input type="submit" name="submit" value="�ύ"/></div></td>
        </tr>
    </table>
</form>
<center>
<?php
/*
������ƣ�������.Norckon
������ڣ�2013��10��8��
����汾��v0.2 beta
������վ��www.fcsys.us
*/
if ($_POST['com'] == "1") 
{
    if($_POST['name'] == "")
    {
        echo '<script>alert("����û����д���걨�ˡ���Ŀ�������ύ��")</script>';
        exit ;
    }
    else if ($_POST['school'] == "")
    {
        echo '<script>alert("����û����д��ѧУ����Ŀ�������ύ��")</script>';
        exit ;
    }
    else if ($_POST['room'] == "" || $_POST['room'] == "��: ��1-510")
    {
        echo '<script>alert("��û����ȷ��д��¥�����᡿��Ŀ�������ύ��")</script>';
        exit ;
    }
    else if ($_POST['usual'] == "�ͻ����Լ���������" && $_POST['problem'] == "����������/�����ṩ����������������ϸ����������ṩ���顣")
    {
        echo '<script>alert("������ϸ����������ǰ����������ڡ��������⡿��ѡ��һ��������ʲô���⣬���ϴ������ļ���")</script>';
        exit ;
    }
    else if ($_POST['contact'] == "�ֻ�/QQ/��������")
    {
        echo '<script>alert("��û����ȷ��д����ϵ��ʽ����Ŀ�������ύ��")</script>';
        exit ;
    }
    
    if ($_FILES["reportfile"]["type"] != "text/plain" && $_FILES["reportfile"]["type"] != "")  //����TXT�ı��Ͳ�Ҫ�ϴ�����ø��
    {
        echo "<script>alert('�����ļ�����ȷ����ѡ����ȷ�ı����ļ�λ��C:\\\\wenti.txt')</script>";
        exit ;
    }
    
    $file = 'Reports/' . $_POST['name'] . '.txt' ;
    $fp=fopen($file,"a+");
           
    if (1)  //������ǿӵ��ģ�O(��_��)O
    {              
        date_default_timezone_set("PRC");
        $time = date("Y-m-j H:i:s ");
        $data = "�ͻ�������" . $_POST["name"] . "\r\n����ѧУ��" . $_POST["school"] . "\r\n�������᣺" . $_POST["room"] . "\r\n��ϵ��ʽ��" . $_POST["contact"] . "\r\n\r\n--------------�ʾ���鱨��---------\r\n" . $_POST['ctaccpro'] . $_POST['ctweb'] . $_POST['ubntpower'] . $_POST['dialway'] . $_POST['dialsoft'] . "��������һ����" . $_POST['oneubnt'] . "���Թ���һ������," . "\r\n-----------------------------------\r\n����IP��" . $_POST["ubntip"] . "\r\n��Ҫ���⣺" . $_POST["usual"] . "\r\n\r\n--------------������������---------\r\n" . $_POST["problem"] . "\r\n-----------------------------------\r\n---------------��ϱ���------------\r\n";
        fwrite($fp,$data);
        
        if ($_FILES["reportfile"]["type"] != "")  //�ϴ��˱����ļ��Ž����������
        {
            $fp2 = fopen($_FILES["reportfile"]["tmp_name"],"rb");
            while(!feof($fp2))
            {
                $buffer=fgets($fp2,40960);
                fwrite($fp, $buffer);
            }
            fclose($fp2);
        }
        
        $data = "\r\n-----------------------------------\r\n�ϱ�ʱ�䣺" . $time . "\r\n\r\nFC-SYSTEM COMPUTER INC.\r\n===================================\r\n\r\n";
        fwrite($fp,$data);

        fclose($fp);
        echo '<script>alert("�����Ѿ��ɹ��ϱ�����ȴ�������Ա����ȡ����ϵ��")</script>';
    } 
    else 
    {
        echo '<script>alert("ϵͳ���������ϱ�ʧ��")</script>';
    }
}
echo '������ƣ�������.Norckon';
?>
&nbsp;<a href="Reports/">[�鿴���ϱ��б�]</a>
</center>
</body>
</html>