#Exemple de composition de classes : gérer les notes d'un élève
#------------------------------------------------------------------

#on crée une classe pour représenter un examen
class Examen
	attr_accessor :nom, :note
	
	def initialize(nom,note)
		@nom = nom
		@note = note
	end
end

#on crée un classe pour représenter un élève, avec un nom et un tableau d'examens
class Eleve
	attr_accessor :nom, :examens
	
	#méthode pour calculer la moyenne des notes d'un élève
	def moyenne
		total = 0
		examens.each do |examen|
			total += examen.note #on ajoute examen.note à total
		end
		total / examens.size
end

#on créé un élève Billy 
mon_eleve = Eleve.new
mon_eleve.nom = "Billy"

#on créé deux examens
maths = Examen.new("maths", 10.0)
philo = Examen.new("philo", 15.0)

#on attribue ces deux examens à Billy
mon_eleve.examens = [maths, philo] 

#on affiche les examens de Billy
puts "Examens de #{mon_eleve.nom}"
puts "============================"
mon_eleve.examens.each do |examen|
	puts examen.nom + " : " + examen.note
end
puts "Moyenne générale : " + mon_eleve.moyenne
