def win():
	 #"C:\Program Files\7-Zip\7z.exe" a -t7z files.7z "C:\Program Files (x86)\Steam\SteamApps\appmanifest_730.acf" -oC:\
	for i in range(1,43):

		builder = 'start psexec \\\\IS-M430M27-'
		if i < 10 :
			builder = builder + '0'
		builder = builder + str(i) + " \"C:\\Program Files\\7-Zip\\7z.exe\" a -t7z files.7z \"C:\\Program Files (x86)\\Steam\\SteamApps\\appmanifest_730.acf\""
		print builder
		

win();