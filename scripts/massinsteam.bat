:: Ashish Chandwani - IUGA - Spring 2013
:: installs steam to the computers in the given file
:: massinsteam room_num computer_num installer_location file_name
:: file name should have computer number on each line
@echo off

:: get arguments
set argC=0
for %%x in (%*) do Set /A argC+=1
IF NOT "%argC%"=="3" GOTO ERROR

for /F "tokens=*" %%A in (%3) do (insteam.bat %1 %%A %3)
GOTO END

:ERROR
echo bad params

:USAGE
echo USAGE: %0 room_num installer_location input_file

:END