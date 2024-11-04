@echo off
rem START or STOP Services
rem ----------------------------------
rem Check if argument is STOP or START

if not ""%1"" == ""START"" goto stop

if exist D:\projects\hypersonic\scripts\ctl.bat (start /MIN /B D:\projects\server\hsql-sample-database\scripts\ctl.bat START)
if exist D:\projects\ingres\scripts\ctl.bat (start /MIN /B D:\projects\ingres\scripts\ctl.bat START)
if exist D:\projects\mysql\scripts\ctl.bat (start /MIN /B D:\projects\mysql\scripts\ctl.bat START)
if exist D:\projects\postgresql\scripts\ctl.bat (start /MIN /B D:\projects\postgresql\scripts\ctl.bat START)
if exist D:\projects\apache\scripts\ctl.bat (start /MIN /B D:\projects\apache\scripts\ctl.bat START)
if exist D:\projects\openoffice\scripts\ctl.bat (start /MIN /B D:\projects\openoffice\scripts\ctl.bat START)
if exist D:\projects\apache-tomcat\scripts\ctl.bat (start /MIN /B D:\projects\apache-tomcat\scripts\ctl.bat START)
if exist D:\projects\resin\scripts\ctl.bat (start /MIN /B D:\projects\resin\scripts\ctl.bat START)
if exist D:\projects\jboss\scripts\ctl.bat (start /MIN /B D:\projects\jboss\scripts\ctl.bat START)
if exist D:\projects\jetty\scripts\ctl.bat (start /MIN /B D:\projects\jetty\scripts\ctl.bat START)
if exist D:\projects\subversion\scripts\ctl.bat (start /MIN /B D:\projects\subversion\scripts\ctl.bat START)
rem RUBY_APPLICATION_START
if exist D:\projects\lucene\scripts\ctl.bat (start /MIN /B D:\projects\lucene\scripts\ctl.bat START)
if exist D:\projects\third_application\scripts\ctl.bat (start /MIN /B D:\projects\third_application\scripts\ctl.bat START)
goto end

:stop
echo "Stopping services ..."
if exist D:\projects\third_application\scripts\ctl.bat (start /MIN /B D:\projects\third_application\scripts\ctl.bat STOP)
if exist D:\projects\lucene\scripts\ctl.bat (start /MIN /B D:\projects\lucene\scripts\ctl.bat STOP)
rem RUBY_APPLICATION_STOP
if exist D:\projects\subversion\scripts\ctl.bat (start /MIN /B D:\projects\subversion\scripts\ctl.bat STOP)
if exist D:\projects\jetty\scripts\ctl.bat (start /MIN /B D:\projects\jetty\scripts\ctl.bat STOP)
if exist D:\projects\hypersonic\scripts\ctl.bat (start /MIN /B D:\projects\server\hsql-sample-database\scripts\ctl.bat STOP)
if exist D:\projects\jboss\scripts\ctl.bat (start /MIN /B D:\projects\jboss\scripts\ctl.bat STOP)
if exist D:\projects\resin\scripts\ctl.bat (start /MIN /B D:\projects\resin\scripts\ctl.bat STOP)
if exist D:\projects\apache-tomcat\scripts\ctl.bat (start /MIN /B /WAIT D:\projects\apache-tomcat\scripts\ctl.bat STOP)
if exist D:\projects\openoffice\scripts\ctl.bat (start /MIN /B D:\projects\openoffice\scripts\ctl.bat STOP)
if exist D:\projects\apache\scripts\ctl.bat (start /MIN /B D:\projects\apache\scripts\ctl.bat STOP)
if exist D:\projects\ingres\scripts\ctl.bat (start /MIN /B D:\projects\ingres\scripts\ctl.bat STOP)
if exist D:\projects\mysql\scripts\ctl.bat (start /MIN /B D:\projects\mysql\scripts\ctl.bat STOP)
if exist D:\projects\postgresql\scripts\ctl.bat (start /MIN /B D:\projects\postgresql\scripts\ctl.bat STOP)

:end

