@echo off
echo ����������������������������������������������������
echo �������������û���ϵͳ��Ϣ�ɼ����������������������
echo ����������������������������������������������������
echo.
color 4f
echo ���������ռ�����ϵͳ��Ϣ...
systeminfo > C:\wenti.txt
color 1f
echo ���������ռ���������������Ϣ...
ipconfig /all >> C:\wenti.txt
color 2f
echo �������ڼ�����ı�������...
ping 127.0.0.1 >> C:\wenti.txt
color 3f
echo �������ڼ��[�����������·��(����)]��״��...
ping 192.168.1.1 >> C:\wenti.txt
ping 192.168.0.1 >> C:\wenti.txt
color 4f
echo �������ڼ��[���������������]��״��...
ping 192.168.10.20 >> C:\wenti.txt
color 5f
echo ���������ֻ������DNS����...
nslookup wlan.ct10000.com >> C:\wenti.txt
color 6f
echo �������ڼ��[�������š������ն�]��״��...
ping 61.186.95.108 >> C:\wenti.txt
color 7f
echo �������ڼ��[�������������]��״��...
ping cs.qq.com >> C:\wenti.txt
color 8f
echo.
ping 127.0.0.1 -n 2 > NUL
cls
color 3f
echo ����������������������������������������������������
echo ����������Ϣ�ɼ���ɣ����ϴ�C:\wenti.txt�ļ���������
echo ����������������������������������������������������
echo.
echo ������ 5 ���Ӻ��Զ��ر�
ping 127.0.0.1 -n 5 > NUL