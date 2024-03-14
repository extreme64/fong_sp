@echo off

rem Check if argument is START or STOP
if "%1" == "START" (
    echo Starting MariaDB server...
    start /min "MariaDB Server" "G:\Programs\xamp-8.0.28-0\mysql\scripts\ctl.bat" START

    echo Starting PHP development server...
    php -S localhost:8000 -t public
) else if "%1" == "STOP" (
    echo Stopping MariaDB server...
    start /min "MariaDB Server" "G:\Programs\xamp-8.0.28-0\mysql\scripts\ctl.bat" STOP

    rem Attempt to stop PHP development server by finding and killing the process
    @REM echo Stopping PHP development server...
    @REM taskkill /F /IM php.exe /T
) else (
    echo Invalid argument. Use 'START' or 'STOP'.
)