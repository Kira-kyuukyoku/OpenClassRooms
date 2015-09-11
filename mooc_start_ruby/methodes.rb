#Les méthodes
#------------------------------------------------------------------

class Utilisateur
	attr_accessor :prenom, :nom, :pays
	
	#définition d'une méthode pour afficher le nom complet d'un utilisateur (méthode sans paramètre)
	def nom_complet
		prenom + " " + nom
	end
	
	#définition d'une méthode pour vérifier où habite un utilisateur (méthode avec paramètre)
	def habite_en(valeur)
		valeur == pays
end

#on crée l'utilisateur bob
bob = Utilisateur.new
bob.prenom = "Bob"
bob.nom = "Lenon"
bob.pays = "France"

#on appelle la méthode nom_complet pour afficher le nom complet de bob
puts bob.nom_complet

#on teste si bob habite en France
puts "Est-ce que Bob habite en France ?"
puts bob.habite_en("France") #renvoie True si bob habite en France, False sinon

#on teste si bob habite en Suisse
puts "Est-ce que Bob habite en Suisse ?"
puts bob.habite_en("Suisse") #renvoie True si bob habite en Suisse, False sinon

#on affiche un message personnalisé selon le lieu où habite bob
if bob.habite_en("Suisse")
	puts "Bonjour cher ami suisse!"
else
	puts "Tu n'es pas Suisse!"
end




