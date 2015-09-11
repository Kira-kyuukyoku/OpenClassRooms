#TP : Manipulez une instance de classe
#------------------------------------------------------------------

class Utilisateur
	attr_accessor :prenom, :amis
	
	#méthode pour vérifier si une personne est amie avec l'utilisateur
	def est_amis_avec?(prenom)
		puts "On va tester si " + prenom + " est un ami de l'utilisateur"
		amis.each do |ami|
			puts "On teste sur " + ami.prenom
			return true if ami.prenom == prenom
		end
	end
end

#on crée trois utilisateurs : Alice, Bob et Jane
alice = Utilisateur.new
alice.prenom = "Alice"

bob = Utilisateur.new
bob.prenom = "Bob"

jane = Utilisateur.new
jane.prenom = "Jane"

#on définit bob et jane comme amis d'Alice dans un tableau
alice.amis = [bob, jane]

#on affiche le nombre d'amis d'Alice
puts alice.amis.size

#on affiche si Bob est un ami d'Alice en appellant la méthode est_amis_avec?
puts alice.est_amis_avec?("Bob") #renvoie True si Bob est un ami d'Alice, False sinon 

#Allez plus loin : économisez votre code avec la méthode initialize
#------------------------------------------------------------------

class Utilisateur
	attr_accessor :prenom
	
	#méthode initialize qui est appellée lorsqu'une instance de classe est créée
	def initialize(prenom, sexe)
		if sexe == "f"
			@prenom = "Madame" + prenom
		else
			@prenom = "Monsieur" + prenom
		end
	end
end

#on créé des instances de la classe Utilisateur (.new appelle la méthode initialize)
alice = Utilisateur.new("Alice","f")
bob = Utilisateur.new("Bob", "h")

#on affiche le nom des utilisateurs
puts alice.prenom
puts bob.prenom

		
