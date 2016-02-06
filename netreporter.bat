@echo off
echo ┎────────────────────────┒
echo ┃　　　　　用户端系统信息采集程序ｖ１．０　　　　┃
echo ┖────────────────────────┚
echo.
color 4f
echo 程序正在收集您的系统信息...
systeminfo > C:\wenti.txt
color 1f
echo 程序正在收集您的网络配置信息...
ipconfig /all >> C:\wenti.txt
color 2f
echo 程序正在检测您的本地网络...
ping 127.0.0.1 >> C:\wenti.txt
color 3f
echo 程序正在检测[计算机→无线路由(若有)]的状况...
ping 192.168.1.1 >> C:\wenti.txt
ping 192.168.0.1 >> C:\wenti.txt
color 4f
echo 程序正在检测[计算机→无线网桥]的状况...
ping 192.168.10.20 >> C:\wenti.txt
color 5f
echo 程序正在手机计算机DNS配置...
nslookup wlan.ct10000.com >> C:\wenti.txt
color 6f
echo 程序正在检测[无线网桥→电信终端]的状况...
ping 61.186.95.108 >> C:\wenti.txt
color 7f
echo 程序正在检测[计算机→互联网]的状况...
ping cs.qq.com >> C:\wenti.txt
color 8f
echo.
ping 127.0.0.1 -n 2 > NUL
cls
color 3f
echo ┎────────────────────────┒
echo ┃　　　信息采集完成，请上传C:\wenti.txt文件　　　┃
echo ┖────────────────────────┚
echo.
echo 窗口在 5 秒钟后自动关闭
ping 127.0.0.1 -n 5 > NUL