:: Ashish Chandwani - IUGA - Spring 2013
:: This file is used to install steam in a given computer lab
:: insteam room_num computer_num steam_installer_location
:: Sample run:
:: start psexec \\IS-M430M27-02 -c -v -d -s -i msiexec /i  \\IS-M430M27-21\gamenight\PsTools\SteamInstall.msi /q
:: REQUIRES psexec, SteamInstall.msi
:: Please make sure computers are restarted beforehand
:: instloc cannot be a network location

@echo off

:: get number of args
set argC=0
for %%x in (%*) do Set /A argC+=1
IF NOT "%argC%"=="3" GOTO ERROR

set INSTALLER=SteamInstall.msi

:: Assemble
set PREFIX=\\IS-M
set MIDFIX=M27-
set room=%1
set instloc=%3
set computer=%PREFIX%%room%%MIDFIX%%2


echo installing to %computer%
echo from %instloc%

:: quietly install
start psexec %computer% -c -v -d -s -i msiexec /i  %instloc%\%INSTALLER% /q
GOTO END

:ERROR
echo %0:ERROR bad params!

:USAGE
echo usage: %0 room_num computer_num steam_installer_location
echo to install steam

:END