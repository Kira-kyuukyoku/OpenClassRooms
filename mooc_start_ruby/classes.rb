#Exemple : une classe Utilisateur
#----------------------------------------------

#on crée une classe pour modéliser un utilisateur
class Utilisateur
	attr_accessor :prenom, :nom
end

#on crée un utilisateur bob
bob = Utilisateur.new
bob.prenom = "Bob"
bob.nom = "Lenon"

#on affiche son prénom
puts bob.prenom 

#on crée un utilisateur jane
jane = Utilisateur.new
jane.prenom = "Jane"
jane.nom = "Lenon"

#on affiche son nom complet en concaténant son prénom et nom
puts jane.prenom + " " + jane.nom

#D'autres exemples de classes
#----------------------------------------------

class PostSurUnBlog
	attr_accessor :titre, :contenu, :auteur
end

class Email 
	attr_accessor :envoyeur, :contenu, :sujet
end



