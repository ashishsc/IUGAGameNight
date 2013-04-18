:: torrent
start psexec \\IS-M430M27-01 -c -v -d -s -i ../utorrent.exe /NOINSTALL /DIRECTORY "C:\Program Files (x86)\Steam\Steamapps\common\" \\IS-M440M27-21\gamenight\CSGOFOREALZ.torrent

:: restart
start psshutdown.exe \\IS-M430M27-01 -r -t 1

:: unzip
start psexec \\IS-M430M27-01 "C:\Program Files\7-Zip\7z.exe" e "C:\Lan\common.7z" -y -oC:\

:: other unzip
start psexec \\IS-M430M27-01 "C:\Program Files\7-Zip\7z.exe" e "C:\Lan\common.7z" -y -oC:\
