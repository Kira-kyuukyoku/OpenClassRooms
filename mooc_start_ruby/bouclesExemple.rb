#Boucles sur les tableaux
#------------------------------------------------------------------
utilisateurs=[
	"Alice","Bob","John"
]

#Boucle simple pour parcourir les utilisateurs du tableau
utilisateurs.each do |utilisateur|
	puts utilisateur
end

#Boucle avec compteur pour parcourir les utilisateurs du tableau
i=0
utilisateurs.each do |utilisateur|
	puts i
	i=i+1
	puts utilisateur
end

#Boucles de répétition
#------------------------------------------------------------------

#Boucle simple pour répéter une action
10.times do
	puts "Hello"
end

#Boucle avec compteur pour répéter une action
10.times do |i|
	puts "Hello #{i}" #le #{i} permet d'afficher la valeur de la variable i
end

#Boucle dans une boucle
10.times do |i|
	puts "Hello #{i}"
	i.times do
		puts "World"
	end
end
