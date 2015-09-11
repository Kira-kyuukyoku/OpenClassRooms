#Exemple de regroupement de classes avec l'héritage
#------------------------------------------------------------------
 
#on crée une classe pour représenter un animal avec un nom
class Animal
 	 attr_accessor :nom
 	 
 	 def initialize(nom)
 	 	 @nom = nom
 	 end
end

#on crée une classe Chat qui hérite de la classe Animal, et qui contient une méthode pour miauler 
class Chat < Animal
 	 def parler
 	 	 puts "#{nom} : Miaou !"
 	 end
end

#on crée une classe Chat qui hérite de la classe Animal, et qui contient une méthode pour aboyer
class Chien < Animal
 	 def parler
 	 	 puts "#{nom} : Ouaf !"
 	 end
end

#on crée un chien et un chat 
mon_chien = Animal.new("Bob le chien")
mon_chat = Animal.new("Adeline le chat")

#on les fait parler en appellant leurs méthodes respectives
mon_chat.parler
mon_chien.parler

