echo off
:run
uniscr /D /C-
uniscr /A /F:font\font8x16.fnt,font\font8x8.fnt  /C
glav_mou n
uniscr /D /C-
uniscr /F:font\basic.fnt
echo.
echo.
echo.
echo.
choice Перезагрузить СИРИУС /t:y,10
if errorlevel 2 goto bye
goto run
:bye
