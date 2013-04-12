# IUGA GAME NIGHT
This repo contains all of the scripts neccessary to setup game night in MGH 430/440

## Notes:
* All computers are running windows7
* This set up will use utorrent to distribute the games remotely from the computer being ran on (currently not parameterized)
* Steam will be installed to the default directory, the torrent should download to the appropriate folder
* The reason that the scripts are not parameterized using a list of computers is so that all of the computers can be restarted in parallel rather than in series.
* The tracker was set up on the IUGA server, this tracker MUST be private(should only whitelist certain torrents given the hashes)
* TODO: ROSS FILL IN, MAKE SECTION HERE
* Web distribution php script is used to assign tournament usernames/passes per IP
* TODO: EVAN MAKE SECTION HERE
* Josh created a simple python script to make the batch files more easily (makeBatchScripts.py). All it does is print out the lines of the script for each individual computer in MGH 430 (This will need to change for each batch script that you create)
* PsExec runs a file on a remote computer, it can be any file. The format is 'psexec COMPUTERNAME CMDNAME FLAGSFORCOMMAND'. Look for command line help for the given command
##  Usage Instructions:
* Set up tracker and load seed from host computer,
* Restart all computers using restartAll.bat for a clean slate
* Run installSteam.bat
* Run torrentGames.bat to torrent the games to all of the computers
* Run unzipSteamGames.bat (should put the torrented dota2 and csgo in the right place)


## Notes for improvements in the future:
* Write a real bat script that launches separate shells instead of having a bunch of hacky start pseexec.. files
* OR Heavily modify make.py to generate all of the batch scripts for us.(parameterize and loop) by reading from a file or just taking arguments
* Change it so that the make.py can take a list of computers to modify as an argument (from a file)
* Add param to make.py to make for which room (MGH-440 OR MGH 430 OR IPLC OR CUSTOM)
* make.py should automatically generate all required .bat files for the system
