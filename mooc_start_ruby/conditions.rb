#La syntaxe de base d'une condition
#------------------------------------------------------------------

a = 10

puts "a est égal à : #{a}" 

#Condition pour afficher un message différent selon la valeur de a
if a > 10
	puts "a est supérieur à 10"
else
	puts "a est inférieur ou égal à 10"
end

#Les conditions avec les tableaux
#------------------------------------------------------------------

emails = [
	"bob@bob.com","jane@hello.com"
]

#Conditions pour afficher un message différent selon le nombre d'emails dans le tableau
if emails.size == 0
	puts "Je n'ai aucun contact email"
elsif emails.size == 1
	puts "J'ai un contact email"
else
	puts "Jai plusieurs contacts email"
end

#Conditions dans une boucle pour afficher un message différent pour chaque contact email du tableau
emails.each do |email|
	puts email
	if email == "bob@bob.com"
		puts "Bonjour Bob!"
	else 
		puts "Vous n'êtes pas Bob."
	end
end

#Combiner des conditions
#------------------------------------------------------------------

a = 9

# Si condition1 ET (&&) condition2, faire...
if a != 12 && a != 10
	puts "Okay!"
end

# Si condition1 OU (||) condition2, faire...
if a != 12 || a != 10
	puts "Okay!"
end

# ET et OU combinés
if (a != 12 || a != 10) && a != "hello"
	puts "Okay!"
end

#Les booléens
#------------------------------------------------------------------

a = 15
mon_booleen = (a > 10) #renvoie True si a > 10, False sinon 
puts mon_booleen

if mon_booleen
	puts "a est supérieur à 10"
end


