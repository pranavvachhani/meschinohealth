@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop


"D:\projects\mysql\bin\mysqld" --defaults-file="D:\projects\mysql\bin\my.ini" --standalone --console
if errorlevel 1 goto error
goto finish

:stop
cmd.exe /C start "" /MIN call "D:\projects\killprocess.bat" "mysqld.exe"

if not exist "D:\projects\mysql\data\%computername%.pid" goto finish
echo Delete %computername%.pid ...
del "D:\projects\mysql\data\%computername%.pid"
goto finish


:error
echo MySQL could not be started

:finish
exit
